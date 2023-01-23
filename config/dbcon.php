<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$pass = 'jair123';
$database = 'contmerc';

$con = mysqli_connect($host, $user, $pass, $database);

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
