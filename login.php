<?php
$servername = "localhost";
$username = "root";
$password = "Admin";
$dbname = "BotDB";

// Create connection
$conn =mysql_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>