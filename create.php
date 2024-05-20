<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="photography";

//crate connection
$connection= new mysqli($servername,$username,$password,$database);


$name ="";
$email="";
$phone="";
$address="";

$errorMessage ="";
$successMessage ="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

    do{
        if(empty($name)||empty($email)||empty($phone)||empty($address) ){
            $errorMessage = "All the fields are required";
            break;
        }

        //add new staff database
        $sql = "INSERT INTO employee(name,email,phone,address) ". 
               "VALUES('$name','$email','$phone','$address')";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query:". $connection->error;
            break;
        }

        //add new  to database
        $name="";
        $email="";
        $phone="";
        $address="";

        $successMessage = "Staff added correctly";

        header("location:/iwt/admin.php");
        exit;


    }while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff page</title>
    <link rel="stylesheet" href="styles/create.css">
</head>
<body>
    <script src="js/create.js"></script>
    <div class="container">
        <h2>New Staff </h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert' role ='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='button'></button>
            </div>
             ";
        }
        ?>
        <form method="post" onsubmit="return validateForm()" name="staffForm">
            <div class="row ">
                <label class="colom">Name</label>
                <div class="col">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
           </div>
           <div class="row ">
                <label class="colom">Email</label>
                <div class="colom">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
           </div>
           <div class="row ">
                <label class="colom">Phone</label>
                <div class="col">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
           </div>
           <div class="row ">
                <label class="colom">Address</label>
                <div class="col">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
           </div>

           <?php
           if(!empty($successMessage)){
            echo"
            <div class='row'>
                <div class='alert' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
               </div>
                ";
            
           }
           ?>
            <div class="row ">
            <div class="offset">
            <button type="submit" class="button">Submit</button>
            </div>
            <div class="colom">
                <a class="button" href="/iwt/admin.php" role="button">Cancel</a>
        </form>
        </div>
    </div>
</body>
</html>