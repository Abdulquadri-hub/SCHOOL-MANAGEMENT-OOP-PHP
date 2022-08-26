<?php

// function to create a value for input(sticky input);

// get the var
function get_var($key, $default = "")
{
    if (isset($_POST[$key])) {

        return $_POST[$key];
    }
    return $default;
}
// get_select
function get_select($key,$value)
{
    if (isset($_POST[$key])) {

        if ($_POST[$key] == $value)
        {
            return "selected";
        }
        return "";
    }

}
//get escape string
function esc($var)
{
    return htmlspecialchars($var);
} 
// create a random string for user_id and school_id

function random_string($length) 
{

    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y', 'Z');

    $text = "";
    for($x = 0; $x < $length; $x++) { 
        
        $random = rand(0,61);
        $text .= $array[$random];
    }
    return $text;
}

function get_date($date)
{
    return date("jS M, Y",strtotime($date));
}
function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function get_image($image,$gender = 'female')
{
    if (!file_exists($image)) {
        $image = ASSET.'/user.png';
        if ($gender == 'female') {
            $image = ASSET.'/userf.png';
        }
    }
    return $image;
}