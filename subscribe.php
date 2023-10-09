<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        /* Add your CSS styles here */
		#mc_embed_shell {
			font-family: Arial, sans-serif;
			max-width: 2000px; /* Adjusted max-width */
			width: 300px;
			margin: 0 auto;
			padding: 20px;
			background-color: #f9f9f9;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			margin-top: 50px;
		}

        
        .mc-field-group {
            margin-bottom: 10px;
        }

        .mc-field-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

		.mc-field-group input {
			width: calc(100% + 8px); /* Adjusted input width */
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

        .button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <?php include('server.php') ?>
    <?php
//chekc if user is loged in 
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    } else {
        //ftech the users info 
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $userid =$_SESSION['userid'];
    }
    ?>

    <?php require_once('header.php'); ?>
	<link href="css/profile_page.css" rel="stylesheet" media="all">
    <div class="profile-card">
<div id="mc_embed_shell">
<!-- mailchimp subscription format -->
<div id="mc_embed_signup">
 <form action="https://gmail.us10.list-manage.com/subscribe/post?u=0956ec2183806dbd2dec5dd14&amp;id=9a3e7792ef&amp;f_id=00f8cde5f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self" novalidate="">
        <div id="mc_embed_signup_scroll"><h2>Subscribe</h2>
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div><div class="mc-field-group"><label for="mce-FNAME">First Name </label><input type="text" name="FNAME" class=" text" id="mce-FNAME" value=""></div><div class="mc-field-group"><label for="mce-LNAME">Last Name </label><input type="text" name="LNAME" class=" text" id="mce-LNAME" value=""></div><div class="mc-field-group"><label for="mce-PHONE">Phone Number </label><input type="text" name="PHONE" class="REQ_CSS" id="mce-PHONE" value=""></div>
        <div id="mce-responses" class="clear foot">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
        </div>
    <div aria-hidden="true" style="position: absolute; left: -5000px;">
        /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
        <input type="text" name="b_0956ec2183806dbd2dec5dd14_9a3e7792ef" tabindex="-1" value="">
    </div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
                <p style="margin: 0px auto;"><a href="google.com" title="Mailchimp - email marketing made easy and fun"><span style="display: inline-block; background-color: transparent; border-radius: 4px;"><img class="refferal_badge" src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg" alt="Intuit Mailchimp" style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;"></span></a></p>
            </div>
        </div>
    </div>
</form>
</div>
</div>

    </div>

</body>
</html>
