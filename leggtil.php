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
<!--

        <label class="container">Glemme viktig utstyr 50Kr
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <label class="container">En håndspol 50Kr
          <input type="checkbox">
          <span class="checkmark"></span>
        </label> 
-->
<input type="submit">
      </form>        
      <button class="leggtilbtn" >Legg til</button>  
        <h1 class="lagttil">Lagt til, Når du har betalt kommer den ubatalte boten din til a bli borte!</h1>
      </div>
      <script src="script.js"></script>
</body>
</html>

<?php
  echo $_POST["kina"];
function leggTilBot() {


}
?>
