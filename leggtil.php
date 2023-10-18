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
    <title>leggtil</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>

<body>
    <ul class="topnav">
        <li><a href="index.php"><img src="Bilder/house-03-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="leggtil.php"><img src="Bilder/file-add-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="profil.php"><img src="Bilder/user-01-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <?php
        include "menu.php";
        ?>
    </ul>

    <h1 class="velkommen">Velkommen </h1>
    <div class="leggtil">
        <h1>Legg til bot</h1>
        <form action="process.php" method="post" id="BotOversikt">
            Kina 25Kr <input class="Check" type="checkbox" name="kina" value="25"><br>
            Glemme drakt 500Kr <input class="Check" type="checkbox" name="glemmeDrakt" value="500"><br>
            Glemme viktig utstyr 50Kr <input class="Check" type="checkbox" name="glemmeViktig" value="50"><br>
            En håndspol 50Kr <input class="Check" type="checkbox" name="haandspol" value="50"><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>
            <input class="Check" type="checkbox" name="" value=""><br>


            <input type="submit" class="leggtilbtn">
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>