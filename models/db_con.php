<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "";
$db = "login_crud";

function connection()
{
    global $hostname;
    global $user;
    global $password;
    global $db;

    $con = mysqli_connect($hostname,$user,$password,$db);

    if(!$con)
    {
        echo "connection failed";
        return false;
    }
    return $con;
}
?>