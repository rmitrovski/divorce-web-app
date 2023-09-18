<?php 
include('server.php');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  } else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $registration_date = $_SESSION['registration_date'];
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  $data = booklist($db);
  
?>

<?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/week_difference.css">

<script src="WeekDifferentCalculator.js"></script>
<style>
body {
  font-family: Arial, sans-serif;
  padding-top: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 1000px;
  width: 50%;
  margin-left: 300px;
  margin-right: 400px;
}

h1 {
  text-align: center;
  
}

.outer {
  background-color: rgb(255,255,255);
  color: rgb(0, 0, 0);
  padding: 30px;
  margin: auto;
  border-radius: 10px;
  box-shadow: 0 0 5px 1px lightgrey;
  width: 800px;
  height: 1800px;
  
  
}

.outer h1 {
  margin-top: 10px;
  margin-bottom: 40px;
  color: black;
 
  
}

.outer p {
  margin: 10px 0;
}

.outer a {
  margin-top: 20px;
  color: rgb(4, 4, 4);
  text-decoration: none;
  font-size: 18px;
  
}
</style>
<div class="outer" style="width:900px;">
  <h1>Book List</h1>
<div class="container">
<main>
    <div id="result">
		<table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col"> Email Address</th>
			      <th scope="col"> Consultation Type</th>
			      <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col"> Purpose Of Consultation</th>
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
	
  </main>
</div>
<div class="custom-box">
  <script>
    var registrationDate = "<?php echo $registration_date; ?>";
    var weeksDifference = calculateWeeksDifference(registrationDate);

    if (weeksDifference < 8) {
      document.write('<p>Welcome to the 8 week system,</p>');
      document.write('<p>You are currently on week: ' + (weeksDifference + 1) + '</p>');
      document.write('<p>Click the button below to view your progress!</p>');
      document.write('<div class="button">');
      document.write('<a href="./week_system.php"><button>View Progress</button></a>');
      document.write('</div>');
    } else {
      document.write('<p>Congratulations!</p>');
      document.write('<p>You have completed the 8-week system. Well done!</p>');
      document.write('<p>Click the button below to review it!</p>');
      document.write('<div class="button">');
      document.write('<a href="./week_system.php"><button>Review</button></a>');
      document.write('</div>');
    }
  </script>
</div>

