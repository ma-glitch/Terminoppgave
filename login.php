<?php
session_start();

require_once "config.php";

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    // Authenticate the user using the stored credentials (similar to your existing code)
    $sql = "SELECT id, navn, bruker, passord, admin FROM login WHERE bruker = '$username'";

    if ($stmt = $link->prepare($sql)) {

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $navn, $username, $dbPassword, $admin);

                if ($stmt->fetch()) {
                    if (password_verify($password, $dbPassword)) {
                        // Password is correct, start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["navn"] = $navn;
                        $_SESSION["bruker"] = $username;
                        $_SESSION["passord"] = $password;
                        $_SESSION["admin"] = $admin;

                        header("location: index.php"); // Redirect to the welcome page
                        exit();
                    }
                }
            }
        }

        $stmt->close();
    }
}
// Initialize error variables
$username_err = $password_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if "username" and "password" are set in the form data
    if (isset($_GET["bruker"]) && isset($_GET["passord"])) {
        // Retrieve user input
        $username = $_GET["bruker"];
        $password = $_GET["passord"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Perform basic validation
        if (empty($username)) {
            $username_err = "Username is required.";
        }

        if (empty($password)) {
            $password_err = "Password is required.";
        }

        // If there are no validation errors, you can proceed with authentication
        if (empty($username_err) && empty($password_err)) {
            // Attempt to retrieve the user's data from the database
            $sql = "SELECT id, navn, bruker, passord, admin FROM login WHERE bruker = '" . $username . "' ";

            if ($stmt = $link->prepare($sql)) {

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        $stmt->bind_result($id, $navn, $username, $password, $admin);

                        if ($stmt->fetch()) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["navn"] = $navn;
                                $_SESSION["bruker"] = $username;
                                $_SESSION["passord"] = $password;
                                $_SESSION["admin"] = $admin;

                                setcookie("username", $username, time() + 3600 * 24 * 30); // 30 days expiration
                                setcookie("password", $password, time() + 3600 * 24 * 30);
                                // Redirect the user to the welcome page
                                header("location: index.php");
                                exit();
                            } else {
                                $password_err = "Invalid password.";
                            }
                        }
                    } else {
                        $username_err = "Username not found.";
                    }
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                $stmt->close();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot system Linje-5</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Fyll in bruker navn og passord</p>

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="GET"> 
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="bruker" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="passord" class="form-control" >
            </div>
            <div id="LogInbtn">
                <input type="submit" class="leggtilbtn" value="Login">
            </div>
            <p id="logintekst">Har du ingen bruker? <a href="registrering.php">Registrer her</a>.</p>
        </form>
    </div>
</body>
</html>