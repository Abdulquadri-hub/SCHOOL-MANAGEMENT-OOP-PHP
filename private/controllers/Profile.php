<?php

/**
 * login controller
 */
class Profile extends Controller
{
    public function index($id = "") 
    {

        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $user = new User();

        $id = ($id == "") ? Auth::getUser_id() : $id; 

        $row = $user->first('user_id',$id);
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Profile', 'profile'];
        
        if($row)
        {
            $crumbs[] = [$row->firstname,'profile'];
        }

        // 
        $data['page_tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'info';

        // 
        if ($data['page_tab'] == 'classes' && $row) 
        {
            // 
            $class = new Classes_model();
            $my_tbl = 'class_students';

            // 
            if ($row->rank == 'lecturer') {
                $my_tbl = 'class_lecturers';
            }

            // 
            $student_class_on_profile = new Class_student();
            $query = "select * from $my_tbl where user_id = :user_id && disabled = 0 && year(date) = :school_year";
            $data['student_class_on_profile'] = $student_class_on_profile->query($query,['user_id'=>$id,'school_year'=>$school_year]);

            // 
            $data['stud_class'] = [];
            if ($data['student_class_on_profile']) {
                foreach ($data['student_class_on_profile'] as $key => $arow) {
                    $data['stud_class'][] = $class->first('class_id', $arow->class_id);
                }
            }// 

        }

            //
        if ($data['page_tab'] == 'tests' && $row) 
        {
            if($row->rank == "student")
            {
                $test = new Test();
                $answered_tests = $test->query(
                    "select * from answered_tests where user_id = :user_id && submitted = 1 && 
                    marked = 1",['user_id'=>$id]
                );
                // get test dtals
                    if (is_array($answered_tests)) {
                        foreach ($answered_tests as $key => $value) {
                        $answered_tests[$key]->details = $test->first('test_id',$answered_tests[$key]->test_id);
                        }
                    }
                    $data['test_rows'] = $answered_tests;
            }else{
            
                $test = new Test();
                //
                $disabled = "disabled = 0 &&";
                $my_tbl = 'class_students';
    
                
                if (Auth::getRank() == 'lecturer') {
                    $my_tbl = 'class_lecturers';
                    $disabled = "";
                }
    
                $query = "select * from tests where ($disabled class_id in (select class_id from $my_tbl where disabled = 0 && user_id = :user_id) && year(date) = :school_year) order by date desc";
                $arr['user_id'] = Auth::getUser_id();
                $arr['school_year'] = $school_year;
                $my_tests = $test->query($query,$arr);
                $data['test_rows']  = $my_tests;
        }
    }
        $data['row'] = $row;
        $data['crumbs'] = $crumbs;
        $data['unsubmitted'] = get_unsubmitted_test_rows();


        // 
        if(Auth::access('reception') || Auth::i_own_content($row)){
        $this->view('profile',$data);
        }else {
            $this->View('access-denied');
        }
    }

    public function edit($id = "") 
    {

        $errors = [];

        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $user = new User();

        $id = ($id == "") ? Auth::getUser_id() : $id; 

        if (count($_POST) > 0 && Auth::access('reception')) 
        {
            if (trim($_POST['password']) == "") {
                unset($_POST['password']);
                unset($_POST['password2']);
            }

            if ($user->validate($_POST, $id)) 
            {
                
            if (count($_FILES) > 0) 
            {
                $image = isset($_FILES['image']) ? $_FILES['image'] : "";
                $allowed[] = 'image/jpeg';
                $allowed[] = 'image/jpg';

                if (!empty($image['name']) && $image['error'] === 0) 
                {
                    if (in_array($image['type'], $allowed)) 
                    {
                        $folder = "asset/images/";
                        if (!file_exists($folder)) 
                        {
                            mkdir($folder, 0777, true);
                        }
                        $destination = $folder . random_string(5) . "/" . $image['name'];
                        mkdir(dirname($destination));
                        move_uploaded_file($image['tmp_name'], $destination);
                        $_POST['image'] = $destination;
                    }
                }
            }

                    if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
                        $_POST['rank'] = 'admin';
                    }
                    $get = $user->first('user_id',$id);
                    $user->update($get->id,$_POST);
                
                $redirect = 'profile/edit/'.$id;
                $this->redirect($redirect);
            }else {
                $errors = $user->errors;
            }
        }

        $row = $user->first('user_id',$id);
        $data['row'] = $row;
        $data['errors'] = $errors;
        // 
        if(Auth::access('reception') || Auth::i_own_content($row)){
        $this->view('profile-edit',$data);
        }else {
            $this->View('access-denied');
        }
    }
}