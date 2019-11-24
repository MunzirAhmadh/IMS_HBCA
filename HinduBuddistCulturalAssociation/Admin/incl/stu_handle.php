<?php
	// generate the new studentid for students
	if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT stucode FROM student ORDER BY stucode DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "CH1700001";
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["stucode"];
				$pat_id = substr($lastid,5);
				$pat_id++;
				if($pat_id<9)
					$newid = "CH17"."0000".$pat_id;
				else if($pat_id<99)
					$newid =  "CH17"."000".$pat_id;
				else if($pat_id<999)
					$newid =  "Ch17"."00".$pat_id;
				else if($pat_id<9999)
					$newid =  "Ch17"."0".$pat_id;
				else
					$newid =  "CH17".$pat_id;			
			}
			mysqli_close($con);	
			return $newid;
		}
	
	/*act_mode post value contain the information of selecting perticular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_student"){
			add_student();
		}
		if($_POST['act_mode']=="load_student_data"){
			load_student_data();
		}
		if($_POST['act_mode']=="update_student"){
			update_student();
		}
	}
	
	// function used to add students
	function add_student(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		$dbh=$obj->get_pod();

		$act_mode 		= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtsid 		= mysqli_real_escape_string($con,$_POST['txtsid']);
		$txtsfname 		= mysqli_real_escape_string($con,$_POST['txtsfname']);
		$txtslname 		= mysqli_real_escape_string($con,$_POST['txtslname']);
		$txtsiname 		= mysqli_real_escape_string($con,$_POST['txtsiname']);
		$txtsadd 		= mysqli_real_escape_string($con,$_POST['txtsadd']);
		$txtscity 		= mysqli_real_escape_string($con,$_POST['txtscity']);
		$txtsnic 		= mysqli_real_escape_string($con,$_POST['txtsnic']);
		$txtsdob 		= mysqli_real_escape_string($con,$_POST['txtsdob']);
		$rdbgen 		= mysqli_real_escape_string($con,$_POST['rdbgen']);
		$txtsmobile 	= mysqli_real_escape_string($con,$_POST['txtsmobile']);
		$txtsland 		= mysqli_real_escape_string($con,$_POST['txtsland']);
		$txtsemail 		= mysqli_real_escape_string($con,$_POST['txtsemail']);
		
		
		$sth = $dbh->prepare('INSERT INTO student(stucode, stufname, stulname, stuinitialname, stuaddress,stucity,stunic,stugender,studob,stumobile,stuland,stuemail) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);');
		$sth->execute(Array($txtsid,$txtsfname,$txtslname,$txtsiname,$txtsadd,$txtscity,$txtsnic,$rdbgen,$txtsdob,$txtsmobile,$txtsland,$txtsemail));
		

			if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	
	}
	
	/*Load student details*/
	function load_student_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtsid 	  = mysqli_real_escape_string($con,$_POST['txtsid']);

		$sql = "SELECT * FROM student  WHERE stucode='$txtsid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}
	
	/*Update student details*/
	function update_student(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 		= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtsid 		= mysqli_real_escape_string($con,$_POST['txtsid']);
		$txtsfname 		= mysqli_real_escape_string($con,$_POST['txtsfname']);
		$txtslname 		= mysqli_real_escape_string($con,$_POST['txtslname']);
		$txtsiname 		= mysqli_real_escape_string($con,$_POST['txtsiname']);
		$txtsadd 		= mysqli_real_escape_string($con,$_POST['txtsadd']);
		$txtscity 		= mysqli_real_escape_string($con,$_POST['txtscity']);
		$txtsnic 		= mysqli_real_escape_string($con,$_POST['txtsnic']);
		$txtsdob 		= mysqli_real_escape_string($con,$_POST['txtsdob']);
		$rdbgen 		= mysqli_real_escape_string($con,$_POST['rdbgen']);
		$txtsmobile 	= mysqli_real_escape_string($con,$_POST['txtsmobile']);
		$txtsland 		= mysqli_real_escape_string($con,$_POST['txtsland']);
		$txtsemail 		= mysqli_real_escape_string($con,$_POST['txtsemail']);
		
		$sql = "UPDATE student SET stufname=?, stulname=?, stuinitialname=?, stuaddress=?, stucity=?, stunic=?, stugender=?, studob=?, stumobile=?, stuland=?, stuemail=? WHERE stucode=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtsfname,$txtslname,$txtsiname,$txtsadd,$txtscity,$txtsnic,$txtsdob,$rdbgen,$txtsmobile,$txtsland,$txtsemail,$txtsid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);	
	}

?>