<?php
	
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add"){
			add_user();
		}
		if($_POST['act_mode']=="search_user"){
			search_user();
		}
		if($_POST['act_mode']=="update_user"){
			update_user();
		}
	}


	// this function is for search a user
	function search_user(){
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$search_by = $_POST['search_by'];

		$sqlget = "SELECT * FROM users WHERE uname='$search_by';";
		$resultget = mysqli_query($con,$sqlget) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

		echo json_encode($recget);
		
	}	


	// this function is for add a new user to the system
	function add_user(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$u_id 		= mysqli_real_escape_string($con,$_POST['u_id']);
		$txtusername = mysqli_real_escape_string($con,$_POST['txtusername']);
		$cmbusertype = mysqli_real_escape_string($con,$_POST['cmbusertype']);
		$txtpassword 	= mysqli_real_escape_string($con,$_POST['txtpassword']);
		$rdbstatus 	= mysqli_real_escape_string($con,$_POST['rdbstatus']);
		

		$sqlget = "SELECT uname FROM users WHERE uname='$txtusername';";
		$resultget = mysqli_query($con,$sqlget) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);
	
		$getuser = $recget["uname"];
		/*if user alreay exsist retrun error message*/

		if($getuser == $txtusername){
			$status ="user_alr";
			echo json_encode($status);
		}
		else{
		
		$txtpassword = md5($txtpassword);
		$sth = $dbh->prepare('INSERT INTO users (uname,upwd,utype,ustatus) VALUES(?,?,?,?);');
		$sth->execute(Array($txtusername,$txtpassword,$cmbusertype,$rdbstatus));

				if(count($sth)<0){
					  
					  $status ="0";
				}
				else{
				
					$status ="1";
				}
	
				echo json_encode($status);

		}

	}

	//this function is for update user details
	function update_user(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$u_id 		= mysqli_real_escape_string($con,$_POST['u_id']);
		$txtusername = mysqli_real_escape_string($con,$_POST['txtusername']);
		$cmbusertype = mysqli_real_escape_string($con,$_POST['cmbusertype']);
		$txtpassword 	= mysqli_real_escape_string($con,$_POST['txtpassword']);
		$rdbstatus 	= mysqli_real_escape_string($con,$_POST['rdbstatus']);
	
			$sqlget = "SELECT uname FROM users WHERE uname='$txtusername' AND uID='$u_id' ;";
			$resultget = mysqli_query($con,$sqlget) or die("SQL Error : ".mysqli_error($con));
			$recget= mysqli_fetch_assoc($resultget);
		
			$getuser = $recget["uname"];
			if($getuser ==$txtusername ){	
				$txtpassword = md5($txtpassword);
				$sql = "UPDATE users SET uname=?, upwd=?, utype=?, ustatus=? WHERE uID=?";

				$stmt = $dbh->prepare($sql);
				$stmt->execute(array($txtusername, $txtpassword, $cmbusertype, $rdbstatus,$u_id));
					
					if(count($stmt)<0){
						  
						  $status ="0";
					}
					else{
					
						$status ="2";
					}
		
					echo json_encode($status);
				
				}
			else{
					$status ="3";
					echo json_encode($status);
				}
		
	}
	
?>