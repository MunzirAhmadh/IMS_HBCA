<?php
	// Start The Sessions
	session_start();
	//if the Session is not equal redirect to index page
	if(!isset($_SESSION["user"])){
		header("location:index.php");
	}
	$type = $_SESSION["user"]["utype"];
	
	//if user type = Admin redirect to Admin's page
	if($type=="1"){
		header("location:Admin/index.php"); 
	}
	//if user type = Lecturer redirect to Lecturer's page
	else if($type=="2"){
		header("location:Admin/lecturer.php");
	}
	//if user type = Reception redirect to Reception's page
	else if($type=="3"){
		header("location:Admin/reception.php");
	}
	else if($type=="4"){
		header("location:Admin/stu.php");
	}
?>