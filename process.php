<?php

function calculateBotValue() {
    $values = [
        "kina" => 25,
        "glemmeDrakt" => 500,
        "glemmeViktig" => 50,
        "haandspol" => 50,
        // Add more values here if needed
    ];

    $botVerdi = 0;

    foreach ($values as $key => $value) {
        if (isset($_POST[$key]) && $_POST[$key] === (string) $value) {
            $botVerdi += $value;
        }
    }

    return $botVerdi;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $botValue = calculateBotValue();
    header("Location: leggtil.php?botValue=$botValue");
    exit();
}
?>
