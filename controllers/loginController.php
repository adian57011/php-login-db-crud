<?php
include("../models/db_con.php");
require_once("../models/adminModel.php");
require("../models/staffModel.php");

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "")
    {
        echo "please provide email";
    }

    else
    {
        if($password == "")
        {
            echo "please provide password";
        }

        else
        {
            $admin = admin_login($email,$password);
            if(!$admin)
            {
                echo "No user found! Login failed";
            }

            else
            {
                echo "hello";
                $_SESSION['id'] = $admin['admin_id'];
                $_SESSION['name'] = $admin['name'];
                $_SESSION['email'] = $admin['email'];

                header('location: ../views/adminDasboard.php');
            }
        

        }
    }


}

else
{
    echo "Unauthorized Access";
}



?>