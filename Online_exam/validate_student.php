<!DOCTYPE html>
<html>
<head>
	<title>Wrong Password</title>
	<style type="text/css">
	a{
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  
}
h1 {
			background-color: black;
			font-size: 28px;
			padding: 20px;
			color: white;
			float: center;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Hidden Answers</h1><br><br>
<?php
include 'connection.php';

$name=$_POST["user"]; //takes the value from home.html
$password=$_POST["pass"]; //takes the value from password ie value specified in name.

$query1="select *from student where username='$name' && password='$password'";

$ex1=mysqli_query($conn,$query1); // this will return the result set of the query
$result=mysqli_num_rows($ex1); // this will return the number of rows return.

if($result == 1)
{
	header('location:verification.php'); // will navigate if the username and password is verified
}
else{
	// popup message 
	echo '<script language="javascript">';
	echo 'alert("Either Username or password is wrong")';
	echo '</script>';

	echo '<a href = "Home.html">Go back</a>';

}

?>


</body>
</html>