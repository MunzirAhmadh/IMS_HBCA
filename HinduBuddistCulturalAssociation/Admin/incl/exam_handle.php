<?php
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_exam"){
			add_exam();
		}
		if($_POST['act_mode']=="load_exam_data"){
			load_exam_data();
		}
		if($_POST['act_mode']=="update_exam"){
			update_exam();
		}
	}
	/*This function is to add*/
	function add_exam(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
				
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbcourse 	= mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$cmbetype   = mysqli_real_escape_string($con,$_POST['cmbetype']);
		$paper   = mysqli_real_escape_string($con,$_POST['paper']);
		$txtmarks   = mysqli_real_escape_string($con,$_POST['txtmarks']);
		$cmbduration   = mysqli_real_escape_string($con,$_POST['cmbduration']);
		//alert($cid);
		
		$sth = $dbh->prepare('INSERT INTO exam (examtype,paper,examduration,exammarks,couID) VALUES(?,?,?,?,?);');
		$sth->execute(Array($cmbetype,$paper,$cmbduration,$txtmarks,$cmbcourse));
		
		if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	}
	
	/*This function is to load exam details*/
	function load_exam_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 		  = mysqli_real_escape_string($con,$_POST['txteid']);

		$sql = "SELECT * FROM exam  WHERE examID='$txteid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}
	
	/*This function is to update*/
	function update_exam(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 		  = mysqli_real_escape_string($con,$_POST['txteid']);
		$cmbcourse 	= mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$cmbetype   = mysqli_real_escape_string($con,$_POST['cmbetype']);
		$paper   = mysqli_real_escape_string($con,$_POST['paper']);
		$txtmarks   = mysqli_real_escape_string($con,$_POST['txtmarks']);
		$cmbduration   = mysqli_real_escape_string($con,$_POST['cmbduration']);
		
		$sql = "UPDATE exam SET examtype=?, paper=?, examduration=?, exammarks=?, couID=?  WHERE examID=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($cmbetype, $paper, $cmbduration, $txtmarks, $cmbcourse, $txteid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);
			
	}

?>