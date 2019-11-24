<?php
	
	
	/*act_mode post value contain the information of selecting perticular function*/

	if(isset($_POST['act_mode'])){
		if($_POST['act_mode']=="load_stu_data"){
			load_stu_data();
		}
		 if($_POST['act_mode']=="load_student"){
        load_student();
    	}
	}
	
	/*This function is to load student data*/
	function load_stu_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbStu 		  = mysqli_real_escape_string($con,$_POST['cmbStu']);

		$sql = "SELECT * FROM student  WHERE stucode='$cmbStu';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}

/*This function is to load studnt*/
 function load_student(){
    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();

    $dbh=$obj->get_pod();

    $cmbStu = mysqli_real_escape_string($con,$_POST['cmbStu']);
	
	$sql ="SELECT
			student.stucode,
			student.stuinitialname,
			enrollment.enrollID,
			enrollment.stuID,
			enrollment.batchID,
			batch.batchID,
			course.couID,
			course.couname
			FROM
			enrollment
			INNER JOIN student ON student.stucode = enrollment.stuID
			INNER JOIN batch ON batch.batchID =enrollment.batchID
			INNER JOIN course ON course.couID = enrollment.couID
			
			WHERE enrollment.stuID='".$cmbStu."'";
			
    $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
	
    $rows = array();


    while ($setdata = mysqli_fetch_assoc($resultget))
    {
        $rows[] = $setdata;
    }

    echo json_encode($rows);
}

?>