<?php
$servername = "localhost";
$username = "root";
$password = "Admin";
$dbname = "BotDB";

// Create connection
$link = new mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>