<?php

function calculateBotValue() {
    $kinaVerdi = 0;
    $glemmeDraktVerdi = 0;
    $glemmeViktigVerdi = 0;
    $haandspolVerdi = 0;

    if (isset($_POST["kina"]) && $_POST["kina"] === "25") {
        $kinaVerdi = 25;
    }
    if (isset($_POST["glemmeDrakt"]) && $_POST["glemmeDrakt"] === "500") {
        $glemmeDraktVerdi = 500;
    }
    if (isset($_POST["glemmeViktig"]) && $_POST["glemmeViktig"] === "50") {
        $glemmeViktigVerdi = 50;
    }
    if (isset($_POST["haandspol"]) && $_POST["haandspol"] === "50") {
        $haandspolVerdi = 50;
    }

    $botVerdi = $kinaVerdi + $glemmeDraktVerdi + $glemmeViktigVerdi + $haandspolVerdi;
    return $botVerdi;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $botValue = calculateBotValue();
    header("Location: leggtil.php?botValue=$botValue");
    exit();
}
?>