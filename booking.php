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

</head>

<body>

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
                    <img src="images/1.jpeg" alt="Image 1" class="img-fluid img-1">
                    <img src="images/1.jpeg" alt="Image 2" class="img-fluid img-2">
                    <img src="images/1.jpeg" alt="Image 3" class="img-fluid img-3">
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6">
                <div id="alertMessage" class="alert"></div>

                <div class="border p-4 rounded">
                    <form action="booking.php" method="post">
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
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
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

        document.addEventListener("DOMContentLoaded", function () {  // Ensure the DOM is fully loaded
            var form = document.querySelector("form");  // Get the form element

            form.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(form); // Create a FormData object from the form

                fetch("booking.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            // If we get an HTTP status code that indicates an error, reject the promise
                            throw new Error('Network response was not ok');
                        }
                        return response.json();  // Parse the response as JSON
                    })
                    .then(data => {
                        var alertMessageElement = document.getElementById("alertMessage");

                        if (data.success) {
                            alertMessageElement.innerText = data.message;
                            alertMessageElement.classList.add("alert-success");  // Add success class
                            alertMessageElement.classList.remove("alert-danger");  // Remove error class
                        } else {
                            var errorMessage = data.errors.join(' ');  // Join all error messages into one string
                            alertMessageElement.innerText = errorMessage;
                            alertMessageElement.classList.add("alert-danger");  // Add error class
                            alertMessageElement.classList.remove("alert-success");  // Remove success class
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        var alertMessageElement = document.getElementById("alertMessage");
                        alertMessageElement.innerText = "An error occurred while booking.";
                        alertMessageElement.classList.add("alert-danger");  // Add error class
                        alertMessageElement.classList.remove("alert-success");  // Remove success class
                    });
            });
        });


    </script>

<?php
    require_once("bookingValidation.php")
?>

</body>

</html>
