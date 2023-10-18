<?php
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

    if ($botValue > 0) {
        $sql_update = "UPDATE login SET total = total + ?, ubetalt = ubetalt + ? WHERE bruker = ?";
        
        if ($stmt = $link->prepare($sql_update)) {
            $stmt->bind_param("iis", $botValue, $botValue, $_SESSION["bruker"]);
            if ($stmt->execute()) {
                echo "Boten har blitt lagt til";
                header("Location: leggtil.html");
                exit;
            } else {
                echo "En feil har oppstått, prøv igjen senere";
            }
            $stmt->close();
        } else {
            echo "Prepared statement failed.";
        }
    } else {
        echo "No valid bot value found in the POST data.";
    }
}



/*function calculateBotValue() {
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

    if (isset($_GET[$botValue])) {
        $botValue = $_GET[$botValue];
    
        $sql_update = "UPDATE login SET total = total + ".$botValue.", ubetalt = ubetalt + ".$botValue." WHERE bruker = '".$_SESSION["bruker"]."'";

        
        if ($stmt = $link->prepare($sql_update)) {
            // Execute the prepared statement
            if ($stmt->execute()) {
           echo "Boten har blitt lagt til";
           header ("Location: leggtil.html");
           exit;
            }else {
              echo "En feil har oppståt, prøv igjen senere";
            }
            $stmt->close();
        }
      }
}*/
?>