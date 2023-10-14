<?php
// enable error reporting 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include external libraries and dependencies 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//fetch from the inputs 
$name = $_POST["user"];
$email = $_POST["email_id"];
$message = $_POST["question"];
//initialize a new php email insurance 
$mail = new PHPMailer(true);

try {
    // try to check the connection and send emails 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Email goes here
    $mail->Password = ''; // Password goes here
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Validate and sanitize email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email address");
    }

    $mail->setFrom(''); // Email that was chosen goes here
    $mail->addAddress('str4w8erries@gmail.com', 'FAQ');

    $mail->isHTML(true);
    $mail->Subject = 'Question from ' . $name;

    // Sanitize and escape message content to prevent XSS
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    $mail->Body = <<<EOT
    <html>
    <head>
        <style>
            /* Define your CSS styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }
            .email-container {
                max-width: 600px;
                margin: 0 auto;
				border-radius: 20px;
                padding: 20px;
                background-color: #ade0d8;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }
            .box {
                border: 1px solid #000000;
				border-radius: 25px;
				background-color: #ffffff;
                padding: 10px;
                margin-bottom: 10px;
            }
            h1 {
                color: #333;
                font-size: 24px;
            }
            p {
                font-size: 16px;
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <h1>Customer Inquiry</h1>
            
             <p><strong>Email:</strong> 
			    <div class="box">
				{$email}
				</div>
			</p>
            
			<p><strong>Name:</strong>
            <div class="box">
                 {$name}</div>
				 </p>
		    <p><strong>Message:</strong>
            <div class="box">
                 {$message} </div>
			</p>
            
        </div>
    </body>
    </html>
EOT;


    $mail->send();
?>

<!DOCTYPE html>
<html>
<head>
	<style>
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 18px;
    display: block;
    margin-bottom: 5px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.btn-primary:hover {
    background-color: #0056b3;
}
	</style>
    <title>Thank You</title>
 <!-- email body -->

</head>
<body>
    <h1>Thank you for your email. We will be with you shortly.</h1>
	<div class="form-group">
        <form action="FAQ.php">
          <input  style="font-size: 22px;" type="submit" name="btnLogin" class="btn btn-primary" value="Return to FAQ" />
        </form>
	</div>
</body>
</html>

<?php
//diaply error message if the email could not be sent 
} catch (Exception $e) {
    echo '<p style="font-size: 30px;">Oops, message could not be sent. Please return to the previous page. </p>';
}
?>

