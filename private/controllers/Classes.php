<?php

/**
 * classes ccontroller
 */
class Classes extends Controller 
{
    
    public function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();

        // get unique class
        $school_id = Auth::getschool_id();
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        // 
        if (Auth::access('admin')) 
        {
            $query = "select * from classes where school_id = :school_id && year(date) = :school_year order by date desc";
            $arr['school_id'] = $school_id;
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            
            if (!empty($find) && trim($find)) 
            {
                $class = "%".trim($find)."%";
                $query = "select * from classes where school_id = :school_id && (class like :class) && year(date) = :school_year  order by id desc";
                $arr['class']= $class;
                $arr['school_year'] = $school_year;
            }

            $data = $classes->query($query,$arr);

        }else {
            // 
            $class = new Classes_model();
            
            // 
            $my_tbl = 'class_students';

            // 
            if (Auth::getRank() == 'lecturer') {
                $my_tbl = 'class_lecturers';
            }

            $query = "select * from classes where (class_id in (select class_id from $my_tbl where user_id = :user_id && disabled = 0 || user_id = :user_id)  && year(date) = :school_year)";
            $arr['user_id'] = Auth::getUser_id();
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            
            if (!empty($find) && trim($find)) 
            {
                $find = "%".trim($find)."%";
                $query = "select classes.class, {$my_tbl}.* from $my_tbl 
                join classes on classes.class_id = {$my_tbl}.class_id  
                where ({$my_tbl}.user_id = :user_id && {$my_tbl}.disabled = 0 
                && (classes.class like :find) && year(classes.date) = :school_year) ";
                
                $arr['find'] = $find;
                $arr['school_year'] = $school_year;
            }
            $data = $class->query($query,$arr);
            // $arr['student_or_lecturer_class'] = $class->query($query,$arr);

            // // get a unique class id and class that belong to the rightful owner
            // $query = "select * from classes where user_id = :user_id order by id desc";
            // $classes_i_own = $class->query($query,['user_id'=>Auth::getUser_id()]);

            // if ($classes_i_own && $arr['student_or_lecturer_class']) {
            //     $arr['student_or_lecturer_class'] = array_merge($arr['student_or_lecturer_class'], $classes_i_own);
            // }

            // 
            // $data = array();
            // if ($arr['student_or_lecturer_class']) {
            //     $classes_ids = array_column($arr['student_or_lecturer_class'],"class_id");
            //     $classes_ids = array_unique($classes_ids);
            //     foreach ($classes_ids as $class_id) 
            //     {
            //         $data[] = $class->first('class_id', $class_id);
            //     }
            // }

        }

        // 
        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','classes'];

        $this->view('classes',[
            'rows'=>$data,
            'crumbs'=>$crumbs
        ]);
    }

    
    public function add() #add classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = array();

        if (count($_POST) > 0)
        {
            $classes = new Classes_model(); 

            // validate infoamtion
            if ($classes->validate($_POST)) {

                $_POST['date'] = date("Y-m-d H:i:s");

                $cl = $classes->insert($_POST);
                

                $this->redirect('classes');
            }else {
                $errors = $classes->errors;
            }
        }

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Add','Classes/add'];

            $this->view('classes.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs
            ]);
    }

    public function edit($id = null) #edit classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();

        $errors = array();

        $row = $classes->where('id',$id);

        if (count($_POST) > 0 && Auth::access('lecturer')&& Auth::i_own_content($row))
        {
            

            // validate infoamtion
            if ($classes->validate($_POST)) {

                $classes->update($id,$_POST);

                $this->redirect('classes');
            }else {
                $errors = $classes->errors;
            }
        }

        $row = $classes->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Edit','Classes/edit'];

        if(Auth::access('lecturer') && Auth::i_own_content($row)){
            $this->view('classes.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs
            ]);
        }else {
            $this->View('access-denied');
        }
    }

    public function delete($id = null) #delete classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();

        $errors = array();

        $row = $classes->where('id',$id);

        if (count($_POST) > 0 && Auth::access('lecturer') && Auth::i_own_content($row))
        {

            $classes->delete($id);
            $this->redirect('Classes');  
        }

        $row = $classes->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Delete','Classes/delete'];

        if(Auth::access('lecturer') && Auth::i_own_content($row)){
            $this->view('classes.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs
            ]);
        }else {
            $this->View('access-denied');
        }
    }
}
