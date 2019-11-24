<?php
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_clroom"){
			add_clroom();
		}
		if($_POST['act_mode']=="load_clroom_data"){
			load_clroom_data();
		}
		if($_POST['act_mode']=="update_clroom"){
			update_clroom();
		}
	}

	function add_clroom(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtclname 	= mysqli_real_escape_string($con,$_POST['txtclname']);
		$cmblocation   = mysqli_real_escape_string($con,$_POST['cmblocation']);
		$txtclsize   = mysqli_real_escape_string($con,$_POST['txtclsize']);
		$rdbclstatus   = mysqli_real_escape_string($con,$_POST['rdbclstatus']);
		//alert($cid);
		
		$sth = $dbh->prepare('INSERT INTO classroom (clroomname,clroomlocation,clroomsize,clroomstatus) VALUES(?,?,?,?);');
		$sth->execute(Array($txtclname,$cmblocation,$txtclsize,$rdbclstatus));
		
		if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	}
	
	function load_clroom_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtclid 		  = mysqli_real_escape_string($con,$_POST['txtclid']);

		$sql = "SELECT * FROM classroom  WHERE clroomID='$txtclid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}
	
	function update_clroom(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtclid 	= mysqli_real_escape_string($con,$_POST['txtclid']);
		$txtclname 	= mysqli_real_escape_string($con,$_POST['txtclname']);
		$cmblocation   = mysqli_real_escape_string($con,$_POST['cmblocation']);
		$txtclsize   = mysqli_real_escape_string($con,$_POST['txtclsize']);
		$rdbclstatus   = mysqli_real_escape_string($con,$_POST['rdbclstatus']);
		
		$sql = "UPDATE classroom SET clroomname=?, clroomlocation=?, clroomsize=?, clroomstatus=?  WHERE clroomID=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtclname, $cmblocation, $txtclsize, $rdbclstatus, $txtclid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);
			
	}

?>