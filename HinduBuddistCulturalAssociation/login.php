<?php
require("Admin/incl/dbconnection.php"); // Get the database connection
$uname=$_POST["txtuname"];
$pass=$_POST["txtpass"];
	if(empty($uname)||empty($pass)){
		echo("1");
		exit;
	}
	
	// Create the Database Connection
	$obj=new dbconnection();
	
	$con=$obj->getCon();
	
	//Find the User In User Details Table
	$sql="SELECT * FROM users WHERE uname='$uname';";
	
	$result=$con->query($sql);
		if($con->error){
			echo($con->error);
			exit;
		}
		
	$nor=$result->num_rows;
	
	if($nor==0){
		echo("2");
		exit;
	}
	//If User exist Continue the Process 
	$rec = $result->fetch_assoc();//fecthing the result
	
	$pass = md5($pass);//hash the password and asign into pass
	
	if($pass!=$rec["upwd"]){
		echo("2");
		exit;
	}
	//Check the User Status is enable or disabled if enabled continue
	//ifdisable show error message
	else if($rec["ustatus"]=="0"){
		echo("3");
		
	}
	else{
		session_start(); // Start The Sessions
		$_SESSION["user"]["uID"]=$rec["uID"]; //Create Initial Required Session Variables
		$_SESSION["user"]["utype"]=$rec["utype"];
		
		$con->close();
		
		echo("4");	
	}
	
	
?>