<?php		
		if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT couID FROM course ORDER BY couID DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "CRS0001";
				//echo($newid);
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["couID"];
				$pat_id = substr($lastid,4);
				$pat_id++;
				if($pat_id<9)
					$newid = "CRS000".$pat_id;
				else if($pat_id<99)
					$newid =  "CRS00".$pat_id;
				else if($pat_id<999)
					$newid =  "CRS0".$pat_id;
				else
					$newid =  "CRS".$pat_id;
				
				//echo($newid);
			}
			mysqli_close($con);	
			return $newid;
		}

	
	/*act_mode post value contain the information of selecting particular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_course"){
			add_course();
		}
		if($_POST['act_mode']=="load_course_data"){
			load_course_data();
		}
		if($_POST['act_mode']=="update_course"){
			update_course();
		}
	}

	function add_course(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cid 		= mysqli_real_escape_string($con,$_POST['cid']);
		$txtcname = mysqli_real_escape_string($con,$_POST['txtcname']);
		$txtctitle = mysqli_real_escape_string($con,$_POST['txtctitle']);
		$txtcduration = mysqli_real_escape_string($con,$_POST['txtcduration']);
		$cmbtype = mysqli_real_escape_string($con,$_POST['cmbtype']);
		$txtaddfee 	= mysqli_real_escape_string($con,$_POST['txtaddfee']);
		$txtcfee 	= mysqli_real_escape_string($con,$_POST['txtcfee']);
		$txtcdes 	= mysqli_real_escape_string($con,$_POST['txtcdes']);
		//alert($cid);
		
		$sth = $dbh->prepare('INSERT INTO course (couID,couname,coutitle,couduration,coutype,couaddfee,coufee,coudescription) VALUES(?,?,?,?,?,?,?,?);');
		$sth->execute(Array($cid,$txtcname,$txtctitle,$txtcduration,$cmbtype,$txtaddfee,$txtcfee,$txtcdes));
		
		if(count($sth)<0){	  
					  $status ="false";
				}
				else{
					$status ="true";
				}
		echo json_encode($status);
	}
	
	
	function load_course_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$cid 		  = mysqli_real_escape_string($con,$_POST['cid']);

		$sql = "SELECT * FROM course  WHERE couID='$cid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}


	function update_course(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cid 		= mysqli_real_escape_string($con,$_POST['cid']);
		$txtcname = mysqli_real_escape_string($con,$_POST['txtcname']);
		$txtctitle = mysqli_real_escape_string($con,$_POST['txtctitle']);
		$txtcduration = mysqli_real_escape_string($con,$_POST['txtcduration']);
		$cmbtype = mysqli_real_escape_string($con,$_POST['cmbtype']);
		$txtaddfee 	= mysqli_real_escape_string($con,$_POST['txtaddfee']);
		$txtcfee 	= mysqli_real_escape_string($con,$_POST['txtcfee']);
		$txtcdes 	= mysqli_real_escape_string($con,$_POST['txtcdes']);

		
		$sql = "UPDATE course SET couname=?, coutitle=?, couduration=?, coutype=?, couaddfee=?, coufee=?, coudescription=? WHERE couID=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtcname, $txtctitle, $txtcduration, $cmbtype, $txtaddfee, $txtcfee, $txtcdes, $cid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);
			
	}
		
?>