<?php

/**
 * Users class
 */
class Users extends Controller 
{
    // protected $table = 'users';
    
    
    function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }


        $user = new User();

        $school_id = Auth::getschool_id();

        $limit = 3;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        $data = $user->query("select * from users where school_id = :school_id && rank not in ('student') order by id desc limit $limit offset $offset",['school_id'=>$school_id]);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['staff', 'users'];

        
        //         
        $find = isset($_GET['find']) ? $_GET['find'] : null;
        
        // 
        if (!empty($find) && trim($find)) 
        {
            $name = '%'.trim($find).'%';
            $query = "select * from users where school_id = :school_id &&
            (firstname like :fname || lastname like :lname) && rank not in ('student') order by id desc limit $limit offset $offset";
            $data = $user->query($query,['school_id'=>$school_id,'fname'=>$name, 'lname'=>$name]);
        }


        if (Auth::access('admin')){
        $this->view('users',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
            'pager'=>$pager,
        ]);
    }else {
            $this->View('access-denied');
        }
    }
}
