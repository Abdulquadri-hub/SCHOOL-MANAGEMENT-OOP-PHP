<?php

/**
 * single_class controller
 */
class Single_class extends Controller
{
    function index($id = "") 
    {

        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $lecturer = new Class_lecturer();

        $student = new class_student();
        $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'lecturers';

        $limit = 2;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        $results = false;
        {
            if ($page_tab === 'lecturers') {

                // dipslay lecturers
                $query = "select * from class_lecturers 
                where class_id = :class_id && disabled = 0 limit $limit offset $offset";
                $lecturers = $lecturer->query($query,['class_id'=>$id]);
                $data['lecturers'] = $lecturers;
            }else {
                if ($page_tab == 'students') {

                    // display students
                    $query = "select * from class_students 
                    where class_id = :class_id && disabled = 0 limit $limit offset $offset";
                    $students = $student->query($query,['class_id'=>$id]);
                    $data['students'] = $students;
                }else {
                    if ($page_tab == 'tests') {
                        // display tests
                        $query = "select * from tests 
                        where class_id = :class_id limit $limit offset $offset";
                        $tests = $student->query($query,['class_id'=>$id]);
                        $data['tests'] = $tests;
                    }
                }
            }
        }

        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;
        $data['pager']  = $pager;

        $this->view('single-class',$data);
    }

    // add lecturer
    public function lecturer_add($id = '')
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'lecturer-add';
        $lecturer = new Class_lecturer();

        $results = false;

        if (count($_POST) > 0) {
            
            // search lecturer
            if (isset($_POST['search'])) {

                if (trim($_POST['name']) && !empty($_POST['name'] )) {

                    $user = new User();
                    $name = '%'.trim($_POST['name']).'%';
                     $results = $user->query("select * from users where 
                    (firstname like :fname || lastname like :lname)
                    && rank in ('lecturer')", 
                    ['fname'=>$name, 'lname'=>$name]);
                }else {
                    $errors[] = "Please type in a name to search";
                }
            
            }else {
                if (isset($_POST['selected'])) {
                    
                        // add lecturer
                        $query = "select disabled, id from class_lecturers
                        where user_id = :user_id 
                        && class_id = :class_id limit 1 ";
                        
                        $check = $lecturer->query($query,[
                        'user_id'=>$_POST['selected'],
                        'class_id'=>$id
                    ]);
                    
                    if (!$check) {
                        
                        // if not true add lecturer
                        $arr = array();
                        $arr['user_id'] = $_POST['selected'];
                        $arr['class_id'] = $id;
                        $arr['disabled'] = 0;
                        $arr['date'] = date("Y-m-d H:i:s");

                        $lecturer->insert($arr);

                        $this->redirect("single_class/".$id."?tab=lecturers");

                    }else {
                        if(isset($check[0]->disabled))
                        {
                            if ($check[0]->disabled) 
                            {
                                $arr = array();
                                $arr['disabled'] = 0;

                                $lecturer->update($check[0]->id, $arr);
                                $this->redirect("single_class/".$id."?tab=lecturers");

                            }else {
                                $errors[] = "Lecturer already belongs to this class";
                            }
                        }else {
                            $errors[] = "Lecturer already belongs to this class";
                        }
                    }
                    
                }
            }
        }
        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;

        $this->view('single-class',$data);
    }

    // remove lecture
    public function lecturer_remove($id = "")
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'lecturer-remove';
        $lecturer = new Class_lecturer();

        $results = false;

        if (count($_POST) > 0) {
            
            // search lecturer
            if (isset($_POST['search'])) {

                if (trim($_POST['name']) && !empty($_POST['name'] )) {

                    $user = new User();
                    $name = '%'.trim($_POST['name']).'%';
                     $results = $user->query("select * from users where 
                    (firstname like :fname || lastname like :lname)
                    && rank in ('lecturer')", 
                    ['fname'=>$name, 'lname'=>$name]);
                }else {
                    $errors[] = "Please type in a name to search";
                }
            
            }else {
                if (isset($_POST['selected'])) {
                    
                    
                        // remove lecturer
                        $query = "select id from class_lecturers
                        where user_id = :user_id 
                        && class_id = :class_id && disabled = 0 limit 1 ";

                            $row = $lecturer->query($query,[
                            'user_id'=>$_POST['selected'],
                            'class_id'=>$id
                        ]);
                            if ($row) {
                                $arr = array();
                                $arr['disabled'] = 1;

                                $lecturer->update($row[0]->id, $arr);

                                $this->redirect("single_class/".$id."?tab=lecturers");
                                
                            }else {
                        
                                $errors[] = "Lecturer were not found in this class";
                            }
                    
                }
            }
        }
        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;

        $this->view('single-class',$data);
    }

    // add student 
    public function student_add($id = '')
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'student-add';
        $student = new Class_student();

        $results = false;

        if (count($_POST) > 0) {
            
            // search lecturer
            if (isset($_POST['search'])) {

                if (trim($_POST['name']) && !empty($_POST['name'] )) {

                    $user = new User();
                    $name = '%'.trim($_POST['name']).'%';
                     $results = $user->query("select * from users where 
                    (firstname like :fname || lastname like :lname)
                    && rank in ('student')", 
                    ['fname'=>$name, 'lname'=>$name]);
                }else {
                    $errors[] = "Please type in a student name to search";
                }
            
            }else {
                if (isset($_POST['selected'])) {
                    
                        // add lecturer
                        $query = "select disabled, id from class_students
                        where user_id = :user_id 
                        && class_id = :class_id limit 1 ";
                        
                        $check = $student->query($query,[
                        'user_id'=>$_POST['selected'],
                        'class_id'=>$id
                    ]);
                    
                    if (!$check) {
                        
                        // if not true add lecturer
                        $arr = array();
                        $arr['user_id'] = $_POST['selected'];
                        $arr['class_id'] = $id;
                        $arr['disabled'] = 0;
                        $arr['date'] = date("Y-m-d H:i:s");

                        $student->insert($arr);

                        $this->redirect("single_class/".$id."?tab=students");

                    }else {
                        if (isset($check[0]->disabled)) 
                        {
                            if ($check[0]->disabled) 
                            {
                                $arr = [];
                                $arr['disabled'] = 0;

                                $student->update($check[0]->id,$arr);

                                $this->redirect("single_class/".$id."?tab=students");
                            }else {
                                $errors[] = "Student already belongs to this class";
                            }
                        }else {
                            $errors[] = "Student already belongs to this class";
                        }
                        
                    }
                    
                }
            }
        }
        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;

        $this->view('single-class',$data);
    }

    // remove student
    public function student_remove($id = "")
    {
            if (!Auth::loggedIn()) 
            {
                $this->redirect('login');
            }
    
            $errors = [];
    
            $classes = new Classes_model();
            $row = $classes->first('class_id',$id);#row for the data 
    
    
            $crumbs[] = ['Dashboard', ''];
            $crumbs[] = ['classes', 'classes'];
            
            if($row)
            {
                $crumbs[] = [$row->class,''];
            }
    
            $page_tab = 'student-remove';
            $student = new Class_student();
    
            $results = false;
    
            if (count($_POST) > 0) {
                
                // search student
                if (isset($_POST['search'])) {
    
                    if (trim($_POST['name']) && !empty($_POST['name'] )) {
    
                        $user = new User();
                        $name = '%'.trim($_POST['name']).'%';
                         $results = $user->query("select * from users where 
                        (firstname like :fname || lastname like :lname)
                        && rank in ('student')", 
                        ['fname'=>$name, 'lname'=>$name]);
                    }else {
                        $errors[] = "Please type in a name to search";
                    }
                
                }else {
                    if (isset($_POST['selected'])) {
                        
                        
                            // remove student
                            $query = "select id from class_students
                            where user_id = :user_id 
                            && class_id = :class_id && disabled = 0 limit 1 ";
    
                                $row = $student->query($query,[
                                'user_id'=>$_POST['selected'],
                                'class_id'=>$id
                            ]);
                                if ($row) {
                                    $arr = array();
                                    $arr['disabled'] = 1;
    
                                    $student->update($row[0]->id, $arr);
    
                                    $this->redirect("single_class/".$id."?tab=students");
                                    
                                }else {
                            
                                    $errors[] = "Student were not found in this class";
                                }
                        
                    }
                }
            }
            $data['row']      = $row;
            $data['crumbs']   = $crumbs;
            $data['page_tab'] = $page_tab;
            $data['results']  = $results;
            $data['errors']  = $errors;
    
            $this->view('single-class',$data);
    }

    // add test
    public function test_add($id = '')
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'test-add';
        $test = new Test();

        if (count($_POST) > 0) 
        {
            if ($test->validate($_POST)) {

                $arr = array();
                
                $arr['test'] = $_POST['test'];
                $arr['description'] = $_POST['description'];
                $arr['class_id'] = $id;
                $arr['disabled'] = 0;
                $arr['date'] = date("Y-m-d H:i:s");

                $test->insert($arr);

                $this->redirect("single_class/".$id."?tab=tests");
            }else {
                $errors = $test->errors;
            }

        }

        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['errors']  = $errors;

        $this->view('single-class',$data);
    }

    // edit test
    public function test_edit($id = '', $test_id = '')
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'test-edit';
        $test = new Test();

        $test_row = $test->first('test_id', $test_id);

        if (count($_POST) > 0) 
        {
            if ($test->validate($_POST)) {

                $arr = array();
                
                $arr['test'] = $_POST['test'];
                $arr['description'] = $_POST['description'];
                $arr['disabled'] = $_POST['disabled'];

                $test->update($test_row->id,$arr);

                $this->redirect("single_class/test_edit/".$id."/".$test_id."?tab=test-edit");
            }else {
                $errors = $test->errors;
            }

        }

        $data['row']      = $row;
        $data['test_row'] = $test_row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['errors']   = $errors;

        $this->view('single-class',$data);
    }

    // delete test
    public function test_delete($id = '', $test_id = '')
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = [];

        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = 'test-delete';
        $test = new Test();

        $test_row = $test->first('test_id', $test_id);

        if (count($_POST) > 0) 
        {
            if ($test->validate($_POST)) {

                $test->delete($test_row->id);

                $this->redirect("single_class/".$id."?tab=tests");
            }else {
                $errors = $test->errors;
            }

        }

        $data['row']      = $row;
        $data['test_row'] = $test_row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['errors']   = $errors;

        $this->view('single-class',$data);
    }

}