<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/navcss.css">
    <title>Reservation page</title>
  </head>
  <body>

<div class="nav">
    <ul>
      <li><a href="photo.html">Home</a></li>
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

<div class="container my-4">
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>EVENT DATE</th>
      <th>EVENT LOCATION</th>
      <th>PHONE</th>
      <th>PACKAGE TYPE</th>
      <th>EVENT TYPE</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php
     include "connectionB.php";
     $sql = "select * from crud1";
     $result = $conn->query($sql);
     if(!$result){
        die("Invalid query!");
     }
     while($row=$result->fetch_assoc()){
       echo "
    
    <tr>
      <th>$row[id]</th>
      <td>$row[name]</td>
      <td>$row[email]</td>
      <td>$row[preferred_date]</td>
      <td>$row[preferred_location]</td>
      <td>$row[phone]</td>
      <td>$row[package_type]</td>
      <td>$row[event_type]</td>
      <td>
          <a class='btn btn-success' href='editB.php?id=$row[id]'>Edit</a>
          <a class='btn btn-danger' href='deleteB.php?id=$row[id]'>Delete</a>
      </td>
    </tr>
    ";
      }
    ?>
  </tbody>
</table>
    </div>
 

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include'footer.php'; ?>
  </body>
</html>