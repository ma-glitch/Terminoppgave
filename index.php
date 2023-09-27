<?php


$result = $mysqli->query("SELECT login, martin FROM navn");
while($row = $result->fetch_assoc()) {
foreach ($row as $k=>$v) {
echo "$k : $v";
echo "<br>";
}
}
$mysqli->close();

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

<button class="open-button" onclick="openForm()">Login</button>

      <form action="/index.php" class="form-popup" id="myForm">
        <div class="form-container">
          <h1>Login</h1>
      
          <label for="email"><b>Brukernavn</b></label>
          <input id="bruker" type="text" placeholder="Skriv in Brukernavn" name="email" required>
      
          <label for="psw"><b>Passord</b></label>
          <input id="Passord"   type="password" placeholder="Skriv in Passord" name="psw" required>
      
          <button class="btn" onclick="login()">Login</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </div>
      </form>
      
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