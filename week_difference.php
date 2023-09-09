 <?php

// Get the current date
$current_date = date("Y-m-d");

// Extract only the date part from the registration date
$registration_date = new DateTime($registration_date);
$registration_date = $registration_date->format('Y-m-d');
echo $registration_date;
// Get the current date in the same format
$current_date = new DateTime($current_date);
$current_date = $current_date->format('Y-m-d');

// Calculate the difference in weeks
$registration_date = new DateTime($registration_date);
$current_date = new DateTime($current_date);
$interval = $current_date->diff($registration_date);

$weeks_difference = floor($interval->days / 7);

echo "Weeks Difference: " . $weeks_difference;


$weeks_difference = floor($interval->days / 7);
    
?>