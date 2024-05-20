<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "photography";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!isset($_GET["id"])) {
        header("location:/iwt/admin.php");
        exit;
    }

    $id = $_GET["id"];
    // Read the table 
    $sql = "SELECT * FROM employee WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:/iwt/admin.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "All the fields are required";
    } else {
        // Update the record using 
        $sql = "UPDATE employee SET name=?, email=?, phone=?, address=? WHERE id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        
        if ($stmt->execute()) {
            $successMessage = "Staff updated successfully";
            header("location:/iwt/admin.php");
            exit;
        } else {
            $errorMessage = "Error updating the staff: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff page</title>
    <link rel="stylesheet" href="styles/edit.css">
</head>
<body>
    <script src="js/edit.js"></script>
    <div class="container ">
        <h2>Edit Staff </h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='button' aria-label='close'></button>
            </div>
             ";
        }
        ?>
        <form method="post" onsubmit="return validateForm()" name="staffForm">
            <input type="hidden" name = "id" value="<?php echo $id; ?>">
            <div class="row ">
                <label class="colom">Name</label>
                <div class="col">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
             </div>
           <div class="row ">
                <label class="colom">Email</label>
                <div class="col">
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
                ";

           }
           ?>

            <div class="row ">
            <div class="offset ">
                <button type="submit" class="button">Submit</button>
            </div>
            <div class="colom">
                <a class="button" href="/iwt/admin.php" role="button">Cancel</a>
        </form>   
  </div>
</body>
</html>