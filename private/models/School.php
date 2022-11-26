<?php

/**
 * school model
 */
class School extends Modelsch
{

    protected $table = 'schools';
        // // if we want  ot allow a specific func before inserting
    protected $allowedCol = [
            'school',
            'date',
    ];

    // if we want  ot run a specific func before inserting
    protected $beforeInsert = [
        'make_school_id',
        'make_user_id',
    ];

    // if we want  ot run a specific func afterSelect
    protected $afterSelect = [
        'get_user',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();
    
        // check school
        if (empty($DATA['school']) || !preg_match("/^[a-zA-Z]+$/", $DATA['school'])) {
            
            $this->errors['school'] = "Only letters allowed in the school ";
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
    
    // function  to get user_id
    public function make_user_id($data)
    {
        if (isset($_SESSION['USER']->user_id)) 
        {
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;
    }

    // function  to get school_id
    public function make_school_id($data)
    {
        
            $data['school_id'] = random_string(60);
            return $data;
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
    
}