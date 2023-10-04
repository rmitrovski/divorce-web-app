<?php
// Logs user out and destroys the session redirecting the user to the login.php page
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>