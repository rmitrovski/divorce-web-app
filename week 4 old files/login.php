<?php
session_start(); // Start a session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', 'Secret123!', 'test');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT password, fname, bio FROM persons WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($hashedPassword, $fname, $bio);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            echo "Login successful...";
            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $fname;
            $_SESSION['bio'] = $bio;
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid login credentials.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
