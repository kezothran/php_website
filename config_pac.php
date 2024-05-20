<?php 
$serverName='localhost';
$userName='root';
$password='';
$db_Name='photography';

$con=new mysqli($serverName,$userName,$password,$db_Name);
if($con->connect_error){
    die('connection error'.$con->connect_error);

}

?>