<?php
session_start();

require_once "config.php";
   


$username_err = $password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (isset($_GET["bruker"]) && isset($_GET["passord"])) {
        
        $username = $_GET["bruker"];
        $password = $_GET["passord"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       
        if (empty($username)) {
            $username_err = "Username is required.";
        }

        if (empty($password)) {
            $password_err = "Password is required.";
        }

       
        if (empty($username_err) && empty($password_err)) {
           
            $sql = "SELECT id, navn, bruker, passord, admin FROM login WHERE bruker = '" . $username . "' ";

            if ($stmt = $link->prepare($sql)) {

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        $stmt->bind_result($id, $navn, $username, $password, $admin);

                        if ($stmt->fetch()) {
                            if (password_verify($password, $hashed_password)) {
                                
                                session_start();

                               
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["navn"] = $navn;
                                $_SESSION["bruker"] = $username;
                                $_SESSION["passord"] = $password;
                                $_SESSION["admin"] = $admin;
                                
                                if (isset($_GET["remember_me"]) && $_GET["remember_me"] == "on") {
                                    
                                    setcookie("bruker", $username, time() + 3600 * 24 * 30, "/"); 
                                    setcookie("pass", $password, time() + 3600 * 24 * 30, "/");
                                }
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
            
            Remember me <input type="checkbox" name="remember_me" id="remember_me">
            <div id="LogInbtn">
                <input type="submit" class="leggtilbtn" value="Login">
            </div>
            <p id="logintekst">Har du ingen bruker? <a href="registrering.php">Registrer her</a>.</p>
        </form>
    </div>
</body>
</html>