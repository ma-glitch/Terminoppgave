<?php
/*if (function_exists('mysqli_connect')) {
  echo "MySQLi is enabled.";
} else {
  echo "MySQLi is not enabled.";
}*/



$servername = "localhost";
$username = "root";
$password = "Admin";
$dbname = "BotDB";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>