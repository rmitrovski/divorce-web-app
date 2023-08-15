<?php
 require_once("bookingValidation.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Page</title>
    <link rel="stylesheet" type="text/css" href="booking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Philosopher&family=Quicksand:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div class="header">
        <h1>Booking</h1>
    </div>
    <div class="images">
        <img src="images/1.jpeg" alt="Image 1">
        <img src="images/1.jpeg" alt="Image 2">
        <img src="images/1.jpeg" alt="Image 3">
        
    </div>

    <h2>Booking Consultation</h2>

    

    <div id="alertMessage" class="alert"></div>
    <form action="booking.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="reason">Purpose Of Consultation:</label>
        <textarea id="reason" name="reason" rows="4" required></textarea><br>

        <label for="date">Select a date:</label>
       
        <input type="date" id="date" name="date" min="YYYY-MM-DD"required>
        
        <label for="time">Select a time:</label>
        <select id="time" name="time" required>
            <option value="09:00">09:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="15:00">03:00 PM</option>
        </select>
        
        
        <input type="submit" value="Book">
    </form>

   
    
</body>
</html>
