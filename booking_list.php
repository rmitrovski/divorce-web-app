<?php 
include('server.php');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  } else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $registration_date = $_SESSION['registration_date'];
    $userid = $_SESSION['userid'];
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  $data = booklist($db,$userid);
  
?>
 <!DOCTYPE html>
<html lang="en" title="Coding design">

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
          if(!empty($data)):
          $i = 1;
            foreach($data as $row):	
          ?>
          <tr>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->phone;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php echo $row->type;?></td>
            <td><?php echo $row->date;?></td>
			      <td><?php echo $row->time;?></td>
			      <td><?php echo $row->reason;?></td>
          </tr>
          <?php 
					$i++;
				endforeach;
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