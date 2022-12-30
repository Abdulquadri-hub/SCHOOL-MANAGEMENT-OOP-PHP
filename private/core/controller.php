<?php

/**
 * main controller class
 * this will contain all the func that ar common to all controllers
 */
class Controller 
{
    public function get_controllers()
    {
        return strtolower($this::class);
    }
    
    public function View($view,$data = array()) 
    {
        // if there is a valid array
        extract($data);
        
        if (file_exists("../private/views/". $view . ".view.php"))
        {
            require ("../private/views/". $view . ".view.php");
        }else {
            require ("../private/views/404.view.php");
        }
    }

    // load model
        public function load_model($model) 
        {
            if (file_exists("../private/models/".ucfirst($model).".php")) {
                
                require("../private/models/".ucfirst($model).".php");
                return $model = new $model;
            }
            return false;
        }
    // redirect
    public function redirect($link)
    {
        header("location: ". ROOT ."/".trim($link, "/"));
        die;
    }
    
}
