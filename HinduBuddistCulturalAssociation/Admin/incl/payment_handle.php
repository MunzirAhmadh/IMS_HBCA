<?php
		
		if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		
		/*Generate autoinvoice code for receipt*/
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT invoiceno FROM payments ORDER BY invoiceno DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "K-INV-00001";
				
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["invoiceno"];
				$pat_id = substr($lastid,6);
				$pat_id++;
				if($pat_id<9)
					$newid = "K-INV-"."0000".$pat_id;
				else if($pat_id<99)
					$newid =  "K-INV-"."000".$pat_id;
				else if($pat_id<999)
					$newid =  "K-INV-"."00".$pat_id;
				else if($pat_id<9999)
					$newid =  "K-INV-"."0".$pat_id;
				else
					$newid =  "K-INV-".$pat_id;			
			}
			mysqli_close($con);	
			return $newid;
}
	
if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_payment"){
			add_payment();
		}
	}
	
/*This function is to add a payment*/
	function add_payment(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtinvoice 	= mysqli_real_escape_string($con,$_POST['txtinvoice']);
		$txtpaydate   = mysqli_real_escape_string($con,$_POST['txtpaydate']);
		$txtpayby   = mysqli_real_escape_string($con,$_POST['txtpayby']);
		$txteid   = mysqli_real_escape_string($con,$_POST['txteid']);
		$txtsname   = mysqli_real_escape_string($con,$_POST['txtsname']);
		$txtpayamount   = mysqli_real_escape_string($con,$_POST['txtpayamount']);
		$txtamountletter   = mysqli_real_escape_string($con,$_POST['txtamountletter']);
		$txtdue   = mysqli_real_escape_string($con,$_POST['txtdue']);
		$txtsid 	= mysqli_real_escape_string($con,$_POST['txtsid']);
		
		$sth = $dbh->prepare('INSERT INTO payments (invoiceno,paydate,payby,enrollID,payamount) VALUES(?,?,?,?,?);');
		$sth->execute(Array($txtinvoice,$txtpaydate,$txtpayby,$txteid,$txtpayamount));
		
		$sth1 = $dbh->prepare('UPDATE enrollment SET paidamount=?, balanceamnt=? WHERE enrollID=? ;');
		$sth1->execute(Array($txtpayamount,$txtdue,$txteid));
		
		
		
		
		session_start();
		$_SESSION["student"]["eid"]=$txteid;
		$_SESSION["student"]["sname"]=$txtsname;
		$_SESSION["student"]["invoice"]=$txtinvoice;
		$_SESSION["student"]["payamount"]=$txtpayamount;
		$_SESSION["student"]["amountletter"]=$txtamountletter;
		
		if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	}
	
?>