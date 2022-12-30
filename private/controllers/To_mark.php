<?php

/**
 * To_Mark ccontroller
 */
class To_Mark extends Controller 
{
    
    public function index()
    {
        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }

        $test = new Test();

        // get unique test
        $school_id = Auth::getschool_id();
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        // 
        if (Auth::access('admin')) 
        {
            $query = "select * from answered_tests where (test_id in (select test_id from tests where school_id = :school_id) && submitted = 1 && marked = 0  && year(date) = :school_year) order by id desc";
            $arr['school_id']= $school_id;
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            
            if (!empty($find) && trim($find)) 
            {
                $test = "%".trim($find)."%";

                $query =  "select * from tests where school_id = :school_id && year(date) = :school_year && (test like :test) 
                order by id desc";
                $arr['test']= $test;
                $arr['school_year'] = $school_year;
            }

            $to_mark = $test->query($query,$arr);

        }else {
            
            $query = "select * from answered_tests where test_id in (select test_id from tests where class_id in (SELECT class_id FROM `class_lecturers` where user_id = :user_id && disabled = 0)) && submitted = 1 && marked = 0 && year(date) = :school_year order by id desc";
            $arr['user_id']= Auth::getUser_id();
            $arr['school_year'] = $school_year;


            $find = isset($_GET['find']) ? $_GET['find'] : null;
            if (!empty($find) && trim($find)) 
            {
                $find = "%".trim($find)."%";
                $query = "select tests.test, answered_tests.* from answered_tests
                join tests on tests.test_id = answered_tests.test_id  
                where (answered_tests.user_id = :user_id && submitted = 1 && marked = 0
                && (tests.test like :find) && year(tests.date) = :school_year)";
                $arr['find']= $find;
                $arr['user_id']= Auth::getUser_id();
                $arr['school_year'] = $school_year;
            }

            $to_mark = $test->query($query,$arr);

        }

        if($to_mark)
        {
            foreach ($to_mark as $key => $value) 
            {
                $a = $test->first('test_id',$value->test_id);
                if($a)
                {
                    $to_mark[$key]->details = $a;
                }
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['To mark','to_mark'];
        
        $this->view('to-mark',[
            'test_rows'=>$to_mark,
            'crumbs'=>$crumbs
        ]);
    }

}
