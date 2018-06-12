<?php
    include ("config/connection.php");
    
	$id = $_GET['id'];
        
	$sqlDelete = "DELETE FROM sortiment1 WHERE id='".$id."' ";
	$resultDelete = mysqli_query($conn, $sqlDelete);
    
		if ($resultDelete === TRUE){
        echo "deleted!";
        echo "<meta http-equiv='refresh' content='3; url=http://u1024421.fsdata.se/bolaget/admin/productdata.php'>";
    }else{
        echo "Error deleting record: " . $conn->error;
    }
   ?>