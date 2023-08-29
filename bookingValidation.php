
<?php

$response = array(
    'success' => false,
    'message' => '',
    'errors' => [],
    'bookedSlots' => []
);

if (!isset($_SESSION['bookedSlots'])) {
    $_SESSION['bookedSlots'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["time"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $response['errors'][] = 'Name can only contain letters and spaces.';
       echo "<script>alert('Name can only contain letters and spaces.');</script>";
    }

    if (!preg_match("/^[0-9]+$/", $phone)) {
        $response['errors'][] = 'Invalid phone format.';
        echo "<script>alert('Invalid phone format.');</script>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = 'Invalid email format.';
       echo "<script>alert('Invalid email format.');</script>";
    }

    // Check if the selected date and time are already booked
    $isAlreadyBooked = false;
    foreach ($_SESSION['bookedSlots'] as $slot) {
        if ($slot['date'] === $selectedDate && $slot['time'] === $selectedTime) {
            $isAlreadyBooked = true;
            break;
        }
    }

    if (empty($response['errors'])) {
        if (!$isAlreadyBooked) {
            // Store the booked slot in the session
            $_SESSION['bookedSlots'][] = ['date' => $selectedDate, 'time' => $selectedTime];
            $response['success'] = true;
            $response['message'] = 'Booking successful';
        } else {
            $response['errors'][] = 'Booking already exists for this date and time. Please choose another time.';
           echo "<script>
        document.getElementById('alertTitle').innerText = 'Booking Time Alert';
        document.getElementById('alertMessage').innerText = 'Booking already exists for this date and time. Please choose another time.';
        document.getElementById('customAlert').style.display='block';
      </script>";
        }
    }

    $response['bookedSlots'] = $_SESSION['bookedSlots'];  // Return all booked slots to the client
}


echo json_encode($response);


// Display the content of the bookedSlots array in the session
echo "Booked Slots:<br>";
foreach ($_SESSION['bookedSlots'] as $slot) {
    echo "Date: " . $slot['date'] . ", Time: " . $slot['time'] . "<br>";
}
?>
