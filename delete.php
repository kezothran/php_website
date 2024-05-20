<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="photography";

    //create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check for errors in the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM employee WHERE id='$id'"; // Add single quotes around $id
    $connection->query($sql);

    // Close the connection
    $connection->close();
}
header("location:admin.php");
?>
