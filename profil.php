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
        <li><a href="index.php"><img src="house-03-svgrepo-com.svg" height="40px" width="auto"></a></li>
        <li><a href="leggtil.php"><img src="file-add-svgrepo-com.svg" height="40px" width="auto"></a></li>
        <li><a href="profil.php"><img src="user-01-svgrepo-com.svg" height="40px" width="auto"></a></li> 
        <?php if (($_SESSION["admin"] == "yes")) {
            echo "<li><a href='admin.php'><img src='file-edit-svgrepo-com.svg' height='40px' width='auto'></a></li>";
        }
        ?>
    </ul>

    <div class="Profil-wrapper">
        <div class="Endreprofil">
                <table class="endretable"> 
                    <tr>
                        <td class="headerinfo">Navn:</td>
                        <?php
                        echo "<td><input type='text' name='' placeholder='" . $_SESSION["navn"] . "'></td>";
                        echo "<td><input type='submit' name='submit' value='' id='sumbit' class='oppdaterbtn'></td>"
                        ?>
                    </tr>
                    <tr>
                        <td class="headerinfo">Brukernavn:</td>
                        <?php
                        echo "<td class='subinfo'>". $_SESSION["bruker"] ."</td>";
                        ?>
                    </tr>
                    <tr>
                        <td class="headerinfo">Passord:</td>
                        <?php
                        echo "<td class='subinfo'>". $_SESSION["passord"] ."</td>";
                        ?>
                    </tr>
                </table>
        </div>
    </div>
</body>
</html>