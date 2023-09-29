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
        <form action="leggtil.php" method="post">
        Kina 25Kr: <input type="checkbox" name="kina"><br>
        Glemme drakt 500Kr <input type="checkbox" name="glemmeDrakt"><br>
        Glemme viktig utstyr 50Kr <input type="checkbox" name="glemmeViktig"><br>
        En håndspol 50Kr <input type="checkbox" name="haandspol"><br>

<?php if ($_POST["kina"] = "off") {
  echo "no";
}
if ($_GET["glemmeDrakt"] = "off") {
  echo "no";
}
if ($_POST["glemmeViktig"] = "on") {
  echo "Yes";
}
if ($_GET["haandspol"] = "on") {
  echo "Yes";
}?>
<input type="submit" class="leggtilbtn"> 
      </form>  
 
<!--        <h1 class="lagttil">Lagt til, Når du har betalt kommer den ubatalte boten din til a bli borte!</h1>-->
      </div>
      <script src="script.js"></script>
</body>
</html>

<?php


function leggTilBot() {
/*
$kinaVerdi = 0
$glemmeDraktVerdi = 0
$glemmeViktgVerdi = 0
$haandspolVerdi = 0

if ($_POST["kina"] = "on") {
  $kinaVerdi = 25; 
}
if ($_POST["glemmeDrakt"] = "on") {
  $glemmeDraktVerdi = 500
}
if ($_POST["glemmeViktig"] = "on") {
  $glemmeViktgVerdi = 50
}
if ($_POST["haandspol"] = "on") {
  $haandspolVerdi = 50
}

$leggeTilVerdi = $kinaVerdi + $glemmeDraktVerdi + $glemmeViktgVerdi + $haandspolVerdi

echo $leggeTilVerdi
*/
}

?>
