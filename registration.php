<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location:index.php");
}
if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn,"SELECT * FROM regiss WHERE mobile = '$mobile' OR email = '$email'");
    if(mysqli_num_rows($duplicate)>0){
        "<script> alert(Mobile number or Email Already Taken);</script>";
    }
    else{
    if($password==$confirmpassword){
        $query = "INSERT INTO regiss VALUES('$firstname','$lastname','$address','$email','$mobile','$password')";
        mysqli_query($conn,$query);
        echo
        "<script> alert('Registration Sucessfull');</script>";
    }
    else{
        echo
        "<script> alert('Password does not match');</script>";

    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles/regstyles.css">


</head>
<body>
    <div class="cust">
        
    <h2>Registration</h2>
    <div>
    <center>
    <form id="registrationForm" action="" method="post" autocomplete="off">
    <label for="firstame">First Name: </label>
    <input type="text" name="firstname" id="firstname" placeholder="firstname" required> <br>
    <label for="lastame">Last Name: </label>
    <input type="text" name="lastname" id="lastname" placeholder="lastname" required> <br>
    <label for="address">Address: </label>
    <input type="text" name="address" id="address" placeholder="address" required> <br>
    <div id="emailErr"></div>
    <label for="email">Email: </label>
    <input type="text" name="email" id="email" placeholder="abc@gmail.com" required> <br>
    <div id="mobileErr"></div>
    <label for="mobile">Mobile Number: </label>
    <input type="text" name="mobile" id="mobile" placeholder="0123456789" required> <br>
    <div id="passErr"></div>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" placeholder="password" required> <br>
    <label for="confirmpassword">Confirm Password: </label>
    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password" required> <br>
    <div class="btn">
    <button id="submit" name="submit" type="submit">Submit</button>
</div>
    </form>

    <br>
    <a href="login.php"> <font size="5px"> Login </font></a>
    </center>

    </div>
    </div>
    <script src="js/javas.js"></script>
</body>
</html>