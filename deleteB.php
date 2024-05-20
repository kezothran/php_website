<?php
  include "connectionB.php";
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $sql = "DELETE FROM `crud1` WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided for deletion.";
}

header('location:/iwt/indexB.php');

$conn->close();
?>