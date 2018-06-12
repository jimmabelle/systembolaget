<?php
//error_reporting(E_ALL);

// CONNECT TO THE DATABASE
	$DB_NAME = '';
	$DB_HOST = '';
	$DB_USER = '';
	$DB_PASS = '';

	//Create connection
	$conn = new mysqli ($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	//Check connection
	if (mysqli_connect_error()) (
		//printf("Connect failed: %s\n", mysqli_connect_error());
		exit()
	)

?>
