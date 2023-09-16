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

<?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/week_difference.css">

<script src="WeekDifferentCalculator.js"></script>

<div class="custom-box">
  <script>
    var registrationDate = "<?php echo $registration_date; ?>";
    var weeksDifference = calculateWeeksDifference(registrationDate);

    if (weeksDifference < 8) {
      document.write('<p>Welcome to the 8 week system,</p>');
      document.write('<p>You are currently on week: ' + (weeksDifference + 1) + '</p>');
      document.write('<p>Click the button below to view your progress!</p>');
      document.write('<div class="button">');
      document.write('<a href="./week_system.php"><button>View Progress</button></a>');
      document.write('</div>');
    } else {
      document.write('<p>Congratulations!</p>');
      document.write('<p>You have completed the 8-week system. Well done!</p>');
      document.write('<p>Click the button below to review it!</p>');
      document.write('<div class="button">');
      document.write('<a href="./week_system.php"><button>Review</button></a>');
      document.write('</div>');
    }
  </script>
</div>
