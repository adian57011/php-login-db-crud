<?php
require_once("db_con.php");

function staff_login($email,$password)
{
    $con = connection();

    $sql = "SELECT * 
    FROM staffs
    WHERE email = '$email' AND password = '$password'";

    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query) > 0)
    {
        return true;
    }

    return false;
}


?>