<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/reservation.css">
    <link rel="stylesheet" href="styles/navcss.css">
    
    <script defer src="js/reservejs.js"></script>

    <title>reservation page</title>

</head>
<body>

<div class="nav">

    <ul>
      <li><a href="#">Home</a></li>
    <li><a href="#">About us</a></li>
    <li><a href="#">Info</a></li>
    <li><a href="#">Portfolio</a></li>
    <li><a href="#">Reservation</a></li>
    <li><a href="#">Contact us</a></li>

    <a href="createB.php">
    <button class="button">add new</button>
    </a>
    <a href="indexB.php">
    <button class="button2">home</button>
    </a>
    
    </ul>
</div>


<div class="container">

  <form method="POST" action="createB.php" class="form">
    <h1>Reservation</h1>

     <div class="input-control">
      <label for="name">Name: </label><br>
      <input type="text" id="name" name="name"><br>
      <div class="error"></div>
     </div>

    <div class="input-control">
      <label for="email">email</label><br>
      <input type="text" id="email" name="email"><br>
      <div class="error"></div>
    </div>

    <div class="input-control">
      <label for="preferred_date">preferred_date</label><br>
      <input type="date" id="preferred_date" name="preferred_date"><br> 
      <div class="error"></div>
    </div>
    
    <div class="input-control">
      <label for="preferred_location">location: </label><br>
      <input type="text" id="preferred_location" name="preferred_location"><br>
      <div class="error"></div>
    </div>

    <div class="input-control">
      <label for="phone">phone: </label><br>
      <input type="text" id="phone" name="phone"><br>
      <div class="error"></div>
    </div>

    <div class="input-control">
       <label for="package_type">package_type </label><br>
       <input type="text" id="package_type" name="package_type"><br>
       <div class="error"></div>
    </div>

    <div class="input-control">
      <label for="event_type">event_type </label><br>
      <input type="text" id="event_type" name="event_type"><br>
      <div class="error"></div>
    </div>

    <button type="submit" value="Submit">book now</button>
    <button type="reset" value="Reset">reset</button>
  </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php include'footer.php'; ?>
</body>
</html>

<?php
require 'connectionB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $preferred_date = mysqli_real_escape_string($conn, $_POST["preferred_date"]);
    $preferred_location = mysqli_real_escape_string($conn, $_POST["preferred_location"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $package_type = mysqli_real_escape_string($conn, $_POST["package_type"]);
    $event_type = mysqli_real_escape_string($conn, $_POST["event_type"]);

    
    $sql = "INSERT INTO crud1 (name, email, preferred_date, preferred_location, phone, package_type, event_type)
            VALUES ('$name', '$email', '$preferred_date', '$preferred_location', '$phone','$package_type','$event_type')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Insertion successful, you can redirect to another page
        header("Location: indexB.php");
        exit;
    } else {
        // Insertion failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $conn->close();
}
?>
