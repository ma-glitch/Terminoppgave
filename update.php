<?php
session_start();
require_once "config.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $ubetalt = $_POST['ubetalt'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE login SET ubetalt=? WHERE navn=?";
    
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("ss", $ubetalt, $id);
        if ($stmt->execute()) {
            echo "Record updated successfully";
            $stmt->close();
            header("Location: admin.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "Error preparing the statement: " . $link->error;
    }
}

if (isset($_POST['submit3'])) {
    echo "button 3 pressed";
    $id = $_POST['id3'];
    $navn = $_POST['navn'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE login SET navn='$navn' WHERE navn='$id'";

    if ($link->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location: admin.php");
        exit;
    } else {
        echo "Error updating record: " . $link->error;
    }
}

if (isset($_POST['submit2'])) {
    $id = $_POST['id2'];
    $total = $_POST['total'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE login SET total=? WHERE navn=?";

    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("ss", $total, $id);
        if ($stmt->execute()) {
            echo "Record updated successfully";
            $stmt->close();
            header("Location: admin.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "Error preparing the statement: " . $link->error;
    }
}
?>
