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
    <title>User Registration | Consult CRM</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <div class="page-wrapper">
      <div class="page-content--bge5">
        <div class="container">
          <div class="login-wrap">
             <div class="login-content">
               <div class="login-logo">
               <a href="#">
                   <img src="images/" alt="CoolAdmin">
                 </a>
                </div>
                <div class="login-form">
                    <div class="alert alert-danger" role="alert" id="danger" style="display: none"></div>
                    <div class="alert alert-warning" role="alert" id="warning" style="display: none"></div>
                    <div class="alert alert-success" role="alert" id="success" style="display: none"></div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full name</label>
                            <input class="au-input au-input--full" type="text" name="name" id="name" placeholder="Enter Full name">
                        </div>
                        <div class="form-group">
                            <label>Email <Address></Address></label>
                            <input class="au-input au-input--full" type="email" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="au-input au-input--full" type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number">
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" onclick="login(event)">register</button>
                    </form>
                    <div class="register-link">
                          <p>
                            Already have an account?
                            <a href="login.php">Sign in</a>
                          </p>  
                     </div>
                     </div>
                    </div>
                </div>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">
        function register(event)
  {
    event.preventDefault();
    var name=$('#name').val();
    var email=$('#email').val();
    var password=$('#password').val();
    var mobile=$('#mobile').val();

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;


    if(name =='' ||email =='' || password==''|| mobile =='' ){
        $('#danger').hide();
        $('#success').hide();
        $('#warning').show();
        $('#warning').html('Fill up the missing fields');
        return false;
    }

    if(email.match(validRegex)){
        $('#danger').hide();
        $('#success').hide();
        $('#warning').show();
        $('#warning').html('Fill up the email address');
        return false;
    }
    if(mobile.length!=13){
        $('#danger').show();
        $('#success').hide();
        $('#warning').hide();
        $('#warning').html('Please follow foprmat for mobile number: +61xxxxxxxxx');
        return false;
    }

    if(password.match(passwordReg)){
        $('#danger').show();
        $('#success').hide();
        $('#warning').show();
        $('#warning').html('Passowrd should be 8-15 characters with lower case, upper case, numeric and special character');
        return false;
    }


    var fd = new FormData();
    fd.append('action', 'register');
    fd.append('name', name);
    fd.append('email', email);
    fd.append('password', password);
    fd.append('mobile', mobile);

    $('#danger').hide();
    $('#success').hide();
    $('#warning').show();
    $('#danger').html('Processing please wait......');



    $.ajax({
        url: 'process.php',
        type: 'post'
        data: fd,
        contentType: false,
        processData: false,
        success: function(reponse){
            if(response=='success'){
                $('#danger').show();
                $('#success').show();
                $('#warning').hide();
                $('#success').html('Congratulations, You have registered');
                window.setTimeout(function(){

              window.location.href="login.php";

                  exit();  

                 }, 1500);  
            }else{
                $('#danger').show();
                    $('#success').hide();
                    $('#warning').hide();
                    $('#danger').html(response);
                    window.setTimeout(function(){
                       $('#danger').hide();
                     }, 1500);

            }
        }
    }

    );
}

</script>

</body>

</html>