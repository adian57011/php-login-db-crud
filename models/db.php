<?php

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "login_crud";


///this is a code first approach to create a mysqli database using php.
function db_creator()
{
    global $db_host;
    global $db_user;
    global $db_pass;
    global $db_name;

    $con = mysqli_connect($db_host,$db_user,$db_pass);
    
    if(!$con)
    {
        echo "Connection Error! <br>";
    }

    else
    {
        $checkerSql = "SHOW DATABASES LIKE '$db_name'";
        $check = mysqli_query($con,$checkerSql);
        
        if(mysqli_num_rows($check) >= 1)
        {
            echo "Database Already Exists<br>";
        }
        else
        {
            echo "No Database found! <br>";

            $dbCreator = "Create DATABASE $db_name";

            $res = mysqli_query($con,$dbCreator);

            if(!$res)
            {
                echo "Database couldnot be created!";
            }
            else
            {
                echo "Database Created";
            }
        }

    }
}

function connection()
{
    global $db_host;
    global $db_user;
    global $db_pass;
    global $db_name;

    $con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    return $con;

}

function tableChecker($dbName,$dbTable)
{
    $con = connection();
    $check = "SELECT *
             FROM information_schema.`tables`
             WHERE table_schema = '$dbName'
             AND table_name = '$dbTable'";

    $res = mysqli_query($con,$check);

    if(mysqli_num_rows($res)>0)
    {
        echo "found";
        return false;
    }
    else
    {
        echo"not found";
        return true;
    }
}

function createAdminTable()
{
    $db_name = "login_crud";
    $db_table = "admin";
    $con = connection();
    $tableSchema = " 
        CREATE TABLE IF NOT EXISTS admin(
         admin_id INT(10) UNSIGNED AUTO_INCREAMENT,
         name VARCHAR(20) NOT NULL,
         username VARCHAR(20) NOT NULL,
         email VARCHAR(20) NOT NULL,
         password VARCHAR(20) NOT NULL
         PRIMARY KEY (admin_id)";
    
    if(!tableChecker($db_name,$db_table))
    {
        echo "table creation failed";
    }
            
    else
    {
        $adminTable = mysqli_query($con,$tableSchema);
        if(!$adminTable)
        {
            echo "Could not create the admin table";
        }
        else
        {
            echo "Admin Table created";
        }
    }           
}

    // else
    // {
    //     echo "Connection found  .. Connected to database <br>";
        
    //     $sql = "CREATE DATABASE $db_name";

    //     $db_res = mysqli_query($con,$sql);
        
    //     if(!$db_res)
    //     {
    //         echo "Connection Error .. Couldnot create the" . $db_name."<br>";
    //     }

    //     else
    //     {
    //         //this connects to the database and table
    //         $con1 = mysqli_connect($db_host,$db_user,$db_pass,$db_name); 

           //defince table name and schema.
    //         $adminTable = mysqli_query($con1,$tableSchema1);

    //         if(!$adminTable)
    //         {
    //             echo "Technical error.No admin table was created<br>";
    //         }

    //         else
    //         {
    //             echo "Admin table initiated";
    //             $tableSchema2 = "
    //             CREATE TABLE staff(
    //                 staffid INT(10) AUTO_INCREAMENT PRIMARY_KEY,
    //                 name VARCHAR(20) NOT NULL,
    //                 username VARCHAR(20) NOT NULL,
    //                 email VARCHAR(20) NOT NULL,
    //                 password VARCHAR NOT NULL,
    //                 CONSTRAINT fk_admin
    //                 FOREIGN KEY (adminid) REFERENCES admin(adminid)
    //                 ON DELETE CASCADE
    //                 ON UPDATE CASCADE
    //             )";

    //             $staffTable = mysqli_query($con1,$tableSchema2);

    //             if(!$staffTable)
    //             {
    //                 echo "Technical error. No staff table could be created<br>";
    //             }

    //             else
    //             {
    //                 echo "Staff Table Initiated!<br>";
    //             }
    //         }

            


    //     }
    // }




createAdminTable();

?>