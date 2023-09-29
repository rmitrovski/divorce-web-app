<?php
include('server.php');
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

<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/booking_list.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Philosopher&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="css/week_difference.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>


<div class="container my-custom-margin">
   
    <div class="container mt-5">
      <hr id="hr1">
        <div id="week-system-content" class="mb-4"></div>
        
        <div class="container-fluid mt-5">

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="WeekDifferentCalculator.js"></script>

<script>
  var registrationDate = "<?php echo $registration_date; ?>";
  var weeksDifference = calculateWeeksDifference(registrationDate);
  var weekSystemContent = document.getElementById('week-system-content');

  if (weeksDifference < 8) {
    weekSystemContent.innerHTML = `
    <div class="custom-border">
        <p class="custom-text">Welcome to the 8 week system,</p>
        <p>You are currently on week: ${weeksDifference + 1}</p>
        <p>Click the button below to view your progress!</p>
        <div class="btn-group">
            <a href="./week_system.php" class="btn btn-primary btn-view-progress">View Progress</a>
        </div>
    </div>
`;
  } else {
    weekSystemContent.innerHTML = `
        <div class="custom-border">
            <p>Congratulations!</p>
            <p>You have completed the 8-week system. Well done!</p>
            <p>Click the button below to review it!</p>
            <div class="btn-group">
                <a href="./week_system.php" class="btn btn-primary">Review</a>
            </div>
        </div>
    `;
  }
</script>

</body>
</html>

