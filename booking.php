<?php
session_start(); // Start the session
?>

<html>

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
        <img src="images/BookingImage1.jpeg" alt="Image 1">
        <img src="images/BookingImage1.jpeg" alt="Image 2">
        <img src="images/BookingImage1.jpeg" alt="Image 3">
        
    </div>

    <h2>Booking Consultation</h2>

    
<!-- Custom Alert Modal -->
<div id="customAlert" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="width: 300px; margin: 15% auto; padding: 20px; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h2 id="alertTitle">Alert Title</h2>
        <p id="alertMessage">Alert message</p>
        <button onclick="document.getElementById('customAlert').style.display='none'">OK</button>
    </div>
</div>

  
    <form action="index.php" method="post">
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

   <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('min', today);
   </script>

  <?php
 require_once("bookingValidation.php")
?>
    
</body>
</html>
