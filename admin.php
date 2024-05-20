<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminlogin.html"); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admin.css">
    <title>MY Admin</title>
</head>
<body>
    <div class="Container">
        <h2>List of Staffs </h2>
        <a class="button" href="/iwt/create.php" role="button">Add Staff </a>
        <a class="button" href="/iwt/photo.html" role="button">exit</a>
        <br>
        <form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        
                    <?php
                    $servername ="localhost";
                    $username ="root";
                    $password ="";
                    $database ="photography";

                    //create connection
                    $connection= new mysqli($servername,$username,$password,$database);

                    //check connection
                    if ($connection->connect_error){
                        die("connection failed: ". $connection->connect_error);


                    }
                    //read all row
                    $sql="SELECT * FROM employee";
                    $result = $connection-> query($sql);
                    if(!$result){
                        die("Invalid query" . $connection->error);
                    }
                    //read each row
                    while($row = $result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                        <a class='button ' href='/iwt/edit.php?id=$row[id];?>'>Edit</a>
                        <a class='button' href='/iwt/delete.php?id=$row[id];?>'>delete</a>
                      </td>
    
                        </td>
                    </tr>
                        ";

                    }
                    ?>
               
            </tbody>
        </table>
        <form>
    </div>
    
</body>
</html>