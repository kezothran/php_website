<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'photography';

$con = new mysqli($servername, $username, $password, $db_name);

if ($con->connect_error) {
    die("Error in connection: " . $con->connect_error);
}

if (isset($_POST['img_id'])) {
    $portfolio_id = $_POST['img_id'];

    $qry = "DELETE FROM portfolio WHERE portfolio_id = '$portfolio_id'";
    $result = $con->query($qry);

    if ($result) {
        header('location:curator_hub.php');
    } else {
        echo 'Error deleting record: ' . $con->error;
    }
}
?>
