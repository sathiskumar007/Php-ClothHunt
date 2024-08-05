<?php

$server ="localhost";
$username="root";
$password="";
$db_name="cloth-hunt";

$config=mysqli_connect($server, $username, $password, $db_name);

if(mysqli_connect_error()){
    die("Connection Failed".mysqli_connect_errno());
}

?>


