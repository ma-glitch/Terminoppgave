<?php
session_start();
require_once "config.php";
// se om brukeren er koblet til og sende han til log in siden hvis han ikke er det.
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
    <title>leggtil</title>
    <?php
    include "css.php";
    ?>
    <link rel="icon" type="image/x-icon" href="assets/jpg/linje5.jpg">
</head>

<body>
    <ul class="topnav">
        <li><a href="index.php"><img src="assets/svg/house-03-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="leggtil.php"><img src="assets/svg/file-add-svgrepo-com.svg" class="menyiconAktiv" height="40px"
                    width="auto"></a></li>
        <li><a href="profil.php"><img src="assets/svg/user-01-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="FAQ.php"><img src="assets\svg\circle-help-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <?php
        include "menu.php";
        ?>
        
    </ul>







 <!-- her lagger man formen for å legge til bot -->
        <form action="process.php" method="post" id="BotOversikt">

        <h1 class="leggtilover">Legg til bot</h1>

<div class="leggtil">
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="glemmeDrakt" value="500"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>500</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">Glemme drakt</span>
                </span>
              </label>
            </div>
            
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="kina" value="25"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>25</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">Kina</span>
                </span>
              </label>
            </div>
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="glemmeViktig" value="50"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>50</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">Glemme utstyr</span>
                </span>
              </label>
            </div>
            
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="haandspol" value="50"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>50</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">En Håndspol</span>
                </span>
              </label>
            </div>
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="kina" value="25"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>25</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">Kina</span>
                </span>
              </label>
            </div>
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="haandspol" value="50"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>50</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">En Håndspol</span>
                </span>
              </label>
            </div>
            
            <div class="checkbox-wrapper-16">
              <label class="checkbox-wrapper">
                <input type="checkbox" class="checkbox-input" name="Draktgulv" value="500"/>
                <span class="checkbox-tile">
                  <span class="checkbox-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" viewBox="0 0 256 256">
                      <rect width="auto" height="auto" fill="none" />
                      <foreignobject x="0" y="0" width="200" height="200">
                        <h1>500</h1>
                      </foreignobject>
                    </svg>
                  </span>
                  <span class="checkbox-label">Drakt på gulvet</span>
                </span>
              </label>
            </div>
            
</div>
            <input type="submit" class="leggtilbtn" value="Legg til">
        </form>

    <script src="script.js"></script>
</body>

</html>