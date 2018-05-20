<?php
$servername = "localhost";
$username = "root";
$password = "lawyer";

// Create connection
$conn = new mysqli($servername, $username, $password,"machenzie");

// Check connection
if ($conn->connect_error) {
    die("Connection failed with database,contact administrator,please");
} 


?>