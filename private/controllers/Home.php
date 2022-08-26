<?php

/**
 * home class
 */
class Home extends Controller 
{
    
    function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $user = new User();

        $data = $user->findAll();

        $this->view('home',['rows'=>$data]);
    }
}
