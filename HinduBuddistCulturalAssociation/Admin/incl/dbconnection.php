<?php

//This Php class make the database connection
class dbconnection{
	
	// This Function Returns The Database Connection
	function getcon(){
		$con = mysqli_connect("localhost","root","","cmsbce") or die("Server Error");
		return $con;
	}
	function get_pod(){
		$dsn = 'mysql:dbname=cmsbce;host=localhost';
		$user = 'root';
		$password = '';

		try {
			$dbh = new PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
		return $dbh;
	}
}
?>