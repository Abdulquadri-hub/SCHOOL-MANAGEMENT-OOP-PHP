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

    protected function get_primary_key($table)
    {
        $query = "SHOW KEYS FROM $table WHERE key_name = PRIMARY";
        $db = new Database();
        $data = $db->query($query);
        if (!empty($data[0])) 
        {
            return $data[0]->Column_name;
        }
        return 'id';
    }
}
