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
?>
<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html>
<head>
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Multi Step Progress</title>
    <link rel="stylesheet" href="css/progress.css" />
    <script src="js/progress.js" defer></script>
</head>
<body>



  <!--Progress Bar -->
  <div class="container">
  <div class="images">
    <img src="images/divorce.jpeg" alt="Step 1 Image" id="img-1" class="step-image">
    <img src="placeholder-2.jpeg" alt="Step 2 Image" id="img-2" class="step-image">
    <!-- ... repeat for all steps ... -->
</div>
    <div class="steps">
      
        <span class="circle active">1</span>
        <span class="circle">2</span>
        <span class="circle">3</span>
        <span class="circle">4</span>
        <span class="circle">5</span>
        <span class="circle">6</span>
        <span class="circle">7</span>
        <span class="circle">8</span>
        <span class="circle">9</span>
        <span class="circle">10</span>
        <span class="circle">11</span>
        <div class="progressbar">
            <span class="indicator"></span>

        </div>

    </div>

    <div class="buttons">
        <button id="prev" disabled>Prev</button>
        <button id="next" >Next</button>

    </div>
</div>        

<!--progress bar -->
</body>
</html>
