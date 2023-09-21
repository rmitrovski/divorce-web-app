<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

</head>
<body>

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
	<link href="css/profile_page.css" rel="stylesheet" media="all">
    <div class="profile-card">
        <img src="./images/default.png" alt="Profile Image">
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
