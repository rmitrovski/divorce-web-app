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
 
    <link rel="stylesheet" href="style.css">



</head>
<body>
    <section id="play">
        <div class="container">
          
            <h3 class="text-center section-heading">8 Week System</h3>
        </div>
        <div class="container">
            <div class="swiper play-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-1.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 1
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-2.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 2
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-3.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 3
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-4.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 4
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-5.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 5
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-6.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 6
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-7.png" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 7
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide play-slide">
                        <div class="play-slide-img">
                            <img src="images/week-8.jpeg" alt="emotion">
                        </div>
                        <div class="play-slide-content">
                            <div class="play-slide-content-bottom">
                                <h2 class="week-name">
                                    Week 8
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="play-slider-control">
                    <div class="swiper-button-prev slider-arrow">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </div>
                    <div class="swiper-button-next slider-arrow">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <div class="swiper-folio"></div>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="script.js"></script>


</body>


</html>
