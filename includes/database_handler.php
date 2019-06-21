<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "login_system";

$connection = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$connection){

    die("Connection Failed: ".mysqli_connect_error());

}












?>