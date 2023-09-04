<!DOCTYPE html>
<html lang="en">
<?php include('server.php') ?>
<?php


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
}
?>

<?php require_once('header.php'); ?>

<head>
    <!-- JavaScript functions -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
 
        function changePassword(event) {
            event.preventDefault(); // Prevent form submission

            var oldPassword = $('#old_password').val();
            var newPassword = $('#new_password').val();
            var retypePassword = $('#retype_password').val();

            var validPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

            if (oldPassword === '' || newPassword === '' || retypePassword === '') {
                $('#danger').hide();
                $('#success').hide();
                $('#warning').show();
                $('#warning').html('Fill up all the password fields.');
                return false;
            }

            if (!newPassword.match(validPasswordRegex)) {
                $('#danger').hide();
                $('#success').hide();
                $('#warning').show();
                $('#warning').html('Password should be 8-15 characters with lowercase, uppercase, numeric, and special characters.');
                return false;
            }

            if (newPassword !== retypePassword) {
                $('#danger').hide();
                $('#success').hide();
                $('#warning').show();
                $('#warning').html('New password and retype password do not match.');
                return false;
            }

            // Here you can send the old and new password to the server
            // and handle the response as needed.

            $('#danger').hide();
            $('#warning').hide();
            $('#success').show();
            $('#success').html('Password changed successfully.');
        }
    </script>
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
                            <h2 style="text-align: center"> USER SETTINGS</h2>
                            <div class="alert-danger" role="alert" id="danger" style="display: none"></div>
                            <div class="alert-warning" role="alert" id="warning" style="display: none"></div>
                            <div class="alert-success" role="alert" id="success" style="display: none"></div>
                            
                            <!-- User Details Form -->
                            <form action="" method="post">
                                <br>
                                <h5 style="text-align: center"> USER DETAILS</h5>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="au-input au-input--full" type="text" name="new_full_name" id="Full_Name" placeholder="Full Name" value="<?php echo $username; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="new_email" id="email" placeholder="Email" value="<?php echo $email; ?>">
                                </div>
                                <button name="new_details" class="au-btn au-btn--blue m-b-20" onclick="saveUsernameAndEmail(event)">Save</button>
                            </form>

                            <!-- Password Details Form -->
                            <form action="change_password.php" method="post">
                                <br>
                                <h5 style="text-align: center"> Password details</h5>
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="au-input au-input--full" type="password" name="old_password" id="old_password" placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new_password" id="new_password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input class="au-input au-input--full" type="password" name="retype_password" id="retype_password" placeholder="Retype Password">
                                </div>
                                <button class="au-btn au-btn--green m-b-20" onclick="changePassword(event)">Change Password</button>
                            </form>

                            <button class="au-btn au-btn--red m-b-20" onclick="delete(event)">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>