<?php $current_page = basename($_SERVER['PHP_SELF']); // gets the current filename ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/style2.css">
    <link href="css/card_style.css" rel="stylesheet" media="all">
  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">



</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/" alt="Consult CRM" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
           
        </header>
        <!-- END HEADER MOBILE-->
          <!-- PAGE CONTAINER-->
          <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search..." id="searchBox"/>
                                <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>

                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	
    <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

        <!-- MENU SIDEBAR-->
        
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<span class="text">Clean Divorce</span>
		</a>
		<ul class="side-menu top">
			<li <?php if ($current_page == 'index.php') echo 'class="active"'; ?>>
				<a a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
		
            <li>
				<a href="chatbotgpt.php">
					<i class='bx bxl-android' ></i>
					<span class="text">Chatbot</span>
				</a>
			</li>
			<li <?php if ($current_page == 'week_system.php') echo 'class="active"'; ?>>
				<a href="week_system.php">
					<i class='bx bxs-donate-blood' ></i>
					<span class="text">8 Week system </span>
				</a>
			</li>
			<li <?php if ($current_page == 'settings.php') echo 'class="active"'; ?>>
				<a href="settings.php">
					<i class='bx bxs-face' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li <?php if ($current_page == 'FAQ.php') echo 'class="active"'; ?>>
				<a href="FAQ.php">
					<i class='bx bxs-conversation' ></i>
					<span class="text">FAQ</span>
				</a>
			</li>
			<li <?php if ($current_page == 'booking.php') echo 'class="active"'; ?>>
				<a href="booking.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Book Consultation</span>
				</a>
			</li>
            <li <?php if ($current_page == 'booking_list.php') echo 'class="active"'; ?>>
				<a href="booking_list.php">
					<i class='bx bxs-book' ></i>
					<span class="text">Booking List</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li >
				<a href="http://www.bom.gov.au/">
					<i class='bx bxs-error-circle' ></i>
					<span class="text">Emergency Exit</span>
				</a>
			</li>
			<li>
				<a href="index.php?logout='1'" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
    

        <!-- END MENU SIDEBAR-->
       <script>
        document.getElementById('searchBox').addEventListener('keyup', function(){
            let filter = this.value.toLowerCase();
            let sidebarLinks = document.querySelectorAll("#sidebar .side-menu .text");
            sidebarLinks.forEach(link =>{
                let linkText = link.textContent || link.innerText;
                if(linkText.toLowerCase().indexOf(filter) > -1){
                    link.parentElement.style.display= "";

                }else{
                    link.parentElement.style.display = "none";

                }

            });


        });




        </script>


      <!-- END MENU SIDEBAR-->
  


