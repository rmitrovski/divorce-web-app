<?php include('server.php');
$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$port = $_SERVER['SERVER_PORT'];
if($port != 80){
	$url = $_SERVER['SERVER_NAME'].':'.$port.$_SERVER['REQUEST_URI'];
}
$baseurl = 'http://'. dirname($url);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Booking Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="booking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&family=Quicksand:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' />

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>
    <div id="successAlert"
        style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
        <div
            style="width: 300px; margin: 15% auto; padding: 20px; background: #d4edda; color: #155724; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <h2 id="successTitle">Success</h2>
            <p id="successMessage">Your booking was successful. Click "OK" to see your appointment details.</p>
            <button onclick="closeSuccessAlertAndProceed()">OK</button>
        </div>
    </div>

    <div id="customAlert"
        style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
        <div
            style="width: 300px; margin: 15% auto; padding: 20px; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
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
                <img src="images/heart.png" id="splash" class="img-fluid" alt="Heart Image">
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


        <!-- Row for Image Slider -->
        <div class="row mt-4">
            <div class="col-md-12">
                <!-- Image Slider Section -->
                <div id="imageSlider" class="carousel slide" data-interval="false" data-wrap="true">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#imageSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#imageSlider" data-slide-to="1"></li>
                        <li data-target="#imageSlider" data-slide-to="2"></li>
                        <li data-target="#imageSlider" data-slide-to="3"></li>
                        <li data-target="#imageSlider" data-slide-to="4"></li>
                    </ol>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <h3 class="carousel-caption-title">Free Consultation</h3>
                                <p class="carousel-caption-text">The first step to transforming your life.</p>
                                <p class="carousel-caption-duration">15 min</p>
                                <p class="carousel-caption-money">Free</p>

                                <hr style="width:70%; height:3px; background-color: #ff972f; border: none;">

                                <a href="FreeConsultation.php">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </button>
                                </a>

                                <button type="button" class="btn btn-secondary" id="type1">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </button>

                            </div>
                            <img src="free_consultation.jpeg" alt="Image 1" class="d-block w-100 carousel-image"
                                loading="lazy">
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h3 class="carousel-caption-title">Do I Need a Divorce or Trial Separation?</h3>
                                <p class="carousel-caption-text">Finding the option that works best for you and your
                                    partner.</p>
                                <p class="carousel-caption-duration">1 hr</p>
                                <p class="carousel-caption-money">CA$200</p>

                                <hr style="width:70%; height:3px; background-color: #ff972f; border: none;">

                                <a href="DivorceDecision.php">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </button>
                                </a>

                                <button type="button" class="btn btn-secondary" id="type2">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </button>
                            </div>
                            <img src="divorce.jpeg" alt="Image 2" class="d-block w-100 carousel-image" loading="lazy">
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h3 class="carousel-caption-title">Family Mediation Session</h3>
                                <p class="carousel-caption-text">Empowering solutions for families, couples, and
                                    parents.</p>
                                <p class="carousel-caption-duration">2 hr</p>
                                <p class="carousel-caption-money">Contact for details</p>

                                <hr style="width:70%; height:3px; background-color: #ff972f; border: none;">

                                <a href="FamilyMeditation.php">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </button>
                                </a>

                                <button type="button" class="btn btn-secondary" id="type3">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </button>
                            </div>
                            <img src="family.jpeg" alt="Image 3" class="d-block w-100 carousel-image" loading="lazy">
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h3 class="carousel-caption-title">Separation and Divorce Coaching</h3>
                                <p class="carousel-caption-text">Transform your life with an individual strategy
                                    session.</p>
                                <p class="carousel-caption-duration">1 hr</p>
                                <p class="carousel-caption-money">CA$200</p>

                                <hr style="width:70%; height:3px; background-color: #ff972f; border: none;">

                                <a href="Coaching.php">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </button>
                                </a>

                                <button type="button" class="btn btn-secondary" id="type4">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </button>
                            </div>
                            <img src="coach.jpeg" alt="Image 4" class="d-block w-100 carousel-image" loading="lazy">
                        </div>
                        <!-- Slide 5 -->
                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h3 class="carousel-caption-title">Relationship Renewal</h3>
                                <p class="carousel-caption-text">Preventing breakdowns and planning your empowered way
                                    forward.</p>
                                <p class="carousel-caption-duration">1 hr</p>
                                <p class="carousel-caption-money">Contact for details</p>

                                <hr style="width:70%; height:3px; background-color: #ff972f; border: none;">

                                <a href="Renew.php">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i> View Details
                                    </button>
                                </a>

                                <button type="button" class="btn btn-secondary" id="type5">
                                    <i class="fas fa-calendar-check"></i> Book Now
                                </button>
                            </div>
                            <img src="Relationship_Renewal.jpeg" alt="Image 5" class="d-block w-100 carousel-image"
                                loading="lazy">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#imageSlider" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#imageSlider" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>


        <div class="row" id="booking-section">
            <!-- Left Column: Availability Checker -->
            <div class="col-md-6 consultation-infor">
                <div class="availability-checker">
                    <h2 class="text-primary">Check Availability</h2>

                    <!-- Consultation Type Selector -->
                    <div class="form-group">
                        <label for="consultation-type-checker">Consultation Type</label>
                        <select id="consultation-type-checker" class="form-control" onchange="updateCalendarEvents()">
                            <option value="type1">Free Consultation</option>
                            <option value="type2">Do I Need a Divorce or Trial Separation?</option>
                            <option value="type3">Family Mediation Session</option>
                            <option value="type4">Separation and Divorce Coaching</option>
                            <option value="type5">Relationship Renewal</option>
                        </select>
                    </div>

                    <!-- Full Calendar -->
                    <div id='calendar'></div>

                    <!-- Time Slot Container -->
                    <div class="time-slot-container" style="margin-top: 20px;"></div>

                    <div id="confirm-button-container"></div>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6">
                <div id="alertMessage" class="alert" style="color:red"><?php include('errors.php');?></div>

                <div class="border p-4 rounded">
                    <form action="" method="post" onsubmit="return checkForm()">
                        <h2 class="text-primary">Booking Consultation</h2>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required pattern="[a-zA-Z\s]*"/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required pattern="[0-9]+">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Consultation Type:
                                <i class="fas fa-info-circle icon-hover">
                                    <span class="custom-tooltip">After confirming the available date and time based on
                                        your selected consultation type,
                                        the consultation type field will be filled in automatically.</span>
                                </i>
                            </label>
                            <input type="text" id="type" name="type" class="form-control" required="true" readonly>
                        </div>

                        <div class="form-group">
                            <label for="date">Date:
                                <i class="fas fa-info-circle icon-hover">
                                    <span class="custom-tooltip">After confirming the available date and time based on
                                        your selected consultation type,
                                        the date field will be filled in automatically.</span>
                                </i>
                            </label>
                            <input type="text" id="date" name="date" class="form-control" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="time">Time:
                                <i class="fas fa-info-circle icon-hover">
                                    <span class="custom-tooltip">After confirming the available date and time based on
                                        your selected consultation type,
                                        the time field will be filled in automatically.</span>
                                </i>
                            </label>
                            <input type="text" id="time" name="time" class="form-control" required readonly>
                        </div>


                        <div class="form-group">
                            <label for="reason">Purpose Of Consultation:</label>
                            <textarea id="reason" name="reason" rows="4" class="form-control" required></textarea>
                        </div>



                        <button name="book_appointment" type="submit" class="btn btn-primary btn-block">Book</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const type = urlParams.get('type');

            if (type) {
                const consultationTypeSelector = document.getElementById('consultation-type-checker');
                consultationTypeSelector.value = type;
            }
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const type = urlParams.get('type');

            if (type) {
                const consultationTypeSelector = document.getElementById('consultation-type-checker');
                consultationTypeSelector.value = type;
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const availabilityData = {
                type1: {
                    '2023-10-22': ['09:00 AM', '11:00 AM', '01:00 PM', '03:00 PM'],
                    '2023-09-30': ['10:00 AM', '02:00 PM', '04:00 PM'],
                    '2023-10-12': ['09:00 AM', '01:00 PM', '03:00 PM'],
                    '2023-10-22': ['10:00 AM', '02:00 PM', '04:00 PM', '06:00 PM'],
                },
                type2: {
                    '2023-09-29': ['11:00 AM', '01:00 PM', '03:00 PM'],
                    '2023-09-27': ['01:00 PM', '03:00 PM', '05:00 PM'],
                    '2023-10-14': ['10:00 AM', '12:00 PM', '02:00 PM'],
                    '2023-10-24': ['11:00 AM', '01:00 PM', '03:00 PM'],
                },
                type3: {
                    '2023-09-29': ['09:00 AM', '11:00 AM', '02:00 PM'],
                    '2023-09-28': ['10:00 AM', '01:00 PM', '03:00 PM'],
                    '2023-10-06': ['09:00 AM', '11:00 AM', '02:00 PM', '04:00 PM'],
                    '2023-10-26': ['10:00 AM', '12:00 PM', '02:00 PM'],
                },
                type4: {
                    '2023-10-25': ['10:00 AM', '12:00 PM', '03:00 PM'],
                    '2023-09-29': ['09:00 AM', '01:00 PM', '04:00 PM'],
                    '2023-10-08': ['10:00 AM', '12:00 PM', '02:00 PM', '04:00 PM'],
                    '2023-10-28': ['11:00 AM', '01:00 PM', '03:00 PM'],
                },
                type5: {
                    '2023-09-29': ['09:00 AM', '12:00 PM', '03:00 PM'],
                    '2023-09-30': ['10:00 AM', '02:00 PM', '04:00 PM'],
                    '2023-10-10': ['09:00 AM', '12:00 PM', '03:00 PM'],
                    '2023-10-30': ['10:00 AM', '01:00 PM', '04:00 PM'],
                }

            };

            let selectedDateElement = null;

            const calendar = $('#calendar').fullCalendar({
                events: [],

                dayClick: function (date, jsEvent, view) {
                    const today = moment().startOf('day');
                    if (date.isBefore(today)) {
                        alert('Cannot select a date before today');
                        return;
                    }

                    if (selectedDateElement) {
                        selectedDateElement.removeClass('selected-column');
                    }

                    const cell = $(this);
                    selectedDateElement = cell;
                    selectedDateElement.addClass('selected-column');

                    const selectedDate = date.format();
                    displayTimeSlots(selectedDate);
                }
            });



            function renderCalendar() {
                const selectedConsultationType = $('#consultation-type-checker').val();
                const availableDates = availabilityData[selectedConsultationType];

                $('#calendar').fullCalendar('option', 'dayRender', function (date, cell) {
                    const formattedDate = date.utc().format('YYYY-MM-DD');

                    console.log("Formatted date: ", formattedDate);
                    console.log("Available dates data: ", availableDates);

                    const slots = availableDates && availableDates[formattedDate];
                    console.log("Slots data: ", slots);
                    console.log("Available dates keys: ", Object.keys(availableDates));

                    if (slots !== undefined) {
                        if (slots.length > 0) {
                            $(cell).addClass('has-slots');
                        } else {
                            $(cell).removeClass('has-slots');
                        }
                    } else {
                        $(cell).removeClass('has-slots');
                    }
                });

                $('#calendar').fullCalendar('rerenderEvents');
            }

            // Initial render of the calendar
            renderCalendar();

            // Setup an event listener for changes on the consultation type selector
            $('#consultation-type-checker').change(function () {
                renderCalendar(); // Re-render the calendar when consultation type changes
            });



            window.updateCalendarEvents = function () {
                $('#calendar').fullCalendar('refetchEvents');
            };

            window.displayTimeSlots = function (selectedDate) {
                const selectedConsultationType = $('#consultation-type-checker').val();
                const selectedConsultationText = $('#consultation-type-checker option:selected').text();
                const slots = availabilityData[selectedConsultationType][selectedDate];
                const timeSlotContainer = document.querySelector('.time-slot-container');

                timeSlotContainer.innerHTML = ''; // Clear previous content

                if (slots && slots.length > 0) {
                    slots.forEach(slot => {
                        const slotButton = document.createElement('button');
                        slotButton.innerText = slot;
                        slotButton.classList.add('btn', 'btn-primary');
			slotButton.style.marginRight = '10px';

                        slotButton.addEventListener('click', () => {
                            timeSlotContainer.innerHTML = ''; // Remove the time slot buttons

                            // Create and append the "Confirm" button
                            const confirmButton = document.createElement('button');
                            confirmButton.innerText = 'Confirm';
                            confirmButton.classList.add('btn', 'btn-primary');

                            // Add a click event listener to the "Confirm" button
                            confirmButton.addEventListener('click', () => {
                                $('#type').val(selectedConsultationText);
                                $('#date').val(selectedDate);
                                $('#time').val(slot); 
                            });

                            timeSlotContainer.appendChild(confirmButton);
                        });

                        timeSlotContainer.appendChild(slotButton);
                    });
                } else {
                    timeSlotContainer.innerText = 'This date is not available.';
                }
            };


        });


        document.addEventListener('DOMContentLoaded', (event) => {
            function selectConsultationTypeAndNavigate(typeValue) {
                $('#consultation-type-checker').val(typeValue).change();
                document.querySelector('#consultation-type-checker').value = typeValue;
                document.querySelector('#booking-section').scrollIntoView({ behavior: 'smooth' });
            }

            document.querySelector('#type1').addEventListener('click', () => selectConsultationTypeAndNavigate('type1'));
            document.querySelector('#type2').addEventListener('click', () => selectConsultationTypeAndNavigate('type2'));
            document.querySelector('#type3').addEventListener('click', () => selectConsultationTypeAndNavigate('type3'));
            document.querySelector('#type4').addEventListener('click', () => selectConsultationTypeAndNavigate('type4'));
            document.querySelector('#type5').addEventListener('click', () => selectConsultationTypeAndNavigate('type5'));
        });



        $(document).ready(function () {
            const imagesToPreload = [
                'free_consultation.jpeg',
                'divorce.jpeg',
                'family.jpeg',
                'coach.jpeg',
                'Relationship_Renewal.jpeg'
            ];

            let imagesLoaded = 0;

            imagesToPreload.forEach((src) => {
                const img = new Image();
                img.src = src;
                img.onload = () => {
                    imagesLoaded += 1;
                    if (imagesLoaded === imagesToPreload.length) {
                        $('#imageSlider').carousel({
                            interval: 2000,
                            wrap: true
                        });
                    }
                };
            });
        });

        function closeSuccessAlertAndProceed() {
            // window.location.href = "bookingInformation.php";
            document.getElementById('successAlert').style.display = 'none';
            var jump = $("#jumpIn").val();
            if(jump != ''){
                window.location.href=jump;
            }
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
        function checkForm(){
            // in this case I just valide whether type input is empty to determine because once the user
            // confirm the type, date and time, these three input will all be filled.            
            var type = document.querySelector('#type');            
            var typeVal = type.value;            
            if(typeVal == ''){                
                $('#alertTitle').text('fail');                
                $('#alertMessage').text('Please choose Consultation Type, Date and Time!');                
                $('#customAlert').show();    
                return false;            
            }            
            // var date = document.querySelector('#date');   
            // var dateVal = date.value;            
            // if(dateVal == ''){                
            //     $('#alertTitle').text('fail');                
            //     $('#alertMessage').text('Please choose Date!');                
            //     $('#customAlert').show();                   
            //     return false;            
            // }            
            // var time = document.querySelector('#time');   
            // var timeVal = time.value;            
            // if(timeVal == ''){                
            //     $('#alertTitle').text('fail');                
            //     $('#alertMessage').text('Please choose Time!');                
            //     $('#customAlert').show();                    
            //     return false;            
            // }   
            var reqdata = {"type":typeVal,"date":dateVal,"time":timeVal,'book_check_data':'chk'};   
            var flag = false;   
            $.ajax({    
                type: "POST",                
                url: "checkFormData.php",    
                async: false,                
                data: reqdata,                
                dataType: "json",                
                success: function (data) {      
                    if(data.code == 0){       
                        flag = true;      
                    }else{                            
                        $('#alertTitle').text('fail');                            
                        $('#alertMessage').text(data.msg);                            
                        $('#customAlert').show();      
                    }    
                },   
            });             
            return flag;        
        }
        

    </script>
    <input type='hidden' id="jumpIn" value='<?php if(isset($jump)) echo $jump;?>' /> 
    <?php require 'footer.php'; ?>

</body>
<?php if(isset($alert) && !empty($alert)):?>
    <script>
        $('#successMessage').text('<?php echo $alert;?>');
        $('#successAlert').show();
    </script>
<?php endif; ?>     
</html>
