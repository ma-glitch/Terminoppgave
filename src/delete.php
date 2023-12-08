<?php
session_start();
require_once "config.php";

$sql2 = "DELETE FROM login WHERE bruker = ?";
$stmt2 = $link->prepare($sql2);
$stmt2->bind_param("s", $_SESSION["bruker"]);

if ($stmt2->execute()) {
    $_SESSION = array(); 
    session_destroy();

   
    setcookie("bruker", "", time() - 3600 * 24 * 30, "/");
    setcookie("pass", "", time() - 3600 * 24 * 30, "/");
    
   
    header("location: index.php");
    exit();
} else {
    
    echo "Error: " . $stmt2->error;
}


$stmt2->close();


header("location: index.php");
exit();
?>
