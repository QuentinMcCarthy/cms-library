<?php
	$dbc = mysqli_connect(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_TABLE"));

	if($dbc){
		// var_dump("Connection successful (Code: 200)");

		$dbc->set_charset("utf8");
	} else {
		die("Database connection failed");
	}
?>
