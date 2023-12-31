<?php
// session starts when on this page
session_start();

// Connects to the database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=consultation', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if fails to connect
    echo 'Connection failed: ' . $e->getMessage();
}

// Checks if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array(
        'success' => false,
        'message' => '',
        'errors' => [],  
    );
    // Assigns the response to variables
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $consultation_type = $_POST['type'];
    $consultation_date = $_POST['date'];
    $consultation_time = $_POST['time'];
    $purpose = $_POST['reason'];

    // Checks the fields and displays errors if there is something wrong
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $response['errors'][] = ['code' => 'invalid_name', 'message' => 'Name can only contain letters and spaces.'];
    }

    if (!preg_match("/^[0-9]+$/", $phone)) {
        $response['errors'][] = ['code' => 'invalid_phone', 'message' => 'Invalid phone format.'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = ['code' => 'invalid_email', 'message' => 'Invalid email format.'];
    }
    // If there are no errors, a booking is made
    if (empty($response['errors'])) {
        $_SESSION['name'][] = $name;
        $_SESSION['phone'][] = $phone;
        $_SESSION['email'][] = $email;
        $_SESSION['reason'][] = $purpose;
        $_SESSION['date'][] = $consultation_date;  
        $_SESSION['time'][] = $consultation_time;  
        $_SESSION['type'][] = $consultation_type;  
        
        $response['success'] = true;
        $response['message'] = 'Booking successful';

        // Inserts the booking into the database
        try {
            $stmt = $pdo->prepare('INSERT INTO information (name, phone, email, consultation_type, consultation_date, consultation_time, purpose) VALUES (:name, :phone, :email, :consultation_type, :consultation_date, :consultation_time, :purpose)');
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':consultation_type', $consultation_type);
            $stmt->bindParam(':consultation_date', $consultation_date);
            $stmt->bindParam(':consultation_time', $consultation_time);
            $stmt->bindParam(':purpose', $purpose);

            $stmt->execute();
            
            $response['success'] = true;
            $response['message'] = 'Consultation booked successfully.';
        } catch (PDOException $e) {
            // Display error message if it fails 
            $response['message'] = 'Error: ' . $e->getMessage();
        }
    }

    echo json_encode($response);
}
?>


