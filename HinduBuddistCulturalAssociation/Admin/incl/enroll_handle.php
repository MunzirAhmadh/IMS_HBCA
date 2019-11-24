<?php
if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT enrollID FROM enrollment ORDER BY enrollID DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "HBCA00001";
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["enrollID"];
				$pat_id = substr($lastid,4);
				$pat_id++;
				if($pat_id<9)
					$newid = "HBCA"."0000".$pat_id;
				else if($pat_id<99)
					$newid =  "HBCA"."000".$pat_id;
				else if($pat_id<999)
					$newid =  "HBCA"."00".$pat_id;
				else if($pat_id<9999)
					$newid =  "HBCA"."0".$pat_id;
				else
					$newid =  "HBCA".$pat_id;			
			}
			mysqli_close($con);	
			return $newid;
		}
	

/*act_mode post value contain the information of selecting particular function*/

if(isset($_POST['act_mode'])){

    if($_POST['act_mode']=="add_enroll"){
        add_enroll();
    }
    if($_POST['act_mode']=="load_fee"){
        load_fee();
    }
	if($_POST['act_mode']=="load_batches"){
			load_batches();
	}
	if($_POST['act_mode']=="delete_enroll"){
			delete_enroll();
		}
}

/*This function is to make a new enrollment*/
function add_enroll(){

    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $act_mode 		= mysqli_real_escape_string($con,$_POST['act_mode']);
	$txteid	 		= mysqli_real_escape_string($con,$_POST['txteid']);
    $txtdreg	 	= mysqli_real_escape_string($con,$_POST['txtdreg']);
    $cmbsid 		= mysqli_real_escape_string($con,$_POST['cmbsid']);
    $cmbcid 		= mysqli_real_escape_string($con,$_POST['cmbcid']);
    $cmbbid 		= mysqli_real_escape_string($con,$_POST['cmbbid']);
    $txtdfee 		= mysqli_real_escape_string($con,$_POST['txtdfee']);
    $txtnetfee 		= mysqli_real_escape_string($con,$_POST['txtnetfee']);

	$sqlget1 ="SELECT * FROM enrollment WHERE stuID='$cmbsid' AND batchID='$cmbbid' AND couID='$cmbcid';";
		
	$resultget1 = mysqli_query($con,$sqlget1) or die("SQL Error : ".mysqli_error($con));
	$recget1= mysqli_fetch_assoc($resultget1);
		
	if(count($recget1)>0){
			$recget1 ="error1";
			echo json_encode($recget1);
	}
		
	else{	

		$sth = $dbh->prepare('INSERT INTO enrollment (enrollID,stuID,batchID,couID,dfee,netamnt,regdate) VALUES(?,?,?,?,?,?,?);');
		$sth->execute(Array($txteid,$cmbsid,$cmbbid,$cmbcid,$txtdfee,$txtnetfee,$txtdreg));
		
		
		$sqleid='SELECT MAX(enrollID) As eid FROM enrollment'; 
		$resultget2 = mysqli_query($con,$sqleid) or die("SQL Error : ".mysqli_error($con));
		$recget2= mysqli_fetch_assoc($resultget2);
		$eid = $recget2["eid"];
		
		$sqlsname="SELECT stuinitialname FROM student WHERE stucode='$cmbsid';";
		$resultget3 = mysqli_query($con,$sqlsname) or die("SQL Error : ".mysqli_error($con));
		$recget3= mysqli_fetch_assoc($resultget3);
		$sname = $recget3["stuinitialname"];
		
		$sqlcname="SELECT couname FROM course WHERE couID='$cmbcid';";
		$resultget4 = mysqli_query($con,$sqlcname) or die("SQL Error : ".mysqli_error($con));
		$recget4= mysqli_fetch_assoc($resultget5);
		$cname = $recget5["couname"];
		
		session_start();
		$_SESSION["student"]["eid"]=$eid;
		$_SESSION["student"]["sid"]=$cmbsid;
		$_SESSION["student"]["amount"]=$txtnetfee;
		$_SESSION["student"]["sname"]=$sname;
		$_SESSION["student"]["cid"]=$cmbcid;
		$_SESSION["student"]["cname"]=$cname;
		
		if(count($sth)<0){
	
			$status ="false";
		}
		else{
	
			$status ="true";
			
			
		}
	
		echo json_encode($status);
	}
}

/*This function is to load fee for the selected course*/
function load_fee(){

    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
    $cmbcid 	  = mysqli_real_escape_string($con,$_POST['cmbcid']);

    $sql = "SELECT couaddfee,coufee FROM course WHERE couID='$cmbcid';";
    $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
    $recget= mysqli_fetch_assoc($resultget);

    echo json_encode($recget);

}

/*This function is to load batches*/
function load_batches(){
    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $cmb_course = mysqli_real_escape_string($con,$_POST['cmbcusid']);


    $sql = "SELECT *
            FROM
            batch
            WHERE couID='".$cmb_course."' AND batchstatus=1";
    $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
    $rows = array();

    while ($setdata = mysqli_fetch_assoc($resultget))
    {
        $rows[] = $setdata;
    }

    echo json_encode($rows);
}


function delete_enroll(){
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		$dbh=$obj->get_pod();

		$act_mode 			= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 			= mysqli_real_escape_string($con,$_POST['txteid']);
		
		
			$sql= "DELETE FROM enrollment WHERE enrollID=?";

			$stmt = $dbh->prepare($sql);

				
				$stmt->execute(Array($txteid));
					
				if(count($stmt)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="deleted";
				}
	
				echo json_encode($status);	 
	}
?>