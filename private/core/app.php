<?php

/**
 * main app file
 */
class App 
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = array();

    public function __construct() 
    {
        $URL = $this->getUrl();
        // check if file exists and assign it to the property
        if(file_exists("../private/controllers/".$URL[0].".php")) {
        $this->controller = ucfirst($URL[0]);
        // remove once is found
        unset($URL[0]);
        }

        require "../private/controllers/".$this->controller.".php";
        $this->controller = new $this->controller();

        // check method i.e the second parameter
        if (isset($URL[1])) {
            // chk if method  exists
            if (method_exists($this->controller, $URL[1])) {
                // set the method to the item
                $this->method = ucfirst($URL[1]);
                unset($URL[1]);
            }
        }
        // calling the app method
        // the url details
        $URL = array_values($URL);
        $this->params = $URL;

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    private function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url, "/")),FILTER_SANITIZE_URL);
    }
}

