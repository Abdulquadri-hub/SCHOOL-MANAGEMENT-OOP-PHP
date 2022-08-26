<?php

/**
 * login class
 */
//use Models\Auth;
class Login extends Controller 
{
    
    function index()
    {
    
        $errors = array();

        if (count($_POST) > 0) 
        {
          $user = new User();
          if($row = $user->where('email', $_POST['email']))
          {
              $row = $row[0];
              if (password_verify($_POST['password'], $row->password)) 
              {
                
                  Auth::loginUser($row);
                  $this->redirect('/home');
              }
            
          }  
          $errors['email'] = "Wrong Email or Password";
        }
        

        $this->view('login', [
        'errors'=>$errors,
        ]);
    }
}
