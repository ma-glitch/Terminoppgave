<?php
session_start();
require_once "config.php";


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
    'botValue' == $botValue;
    if (isset($_GET['botValue'])) {
        $botValue = $_GET['botValue'];
    
        $sql_update = "UPDATE login SET total = total + ".$botValue.", ubetalt = ubetalt + ".$botValue." WHERE bruker = '".$_SESSION["bruker"]."'";

        
        if ($stmt = $link->prepare($sql_update)) {
            // Execute the prepared statement
            if ($stmt->execute()) {
                // Bind the result variable
           echo "Boten har blitt lagt til";
           header ("Location: leggtil.html");
            }else {
              echo "En feil har oppståt, prøv igjen senere";
            }
            $stmt->close();
        }
      }
}

?>