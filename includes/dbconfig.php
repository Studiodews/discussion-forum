<?php

/**
 * @author mohamed hussein
 * @copyright 2017
 */

//used for include check
define("DBCONFIG",1);

ob_start();

//start session 
session_start();

//database credentials

define("DBHOST","localhost:3306");
define("DBUSER","root");
define("DBPASSWORD","");
define("DBNAME","mydb");

?>