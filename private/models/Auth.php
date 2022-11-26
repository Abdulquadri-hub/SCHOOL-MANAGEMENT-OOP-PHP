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

    // create priviledges
    public static function access($rank = 'students')
    {
        if (!isset($_SESSION['USER'])) 
        {
            return false;
        }

        // get the rank that logged_in
        $logged_in_rank = $_SESSION['USER']->rank;

        // Set Priviledges
        $RANK['super_admin'] = ['super_admin', 'admin', 'lecturer', 'reception', 'students'];
        $RANK['admin']       = ['admin', 'lecturer', 'reception', 'students'];
        $RANK['lecturer']    = ['lecturer', 'reception', 'students'];
        $RANK['reception']   = ['reception', 'students'];
        $RANK['student']     = ['student'];

        // no set
        if (!isset($RANK[$logged_in_rank])) 
        {
            return false;
        }

        // rank in logged_in_rank
        if (in_array($rank, $RANK[$logged_in_rank])) 
        {
            return true;
        }

        return false;
    }

    // improve security
    public static function i_own_content($row)
    {
        // 
        if (!isset($_SESSION['USER']->user_id)) 
        {
            return false;
        }

        // 
        if (isset($row->user_id)) 
        {
            if ($_SESSION['USER']->user_id == $row->user_id)
            {
                return true;
            }
        }

        // set who can delete
        $allowed = ['super_admin', 'admin'];

        // 
        if (in_array($_SESSION['USER']->rank, $allowed)) 
        {
            return true;
        }

        return false;
    }

}
