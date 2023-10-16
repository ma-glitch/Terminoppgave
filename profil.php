<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>
<ul class="topnav">
        <li><a class="active" href="index.php">Hjem</a></li>
        <li><a href="leggtil.php">Legg til bot</a></li>
        <?php if (($_SESSION["admin"] == "yes")) {
            echo "<li><a href='admin.php'>Admin</a></li>";
        }
        ?>
    </ul>
</body>
</html>