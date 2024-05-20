<?php
session_start();

$valid_username = "admin"; // Replace with your actual username
$valid_password = "admin123"; // Replace with your actual password

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        // Valid credentials, set a session variable to indicate the user is logged in
        $_SESSION['loggedin'] = true;
        header("Location: curator_hub.php"); // Redirect to your admin page
        exit();
    } else {
        // Invalid credentials, redirect back to the login page
        header("Location: curatorlogin.html");
        exit();
    }
}
?>
