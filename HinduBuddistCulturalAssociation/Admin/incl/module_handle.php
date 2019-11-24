<?php
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_module"){
			add_module();
		}
		if($_POST['act_mode']=="load_module_data"){
			load_module_data();
		}
		if($_POST['act_mode']=="update_module"){
			update_module();
		}
	}

	/*This function is to add a new module*/
	function add_module(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbcourse 	= mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$txtmname   = mysqli_real_escape_string($con,$_POST['txtmname']);
		$cmbmtype   = mysqli_real_escape_string($con,$_POST['cmbmtype']);
		$txtmdesc   = mysqli_real_escape_string($con,$_POST['txtmdesc']);
		
		$sth = $dbh->prepare('INSERT INTO modules (modname,modtype,moddescription,couID) VALUES(?,?,?,?);');
		$sth->execute(Array($txtmname,$cmbmtype,$txtmdesc,$cmbcourse));
		
		if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
	}
	
	/*This function is to load module datas*/
	function load_module_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtmid 		  = mysqli_real_escape_string($con,$_POST['txtmid']);

		$sql = "SELECT * FROM modules  WHERE modID='$txtmid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}
	
	/*This function is to update module*/
	function update_module(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txtmid 		= mysqli_real_escape_string($con,$_POST['txtmid']);
		$cmbcourse = mysqli_real_escape_string($con,$_POST['cmbcourse']);
		$txtmname = mysqli_real_escape_string($con,$_POST['txtmname']);
		$cmbmtype = mysqli_real_escape_string($con,$_POST['cmbmtype']);
		$txtmdesc 	= mysqli_real_escape_string($con,$_POST['txtmdesc']);
		
		$sql = "UPDATE modules SET modname=?, modtype=?, moddescription=?, couID=?  WHERE modID=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtmname, $cmbmtype, $txtmdesc, $cmbcourse, $txtmid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);
			
	}

?>