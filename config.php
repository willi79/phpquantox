<?php
//Local
/*
$server = "localhost";
$user = "willi79";
$password = "123456";
$db = "student_registration";
*/

//Remote
$server = "remotemysql.com";
$user = "AAvshUGDtd";
$password = "y6TRF5FNIV";
$db = "AAvshUGDtd";

$cnx = mysqli_connect($server, $user, $password, $db);

if( !$cnx ){
    die("Fail to connect: " . mysqli_connect_error());
}


?>