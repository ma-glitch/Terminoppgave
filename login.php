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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Step 4: Validate user input (you should add more validation)
    $username = $_GET["username"];

    // Step 5: Query the database
    $sql = "SELECT * FROM bruker WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Step 6: Compare passwords (you should use password_verify() with hashed passwords)
        $row = mysqli_fetch_assoc($result);
        $password = $_GET["password"];

        if (password_verify($password, $row["hashed_password"])) {
            // Authentication successful, redirect to a welcome page or perform other actions
            header("Location: index.php");
            exit();
        } else {
            // Authentication failed, display an error message
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Step 7: Close the database connection
    mysqli_close($conn);
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
