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
    <title>Bot system Linje-5</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>
    <ul class="topnav">
        <li><a class="active" href="index.php">Hjem</a></li>
        <li><a href="leggtil.php">Legg til</a></li>
<?php if(($_SESSION["admin"] == "yes")){
    echo "<li><a href='admin.php'>Admin</a></li>";
}
    ?>
      </ul>

      
      <h1 class="velkommen">Velkommen <?php echo($_SESSION["navn"]);?>!</h1>

      <button class="betalebtn" onclick="betalbtn()">Betale Bot</button>

      <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>

      <table id="score">
        <tr>
          <th>Navn</th>
          <th>Total</th>
          <th>Total ubetalt</th>
        </tr>
        <?php
        // Define the SQL query to retrieve data from your table
        $sql = "SELECT navn, total, ubetalt FROM login ORDER BY total DESC";

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
        <tr>
          <th>Total</th>
          <?php 
          $count = "SELECT SUM(total) FROM login";
          $result = $link->query($count);
          //display data on web page
          while($row = mysqli_fetch_array($result)){
              echo "<td>". $row['SUM(weight)']. "</td>";
          }
         ?>
      </table>

    <script src="script.js"></script>
</body>
</html>