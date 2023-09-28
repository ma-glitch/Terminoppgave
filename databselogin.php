
<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Step 4: Validate user input (you should add more validation)
    $username = $_GET["username"];

    // Step 5: Query the database
    $sql = "SELECT * FROM login WHERE bruker = '$username'";
    $result = mysqli_query($link, $sql);

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
        echo "Error: " . mysqli_error($link);
    }
}
?>