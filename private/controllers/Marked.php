<?php

/**
 * Marked ccontroller
 */
class Marked extends Controller 
{
    
    public function index()
    {
        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }

        $tests = new Test();

        // get unique test
        $school_id = Auth::getschool_id();
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        // 
        if (Auth::access('admin')) 
        {
            $query = "select * from answered_tests where (test_id in (select test_id from tests where school_id = :school_id) && submitted = 1 && marked = 1  && year(date) = :school_year) order by id desc";
            $arr['school_id']= $school_id;
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            
            if (!empty($find) && trim($find)) 
            {
                $test = "%".trim($find)."%";
                $query = "select * from tests where school_id = :school_id && (test like :test) 
                order by id desc";
                $arr['test']= $test;
            }

            $answered_tests = $tests->query($query,$arr);

        }else {
            // 
            $disabled = "";
            $my_tbl = 'class_lecturers';
            $query = "select * from answered_tests where test_id in (select test_id from tests where class_id in (SELECT class_id FROM `class_lecturers` where user_id = :user_id && disabled = 0)) && submitted = 1 && marked = 1 && year(date) = :school_year order by id desc";
            $arr['user_id']= Auth::getUser_id();
            $arr['school_year'] = $school_year;

            $find = isset($_GET['find']) ? $_GET['find'] : null;
            if (!empty($find) && trim($find)) 
            {
                $test = "%".trim($find)."%";
                $query = "select tests.test, answered_tests.* from answered_tests join tests on tests.test_id = answered_tests.test_id where test_id in (select test_id from tests where class_id in (SELECT class_id FROM `class_lecturers` where user_id = :user_id && disabled = 0)) && answered_tests.submitted = 1 && answered_tests.marked = 1 && year(tests.date) = :school_year order by id desc";
                
                $arr['test']= $test;
                $arr['user_id']= Auth::getUser_id();
                $arr['school_year'] = $school_year;
            }
            
            $answered_tests = $tests->query($query,$arr);
        }

        if(is_array($answered_tests))
        {
            foreach ($answered_tests as $key => $value) {
                $answered_tests[$key]->details = $tests->first('test_id',$answered_tests[$key]->test_id);
            }
        }
        
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Marked','marked'];

        $data['test_rows'] = $answered_tests ;
        $data['crumbs'] = $crumbs;

        $this->view('marked',$data);
    }

}
