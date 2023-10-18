<?php
session_start();
require_once "config.php"; 

if(isset($_POST['submit'])) { 
    $id = $_POST['id'];
    $ubetalt = $_POST['ubetalt'];

// Update the ubetalt field for the specific user
$sql = "UPDATE login SET ubetalt='$ubetalt' WHERE navn='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: admin.php");
    exit;
} else {
    echo "Error updating record: " . $link->error;
}
} else if(isset($_POST['submit2'])) {
    $id = $_POST['id3'];
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
} else if(isset($_POST['sumbit3'])) {
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
}
?>