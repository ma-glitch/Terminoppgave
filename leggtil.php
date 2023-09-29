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
        Kina 25Kr: <input type="text" name="kina"><br>
        Glemme drakt 500Kr <input type="checkbox" name="glemmeDrakt"><br>
        Glemme viktig utstyr 50Kr <input type="checkbox" name="glemmeViktig"><br>
        En håndspol 50Kr <input type="checkbox" name="haandspol">

<input type="submit" class="leggtilbtn"> 
      </form>  
Test <?php echo $_POST["kina"]; ?><br>
Test2 <?php echo $_POST["glemmeDrakt"] ?><br>   
      
 
        <h1 class="lagttil">Lagt til, Når du har betalt kommer den ubatalte boten din til a bli borte!</h1>
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

$leggeTilVerdi = $kinaVerdi + $glemmeDraktVerdi + $glemmeViktgVerdi + $haandspolVerdi
*/
}
?>
