<?php
session_start();
require_once "config.php"; 

$id = $_POST['id2'];
$total = $_POST['total'];

// Update the ubetalt field for the specific user
$sql = "UPDATE login SET total='$total' WHERE navn='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: admin.php");
    exit;
} else {
    echo "Error updating record: " . $link->error;
}
?>