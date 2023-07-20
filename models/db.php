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


//it is a utility function that takes the db name and db table and checks if the table already exists or not
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
        return false;   //if found then returns false
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
    $tableSchema = "CREATE TABLE IF NOT EXISTS admin(
        admin_id INT(6) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL
    )";

    
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

function staffTableCreate()
{
    $con = connection();
    $db_name = "login_crud";
    $db_table = "staff";
    $tableSchema = "CREATE TABLE IF NOT EXISTS staffs(
        staff_id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20) NOT NULL,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(20) NOT NULL,
        password VARCHAR(20) NOT NULL,
        admin_id INT(6) 
    ) ";

    if(!tableChecker($db_name,$db_table))
    {
        echo "Table already exists";
    }
    else
    {
        $staffTable = mysqli_query($con,$tableSchema);
        if(!$staffTable)
        {
            echo "Staff Table can not be created!";
        }
        else
        {
            echo "Staff Table Created!";
        }
    }
}
?>