<?php
	$servername = "localhost";
	$dbname = "tk4";
	$username = "root";
	$password = "";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set error mode
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected successfully";
	} catch (PDOException $e) {
		// echo "Connection failed: " . $e->getMessage();
	}
?>