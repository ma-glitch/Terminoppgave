<?php
// Initialize the session
session_start();
 
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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body onload="displaymembers()">
    <ul class="topnav">
        <li><a class="active" href="index.html">Hjem</a></li>
        <li><a href="leggtil.html">Legg til</a></li>
      </ul>

      
      <h1 class="velkommen">velkommen Martin tangen!</h1>

      <button class="betalebtn" onclick="betalbtn()">Betale Bot</button>
      <h1 id="betal">Vipps til dette Nummeret:  2134214. NB husk a skrive at du betaler bot.</h1>

      <table id="score">
        <tr>
          <th>Navn</th>
          <th>Total</th>
          <th>Total ubetalt</th>
        </tr>
        <tr>
          <td>Alfreds Futterkiste</td>
          <td>2000 Kr</td>
          <td>400 Kr</td>
        </tr>
      </table>

    <script src="script.js"></script>
</body>
</html>