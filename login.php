<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect them to the welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Terminoppgave/index.php");
    exit;
}
 
// Include config file (assuming this file contains your database connection)
require_once "config.php";

// Initialize variables for error messages
$username_err = $password_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve user input
    $username = $_GET["root"];
    $password = $_GET["Admin"];

    // Perform validation and authentication here
    // You should use prepared statements to prevent SQL injection
    // Compare the hashed password with the stored hashed password in the database

    // If authentication is successful, set session variables and redirect
    // If authentication fails, set appropriate error messages
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET"> <!-- Specify the correct PHP script -->
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
