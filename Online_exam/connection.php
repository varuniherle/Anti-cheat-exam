<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "exam";

$conn=mysqli_connect($host,$username,$password); // connecting the server ie php myadmin
$db_conn=mysqli_select_db($conn,$database); // connecting database

if($conn) // both $conn and db_conn will return true or false
{
	if ($db_conn)
	 {
		//echo "connected";
	}
}
else
	echo "not connected";
?>