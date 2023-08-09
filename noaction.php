<?php

	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$date = $_POST['date'];
	$heard_about_us = $_POST['heard_about_us'];
	$bio = $_POST['bio'];

	// Hash the password
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	// Database connection
	$conn = new mysqli('localhost', 'root', 'Secret123!', 'test');
	if ($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed: " . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO persons(fname, email, phone, age, gender, password, date, heard_about_us, bio) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $fname, $email, $phone, $age, $gender, $hashedPassword, $date, $heard_about_us, $bio);
		$execval = $stmt->execute();
		if ($execval) {
			echo "Registration successful...";
		} else {
			echo "Error: " . $stmt->error;
		}
		$stmt->close();
		$conn->close();
	}
?>
