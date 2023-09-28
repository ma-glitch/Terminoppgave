<?php
 
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Terminoppgave/login.php");
    exit;
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot system Linje-5</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body onload="displaymembers()">
    <ul class="topnav">
        <li><a class="active" href="Terminoppgave/index.php">Hjem</a></li>
        <li><a href="Terminoppgave/leggtil.php">Legg til</a></li>
      </ul>

      
      <h1 class="velkommen">Velkommen Martin tangen!</h1>

      <button class="betalebtn" onclick="betalbtn()">Betale Bot</button>
      <h1 id="betal">Vipps til dette Nummeret:  2134214. NB husk a skrive at du betaler bot.</h1>

      <table id="score">
        <tr>
          <th>Navn</th>
          <th>Total</th>
          <th>Total ubetalt</th>
        </tr>
        <?php
        // Define the SQL query to retrieve data from your table
        $sql = "SELECT navn, total, ubetalt FROM login";

        // Execute the query
        $result = $link -> query($sql);
        
        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["navn"] . "</td>";
                echo "<td>" . $row["total"] . "</td>";
                echo "<td>" . $row["ubetalt"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

        // Close the MySQLi connectio
        ?>
      </table>

    <script src="Terminoppgave/script.js"></script>
</body>
</html>