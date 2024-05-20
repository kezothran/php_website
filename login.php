<?php
require 'config.php'; // Include your database connection settings

if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

if (isset($_POST['login_submit'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    // Validate the login credentials against your database
    $query = "SELECT * FROM regiss WHERE (email = '$login_email' OR mobile = '$login_email')";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password (you should use a secure password hashing method)
        echo $user['password'];
        if (!strcmp($login_password, $user['password'])) {
            // Authentication successful; create a session
            $_SESSION['user_id'] = $user['mobile'];
            $_SESSION['loggedin'] = true; // You can store the user's ID or other data in the session
            header('Location: profile.php'); // Redirect to a protected page after login
            exit();
        } else {
            // Incorrect password
            $error_message = 'Incorrect password. Please try again.';
        }
    } else {
        // User not found
        $error_message = 'User not found. Please check your email or username.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/stylesss.css">

</head>
<body>
    <div class="cust">
        <div>
        <center>
            <h2>Login</h2>
            <?php if (isset($error_message)) { ?>
                <div class="error"><?php echo $error_message; ?></div>
            <?php } ?>
            <form action="login.php" method="post" autocomplete="off">
                <label for="login_email">User:</label>
                <input type="text" name="login_email" id="login_email" required><br>
                <label for="login_password">Password:</label>
                <input type="password" name="login_password" id="login_password" required><br>
                <button name="login_submit" type="submit">Login</button><br>
            </form>
            <br>
            <a href="registration.php"> <font size="5px"> Register </font></a>
        </center>
        </div>
    </div>
</body>
</html>
