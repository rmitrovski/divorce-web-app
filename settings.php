<!DOCTYPE html>
<html lang="en">
<?php require_once('header.php');?>
<head>

        <!-- JavaScript functions -->
		     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
    function save(event) {
        event.preventDefault(); // Prevent form submission

        var fullName = $('#Full_Name').val();
        var email = $('#email').val();
        var oldPassword = $('#old_password').val();
        var newPassword = $('#new_password').val();
        var retypePassword = $('#retype_password').val();

        var validEmailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var validPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

        if (fullName === '' || email === '' || oldPassword === '' || newPassword === '' || retypePassword === '') {
            $('#danger').hide();
            $('#success').hide();
            $('#warning').show();
            $('#warning').html('Fill up all the fields.');
            return false;
        }

        if (!email.match(validEmailRegex)) {
            $('#danger').hide();
            $('#success').hide();
            $('#warning').show();
            $('#warning').html('Invalid email address.');
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


        $('#danger').hide();
        $('#warning').hide();
        $('#success').show();
        $('#success').html('Changes saved successfully.');

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
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="au-input au-input--full" type="Full_Name" name="Full_Name" id="Full_Name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" type="email" name="email" id="email" placeholder="Email">
                        </div>
                        <br>
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
                        <button class="au-btn au-btn--blue m-b-20" onclick="save(event)">Save</button>
                        <button class="au-btn au-btn--red m-b-20" onclick="delete(event)">Delete Account</button>
                    </form>
                     </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

