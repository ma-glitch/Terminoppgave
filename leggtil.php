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
        Kina 25Kr: <input type="checkbox" name="kina" value="25" ><br>
        Glemme drakt 500Kr <input type="checkbox" name="glemmeDrakt" value="500"><br>
        Glemme viktig utstyr 50Kr <input type="checkbox" name="glemmeViktig" value="50"><br>
        En håndspol 50Kr <input type="checkbox" name="haandspol" value="50"><br>


<input type="submit" class="leggtilbtn"> 
      </form>  
      <button class="leggtilbtn" onclick="leggTilBot()"></button>
 
<!--        <h1 class="lagttil">Lagt til, Når du har betalt kommer den ubatalte boten din til a bli borte!</h1>-->
      </div>
      <script src="script.js"></script>
</body>
</html>

<?php



function leggTilBot() {
  $kinaVerdi = 0;
  $glemmeDraktVerdi = 0;
  $glemmeViktgVerd = 0;
  $haandspolVerdi = 0;

if ($_POST["kina"] = "25") {
  $kinaVerdi = 25 ;
}
if ($_POST["glemmeDrakt"] = "500") {
  $glemmeDraktVerdi = 500 ;
}
if ($_POST["glemmeViktig"] = "50") {
  $glemmeViktgVerdi = 50 ;
}
if ($_POST["haandspol"] = "50") {
  $haandspolVerdi = 50 ;
}


$botVerdi = $kinaVerdi + $glemmeDraktVerdi + $glemmeViktgVerdi + $haandspolVerdi;

echo $botVerdi;

}

?>
