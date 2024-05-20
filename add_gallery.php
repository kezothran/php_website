<?php 
$servername='localhost';
$username='root';
$password='';
$db_name='photography';


$con=new mysqli($servername,$username,$password,$db_name);

if($con->connect_error){
    die("error connection".$con->connect_error);
}

if(isset($_POST['submit'])){
    $img=$_POST['img_id'];
    $title = $_POST['portfolio_title'];
    $description = $_POST['portfolio_description'];
    $Category = $_POST['Category'];
    $file=pathinfo($_FILES['img_file']['name']);
    $ext=$img.".".$file['extension'];
    move_uploaded_file($_FILES['img_file']['tmp_name'],"upload/".$ext);

    $qry="INSERT INTO portfolio(portfolio_id,img_name,portfolio_title,portfolio_description,Category)VALUES('$img','$ext','$title','$description','$Category')";

    $result=$con->query($qry);
    if($result){
        header('location:curator_hub.php');
    }


}
?>

