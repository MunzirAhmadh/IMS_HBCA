<?php
if(isset($_POST['act_mode'])){
	if($_POST['act_mode']=="load_batches"){
		load_batches();
	}
	
    if($_POST['act_mode']=="add_marks"){
        add_marks();
    }

    if($_POST['act_mode']=="load_marks"){
        load_marks();
    }
	
}

/*This function is to load batches*/
function load_batches(){
    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $cmb_course = mysqli_real_escape_string($con,$_POST['cmbCourse']);


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

/*This function is to add marks*/
function add_marks(){

    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $err = 0;
    $std_no 	= $_POST['std_no'];
	$exam_mark   = $_POST['exam_mark'];
	$txtexamtype = mysqli_real_escape_string($con,$_POST['txtexamtype']);
	$cmbCourse	= mysqli_real_escape_string($con,$_POST['cmbCourse']);
	$cmbBatch	= mysqli_real_escape_string($con,$_POST['cmbBatch']);
	
	
    for ($i=0; $i < count($std_no); $i++){
        $sth = $dbh->prepare('INSERT INTO results(enrollID,batchID,couID,examtype,marks) VALUES(?,?,?,?,?);');
        $sth->execute(Array($std_no[$i],$cmbBatch,$cmbCourse,$txtexamtype,$exam_mark[$i]));
		
		
        if(count($sth)<0){
            $err++;
        }
    }

    if($err == 0){
        $status ="true";
    }
    else{
        $status ="false";
    }
    echo json_encode($status);
}

/*This function is to load marks*/
function load_marks(){
    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();

    $dbh=$obj->get_pod();

    $cmbBatch = mysqli_real_escape_string($con,$_POST['cmbBatch']);

     $sql = "SELECT student.id, enrollment.enrollID, student.stuinitialname, student.stucode, enrollment.stuID, enrollment.batchID FROM student
    INNER JOIN enrollment ON enrollment.stuID = student.stucode 
    WHERE enrollment.batchID='".$cmbBatch."'";
	
    $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
    $rows = array();


    while ($setdata = mysqli_fetch_assoc($resultget))
    {
        $rows[] = $setdata;
    }

    echo json_encode($rows);
}


