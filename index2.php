
<?php include('week_difference.php'); ?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/dashboard.css" rel="stylesheet" media="all">
<style>
.card {
  width: 350px;
  height: 200px;
  background-color: #3498db;
  border-radius: 30px;
  padding: 20px;
  box-sizing: border-box;
  color: #fff;
  position: absolute;
  top: 15%;
  left: 80%;
}

.button {
  text-align: center;
  margin-top: 20px;
}

.button a {
  text-decoration: none;
}

.button button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.button button:hover {
  background-color: #45a049;
}

</style>
</head>
<body>

  <div class="card">
    <?php if ($weeks_difference == 0) {
      echo "Welcome to the 8 week system,";
      echo "next week you will begin an 8 week journey through our program to help you with divorce.";
      echo "Click the button below to get started!"; ?>
      <div class="button">
        <a href="./week_system.php">
          <button>Get Started</button>
        </a>
      </div> 
    <?php
    } else if ($weeks_difference <= 8) {
      echo "Welcome to the 8 week system,";
      echo "you are currently on week: ". $weeks_difference;
      echo " Click the button below to view your progress!"; ?>
      <div class="button">
        <a href="./week_system.php">
          <button>View Progress</button>
        </a>
      </div> 
    <?php
    } else {
      echo "Congratulations! ";
      echo "You have completed the 8-week system. Well done!";
	  echo " Click the button below to review it!"; ?>
      <div class="button">
        <a href="./week_system.php">
          <button>Review</button>
        </a>
      </div> 
    <?php
    }
    ?>
  </div> 
</body>
</html>
