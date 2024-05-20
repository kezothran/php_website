<?php
require 'config.php';
if(!empty($_SESSION)){
    $id = $_SESSION["id"];
    $result = mysqli_quary($conn, "SELECT * FROM regiss WHERE ID = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>
    <body>
        <h1>Welcome <?php echo $row["firstname"];?> </h1>
        <a href="logout.php">logout</a>
    </body>
</html>