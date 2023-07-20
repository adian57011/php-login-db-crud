<?php
require_once("db_con.php");


//this login function returns true if user found.False if user is not found!
function login($username,$password)
{
    $con = connection();

    $sql = "SELECT * 
    FROM admin
    WHERE username = '$username' AND password = '$password'";

    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query) > 0)
    {
       
        return true;
    }
    
    
    return false;
}

//this function returns status if staff added or not 
function addStaff(
    $staffname,
    $staffUsername,
    $staffEmail,
    $staffPassword,
    $admin_id
){
    $con = connection();
    $sql = "INSERT INTO
    staff(name,username,email,password)
    SET VALUES('$staffname','$staffUsername','$staffEmail','$staffPassword','$admin_id')";

    $query = mysqli_query($con,$sql);
   
    if($query)
    {
        return true;
    }
    return false;
}

//staff remove = true,
//staff not remove = false;
function removeStaff($id)
{
    $con = connection();
    $sql = "DELETE FROM staff
    WHERE staff_id = '$id'";

    $query = mysqli_query($con,$sql);

    if($query)
    {
        return true;
    }
    return false;
}

?>