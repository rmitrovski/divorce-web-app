<?php
// Includes server.php file which has the fuinctions related to handling the interactions with the database
include('server.php');
// Check if the user is logged in, if not redirect to login.php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} else {
    // Retrieve user information from the session
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $registration_date = $_SESSION['registration_date'];
    $userid = $_SESSION['userid'];
}

// If user clicks on 'logout', it ends the session and sends the user back to the login page
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
// Fetches the booking data
$data = booklist($db, $username);
?>

 <!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking List</title>
    <link rel="stylesheet" href="css/booking_list.css">
</head>

<body>
<img src="images/html_table.jpeg" id="bgImage">
    <main class="table">
        <section class="table__header">
            <h1>Client Bookings</h1>
        </section>
        <div id="result">
        <section class="table__body">
        <table class="table table-striped">
        <!-- Table header -->
            <table>
                <thead>
                    <tr>
                        <th> name </th>
                        <th> Phone number </th>
                        <th> Email </th>
                        <th> Consultation type </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Consultation Purpose </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     // Check if there is data to display
                    if (!empty($data)):
                        foreach ($data as $row):
                    ?>
                    <!-- Row of data -->
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->type; ?></td>
                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->time; ?></td>
                        <td><?php echo $row->reason; ?></td>
                    </tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                    <tr>
                        <!-- If there is no data to display it displays this message -->
                        <td colspan="7">No bookings found.</td>
                    </tr>
                    <?php
                    endif;
                    ?>
                </tbody>

        </table>	
    </div>
                
           
            </table>
        </section>
    </main>
</body>

</html>