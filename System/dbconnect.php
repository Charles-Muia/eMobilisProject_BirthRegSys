<?php
//declare variables
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "employees_data";

//connection to the db
$connect = mysqli_connect("localhost","root","","employees_data");

//statement to check if the connection is successful or not
if (!$connect) {
    die("Connection to the database failed, please check: " .mysqli_connect_error());
}
?>
