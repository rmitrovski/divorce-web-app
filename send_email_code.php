<?php

# Include the Autoloader and PHPMailer libraries
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

# Get the data from the index (POST request)
$name = $_POST["user"];
$email = $_POST["email_id"];
$message = $_POST["question"];


# Create mail object and set it
$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = TRUE;
	$mail->Username = 'crm.thecleandivorce@gmail.com';
	$mail->Password = 'ssrioyggxzxpchca'; # app password
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	# sender and recipient (based on user specification)
    var_dump($email);
	$mail->setFrom('crm.thecleandivorce@gmail.com');
    var_dump($email);
	$mail->addAddress('str4w8erries@gmail.com', 'FAQ');
	
	# set message
	$mail->isHTML(true);
    $mail->Subject = 'Question from' .$name;
	$mail->Body = <<<EOT
Email: {$email}
Name: {$name}
Message: {$message}
EOT;
	$mail->send();
    ?>
<h1> Thank you for your email, we will be with you shortly </h1>
<?php
} catch (Exception $e) { # error handling
	echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}

?>