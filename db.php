<?php
$servername = "localhost";
$username = "sachitha";
$password = "password2018";
$dbname = "id5556232_icd";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{ 
//echo "Connected successfully";
}
//$conn->close();
?>