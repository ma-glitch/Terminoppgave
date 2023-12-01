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
    <link rel="icon" type="image/x-icon" href="Bilder/linje5.jpg">
</head>

<body>
<ul class="topnav">
        <li><a href="index.php"><img src="Bilder/house-03-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="leggtil.php"><img src="Bilder/file-add-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="profil.php"><img src="Bilder/user-01-svgrepo-com.svg" class="menyiconAktiv" height="40px"
                    width="auto"></a></li>
        <?php
        include "menu.php";
        ?>
    </ul>

    <?php

    if (isset($_POST['Endrenavn'])) {
        $id = $_SESSION['navn'];
        $navn = $_POST['navn'];

        // Update the ubetalt field for the specific user
        $sql = "UPDATE login SET navn='$navn' WHERE navn='$id'";

        if ($link->query($sql) === TRUE) {
            $_SESSION['navn'] = $navn;
            header("refresh: 1;");
        }
    }
    if (isset($_POST['Endrebruker'])) {
        $id = $_SESSION['bruker'];
        $bruker = $_POST['bruker'];

        // Update the ubetalt field for the specific user
        $sql = "UPDATE login SET bruker='$bruker' WHERE bruker='$id'";

        if ($link->query($sql) === TRUE) {
            $_SESSION['bruker'] = $bruker;
            header("refresh: 1;");
        }
    }
    if (isset($_POST['Endrepassord'])) {
        $id = $_SESSION['passord'];
        $passord = $_POST['passord'];

        // Update the ubetalt field for the specific user
        $sql = "UPDATE login SET passord='$passord' WHERE passord='$id'";

        if ($link->query($sql) === TRUE) {
            $_SESSION['passord'] = $passord;
            header("refresh: 1;");
        }
    }
    ?>
    <div class="Profil-wrapper">
        <div class="Endreprofil">
            <table id="endretable">
                <tr>
                    <td class="headerinfo">Navn:</td>
                    <?php
                    echo "<form action='' method='post'>";
                    echo "<td class='headerinfo'><input type='text' name='navn' placeholder='" . $_SESSION["navn"] . "'></td>";
                    echo "<td><input type='submit' name='Endrenavn' value='Endre navn' id='sumbit' class='profilbtn'></td>";
                    echo "</form>";
                    ?>
                </tr>
                <tr>
                    <td class="headerinfo">Brukernavn:</td>
                    <?php
                    echo "<form action='' method='post'>";
                    echo "<td class='headerinfo'><input type='text' name='bruker' placeholder='" . $_SESSION["bruker"] . "'></td>";
                    echo "<td><input type='submit' name='Endrebruker' value='Endre Brukernavn' id='sumbit' class='profilbtn'></td>";
                    echo "</form>";
                    ?>
                </tr>
                <tr>
                    <td class="headerinfo">Passord:</td>
                    <?php
                    echo "<form action='' method='post'>";
                    echo "<td class='headerinfo' ><input type='text' name='passord' placeholder='" . $_SESSION["passord"] . "'></td>";
                    echo "<td><input type='submit' name='Endrepassord' value='Endre passord' id='sumbit' class='profilbtn'></td>";
                    echo "</form>";
                    ?>
                </tr>
            </table>
        </div>
    </div>
    <div id="logutDIV">
        <a href="logut.php" ><button id="logutbtn">Log ut</button></a>
        <a href="delete.php" ><button id="logutbtn">Slett bruker</button></a>
    </div>
</body>
</html>