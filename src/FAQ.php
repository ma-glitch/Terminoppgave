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
        <?php
        include "menu.php";
        ?>
        <li><a href="FAQ.php"><img src="assets\svg\circle-help-svgrepo-com.svg" class="menyiconAktiv" height="40px"
                    width="auto"></a></li>
    </ul>

    <h1 id="head">FAQ</h1>
    
    <div id="FAQ">
    
    <div class="faq-item" onclick="toggleAnswer('q1')">
        <div class="question"><h2>Hvordan registrere bruker?</div>
        <div class="answer" id="q1">This FAQ page provides answers to frequently asked questions about our services.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q2')">
        <div class="question"><h2>Hvordan log in?</div>
        <div class="answer" id="q2">You can contact our customer support team through email at support@example.com.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q3')">
        <div class="question"><h2>Hvordan legge til bot?</div>
        <div class="answer" id="q3">You can contact our customer support team through email at support@example.com.</div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q4')">
        <div class="question"><h2>Hvordan endre Navn?</div>
        <div class="answer" id="q4">You can contact our customer support team through email at support@example.com.</div>
    </div>

</div>
    <!-- Add more FAQ items as needed -->

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