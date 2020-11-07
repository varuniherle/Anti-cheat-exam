<!DOCTYPE>
<html>
<?php require 'connection.php';
session_start(); ?>
<head>
<title>EXAM</title>
<script src="new.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style type="text/css">
  body 
{
  background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("images/books.jpg");
  background-size:100%;
  background-repeat: no-repeat;
  position: relative;
  background-attachment: fixed;
  color: white;
  font: 8px;
}
</style>
</head>
<body><center>
<div class="title">Hidden Answers</div>
<?php 															
																if (isset($_POST['click']) || isset($_GET['start'])) {
																@$_SESSION['clicks'] += 1 ;
																$c = $_SESSION['clicks'];
																if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
																
																$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c-1"; 
																$result2 = mysqli_query($conn,$fetchqry2);
																}
		  
																	
 																} else {
																	$_SESSION['clicks'] = 0;
																}
																
																//echo($_SESSION['clicks']);
																?>
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> 
<button class="button" name="start" float="left" ><span>START QUIZ</span></button>
 <?php } ?>
</form></div>

<form action="" method="post">  				
<table >

  <?php if(isset($c)) {   $fetchqry = "SELECT * FROM `quiz` where id='$c'"; 
				$result=mysqli_query($conn,$fetchqry);
				$num=mysqli_num_rows($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		?>

<tr><td><h1 oncopy="myFunction1()"><br><?php echo @$row['que'];?></h1></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr><td><button class="button3" name="click">Next</button></td></tr> <?php } ?> 

  <form>

 <?php if($_SESSION['clicks']>5){ 
	$qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
	$result3 = mysqli_query($conn,$qry3);
	$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['ans']==$row3['userans']){
		 @$_SESSION['score'] += 1 ;
	 }
}
 
 ?> 
 
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; 
 session_unset(); ?></span><br>
 <span>Your Score:&nbsp<?php echo $no*1; ?></span>
 <br><br><br>
 <button class="button"><a href="end.html">GO BACK</a></button>
<?php } ?>
 
</center>


<div id="container">
<video>
</video>
</div>
<!-- adio shit-->
<script>
    var popup;

function openPopup(){

    var constraints = { audio: false, video: { width: 500, height: 375 } }; 

navigator.mediaDevices.getUserMedia(constraints)
.then(function(mediaStream) {
    if(mediaStream){
        popup = window.open("./new.html","Tab_NAME_HERE", "height=800,width=800")
    }
    else{
        window.alert("Unapologetic behaviour tested");
    }

}) 
}

function closePopup(){
    popup.close();
}
</script>
</body>
</html>