<?php

/**
 * Tests ccontroller
 */
class Tests extends Controller 
{
    
    public function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $tests = new Test();

        // get unique test
        $school_id = Auth::getschool_id();
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        // 
        if (Auth::access('admin')) 
        {
            $query = "select * from tests where school_id = :school_id && year(date) = :school_year  order by id desc";
            $arr['school_id'] = $school_id;
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            
            if (!empty($find) && trim($find)) 
            {
                $test = "%".trim($find)."%";
                $query = "select * from tests where school_id = :school_id && (test like :test) && year(date) = :school_year  order by id desc";
                $arr['test']= $test;
                $arr['school_year'] = $school_year;
            }

            $data = $tests->query($query,$arr);

        }else {

            // 
            $disabled = "disabled = 0 &&";
            $my_tbl = 'class_students';

            
            if (Auth::getRank() == 'lecturer') {
                $my_tbl = 'class_lecturers';
                $disabled = "";
            }

            $query = "select * from tests where $disabled class_id in (select class_id from $my_tbl where disabled = 0 && user_id = :user_id) && year(date) = :school_year  order by date desc";
            $arr['user_id'] = Auth::getUser_id();
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            if (!empty($find) && trim($find)) 
            {
                $find = "%".trim($find)."%";
                $query = "select * from tests where $disabled class_id in (select class_id from $my_tbl where disabled = 0 && user_id = :user_id)  && test like :find && year(date) = :school_year  order by date desc";
                $arr['find'] = $find;
                $arr['school_year'] = $school_year;
            }
            
            $data = $tests->query($query,$arr);
            
        }


        // 
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['tests','tests'];

        $this->view('tests',[
            'test_rows'=>$data,
            'crumbs'=>$crumbs,
            'unsubmitted'=>get_unsubmitted_test_rows(),
        ]);
        

    }

}
