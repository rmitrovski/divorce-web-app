<?php
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost', 'root', 'enter the password here', 'test');
	if ($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed: " . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO persons(fname, email, phone, password) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $fname, $email, $phone, $password);  // Removed the extra 'i'
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