<?php

/**
 * Test model
 */
class Test extends Model
{

    //if we want  ot run a specific func before inserting
    protected $allowedCol = [
            'test',
            'description',
            'disabled',
            'class_id',
            'date',
    ];

    // if we want  ot run a specific func before inserting
    protected $beforeInsert = [
        'make_school_id',
        'make_test_id',
        'make_user_id',
    ];

    // if we want  ot run a specific func afterSelect
    protected $afterSelect = [
        'get_user',
        'get_class',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();
    
        // check test if empty
        if (empty($DATA['test']) || !preg_match("/^[a-z A-Z0-9]+$/", $DATA['test'])) {
            
            $this->errors['test'] = "Only letters and numbers allowed in the test ";
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
    
    // function  to get user_id
    public function make_school_id($data)
    {
        if (isset($_SESSION['USER']->school_id)) 
        {
            $data['school_id'] = $_SESSION['USER']->school_id;
        }
        return $data;
    }

    public function make_user_id($data)
    {
        if (isset($_SESSION['USER']->user_id)) 
        {
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;
    }
    // function  to get test_id
    public function make_test_id($data)
    {
        
            $data['test_id'] = random_string(60);
            return $data;
    }

    // get user who created the stest
    public function get_user($data)
    {
        // instantiate user
        $user = new User();
        foreach ($data as $key => $row) {
            # code...
            if(!empty($row->user_id))
            {
                $result = $user->where('user_id',$row->user_id);
                $data[$key]->user = is_array($result) ? $result[0] : false;
            }
        }
            return $data;
    }

    public function get_class($data)
    {
        // instantiate class
        $class = new Classes_model();
        foreach ($data as $key => $row) {
            # code...
            if (!empty($row->class_id)) {
                $result = $class->where('class_id',$row->class_id);
                $data[$key]->class = is_array($result) ? $result[0] : false;
            }
        }
            return $data;
    }

    // count tests to mark
    public function get_to_mark_count()
    {

        $school_id = Auth::getschool_id();
        $test = new Test();
        $school_year = isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time());

        if (Auth::access('admin')) 
        {
            $query = "select * from answered_tests where test_id in (select test_id from tests where school_id = :school_id) && submitted = 1 && marked = 0 && year(date) = :school_year  order by id desc";
            $to_mark = $test->query($query,['school_id'=>$school_id, 'school_year'=>$school_year]);

        }else {
            
            $query = "select * from answered_tests where test_id in (select test_id from tests where class_id in (SELECT class_id FROM `class_lecturers` where user_id = :user_id && disabled = 0)) && submitted = 1 && marked = 0 && year(date) = :school_year  order by id desc";

            $to_mark = $test->query($query,['user_id'=>Auth::getUser_id(),'school_year'=>$school_year]);
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

        }
        
    return $to_mark ?  count($to_mark) : false;

    }
    
    
}