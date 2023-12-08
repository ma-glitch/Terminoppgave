<?php session_start();

require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bot system Linje-5</title>
    <?php
    include "css.php";
    ?>
    <link rel="icon" type="image/x-icon" href="assets/jpg/linje5.jpg">
</head>
<body>
<ul class="topnav">
        <li><a href="index.php"><img src="assets\svg\house-03-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="leggtil.php"><img src="assets\svg\file-add-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="profil.php"><img src="assets\svg\user-01-svgrepo-com.svg" class="menyicon" height="40px"
                    width="auto"></a></li>
        <li><a href="FAQ.php"><img src="assets\svg\circle-help-svgrepo-com.svg" class="menyiconAktiv" height="40px"
                    width="auto"></a></li>

    </ul>

    <h1 id="head">FAQ</h1>
    
    <div id="FAQ">
    
    <div class="faq-item" onclick="toggleAnswer('q1')">
        <div class="question">Hvordan registrere bruker?</div>
        <div class="answer" id="q1"><h3>For å registrere en bruker må man først in på registrerings siden. 
            For å komme til registeringssiden, når du er inne på log in siden. Nede i hjørne av log in 
            siden til høyre for FAQ lenken står det "registrering". Trykk på "Registrering. Når du har 
            kommet inn på registerings siden vil du se fire felter, fyll ut disse feltene med navn 
            brukernavn og passord som du ønsker å bruke. Etter å ha fylt ut alle fire feltene 
            trykker du på "Registrer". Nå har du blitt registrert.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q2')">
        <div class="question">Hvordan log in?</div>
        <div class="answer" id="q2"><h3>På login siden bruk brukernavnet og passordet du valgte i 
            registreringen og fyller det inn i feltene og trykk på "login". Du blir nå sent til 
            hjemmesiden.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q3')">
        <div class="question">Hvordan legge til bot?</div>
        <div class="answer" id="q3"><h3>Får å legge til bot må du være på botsiden. For å komme til botsiden 
            trykker du på legg til ikonet i toppmenyen, andre fra venstre. Når du er inne på bot siden vill du se 
            forskjellige bokser, vær boks er en spesifikk bot. Velg de/den boten du skal legge til ved å trykke 
            på dem, de får en blå linje rund når de er valgt. Når du har valgt alle bøtene du ønsker å legge 
            til trykker du på den blå "legg til" knappen.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q4')">
        <div class="question">Hvordan endre Navn/Brukernavn/Passord?</div>
        <div class="answer" id="q4"><h3>Får å endre navn, brukernavn eller passord må du inn på profil siden. 
            Trykk på profil ikonet i toppmenyen, tredje fra venstre. Når du er inne på profil siden vill 
            du se tre rader nedover. Den første raden er for navn, andre for brukernavn og siste for passord.
            Får å endre navn går du til raden Navn og putter in det nye navne i boksen til høyre. 
            Etter å ha puttet in den nye navnet trykker du på knappen til høyre for boksen. For å ende 
            brukernavn eller passord gjør du det samme, men i brukernavn eller passord raden.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q5')">
        <div class="question">Hvordan betale bot?</div>
        <div class="answer" id="q5"><h3>Når du ønsker å betale bot går du til hjemmesiden. På toppen av siden 
            under menyen finner du et kort. Hold musen over for å snu korte. (Holde inn/trykke på mobil) 
            På baksiden ser du et telefonnummer, vipps den mengden av din totale utbetale som du ønsker å betale 
            og skriv i vipps sammen med pengene at du betaler bot.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q6')">
        <div class="question">Hvordan endre total/ubetalt?</div>
        <div class="answer" id="q6"><h3>Ønsker du å fjerne/endre total/ubetalt må du kontakte en av nettsidens 
            administratorer.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q7')">
        <div class="question">Hvordan skaffe administrator retigheter?</div>
        <div class="answer" id="q7"><h3>Hvis du trenger administrator rettigheter på nettsiden må du kontakte 
            vår support ansvarlig her: support@example.com</div>
    </div>


</div>

    <script>
        function toggleAnswer(questionId) {
            var answer = document.getElementById(questionId);
            var allAnswers = document.querySelectorAll('.answer');
            
            // Close all other answers
            allAnswers.forEach(function(item) {
                if (item.id !== questionId) {
                    item.style.display = 'none';
                }
            });

            // Toggle the clicked answer
            if (answer.style.display === 'none') {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        }
    </script>
</body>
</html>