<?php
session_start();

$valid_username = "kezothran"; 
$valid_password = "kezo12345"; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php"); // Redirect to admin page
        exit();
    } else {
        // Invalid credentials
        header("Location: adminlogin.html");
        exit();
    }
}
?>
