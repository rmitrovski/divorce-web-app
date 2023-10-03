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

<!-- Main CSS-->
<link href="css/style_settings.css" rel="stylesheet" media="all">

<head>
    <!-- JavaScript functions -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/booking_list.css">

    <style>
        .container {
            background-color: #fff;
	border-radius: 10px;
	padding: 40px; 
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	display: flex;
	align-items: center;
    margin-top:160px;
    margin-left: 250px;
  margin-right: 600px;
  width: 640px;


   
        }
        


        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        #deleteAccountForm {
            position: fixed;
            z-index: 999;
            background: #fff;
            max-width: 600px;
            width: 90%;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .closeBtn {
            cursor: pointer;
            font-size: 24px;
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .profile-image {
            max-width: 200px;
            display: block;
            margin: 0 auto;
        }

        .preview-image-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px; /* Set a fixed height */
        }

        .preview-image {
            max-width: 100%;
            max-height: 100%;
        }

        .close-preview {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<img src="images/html_settings.webp" id="bgImage">
<style>
        #bgImage {
            margin-left: 150px; 
        }
    </style>
<div class="outer">
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

                        <?php
                        $select = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
                        if (mysqli_num_rows($select) > 0) {
                            $fetch = mysqli_fetch_assoc($select);
                        }
                        ?>

                        <!-- User Details Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php include('errors.php'); ?>

                            <br>
                            <h5 style="text-align: center"> USER DETAILS</h5>
                            <br>

                            <?php
                            if (!empty($fetch['image'])) {
                                $imageData = base64_encode($fetch['image']);
                                $imageSrc = "data:image/jpeg;base64,{$imageData}";
                                echo '<img src="' . $imageSrc . '" class="profile-image" alt="Profile Image">';
                            } else {
                                echo '<img src="./images/default.png" class="profile-image" alt="Profile Image">';
                            }
                            ?>

                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="au-input au-input--full" type="text" name="new_full_name" id="Full_Name" placeholder="Full Name" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="new_email" id="email" placeholder="Email" value="<?php echo $email; ?>">
                            </div>
							<br>
							<button name="new_details" class="au-btn au-btn--blue m-b-20">Save</button>
                        </form>
						
						<form action="" method="post" enctype="multipart/form-data">
                            <div>
                                <label>Upload new profile image: <label> <br>
                                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" id="imageInput">
                            </div>
 
                            <!-- Preview Image Container -->
                            <div class="preview-image-container">
                                <img id="previewImage" class="preview-image" src="#" alt="Preview">
                                <span class="close-preview" id="closePreview" onclick="clearImage()">&times;</span>
                            </div>

                            <br>
							<button name="new_image" class="au-btn au-btn--blue m-b-20">Upload</button>
                        </form>
         

                        <!-- Password Details Form -->
                        <form action="" method="post">
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
                            <br>
                            <button class="au-btn au-btn--blue m-b-20" name="change_password">Change Password</button>
                        </form>

                        <br>
                        <h5 style="text-align: center"> Delete Account</h5>
                        <br>
                        <div id="deleteButton">
                            <button class="au-btn au-btn--green m-b-20">Delete Account</button>
                        </div>
                        <br>
                        <form id="deleteAccountForm" action="" method="post" style="display: none;">
                            <span class="closeBtn" onclick="closeDeleteForm()">&times;</span>
                            <br>
                            <h5 style="text-align: center"> Enter your password</h5>
                            <div class="form-group">
                                <label>Warning! This action is irreversible.</label>
                                <input class="au-input au-input--full" type="password" name="delete_password" id="delete_password" placeholder="Enter Password">
                            </div>
                            <br>
                            <button class="au-btn au-btn--green m-b-20" name="delete_account">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="overlay" id="overlay"></div>

<script>
	document.getElementById('imageInput').addEventListener('change', function () {
		var preview = document.getElementById('previewImage');
		var file = document.getElementById('imageInput').files[0];
		var reader = new FileReader();
		var closePreview = document.getElementById('closePreview');
		var previewContainer = document.querySelector('.preview-image-container');

		reader.onload = function () {
			preview.src = reader.result;
			preview.style.display = 'block';
			closePreview.style.display = 'block';
			previewContainer.style.height = '200px'; // Set height to 200px when image is selected
		}

		if (file) {
			reader.readAsDataURL(file);
		} else {
			preview.style.display = 'none'; // Hide the preview image
			closePreview.style.display = 'none'; // Hide the close preview button
			previewContainer.style.height = '0'; // Set height to 0 when no image is selected
		}
	});


	function clearImage() {
		var preview = document.getElementById('previewImage');
		var fileInput = document.getElementById('imageInput');
		var closePreview = document.getElementById('closePreview');
		var previewContainer = document.querySelector('.preview-image-container');

		preview.src = '';
		fileInput.value = '';
		preview.style.display = 'none';
		closePreview.style.display = 'none';
		previewContainer.style.height = '0'; // Set height to 0 when image is cleared
	}


    function closeDeleteForm() {
        var deleteForm = document.getElementById('deleteAccountForm');
        var overlay = document.getElementById('overlay');
        overlay.style.display = 'none';
        deleteForm.style.display = 'none';
    }

    document.getElementById('deleteButton').addEventListener('click', function () {
        var deleteForm = document.getElementById('deleteAccountForm');
        var overlay = document.getElementById('overlay');
        overlay.style.display = 'block';
        deleteForm.style.display = 'block';
    });

    window.addEventListener('DOMContentLoaded', function() {
        document.getElementById('closePreview').style.display = 'none';
        document.getElementById('previewImage').style.display = 'none'; // Add this line
		            var previewContainer = document.querySelector('.preview-image-container');
            previewContainer.style.height = '0';
    });
	
</script>


</body>

</html>


