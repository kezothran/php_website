<?php
include('config_pac.php');

if (isset($_POST['sub'])) {
    $portfolio_id = $_POST['pac_id'];
    $title = $_POST['portfolio_title'];
    $description = $_POST['portfolio_description'];

    if (isset($_FILES['img_file']) && $_FILES['img_file']['size'] > 0) {
        $path = pathinfo($_FILES['img_file']['name']);
        $ext = $portfolio_id . "." . $path['extension'];
        move_uploaded_file($_FILES['img_file']['tmp_name'], "upload/" . $ext);
    } else {
        // If no new image is uploaded, keep the existing image name
        $qryGetImage = "SELECT img_name FROM portfolio WHERE portfolio_id = '$portfolio_id'";
        $result = $con->query($qryGetImage);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ext = $row['img_name'];
        }
    }
    $qry = "UPDATE portfolio 
            SET img_name = '$ext', 
                portfolio_title = IF('$title' = '', portfolio_title, '$title'), 
                portfolio_description = IF('$description' = '', portfolio_description, '$description') 
            WHERE portfolio_id = '$portfolio_id'";

    if ($con->query($qry) === TRUE) {
        header('location: Portfolio.php');
    } else {
        echo 'Error: ' . $con->error;
    }
}
?>
