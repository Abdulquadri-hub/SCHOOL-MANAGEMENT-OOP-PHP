<?php

/**
 * signup controller
 */
class Signup extends Controller
{
    function index() 
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }


        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
        $errors = array();
        // check if user typed
        if (count($_POST) > 0)
        {
            // instantiate user object
            $user = new User();


            // validate infomation
            if ($user->validate($_POST)) 
            {
                $_POST['date'] = date("Y-m-d H:i:s");

                if (Auth::access('reception')) 
                {
                    if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
                        $_POST['rank'] = 'admin';
                    }
                    $user->insert($_POST);
                }
                
                $redirect = $mode == 'students' ? 'students':'users';
                $this->redirect($redirect);
            }else {
                $errors = $user->errors;
            }
        }
        if (Auth::access('reception')){
        $this->view('signup', [
            'errors'=>$errors,
            'mode'=>$mode,
        ]);
    }else {
        $this->View('access-denied');
    }
    }
}
