<!DOCTYPE html>                     <!-- Define DOC type  -->

<html>
<body>
<?php
session_start(); //start PHP session 
//initialize variables for username, email and errors 
$username=""; 
$email="";
$errors=array();
$db= mysqli_connect('localhost', 'root','','project'); //connect to the DB using MySQLi ON LOCAL HOST 
//CHECK IF THE connection was successful 
if($db-> connect_error){
    die("Connection failed". $db->connect_error); //if there is an error end the script and display an error message 
}
$sql="SELECT id, username, email, img FROM users"; // fetch data from the users table 
$result= $db->query($sql);  //store the data in result 
//check if the results has more than 0 rows 
if($result -> num_rows > 0){
while($row= $result -> fetch_assoc()){ //fetch ecah row as an associative array and display data 
    print "<br> id: ". $row["id"]. "<br> - Name: ". $row["username"]. "<br> - Email: " . $row["email"] . "<br>";
    print "<img src=\"".$row["img"]."\">";

}

}else{
    print "0 results"; // diplay 0 results if no records is found 
}


$db->close(); //close connection to DB 


 
 ?> 
</body>
</html>