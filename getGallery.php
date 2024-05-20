<?php 
 
 $servername='localhost';
 $username='root';
 $password='';
 $db_name='photography';
 
 
 $con=new mysqli($servername,$username,$password,$db_name);
 if($con->connect_error){
     die("error connection".$con->connect_error);
 }
 else{
    $qry="SELECT * FROM portfolio";
    $result=$con->query($qry);
    $rows=$result->num_rows;
    if($rows>0){
        while($y=$result->fetch_assoc()){
           echo "<option value='".$y['portfolio_id']."'> ".$y['portfolio_id']." </option>";
        }
        
    }
    else{
        echo 'error';
    }
}


?>