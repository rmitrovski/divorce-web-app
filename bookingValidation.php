<?php
// session starts when on this page
session_start();

$response = array(
    'success' => false,
    'message' => '',
    'errors' => [],
    
);


// Initialize the name, phone, email and reason session variables
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = [];
}

if (!isset($_SESSION['phone'])) {
    $_SESSION['phone'] = [];
}

if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = [];
}

if (!isset($_SESSION['reason'])) {
    $_SESSION['reason'] = [];
}


// Initialize the date, time and type session variables
if (!isset($_SESSION['date'])) {
    $_SESSION['date'] = [];
}

if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = [];
}


if (!isset($_SESSION['type'])) {
    $_SESSION['type'] = [];
}


// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_POST['type'];

    // Validate the data
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $response['errors'][] = ['code' => 'invalid_name', 'message' => 'Name can only contain letters and spaces.'];
    }

    if (!preg_match("/^[0-9]+$/", $phone)) {
        $response['errors'][] = ['code' => 'invalid_phone', 'message' => 'Invalid phone format.'];
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = ['code' => 'invalid_email', 'message' => 'Invalid email format.'];
    }

    
    // Check if there are any errors
    if (empty($response['errors'])) {
        // Add the form data to the session
        $_SESSION['name'][] = $name;
        $_SESSION['phone'][] = $phone;
        $_SESSION['email'][] = $email;
        $_SESSION['reason'][] = $reason;
        $_SESSION['date'][] = $date;  
        $_SESSION['time'][] = $time;  
        $_SESSION['type'][] = $type;  
        
        $response['success'] = true;
        $response['message'] = 'Booking successful';
    }

   
}

echo json_encode($response);
?>


