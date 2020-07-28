<?php
	$conn = new mysqli("localhost", "root", "", "data_entry");

	if($conn ->connect_error){
		die("Could not connect to the database!".$conn->connect_error);
	}
?>