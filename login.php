<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect them to the welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Terminoppgave/index.php");
    exit;
}

require_once "config.php";
$username_err = $password_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if "username" and "password" are set in the form data
    if (isset($_GET["username"]) && isset($_GET["password"])) {
        // Retrieve user input
        
        $username = $_GET["username"];
        $password = trim($_GET["password"]);
        $salt = random_bytes(16);
        $hashed_password = password_hash($password . $salt, PASSWORD_DEFAULT);
        echo(PASSWORD_DEFAULT);
        $entered_password = "password";
        // Perform validation (you can add more validation as needed)
        if (empty($username)) {
            $username_err = "Username is required.";
        }

        if (empty($password)) {
            $password_err = "Password is required.";
        }

        // If there are no validation errors, attempt to authenticate
        if (empty($username_err) && empty($password_err)) {
            // Perform the authentication using your database connection
            $sql = "SELECT id, bruker, passord FROM login WHERE bruker = ?";

            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Store result
                    $stmt->store_result();

                    // Check if a row exists with the given username
                    if ($stmt->num_rows == 1) {
                        // Bind result variables
                        $stmt->bind_result($id, $username, $hashed_password);
                        
                        if ($stmt->fetch()) {
                            // Verify the password
                            if (password_verify($entered_password . $salt, $hashed_password)) {
                                // Password is correct, start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username; 

                                // Redirect the user to the welcome page
                                header("location: Terminoppgave/index.php");
                                exit();
                            } else {
                                // Password is not valid
                                $password_err = "Invalid password.";
                            }
                        }
                    } else {
                        // Username not found
                        $username_err = "Username not found.";
                    }
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <!-- Display error messages here if needed -->
        <span class="text-danger"><?php echo $username_err; ?></span>
        <span class="text-danger"><?php echo $password_err; ?></span>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET"> 
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
