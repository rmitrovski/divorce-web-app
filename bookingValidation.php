<?php
session_start(); // Start the session

// Initialize the bookedSlots array if it doesn't exist in the session
if (!isset($_SESSION['bookedSlots'])) {
    $_SESSION['bookedSlots'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["time"];
    
    // Check if the selected date and time are already booked
    $isAlreadyBooked = false;
    foreach ($_SESSION['bookedSlots'] as $slot) {
        if ($slot['date'] === $selectedDate && $slot['time'] === $selectedTime) {
            $isAlreadyBooked = true;
            break;
        }
    }
    
    if (!$isAlreadyBooked) {
        // Store the booked slot in the session
        $_SESSION['bookedSlots'][] = ['date' => $selectedDate, 'time' => $selectedTime];
        // Respond to the client with a success message
        echo json_encode(['message' => 'Booking successful']);
    } else {
        // Respond to the client with an error message
        echo json_encode(['message' => 'Slot already booked']);
    }
}

// Display the content of the bookedSlots array in the session
echo "Booked Slots:<br>";
foreach ($_SESSION['bookedSlots'] as $slot) {
    echo "Date: " . $slot['date'] . ", Time: " . $slot['time'] . "<br>";
}
?>
