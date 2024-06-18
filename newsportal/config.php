<?php

$server_name="localhost";
$user_name="root";
$password="";
$database_name="news";
$con=mysqli_connect($server_name,$user_name,$password,$database_name);
//now check the connection
if(!$con)
{
	die("Connection Failed:" . mysqli_connect_error());
}

?>