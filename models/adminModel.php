<?php
require_once("db_con.php");


//this login function returns user if user found.False if user is not found!
function admin_login($email,$password)
{
    $con = connection();

    $sql = "SELECT * 
    FROM admin
    WHERE email = '$email' AND password = '$password'";

    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);     
        return $row;
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