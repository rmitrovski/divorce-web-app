<?php
// session starts when on this page
include('server.php');
// If the user is not logged in, they cannot access the page and will be redirected to the login page
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} else {
    // If the user is logged in, the user details will be assigned variables
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $registration_date = $_SESSION['registration_date'];
}

// If the user clicks the logout button, the session will end and the user will be redirected to the login page
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRM Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/booking_list.css">


</head>
<div class="adjust">
<img src="images/html_index.jpeg" id="bgImage">

<body>
    <div class="cursor"></div>

    <div id="purple">
        
    </div>
    <div class="main">
        <div class="page1">
            
            <h1>Clean Divorce</h1>
            <h2>CRM Website</h2>
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
// Calculating the week difference between the registration date and the current date
var registrationDate = "<?php echo $registration_date; ?>";
var weeksDifference = calculateWeeksDifference(registrationDate);
var weekSystemContent = document.getElementById('week-system-content');
// If the week difference is less than 8, the user will be shown the week they are on
if (weeksDifference < 8) {
    weekSystemContent.innerHTML = `
        <img src="images/progress_system.png" class="background-img">
        <div class="content-wrapper">
            <p class="custom-text">Welcome to the 8 week system,</p>
            <p>You are currently on week: ${weeksDifference + 1}</p>
            <p>Click the button below to view your progress!</p>
            <div class="btn-group">
                <a href="./week_system.php" class="btn btn-primary btn-view-progress">View Progress</a>
            </div>
        </div>
    `;
} else {
    // If the week difference is greater than 8, the user will be shown that they have completed the 8 week system
    weekSystemContent.innerHTML = `
        <img src="images/progress_system.jpeg" class="background-img">
        <div class="content-wrapper">
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
            
        </div>

        <!-- Displays different images -->
        <div class="page4">
            <div class="elem">
                <img src="images/plan.jpeg"
                    alt="">
                <div class="text-div">
                    <h1>Plan</h1>
                    <h1>Plan</h1>
                </div>
                <img src=""
                    alt="">
            </div>
            <div class="elem">
                <img src="images/finance.jpeg"
                    alt="">
                <div class="text-div">
                    <h1>Finance </h1>
                    <h1>Finance </h1>
                </div>
                <img src=""
                    alt="">
            </div>
            <div class="elem">
                <img src="images/heal.jpeg"
                    alt="">
                <div class="text-div">
                    <h1>Heal</h1>
                    <h1>Heal </h1>
                </div>
                <img src=""
                    alt="">
            </div>

        </div>

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
        integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
        integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/index.js"></script>
</body>

</div >
</html>

