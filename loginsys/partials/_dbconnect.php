<?php

// connecting to databse
$servername = 'localhost';
$user = 'root';
$password ='';
$database = 'users';

$conn = mysqli_connect($servername,$user,$password,$database);

if(!$conn)
{
    die("Error Occured!" . mysqli_connect_error());   
}
 
// For Hosting Database
// $conn = mysqli_connect('localhost','id19262624_root','4>x!2^~0$Sz0d-C}','id19262624_user_db');

?>