<?php
	//This code has been copied and modified from the example code provided in class
	//start the session
	session_start();

	//db connection
	require_once("database.php");

	try
	{
      		$dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	}
	catch(PDOException $e)
	{
      		echo "Connection failed: " . $e->getMessage();
	}
	
	//used to redirect to mainpage
	header("Location: mainPage.php");
	
	
	//either the form handling goes here....
	
	
	die();
	
	//or here...
?>
