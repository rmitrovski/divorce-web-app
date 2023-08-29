<?php
// Initialize the bookedSlots array if it doesn't exist in the session
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
    echo "<script>alert('Name can only contain letters and spaces.');</script>";
    
}

  if (!preg_match("/^[0-9]+$/", $phone)) {
        echo "<script>alert('Invalid phone format.');</script>";
    }

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    
    if (!$isAlreadyBooked) {
        // Store the booked slot in the session
        $_SESSION['bookedSlots'][] = ['date' => $selectedDate, 'time' => $selectedTime];
        // Respond to the client with a success message
        echo json_encode(['message' => 'Booking successful']);
    } else {
        // Respond to the client with an error message
       echo "<script>
        document.getElementById('alertTitle').innerText = 'Booking Time Alert';
        document.getElementById('alertMessage').innerText = 'Booking already exists for this date and time. Please choose another time.';
        document.getElementById('customAlert').style.display='block';
      </script>";


    }
}




// Display the content of the bookedSlots array in the session
echo "Booked Slots:<br>";
foreach ($_SESSION['bookedSlots'] as $slot) {
    echo "Date: " . $slot['date'] . ", Time: " . $slot['time'] . "<br>";
}
?>
