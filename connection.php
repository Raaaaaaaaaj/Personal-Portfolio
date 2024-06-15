<?php
$host="localhost";
$user="root";
$pass="";
$dbname="cruddb";

$con=mysqli_connect($host, $user, $pass, $dbname);
if(!$con)
{
    die(mysqli_connect_error("Connection failed"));
}
else{
    echo "Connection successfull.";
}


?>