
<?php
// Takes the api key and listID
$apiKey='';
$listId-'Mailchimp_List_ID';
$serverPrefix= substr($apiKey, strpos($apiKey, '_') +1); // The last part of Mailchimp API is the data center
// API endpoint
$apiEndpoint= "https://{$serverPrefix}.api.mailchimp.com/3.0/lists/{$listId}/members";

// Connects to the database
$connection = new mysqli('localhost', 'root','','project');
// Sends a SQL query and gets everything from project table
$query= "SELECT * FROM project";
$result= $connection-> query($query);
// Loops through the result and gets the email and name
while($row = $result-> fetch_assoc())
{
    $data = [
        'email_address' => $row['email'],
        'status' => 'subscribed', // or 'pending' if you want to send a confirmation email
        'merge_fields' => [
            'FNAME' => $row['name'],

            // Add other fields if necessary
        ]
    ];

    $json_data = json_encode($data);
    $ch = curl_init($apiEndpoint);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    $result = curl_exec($ch);
    $httpCode= curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // check and handle response 


}
 
$connection->close();
?>

 


