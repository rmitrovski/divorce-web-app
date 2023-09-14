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

<?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/week_difference.css">

<div class="custom-box">
  <?php if ($weeks_difference < 8) { ?>
    <p>Welcome to the 8 week system,</p>
    <p>You are currently on week: <?php echo $weeks_difference + 1; ?></p>
    <p>Click the button below to view your progress!</p>
    <div class="button">
      <a href="./week_system.php">
        <button>View Progress</button>
      </a>
    </div>
  <?php } else { ?>
    <p>Congratulations!</p>
    <p>You have completed the 8-week system. Well done!</p>
    <p>Click the button below to review it!</p>
    <div class="button">
      <a href="./week_system.php">
        <button>Review</button>
      </a>
    </div>
  <?php } ?>
</div>
