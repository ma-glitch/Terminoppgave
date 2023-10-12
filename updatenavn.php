<?php
session_start();
require_once "config.php"; 

$id = $_POST['id'];
$navn = $_POST['navn'];

// Update the ubetalt field for the specific user
$sql = "UPDATE login SET navn='$navn' WHERE navn='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: admin.php");
    exit;
} else {
    echo "Error updating record: " . $link->error;
}
?>