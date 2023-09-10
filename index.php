<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  } else {
	$username = $_SESSION['username'];
    $email = $_SESSION['email'];
	$registration_date = $_SESSION['registration_date'];
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
 <?php include('week_difference.php'); ?>

<?php require_once('header.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Curved Square Card</title>
<style>
.card {
  width: 350px;
  height: 300px;
  background-color: #3498db;
  border-radius: 30px;
  padding: 20px;
  box-sizing: border-box;
  color: #fff;
  position: absolute;
  top: 15%;
  left: 80%;

}
.button {
  text-align: center;
  margin-top: 20px;
}

  
</style>
</head>
<body>
  <div class="card">
    <?php if ($weeks_difference == 0) {
		echo "Welcome to the 8 week system, have a read of the client document.";
		echo "Next week you will begin an 8 week journey through our program to help you with divorce.";
		echo "Click the button below to get started!"; ?>
	<div class="button">
      <a href="">
    <button>Get Started</button>
  </a>
    </div> 
	<?php
	} else {
		echo "You are on week ". $weeks_difference;
	}
	?>
  </div> 
</body>
</html>
