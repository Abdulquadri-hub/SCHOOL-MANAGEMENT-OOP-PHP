<?php

/**
 * students class
 */
class Students extends Controller 
{
    
    function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $user = new User();

        // paginate
        $limit = 1;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        

        $school_id = Auth::getschool_id();
        $data = $user->query("select * from users where school_id = :school_id && rank in ('student') order by id desc limit $limit offset $offset",['school_id'=>$school_id]);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['students', 'students'];

        //         
        $find = isset($_GET['find']) ? $_GET['find'] : null;
        
        // 
        if (!empty($find) && trim($find)) 
        {
            $name = '%'.trim($find).'%';
            $query = "select * from users where school_id = :school_id &&
            (firstname like :fname || lastname like :lname) && 
            rank in ('student') order by id desc limit $limit offset $offset";
            $data = $user->query($query,['school_id'=>$school_id,'fname'=>$name, 'lname'=>$name]);
        }
        
        if (Auth::access('reception')){
        $this->view('students',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
            'pager'=>$pager,
        ]);
    }else {
        $this->View('access-denied');
    }
    }
}
