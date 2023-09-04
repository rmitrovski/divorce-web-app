<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Slots</title>
</head>
<body>
    <h2>Booking information</h2>
    
    <?php
    // Determine the latest index
    $latestIndex = isset($_SESSION['name']) ? count($_SESSION['name']) - 1 : -1;

    // Check if there's data before attempting to display it
    if($latestIndex >= 0 && isset($_SESSION['name'][$latestIndex], $_SESSION['phone'][$latestIndex], $_SESSION['email'][$latestIndex], $_SESSION['reason'][$latestIndex])) {
    ?>
    
        <p>
        Name: <?php echo htmlspecialchars($_SESSION['name'][$latestIndex]); ?><br>
        Phone: <?php echo htmlspecialchars($_SESSION['phone'][$latestIndex]); ?><br>
        Email: <?php echo htmlspecialchars($_SESSION['email'][$latestIndex]); ?><br>
        Booking Reason: <?php echo htmlspecialchars($_SESSION['reason'][$latestIndex]); ?>
        </p>

    <?php
    } else {
        echo "<p>No user details available.</p>";
    }

    
    if(isset($_SESSION['bookedSlots']) && !empty($_SESSION['bookedSlots'])) {
    ?>
        <ul>
            <?php foreach ($_SESSION['bookedSlots'] as $slot): ?>
                <li>
                    Date: <?php echo htmlspecialchars($slot['date']); ?>, 
                    Time: <?php echo htmlspecialchars($slot['time']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php
    } else {
        echo "<p>No booked slots available.</p>";
    }
    ?>
    
</body>
</html>
