<?php
require_once "config.php";

if (($_SESSION["admin"] == "yes")) {
            echo "<li><a href='admin.php'><img src='Bilder/file-edit-svgrepo-com.svg' class='menyicon' height='40px' width='auto'></a></li>";
}
?>