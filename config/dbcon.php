<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'japasoft.com.br';
$user = 'journa52_jairpn';
$pass = 'japa0101';
$database = 'journa52_compras';

$con = mysqli_connect($host, $user, $pass, $database);

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
