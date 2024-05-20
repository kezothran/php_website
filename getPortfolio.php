<?php 
include('config_pac.php');


$qry="SELECT * FROM portfolio";
    $result=$con->query($qry);
    $rows=$result->num_rows;
    
    if($rows>0){
        while($y=$result->fetch_assoc()){
           echo "<option value='".$y['portfolio_id']."'>".$y['portfolio_id']."</option>";
        }
        
    }
    else{
        
    }
?>