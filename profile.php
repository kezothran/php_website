<?php
require 'config.php';


if (empty($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

if (isset($_POST["update_profile"])) {
    // Handle profile update here
    $new_firstname = $_POST["new_firstname"];
    $new_lastname = $_POST["new_lastname"];
    $new_address = $_POST["new_address"];
    
    // Update the user's profile in the database using a SQL UPDATE statement
    $update_query = "UPDATE regiss SET firstname = '$new_firstname', lastname = '$new_lastname', address = '$new_address' WHERE email = '$user_id' OR mobile = '$user_id'";
    mysqli_query($conn, $update_query);
    
    // Redirect to refresh the page
    header("Location: profile.php");
}

if (isset($_POST["delete_profile"])) {
    // Handle profile deletion here
    // You may want to ask for confirmation before deleting
    
    // Delete the user's profile from the database using a SQL DELETE statement
    $delete_query = "DELETE FROM regiss WHERE email = '$user_id' OR mobile = '$user_id'";
    mysqli_query($conn, $delete_query);
    
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST["logout"])) {
    // Handle logout here
    session_destroy();
    header("Location: login.php");
}

// Retrieve user data from the database
$query = "SELECT * FROM regiss WHERE email = '$user_id' OR mobile = '$user_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // User data retrieved
} else {
    // Handle the case where the user's data is not found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles/profstyles.css">

</head>
<body>
   <?php include 'header.php'; ?>
    <div class="cust">
        <center>
            <h2>User Profile</h2>
            <form method="post" action="profile.php">
                <div class="det">
                <p><strong>First Name:</strong> <?php echo $row["firstname"]; ?></p><br>
                <p><strong>Last Name:</strong> <?php echo $row["lastname"]; ?></p><br>
                <p><strong>Address:</strong> <?php echo $row["address"]; ?></p><br>
                </div>
                <!-- Add input fields for updating profile -->
                <label for="new_firstname">New First Name:</label>
                <input type="text" name="new_firstname" id="new_firstname" value="<?php echo $row["firstname"]; ?>"><br>
                <label for="new_lastname">New Last Name:</label>
                <input type="text" name="new_lastname" id="new_lastname" value="<?php echo $row["lastname"]; ?>"><br>
                <label for="new_address">New Address:</label>
                <input type="text" name="new_address" id="new_address" value="<?php echo $row["address"]; ?>"><br>
                <div class="btn">
                <button type="submit" name="update_profile">Update Profile</button>
                <button type="submit" name="delete_profile">Delete Profile</button>
                </div>
                <div class="logoutbtn">
                 <button type="submit" name="logout">Logout</button><br>
</div>
            </form>
        </center>
    </div>
</body>
</html>
