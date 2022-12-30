<?php

/**
 * Answered_test model
 */
class Answered_test extends Model
{

    //if we want  ot run a specific func before inserting
    protected $allowedCol = [
            'user_id',
            'test_id',
            'submitted',
            'submitted_date',
            'marked',
            'marked_by',
            'marked_date',
            'date',
    ];

        protected $afterSelect = [
        'get_user',
        'get_test',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function get_answered_test_row($test_id,$user_id)
    {
        $answered_tests = new Answered_test();
        $arr1 =[];
        $arr1['user_id'] = $user_id;
        $arr1['test_id'] = $test_id;

        $data['answered_test_row'] = $answered_tests->query("select * from answered_tests where test_id = :test_id && user_id = :user_id limit 1",$arr1);
        if($data['answered_test_row'])
        {
            return $data['answered_test_row'] = $data['answered_test_row'][0];
        }
    }

    public function submit_answers($test_id,$user_id)
    {
        $answered_tests = new Answered_test();

        if (isset($_GET['submit'])) 
        {
        $arr1 = [];
        $arr1['user_id'] = $user_id;
        $arr1['test_id'] = $test_id;
        $arr1['sub_date'] = date('Y-m-d H:i:s');
        $answered_tests->query("update answered_tests set submitted = 1, submitted_date = :sub_date 
        where test_id = :test_id && user_id = :user_id limit 1",$arr1
        );
        }
    }

    public function un_submit_answers($test_id,$user_id)
    {
        $answered_tests = new Answered_test();

        if (isset($_GET['un_submit'])) 
        {
        $arr1 = [];
        $arr1['user_id'] = $user_id;
        $arr1['test_id'] = $test_id;
        $arr1['sub_date'] = '';
        $answered_tests->query("update answered_tests set submitted = 0, submitted_date = :sub_date 
        where test_id = :test_id && user_id = :user_id limit 1",$arr1
        );
        }
    }

    public function set_test_as_marked($test_id,$user_id, $get_mark_percentage)
    {
        $answered_tests = new Answered_test();

        if (isset($_GET['set_as_marked']) && $get_mark_percentage >= 100) 
        {
        $arr1 = [];
        $arr1['user_id'] = $user_id;
        $arr1['test_id'] = $test_id;
        $arr1['marked_date'] = date('Y-m-d H:i:s');
        $arr1['marked_by'] = Auth::getUser_id();
        $arr1['score'] = get_score_percentage($test_id, $user_id);
        $answered_tests->query("update answered_tests set marked = 1, marked_date = :marked_date, marked_by = :marked_by, score = :score
        where test_id = :test_id && user_id = :user_id limit 1",$arr1
        );
        }
    }

    // get user who created the school
    public function get_user($data)
    {
        // instantiate user
        $user = new User();
        foreach ($data as $key => $row) {
            # code...
            $result = $user->where('user_id',$row->user_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }
            return $data;
    }
    public function get_test($data)
    {
        // instantiate user
        $test = new test();
        foreach ($data as $key => $row) {
            # code...
            $result = $test->where('test_id',$row->test_id);
            $data[$key]->test = is_array($result) ? $result[0] : false;
        }
            return $data;
    }

}