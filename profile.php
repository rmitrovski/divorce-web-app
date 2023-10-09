<!DOCTYPE html>
<!-- Define the document type -->
<!-- set the character encoding -->

<html lang="en">
<head>
    <!-- set the character encoding -->

    <meta charset="UTF-8">
    <!-- ensure proper viewing -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- page title -->

    <title>Profile Page</title>
        <!-- CSS file-->

    <link rel="stylesheet" href="css/booking_list.css">


</head>
<body>
        <!-- added a background image -->

<img src="images/html_profile.jpeg" id="bgImage">
    <!--  PHP logic include server.php-->

    <?php include('server.php') ?>
    <?php
 // check if the user is logged in
    if (!isset($_SESSION['username'])) {
        //print an error message if they are not logged in 
        $_SESSION['msg'] = "You must log in first";
        //direct them to login page 
        header('location: login.php');
    } else {
        //if they are logged in, fetch data from DB
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
    }
    ?>
    <!--  PHP logic include header.php-->

    <?php require_once('header.php'); ?>
        <!--  CSS files-->

	<link href="css/profile_page.css" rel="stylesheet" media="all">
    <div class="profile-card">
        <?php
        //quesry the dB to fetch the details based on the user logged in 
        $select = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        if($select){ //check if the query is successful 
            $fetch = mysqli_fetch_assoc($select);
        }
        // if($fetch['image'] == ''){
        //     echo '<img src="./images/default.png" alt="Profile Image">';
        // }else{
        //     echo '<img src="uploaded_img/'.$fetch['image'].'">';
        // }
        if (!empty($fetch['image'])) { //check if the user has an image 
            //convert the binary data to base64 encoding 
            $imageData = base64_encode($fetch['image']);
            $imageSrc = "data:image/jpeg;base64,{$imageData}";
            echo '<img src="' . $imageSrc . '" class="profile-image" alt="Profile Image">';
        } else {

            //if no image is found 
            echo '<img src="./images/default.png" class="profile-image" alt="Profile Image">';
        }
        ?>
            <!--  display the settings and dashboard btns -->

        <div class="profile-info">
            <h2><?php echo $username; ?></h2>
            <p><?php echo $email; ?></p>
            <div class="settings-button">
                <a href="settings.php">Settings</a>
				<a href="index.php">View Dashboard</a>
            </div>
        </div>
    </div>

</body>
</html>
