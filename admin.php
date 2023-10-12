<?php
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(!isset($_SESSION["admin"]) || $_SESSION["admin"] !== "yes"){
  header("location: index.php");
  echo("du er ikke admin");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot system Linje-5</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>

    <ul class="topnav">
        <li><a  href="index.php">Hjem</a></li>
        <li><a href="leggtil.php">Legg til</a></li>
        <li><a class="active" href="admin.php">Admin</a></li>
      </ul>
      <h1 class="velkommen">Velkommen administrator <?php echo($_SESSION["navn"]);?>!</h1>
      
      <div>
        <button onclick="opptnavn()">Oppdater navn</button>
        <button onclick="oppttotal()">Oppdater total</button>
        <button onclick="opptubetalt()">Oppdater ubetalt</button>
      </div>

      <table id="score">
        <tr>
          <th class="TABLE">Navn</th>
          <th class="TABLE">Total</th>
          <th class="TABLE">Total ubetalt</th>
          <th class="TABLE">Leggtil/Fjerne bot</td>
        </tr>
        <?php
        // Define the SQL query to retrieve data from your table
        $sql = "SELECT navn, total, ubetalt FROM login ORDER BY CONVERT(total,INTEGER) DESC";

        // Execute the query
        $result = $link -> query($sql);
        
        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='TABEL'>" . $row["navn"] . "</td>";
                echo "<td class='TABEL'>" . $row["total"] . "</td>";
                echo "<td class='TABEL'>" . $row["ubetalt"] . "</td>";
                echo "<td class='TABEL'><form method='post' action='update.php' class='updateform'>
                <input type='hidden' name='id' value='" . $row["navn"] . "'>
                <input type='number' name='ubetalt' placeholder='" . $row["ubetalt"] . "'>
                <input type='submit' name='submit' value='Oppdater' id='sumbit' class='oppdaterbtn'>
                </form>
                <form method='post' action='updatetotal.php' class='updateform2'>
                <input type='hidden' name='id2' value='" . $row["navn"] . "'>
                <input type='number' name='total' placeholder='" . $row["total"] . "'>
                <input type='submit' name='submit2' value='Oppdater' id='' class='oppdaterbtn'>
                </form>
                <form method='post' action='updatenavn.php' class='updateform3'>
                <input type='hidden' name='id3' value='" . $row["navn"] . "'>
                <input type='text' name='navn' placeholder='" . $row["navn"] . "'>
                <input type='submit' name='submit3' value='Oppdater' id='' class='oppdaterbtn'>
                </form></td>";
                echo "</tr>";
        // Close the MySQLi connectio
            }
          }
        ?>
        <tr>
          <th>Total</th>
          <?php 
          $count = "SELECT SUM(total) FROM login";
          $result = $link->query($count);
          //display data on web page
          while($row = mysqli_fetch_array($result)){
              echo "<td>". $row['SUM(total)']. "</td>";
          }
         ?>
         </tr>
      </table>

<script>

function opptnavn{
  document.querySelectorAll(".login").forEach(a=>a.style.display = "none");
}

</script>
</body>
</html>
