<?php
// Database configuration

function  database(){
	$dbHost     = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName     ="bdd_tiw";

	 
	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	return $db;

// Check connection
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
}
?>