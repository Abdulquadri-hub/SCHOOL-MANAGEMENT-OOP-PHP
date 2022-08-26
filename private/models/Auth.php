<?php

class Auth
{
    public static function loginUser($row)
    {
        $_SESSION['USER'] = $row;
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
        }
    }

    public static function loggedIn()
    {
        if (isset($_SESSION['USER'])) 
        {
            return true;
        }

         return false;
    }

    public static function user()
    {
        if (isset($_SESSION['USER'])) 
        {
            return $_SESSION['USER']->lastname;
        }
        return false;
    }

    public static function __callStatic($method, $params)
    {
        $property = strtolower(str_replace("get", '', $method));
        if (isset($_SESSION['USER']->$property)) 
        {
           return $_SESSION['USER']->$property;
        }
        return 'Unknown';
    }

    public static function switch_school($id)
    {
        if (isset($_SESSION['USER']) && $_SESSION['USER']->rank == 'super_admin') 
        {
            $user = new User();
            $school = new School();
            if($row = $school->where('id',$id))
            {
                $row = $row[0];
                $arr['school_id'] = $row->school_id;

                $user->update($_SESSION['USER']->id,$arr);
                
                $_SESSION['USER']->school_id = $row->school_id;
                $_SESSION['USER']->school_name = $row->school;
                
            }
            return true;
        }
        return false;
    }

}
