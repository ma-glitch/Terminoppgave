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
    <title>Bot system Linje-5</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>

<body onload="close()">
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


    <h1 class="velkommen">Velkommen
        <?php echo ($_SESSION["navn"]); ?>!
    </h1>
    <div class="betal">
        <img src="Bilder/vipps-rgb-orange-pos.svg" height="100px" width="auto" onclick="betalbtn()">
    </div>
    <h1 id="betal">Vipps</h1>
    <script>
        function betalbtn() {
            console.log("test");
            document.getElementById("betal").style.display = "block";
        }
    </script>

    <table id="score">
        <tr>
            <th>Navn</th>
            <th>Total</th>
            <th>Total ubetalt</th>
        </tr>
        <?php
        // Define the SQL query to retrieve data from your table
        $sql = "SELECT navn, total, ubetalt FROM login ORDER BY CONVERT(total,INTEGER) DESC";

        // Execute the query
        $result = $link->query($sql);

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
            while ($row = mysqli_fetch_array($result)) {
                echo "<td>" . $row['SUM(total)'] . "</td>";
            }
            ?>
        </tr>
    </table>

    <script src="script.js"></script>
</body>

</html>