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
    <style>
        /* Added Padding for the form */
        .container {
            padding-top: 80px; /* Add additional top padding to push content down */
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                    </div>
                    <div class="login-form">
                        <h2 style="text-align: center"> USER SETTINGS</h2>
                        <div class="alert-danger" role="alert" id="danger" style="display: none"></div>
                        <div class="alert-warning" role="alert" id="warning" style="display: none"></div>
                        <div class="alert-success" role="alert" id="success" style="display: none"></div>

                        <!-- User Details Form -->
                        <form action="" method="post">
						  	<?php include('errors.php'); ?>
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
                            <button name="new_details" class="au-btn au-btn--blue m-b-20">Save</button>
                        </form>

                        <!-- Password Details Form -->
                        <form action="" method="post">
						  	<?php include('errors.php'); ?>
                            <br>
                            <h5 style="text-align: center"> Password details</h5>
                            <div class="form-group">
                                <label>Old Password</label>
                                <input class="au-input au-input--full" type="password" name="current_password" id="old_password" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="au-input au-input--full" type="password" name="new_password" id="new_password" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label>Retype Password</label>
                                <input class="au-input au-input--full" type="password" name="confirm_password" id="retype_password" placeholder="Retype Password">
                            </div>
                            <button class="au-btn au-btn--blue m-b-20" name="change_password">Change Password</button>
                        </form>

                       <form action="" method="post">
					<br>
					<h5 style="text-align: center"> Delete Account</h5>
					<div class="form-group">
						<label>Enter Delete Password</label>
						<input class="au-input au-input--full" type="password" name="delete_password" id="delete_password" placeholder="Enter Delete Password">
					</div>
					<!-- Display error message here -->
					<?php include('errors.php'); ?>
					<button class="au-btn au-btn--green m-b-20" name="delete_account">Delete Account</button>
				</form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
