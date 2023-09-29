<?php
 session_start()


require_once "config.php";
// Initialize error variables
$username_err = $password_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if "username" and "password" are set in the form data
    if (isset($_GET["username"]) && isset($_GET["password"])) {
        // Retrieve user input
        $username = $_GET["username"];
        $password = $_GET["password"];

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
         $sql = "SELECT id, bruker, passord FROM login WHERE bruker = ?";
            
         if ($stmt = $link->prepare($sql)) {
             $stmt->bind_param("s", $param_username);
             $param_username = $username;
             
             if ($stmt->execute()) {
                 $stmt->store_result();
                 
                 if ($stmt->num_rows == 1) {
                     $stmt->bind_result($id, $username, $hashed_password);
                     
                     if ($stmt->fetch()) {
                         if (password_verify($password, $hashed_password)) {
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
