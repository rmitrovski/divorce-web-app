<?php
session_start();

$response = array(
    'success' => false,
    'message' => '',
    'errors' => [],
    'bookedSlots' => []
);


if (!isset($_SESSION['bookedSlots'])) {
    $_SESSION['bookedSlots'] = [];
}




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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["time"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];
    $email = $_POST['email'];

    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $response['errors'][] = ['code' => 'invalid_name', 'message' => 'Name can only contain letters and spaces.'];
    }

    if (!preg_match("/^[0-9]+$/", $phone)) {
        $response['errors'][] = ['code' => 'invalid_phone', 'message' => 'Invalid phone format.'];
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = ['code' => 'invalid_email', 'message' => 'Invalid email format.'];
    }

    // Check if the selected date and time are already booked
    $isAlreadyBooked = false;
    foreach ($_SESSION['bookedSlots'] as $slot) {
        if ($slot['date'] === $selectedDate && $slot['time'] === $selectedTime) {
            $isAlreadyBooked = true;
            $response['errors'][] = ['code' => 'slot_already_booked', 'message' => 'Booking already exists for this date and time. Please choose another time.'];
            break;
        }
    }

    if (empty($response['errors'])) {
        $_SESSION['name'][] = $name;
        $_SESSION['phone'][] = $phone;
        $_SESSION['email'][] = $email;
        $_SESSION['reason'][] = $reason;
        if (!$isAlreadyBooked) {
            // Store the booked slot in the session
            $_SESSION['bookedSlots'][] = ['date' => $selectedDate, 'time' => $selectedTime];
            $response['success'] = true;
            $response['message'] = 'Booking successful';
        } 
    }

   

    $response['bookedSlots'] = $_SESSION['bookedSlots'];  
}

echo json_encode($response);
?>

