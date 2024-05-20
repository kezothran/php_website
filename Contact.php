<?php
$serverName='localhost';
$userName='root';
$password='';
$db_Name='photography';

$con=new mysqli($serverName,$userName,$password,$db_Name);
if($con->connect_error){
    die('connection error'.$con->connect_error);

}

// Create (C): Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $message = $con->real_escape_string($_POST['message']);

    
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";


    if ($con->query($sql) === TRUE) {
        echo "Message submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}


// Read (R): Retrieve and display messages
$sql = "SELECT * FROM contact";
$result = $con->query($sql);

// Update (U): Handle message update
if (isset($_POST['update'])) {
    $id = $_POST['message_id'];
    $newMessage = $_POST['new_message'];

    $sql = "UPDATE contact SET message='$newMessage' WHERE message_id=$id";
    if ($con->query($sql) === TRUE) {
        echo "Message updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Delete (D): Handle message deletion
if (isset($_POST['delete'])) {
    $id = $_POST['message_id'];

    $sql = "DELETE FROM contact WHERE message_id=$id";
    if ($con->query($sql) === TRUE) {
        echo "Message deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="Styles/stylesContact.css">
</head>
<body>
<?php include 'header.php'; ?>
    <h1>Contact Us</h1>

    <!-- Create (C): Form for submitting messages -->
    <form method="post" action="">
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Message: <textarea name="message"></textarea><br>
        <input type="submit" name="create" value="Submit">
    </form>

    <!-- Read (R): Display messages -->
    <h2>Contact Us Messages</h2>
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Message: " . $row["message"] . "<br>";
    ?>
            <!-- Update (U): Form to edit messages -->
            <form method="post" action="">
                <input type="hidden" name="message_id" value="<?php echo $row['message_id']; ?>"> <!-- Use the 'id' from the database -->
                <textarea name="new_message"></textarea>
                <input type="submit" name="update" value="Update">
            </form>

            <!-- Delete (D): Form to delete messages -->
            <form method="post" action="">
                <input type="hidden" name="message_id" value="<?php echo $row['message_id']; ?>"> <!-- Use the 'id' from the database -->
                <input type="submit" name="delete" value="Delete">
            </form>
    <?php

                echo "</li><hr>";
            }
        } else {
            echo "No messages yet.";
        }
        ?>
    </ul>
</body>
</html>