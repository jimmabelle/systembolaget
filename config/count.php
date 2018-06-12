<?php
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM sortiment1");

while ($countrow = mysqli_fetch_array($result)) {
		$drycker = $countrow['count']; 
	  $userCount = "".$drycker."";
	}

?>