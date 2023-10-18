<?php
session_start();

require_once "config.php";
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