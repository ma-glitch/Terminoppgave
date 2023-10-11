<?php

require_once "config.php"; 

$id = $_POST['id'];
$ubetalt = $_POST['ubetalt'];

// Update the ubetalt field for the specific user
$sql = "UPDATE login SET ubetalt='$ubetalt' WHERE id='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}
?>