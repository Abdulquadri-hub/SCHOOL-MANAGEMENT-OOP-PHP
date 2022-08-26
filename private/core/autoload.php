<?php
require("confg.php");
require("helper.php");
require("database.php");
require("controller.php");
require("model.php");
require("modelsch.php");
require("modelclass.php");
require("app.php");

spl_autoload_register(function($className){

    require "../private/models/".ucfirst($className).".php";
});
