<?php
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>
<ul class="topnav">
        <li><a class="active" href="index.php">Hjem</a></li>
        <li><a href="leggtil.php">Legg til bot</a></li>
        <?php if (($_SESSION["admin"] == "yes")) {
            echo "<li><a href='admin.php'>Admin</a></li>";
        }
        ?>
    </ul>

    <div class="Profil-wrapper">
        <div class="Endreprofil">
            <div class="Profilinfo">
                <h5 class="headerinfo">Navn:</h5>
            <?php
            echo "<p>". $_SESSION["navn"] ."</p>";
            ?>
            </div>
            <div class="Profilinfo">
                <h5 class="headerinfo">Brukernavn:</h5>
            <?php
            echo "<p>". $_SESSION["bruker"] ."</p>";
            ?>
            </div>
            <div class="Profilinfo">
                <h5 class="headerinfo">Passord:</h5>
            <?php
            echo "<p>". $_SESSION["passord"] ."</p>";
            ?>
            </div>
        </div>
    </div>
</body>
</html>