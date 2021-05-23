<?php
//Connects to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

$conn = new mysqli($hostname, $username, $password, $dbname);
if(mysqli_connect_error()) {
    die("Connection failed: ".mysqli_connect_error()); 
} 

?>