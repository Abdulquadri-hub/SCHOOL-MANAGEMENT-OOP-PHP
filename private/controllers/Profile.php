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
            $query = "select * from $my_tbl where user_id = :user_id && disabled = 0";
            $data['student_class_on_profile'] = $student_class_on_profile->query($query,['user_id'=>$id]);

            // 
            $data['stud_class'] = [];
            if ($data['student_class_on_profile']) {
                foreach ($data['student_class_on_profile'] as $key => $arow) {
                    $data['stud_class'][] = $class->first('class_id', $arow->class_id);
                }
            }

        }

        // 
        $data['row'] = $row;
        $data['crumbs'] = $crumbs;

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