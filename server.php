<?php
session_start();
$username="";
$email="";
$errors=array();
$db= mysqli_connect('localhost', 'root','','project');

	
if(isset($_POST['reg_user'])){
  $username= mysqli_real_escape_string($db, $_POST['username']);
  $email= mysqli_real_escape_string($db, $_POST['email']);
  $password_1= mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2= mysqli_real_escape_string($db, $_POST['password_2']);

  if(empty($username)){array_push($errors,"Username is required" );}
  if(empty($email)){array_push($errors,"Email is required" );}
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query= "SELECT * FROM users WHERE username='$username' OR email='$email'LIMIT 1";
   $result= mysqli_query($db, $user_check_query);
   $user=mysqli_fetch_assoc($result);

   if($user){
    if ($user['username'] === $username){
      array_push($errors,"Username already exsists" );
    }

    if ($user['email'] === $email){
      array_push($errors,"Email already exsists" );
    }
   }
   if (count($errors) == 0) {
	$registration_date = date("Y-m-d"); // Get the current date and time
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password, registration_date) 
  			  VALUES('$username', '$email', '$password','$registration_date')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
	$_SESSION['email'] = $email;
    $_SESSION['registration_date'] = $registration_date;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}



if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($username)){
      array_push($errors,"Username is required" );
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
   
    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
  
      if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_assoc($results);
        $email = $row['email'];
  
        $registration_date = $row['registration_date'];
  
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['registration_date'] = $registration_date;
        $_SESSION['userid'] = $row['id'];
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      } else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }
  

if (isset($_POST['new_details'])) {
    $newFullName = mysqli_real_escape_string($db, $_POST['new_full_name']);
    $newEmail = mysqli_real_escape_string($db, $_POST['new_email']);

    // Get the current user's username from the session
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
    // Retrieve the user's information from the database
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Check if the new details are different from the existing ones
        if ($newFullName === $user['username'] && $newEmail === $user['email']) {
            array_push($errors, "No changes were made to user details");
        } else {
            // Check for empty fields
            if (empty($newFullName)) {
                array_push($errors, "New Full Name is required");
            }
            if (empty($newEmail)) {
                array_push($errors, "New Email is required");
            }

            if (count($errors) == 0) {
                // Update the user's name and email in the database
                $query = "UPDATE users SET username='$newFullName', email='$newEmail' WHERE username='$username'";
                mysqli_query($db, $query);

                // Update the $_SESSION variables with the new details
                $_SESSION['username'] = $newFullName;
                $_SESSION['email'] = $newEmail;

                $_SESSION['success_message'] = "User details updated successfully";
                header('location: settings.php');
            }
        }
    } else {
        echo 'error';
    }
}

if (isset($_POST['new_image'])) {
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    // Get the current user's username from the session
    $username = $_SESSION['username'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            array_push($errors, "Image is too large");
        } else {
            $image_update_query = mysqli_query($db, "UPDATE users SET image = '$update_image' WHERE username = '$username'");
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
                $_SESSION['success_message'] = "Profile image updated successfully";
                header('location: settings.php');
            } else {
                array_push($errors, "Upload image failed");
            }
        }
    }
}



if (isset($_POST['change_password'])) {
    $currentPassword = mysqli_real_escape_string($db, $_POST['current_password']);
    $newPassword = mysqli_real_escape_string($db, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirm_password']);

    // Check if any of the fields are empty
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        array_push($errors, "All fields are required");
    } else {
        // Get the current user's username from the session
        $username = $_SESSION['username'];
        $query = "SELECT password FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // Check if the current password matches the stored hash
            if (md5($currentPassword) === $user['password']) {
                if ($newPassword === $confirmPassword) {
                    // Hash the new password and update it in the database
                    $newPasswordHash = md5($newPassword);
                    $updateQuery = "UPDATE users SET password='$newPasswordHash' WHERE username='$username'";
                    $updateResult = mysqli_query($db, $updateQuery);

                    if ($updateResult) {
                        // Password successfully updated
                        $_SESSION['success_message'] = "Password changed successfully";
                        header('location: settings.php');
                    } else {
                        // Display an error message if the update query fails
                        array_push($errors, "Error updating password: " . mysqli_error($db));
                    }
                } else {
                    // New password and confirmation do not match
                    array_push($errors, "New password and confirmation do not match");
                }
            } else {
                // Current password is incorrect
                array_push($errors, "Current password is incorrect");
            }
        }
    }
}


if (isset($_POST['delete_account'])) {
    $deletePassword = mysqli_real_escape_string($db, $_POST['delete_password']);

    // Get the current user's username from the session
    $username = $_SESSION['username'];

    // Retrieve the user's information from the database
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Check if the provided delete password is empty
        if (empty($deletePassword)) {
            array_push($errors, "Please enter your password");
        } else {
            // Check if the provided delete password matches the user's password
            if (md5($deletePassword) === $user['password']) {
                // Delete the user's row from the database
                $deleteQuery = "DELETE FROM users WHERE username='$username'";
                $deleteResult = mysqli_query($db, $deleteQuery);

                if ($deleteResult) {
                    // User account successfully deleted
                    session_destroy(); // Destroy the session
                    header('location: login.php'); // Redirect to login page
                } else {
                    // Display an error message if the delete query fails
                    array_push($errors, "Error deleting user account: " . mysqli_error($db));
                }
            } else {
                // Delete password is incorrect
                array_push($errors, "Incorrect delete password");
            }
        }
    }
}

if (isset($_POST['book_appointment'])) {
    $name= mysqli_real_escape_string($db, $_POST['name']);
    $phone= mysqli_real_escape_string($db, $_POST['phone']);
    $email= mysqli_real_escape_string($db, $_POST['email']);
    $type= mysqli_real_escape_string($db, $_POST['type']);
    $date= mysqli_real_escape_string($db, $_POST['date']);
    $time= mysqli_real_escape_string($db, $_POST['time']);
    $reason= mysqli_real_escape_string($db, $_POST['reason']);
    // Get the current user's username from the session
    $username = $_SESSION['username'];
    // Retrieve the user's information from the database
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $user_id = $user['id'];

        $sql = "INSERT INTO bookings (name, phone, email, type, date, time, reason, user_id) 
            VALUES ('$name', '$phone', '$email', '$type', '$date', '$time', '$reason', '$user_id')";
        mysqli_query($db, $sql);
        $alert = "Booking successfully!";
			$bookflag = true;
			$jump = 'index.php';
    }

}
function booklist($db, $username){
    $query = "SELECT * FROM bookings WHERE username = '$username' ORDER BY booking_id";
    $results = mysqli_query($db, $query);
    if ($results) {
        $data = [];
        while ($row = mysqli_fetch_object($results)) {
            array_push($data, $row);
        }
        return $data;
    } else {
        echo "error：" . mysqli_error($db);
        return []; 
    }
}




