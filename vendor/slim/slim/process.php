<?php
	$id = $argv[1];
	$message = $argv[2];

	function getConnection() {
    	$dbhost="localhost";
    	$dbuser="root";
    	$dbpass="Sellerworx123";
    	$dbname="practice";
    	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);  
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $dbh;
    }

	$conn = getConnection();
	$sql = "INSERT INTO yosemite VALUES ('$id', '$message')";
	$conn->query($sql);
	error_log("third");
?>