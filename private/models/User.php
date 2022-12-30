<?php

/**
 * user model
 */
class User extends Model
{

    
        // // if we want  ot run a specific func before inserting
        protected $allowedCol = [
            'firstname',
            'lastname',
            'email',
            'password',
            'gender',
            'date',
            'rank',
            'image',
            'school_id',
        ];

    // if we want  ot run a specific func before inserting
    protected $beforeInsert = [
        'make_user_id',
        'make_school_id',
        'hash_password',
    ];

    // if we want  ot run a specific func before inserting
    protected $beforeUpdate = [
        'hash_password',
    ];

    public function validate($DATA,$id = '') 
    {

        $this->errors = array();
        // check for password match
        if (isset($DATA['password'])) {
            # code...
        if (empty($DATA['password']) || $DATA['password'] != $DATA['password2']) {
            
            $this->errors['password'] = "The pasword do not match";
        }
        //password lenth 
        if (strlen($DATA['password']) < 8 ) {
            
            $this->errors['password'] = "Password must be at least 8 character long";
        }
    }

        // check firstname
        if (empty($DATA['firstname']) || !preg_match("/^[a-zA-Z ]+$/", $DATA['firstname'])) {
            
            $this->errors['firstname'] = "Only letters allowed in the first name ";
        }

        // check lastname
        if (empty($DATA['lastname']) || !preg_match("/^[a-zA-Z ]+$/", $DATA['lastname'])) {
            
            $this->errors['lastname'] = "Only letters allowed in the last name ";
        }

        // check email
            if (empty($DATA['email']) || !filter_var( $DATA['email'],FILTER_VALIDATE_EMAIL)) {
            
                $this->errors['email'] = "E-mail is not valid ";
            }

        
        // check if email exists
        if (trim($id) == "") {
            if ($this->where('email', $DATA['email'])) 
            {
                $this->errors['email'] = "E-mail already Exists";
            }
        }else {
            if ($this->query("select * from users where email = :email && user_id != :id",[
                'email'=>$DATA['email'],
                'id'=>$id
                ])) 
            {
                $this->errors['email'] = "E-mail already Exists";
            }
        }
        
        // check gender
        $genders = ['female','male'];
        if (empty($DATA['gender']) || !in_array($DATA['gender'], $genders)) {
            
            $this->errors['gender'] = "Gender is not valid";
        }

        $ranks = ['student','reception','lecturer','admin','super_admin'];
        if (empty($DATA['rank']) || !in_array($DATA['rank'], $ranks)) {
            
            $this->errors['gender'] = "Rank is not valid";
        }

        if (count($this->errors) == 0) 
        {
            return true;
        }

        return false;
    }
    
    // function  to get user_id
    public function make_user_id($data)
    {
        $data['user_id'] = $data['firstname'] . "." . $data['lastname'];

        while ($this->where('user_id',$data['user_id'])) 
        {
            $data['user_id'] .= rand(10,9999);
        }
        return $data;
    }

    // function  to get school_id
    public function make_school_id($data)
    {
        if (isset($_SESSION['USER']->school_id)) 
        {
            $data['school_id'] = $_SESSION['USER']->school_id;
        }
        return $data;
    }
    // function to hash password
    public function hash_password($data)
    {
        if(isset($data['password']))
        {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

}