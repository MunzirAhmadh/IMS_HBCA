<?php
	
		if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT batchID FROM batch ORDER BY batchID DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "B0001";
				//echo($newid);
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["batchID"];
				$pat_id = substr($lastid,4);
				$pat_id++;
				if($pat_id<9)
					$newid = "B0000".$pat_id;
				else if($pat_id<99)
					$newid =  "B000".$pat_id;
				else if($pat_id<999)
					$newid =  "B00".$pat_id;
				else if($pat_id<9999)
					$newid =  "B0".$pat_id;
				else
					$newid =  "B".$pat_id;
				//echo($newid);
			}
			mysqli_close($con);	
			return $newid;
		}
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_batch"){
			add_batch();
		}
		if($_POST['act_mode']=="load_batch_data"){
			load_batch_data();
		}
		if($_POST['act_mode']=="update_batch"){
			update_batch();
		}
	}

	function add_batch(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbcourse 	= mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$txtbid 	= mysqli_real_escape_string($con,$_POST['txtbid']);
		$txtnoofstu = mysqli_real_escape_string($con,$_POST['txtnoofstu']);
		$txtremark  = mysqli_real_escape_string($con,$_POST['txtremark']);
		$rdbstatus  = mysqli_real_escape_string($con,$_POST['rdbstatus']);
		//alert($cid);
		
		$sth = $dbh->prepare('INSERT INTO batch (batchID,batchsize,batchstatus,batchremark,couID) VALUES(?,?,?,?,?);');
		$sth->execute(Array($txtbid,$txtnoofstu,$rdbstatus,$txtremark,$cmbcourse));
		
		if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	
	}
	
	function load_batch_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtbid 		  = mysqli_real_escape_string($con,$_POST['txtbid']);

		$sql = "SELECT * FROM batch  WHERE batchID='$txtbid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}
	
		function update_batch(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
			
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 		= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbcourse 		= mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$txtbid			= mysqli_real_escape_string($con,$_POST['txtbid']);
		$txtnoofstu 	= mysqli_real_escape_string($con,$_POST['txtnoofstu']);
		$txtremark 		= mysqli_real_escape_string($con,$_POST['txtremark']);
		$rdbstatus 		= mysqli_real_escape_string($con,$_POST['rdbstatus']);
		
		$sql = "UPDATE batch SET batchsize=?, batchstatus=?, batchremark=?, couID=? WHERE batchID=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtnoofstu, $rdbstatus, $txtremark, $cmbcourse, $txtbid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);
			
	}
	
?>