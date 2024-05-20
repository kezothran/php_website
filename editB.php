<?php
include "connectionB.php";
$id = "";
$name = "";
$email = "";
$preferred_date = "";
$preferred_location = "";
$phone = "";
$package_type = "";
$event_type = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: crud200/indexB.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from crud1 where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: crud200/indexB.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $preferred_date = $row["preferred_date"];
    $preferred_location = $row["preferred_location"];
    $phone = $row["phone"];
    $package_type = $row["package_type"];
    $event_type = $row["event_type"];
} elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $preferred_date = $_POST["preferred_date"];
    $preferred_location = $_POST["preferred_location"];
    $phone = $_POST["phone"];
    $package_type = $_POST["package_type"];
    $event_type = $_POST["event_type"];

    $sql = "update crud1 set name='$name', email='$email', preferred_date='$preferred_date', preferred_location='$preferred_location', phone='$phone', package_type='$package_type', event_type='$event_type' WHERE id = $id";
    $result = $conn->query($sql);
}
?>

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
  <form method="POST" action="editB.php" class="form">
    <h1>Reservation</h1>

    <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"><br>

<div class="input-control">
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="email">Email</label><br>
  <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="preferred_date">Preferred Date</label><br>
  <input type="date" id="preferred_date" name="preferred_date" value="<?php echo $preferred_date; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="preferred_location">Location</label><br>
  <input type="text" id="preferred_location" name="preferred_location" value="<?php echo $preferred_location; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="phone">Phone</label><br>
  <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="package_type">Package Type</label><br>
  <input type="text" id="package_type" name="package_type" value="<?php echo $package_type; ?>"><br>
  <div class="error"></div>
</div>

<div class="input-control">
  <label for="event_type">Event Type</label><br>
  <input type="text" id="event_type" name="event_type" value="<?php echo $event_type; ?>"><br>
  <div class="error"></div>
</div>


    <button type="submit" value="Submit">book now</button>
    <button type="reset" value="Reset">reset</button>
  </form>
</div>

<div class="bottom">
    <div class="final">
        <p>click here to view packages</p>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


