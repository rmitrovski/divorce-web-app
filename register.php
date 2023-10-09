<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>User Registration</title>

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
    <link href="css/style.css" rel="stylesheet" media="all">


</head>
    <!-- multiple classed to style the register page -->

<body class="animsition">
        <!-- page wrapper   to style the register page -->

    <div class="page-wrapper">
            <!-- background styling -->

      <div class="page-content--bge5">
                    <!-- start the content of the container  -->

        <div class="container">
             <!-- added another wrappaer -->

          <div class="login-wrap">
             <!-- actual content  -->

             <div class="login-content">
             <div class="header">
                 <!-- header for the page  -->

                <h2>Register</h2>
             </div>  
              <!-- form to post data to register.ohp -->

             <form method="post" action="register.php" >
                 <!-- to display errors in registration   -->

             <?php include('errors.php'); ?>
 <!-- inoput group for the user daetails  -->

                <div class="input-group">
                     <label>Username</label>
                     <input  type="text" name="username" value="<?php echo $name; ?>" placeholder="Enter Full name">
                 </div>
                 <div class="input-group">
                     <label>Email</label>
                     <input  type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter Email Address">
                 </div>
                 <div class="input-group">
                     <label>Password</label>
                     <input  type="password" name="password_1"  placeholder="Enter Password">
                 </div>
                 <div class="input-group">
  	              <label>Confirm password</label>
  	            <input type="password" name="password_2" placeholder="Re Confirm Password">
  	             </div>
                 <!-- submit btn directs to server.php functions  -->
                 <div class="input-group">
                     
                     <button  type="submit" class="btn" name="reg_user">Register</button>
                 </div>
                 <!-- direct to login page  -->
                 <p>
                 Already have an account?
                     <a href="login.php">Sign in</a>
                  </p>  

             </form>   
        

            </div>
        </div>

    </div>




<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    

   

</body>

</html>