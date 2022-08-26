<?php

/**
 * Classes model
 */
class Classes_model extends Modelclass
{

    protected $table = "classes";
        // // if we want  ot run a specific func before inserting
    protected $allowedCol = [
            'class',
            'date',
    ];

    // if we want  ot run a specific func before inserting
    protected $beforeInsert = [
        'make_school_id',
        'make_class_id',
        'make_user_id',
    ];

    // if we want  ot run a specific func afterSelect
    protected $afterSelect = [
        'get_user',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();
    
        // check class
        if (empty($DATA['class']) || !preg_match("/^[a-z A-Z0-9]+$/", $DATA['class'])) {
            
            $this->errors['class'] = "Only letters and numbers allowed in the class ";
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
    // function  to get class_id
    public function make_class_id($data)
    {
        
            $data['class_id'] = random_string(60);
            return $data;
    }

    // get user who created the sclass
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