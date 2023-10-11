<?php

require_once "config.php"; 

$id = $row['navn'];
$ubetalt = $row['ubetalt'];

// Update the ubetalt field for the specific user
$sql = "UPDATE login SET ubetalt='$ubetalt' WHERE navn='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: admin.php");
    exit;
} else {
    echo "Error updating record: " . $link->error;
}
?>