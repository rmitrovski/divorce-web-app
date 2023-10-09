<?php
// start the sesion to use session variables throughout the application 

session_start();
//check if the user is logged in and fetch their data from the DB 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
	$registration_date = $_SESSION['registration_date'];
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags 9.30-11 12.30-1.40-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>8 week system </title>

    <!-- Main CSS-->
    
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
 
    <link rel="stylesheet" href="css/dimension.css">

	<?php include('week_difference.php'); ?>

</head>
<body>
    <section id="play">
        <div class="container">
              <!-- check if the user is during or after the 8 week system -->

            <h3 class="text-center section-heading">8 Week System</h3>
			<?php if ($weeks_difference < 8) { ?>
				<h6 class="text-center">You are currently up to week <?php echo $weeks_difference + 1 ?></h6>
			<?php } else { ?>
				<h6 class="text-center">Congratulations you have gone through all the weeks! Feel free to review anytime!</h6>
	<?php	} ?>
	    <!-- cards to style each step in the weeks system -->

        </div>
            <!-- STYLING THE CONATINER-->

        <div class="container">
                        <!-- added the swioer slider -->

            <div class="swiper play-slider">
                    <!-- wrapper for the slides  -->
                <div class="swiper-wrapper">
                        <!-- each slide represents a week / slides for week1  -->
                    <div class="swiper-slide play-slide">
           <!-- image conatiner / slides for week1  -->
                        <div class="play-slide-img">
                            <!-- week1 image-->
                            <img src="images/week-1.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <!-- content conatiner / slides for week1  -->
                            <div class="play-slide-content-bottom">
                                <!-- week 1 link-->
                                <h2 class="week-name"><a href = "week1.php">Week 1</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week2  -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-2.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week2.php">Week 2</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week3  -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-3.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week3.php">Week 3</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week4 -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-4.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week4.php">Week 4</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week5 -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-5.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week5.php">Week 5</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week6  -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-6.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week6.php">Week 6</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week7  -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-7.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week7.php">Week 7</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                      <!-- each slide represents a week / slides for week8 -->
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-8.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name"><a href = "week8.php">Week 8</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                  <!-- controls for the slider  -->
                <div class="play-slider-control">
                      <!-- sliding btns  -->
                    <div class="swiper-button-prev slider-arrow">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </div>
                      <!-- awipping and  slide pagination  -->
                    <div class="swiper-button-next slider-arrow">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <div class="swiper-folio"></div>
                </div>
            </div>
        </div>
    </section>
        <!-- modules and js FILES  -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/dimension.js"></script>


</body>


</html>
