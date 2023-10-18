<?php
require_once "config.php";

// Define variables and initialize with empty values
$navn = $username = $password = $confirm_password = "";
$navn_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "skriv in et navn.";
    } else {
        // Prepare a SELECT statement to check if the username already exists
        $sql = "SELECT id FROM login WHERE navn = ?";

        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("s", $param_navn);
            $param_navn = trim($_POST["navn"]);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $navn_err = "Dette navnet er alerede i bruk.";
                } else {
                    $navn = trim($_POST["navn"]);
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "skriv in et brukernavn";
    } else {
        // Prepare a SELECT statement to check if the username already exists
        $sql = "SELECT id FROM login WHERE bruker = ?";

        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "Dette brukernavnet er alerede i bruk.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "skriv in et passord.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Passordet må ha i hvert fall 6 tegn.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "skriv in passordet igjen.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $confirm_password_err = "Passordet du skrev in var ikke likt";
        }
    }

    // Check input errors before inserting into database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO login (navn, bruker, passord, total, ubetalt, admin) VALUES (?, ?, ?, 0, 0, 'no')";

        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("sss", $param_navn, $param_username, $param_password);
            $param_navn = $navn;
            $param_username = $username;
            $param_password = $password; // Hash the password

            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }

    // Close database connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" type="image/x-icon" href="linje5.jpg">
</head>

<body>
    <div class="wrapper">
        <h2>Register</h2>
        <p>Fyll in her for registrere deg.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Navn</label>
                <input type="text" name="navn"
                    class="form-control <?php echo (!empty($navn_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $navn; ?>">
                <span class="invalid-feedback">
                    <?php echo $navn_err; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                    class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $username; ?>">
                <span class="invalid-feedback">
                    <?php echo $username_err; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $password; ?>">
                <span class="invalid-feedback">
                    <?php echo $password_err; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"
                    class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback">
                    <?php echo $confirm_password_err; ?>
                </span>
            </div>
            <div class="LogInbtn">
                <input type="submit" class="leggtilbtn" value="Submit">
                <input type="reset" class="leggtilbtn" value="Reset">
            </div>
            <p>Har du en bruker? <a href="login.php">Login her</a>.</p>
        </form>
    </div>
</body>

</html>