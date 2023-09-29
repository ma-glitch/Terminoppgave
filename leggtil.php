<?php
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>
    <ul class="topnav">
        <li><a href="index.php">Hjem</a></li>
        <li><a class="active" href="leggtil.php">Legg til</a></li>
    </ul>

    <div class="leggtil">
        <h1>Legg til bot</h1>
        <form action="process.php" method="post">
            Kina 25Kr: <input type="checkbox" name="kina" value="25"><br>
            Glemme drakt 500Kr <input type="checkbox" name="glemmeDrakt" value="500"><br>
            Glemme viktig utstyr 50Kr <input type="checkbox" name="glemmeViktig" value="50"><br>
            En håndspol 50Kr <input type="checkbox" name="haandspol" value="50"><br>

            <input type="submit" class="leggtilbtn">
        </form>


        <?php
        if (isset($_GET['botValue'])) {
            $botValue = $_GET['botValue'];
            echo "<div id='result'>Bot Verdi: $botValue</div>";
        
            $sql_update = "UPDATE login SET total = total + ".$botValue.", ubetalt = ubetalt + ".$botValue." WHERE bruker = '".$_SESSION["bruker"]."'";

            
            if ($stmt = $link->prepare($sql_update)) {
                // Execute the prepared statement
                if ($stmt->execute()) {
                    // Bind the result variable
               echo "Total and ubetalt values have been updated!";
                  
                }else {
                  echo "Error updating values. Please try again later.";
                }
                $stmt->close();
            }
          }
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>