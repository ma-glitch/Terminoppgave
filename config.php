<?php
if (function_exists('mysqli_connect')) {
  echo "MySQLi is enabled.";
} else {
  echo "MySQLi is not enabled.";
}



$servername = "10.200.1.117";
$username = "Linje5";
$password = "Enzo";
$dbname = "BotDB";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}

?>