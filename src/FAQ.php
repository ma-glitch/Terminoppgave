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
        <div class="answer" id="q1">For å registrere en bruker må man først in på registrerings siden. For å komme til registreringssiden,</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q2')">
        <div class="question">Hvordan log in?</div>
        <div class="answer" id="q2">You can contact our customer support team through email at support@example.com.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q3')">
        <div class="question">Hvordan legge til bot?</div>
        <div class="answer" id="q3">You can contact our customer support team through email at support@example.com.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q4')">
        <div class="question">Hvordan endre Navn/Brukernavn/Passord?</div>
        <div class="answer" id="q4">You can contact our customer support team through email at support@example.com.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q5')">
        <div class="question">Hvordan betale bot?</div>
        <div class="answer" id="q5"></div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q6')">
        <div class="question">Hvordan endre total?</div>
        <div class="answer" id="q6"></div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q7')">
        <div class="question">Hvordan skaffe administrator retigheter?</div>
        <div class="answer" id="q7">Viss du trenger administrator retigheter på nettsiden må du kontakte vår support annsvarlig her: support@example.com</div>
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