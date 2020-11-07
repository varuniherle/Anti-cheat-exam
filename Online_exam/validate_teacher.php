<?php
include 'connection.php';

$name=$_POST["user"]; //takes the value from home.html
$password=$_POST["pass"]; //takes the value from password ie value specified in name.

$query1="select *from teacher_login where username='$name' && password='$password'";

$ex1=mysqli_query($conn,$query1); // this will return the result set of the query
$result=mysqli_num_rows($ex1); // this will return the number of rows return.

if($result == 1)
{
	header('location:exam.php'); // will navigate if the username and password is verified
}
else{
	// popup message 
	echo '<script language="javascript">';
	echo 'alert("Either Username or password is wrong")';
	echo '</script>';
	echo '<button ><a href = "Home.html">Go back</a><button>';

}

?>