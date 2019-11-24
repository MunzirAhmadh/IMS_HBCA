<?php
	
	
	/*act_mode post value contain the information of selecting perticular function*/

	if(isset($_POST['act_mode'])){
		if($_POST['act_mode']=="load_emp_data"){
			load_emp_data();
		}
	}
	
	/*This function is to load employee datas*/
	function load_emp_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbStu 		  = mysqli_real_escape_string($con,$_POST['cmbStu']);

		$sql = "SELECT * FROM employee  WHERE empcode='$cmbStu';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}

	
?>