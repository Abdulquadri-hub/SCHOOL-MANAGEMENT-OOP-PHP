<?php

/**
 * signup controller
 */
class Signup extends Controller
{
    function index() 
    {
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

                $user->insert($_POST);

                $redirect = $mode == 'students' ? 'students':'users';
                $this->redirect($redirect);
            }else {
                $errors = $user->errors;
            }
        }
        
        $this->view('signup', [
            'errors'=>$errors,
            'mode'=>$mode,
        ]);
    }
}
