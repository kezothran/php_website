//create
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>

    <?php

$serverName='localhost';
$userName='root';
$password='';
$db_Name='photograpy';

$con=new mysqli($serverName,$userName,$password,$db_Name);

   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $con = new mysqli("localhost", "root", "","photograpy" );

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($con->query($sql) === TRUE) {
            echo "Message submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $con->close();
    }
    ?>

    <form method="post" action="">
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Message: <textarea name="message"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>


//read

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Messages</title>
</head>
<body>
    <h1>Contact Us Messages</h1>

    <?php
    $con = new mysqli("localhost", "root", "","photograpy" );

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM contact";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Message: " . $row["message"] . "<br><br>";
        }
    } else {
        echo "No messages yet.";
    }

    $con->close();
    ?>
</body>
</html>

// xupdate

<?php
if (isset($_POST['update'])) {
    $id = $_POST['message_id'];
    $newMessage = $_POST['new_message'];

    $con = new mysqli("localhost", "root", "","photograpy" );

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "UPDATE contact SET message='$newMessage' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Message updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<!-- Add this to the Read (R) page to allow updating messages -->
<form method="post" action="">
    <input type="hidden" name="message_id" value="<?php echo $row["id"]; ?>">
    <textarea name="new_message"></textarea>
    <input type="submit" name="update" value="Update">
</form>


//delete

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['message_id'];

    $con = new mysqli("localhost", "root", "","photograpy" );

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "DELETE FROM contact WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Message deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>

<!-- Add this to the Read (R) page to allow deleting messages -->
<form method="post" action="">
    <input type="hidden" name="message_id" value="<?php echo $row["id"]; ?>">
    <input type="submit" name="delete" value="Delete">
</form>
