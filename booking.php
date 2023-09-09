<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="booking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&family=Quicksand:wght@300&display=swap"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
<div id="successAlert" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="width: 300px; margin: 15% auto; padding: 20px; background: #d4edda; color: #155724; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h2 id="successTitle">Success</h2>
        <p id="successMessage">Your booking was successful. Click "OK" to see your appointment details.</p>
        <button onclick="closeSuccessAlertAndProceed()">OK</button>
    </div>
</div>

    <div id="customAlert" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
            <div style="width: 300px; margin: 15% auto; padding: 20px; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <h2 id="alertTitle">Alert Title</h2>
                <p id="alertMessage">Alert message</p>
                <button onclick="document.getElementById('customAlert').style.display='none'">OK</button>
            </div>
        </div> 
    <!-- Header -->
    <div class="container-fluid bg-primary text-white p-4">
        <h1>Booking</h1>
    </div>

    

    <div class="container my-5">

        <!-- Row for Text Section and Heart Image -->
        <div class="row">

            <!-- Left Column: Text Section -->
            <div class="col-md-6">
                <div class="text-section">
                    <h1>I want to consult about <span class="text-info">grounds for divorce</span></h1>
                    <div class="action-section">
                        <p>We will help you</p>

                    </div>
                </div>
            </div>

            <!-- Right Column: Heart Image -->
            <div class="col-md-6">
                <img src="heart.png" id="splash" class="img-fluid" alt="Heart Image">
            </div>

        </div>

        

        <!-- Row for About Us Section -->
        <div class="row mt-4">

            <div class="col-md-12">
                <!-- About Us Section -->
                <div class="about-us">
                    <h2>About Us</h2>
                    <p class="about-description">
                        The Clean Divorce provides a supportive, integrated
                        space for individuals and families to transition successfully
                        through separation and divorce.
                    </p>
                    
                    <h3>Vision</h3>
                    <p class="vision-description">
                        To shift the narrative on divorce from one of conflict
                        and stress to one of empowerment, choice, opportunity and self-discovery.
                    </p>
                    
                    <h3>Mission</h3>
                    <p class="mission-description">
                        Disrupt the divorce industry by facilitating more collaborative divorces,
                        giving help sooner, and empowering individuals to make the best choices.
                    </p>                    
                </div>
            </div>
        </div>

        <!-- Row for Images and Form Section -->
        <div class="row mt-5">

            <!-- Left Column: Images -->
            <div class="col-md-6">
                <div class="images">
                    <img src="images/BookingImage1.jpeg" alt="Image 1" class="img-fluid img-1">
                    <img src="images/BookingImage1.jpeg" alt="Image 2" class="img-fluid img-2">
                    <img src="images/BookingImage1.jpeg" alt="Image 3" class="img-fluid img-3">
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6">
                <div id="alertMessage" class="alert"></div>

                <div class="border p-4 rounded">
                    <form action="bookingValidation.php" method="post">
                        <h2 class="text-primary">Booking Consultation</h2>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="text">Email Address:</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="reason">Purpose Of Consultation:</label>
                            <textarea id="reason" name="reason" rows="4" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="date">Select a date:</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="time">Select a time:</label>
                            <select id="time" name="time" class="form-control" required>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="15:00">04:00 PM</option>
                                <option value="15:00">05:00 PM</option>
                                <option value="15:00">06:00 PM</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Book</button>
                    </form>
                </div>
            </div>

        </div>

    </div>



    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
        function closeSuccessAlertAndProceed() {
             // Close the success alert
             document.getElementById('successAlert').style.display = 'none';

            // Navigate to the bookedSlots.php page
            window.location.href = "bookingInformation.php";
        }

        var today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('min', today);

        var typingEffect = new Typed(".text-info", {
            strings: ["division of assets", "spousal support", "parenting plans"
                , "child support", "healthcare", "emotional support"],
            loop: true,
            typeSpeed: 100,
            backSpeed: 80,
            backDelay: 1500
        })

       // Using jQuery
       $(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "bookingValidation.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                var alertMessageElement = $("#alertMessage");
                var successMessageElement = $("#successMessage");

                if (data.success) {
                    successMessageElement.text(data.message);
                    $('#successAlert').show();
                } else {
                    
                    var errorMessages = [];

                    
                    var alertTitles = '';

                   
                    data.errors.forEach(function(error) {
                        errorMessages.push(error.message);  

                       
                        switch(error.code) {
                            case 'invalid_name':
                                alertTitles += 'Name Error; ';
                                break;
                            case 'invalid_phone':
                                alertTitles += 'Phone Error; ';
                                break;
                            case 'invalid_email':
                                alertTitles += 'Email Error; ';
                                break;
                            case 'slot_already_booked':
                                alertTitles += 'Booking Time Error; ';
                                break;
                            default:
                                alertTitles += 'Unknown Error; ';
                        }
                    });

                    
                    alertMessageElement.text(errorMessages.join(' ')).addClass("alert-danger").removeClass("alert-success");
                    $('#alertTitle').text(alertTitles);

                    
                    $('#customAlert').show();
                }
            }
        });
    });
});


    </script>

<?php
    require_once("bookingValidation.php");
    include("footer.php");  // This includes the footer.php content
?>
