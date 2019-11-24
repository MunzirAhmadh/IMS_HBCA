<?php
if(isset($_POST['act_mode'])){

    if($_POST['act_mode']=="add_marks"){
        add_marks();
    }

    if($_POST['act_mode']=="load_marks"){
        load_marks();
    }
	
}
/*This function is to add marks*/
function add_marks(){

    require_once("dbconnection.php");
    $obj=new dbconnection();
    $con=$obj->getcon();


    $dbh=$obj->get_pod();

    $err = 0;
    $std_no 	= $_POST['std_no'];
    $att_com    = $_POST['att_com'];
    $att_mark   = $_POST['att_mark'];
    $att_date   = date('Y-m-d');

    for ($i=0; $i < count($std_no); $i++){
        $sth = $dbh->prepare('INSERT INTO attendancestu (enrollID,attstustatus,attstudate,attremark) VALUES(?,?,?,?);');
        $sth->execute(Array($std_no[$i],$att_mark[$i],$att_date ,$att_com[$i]));
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

    $cmb_course = mysqli_real_escape_string($con,$_POST['cmbCourse']);
    $cmb_batch	= mysqli_real_escape_string($con,$_POST['cmbBatch']);
    $today_date = date('Y-m-d');

    $sql = "SELECT student.id, enrollment.enrollID, student.stuinitialname, student.stucode FROM student
    INNER JOIN enrollment ON enrollment.stuID = student.stucode 
    WHERE enrollID NOT IN(SELECT enrollID FROM attendancestu WHERE attstudate ='".$today_date."')
    AND enrollment.batchID='".$cmb_batch."' AND enrollment.couID='".$cmb_course."'";
    $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
    $rows = array();

    while ($setdata = mysqli_fetch_assoc($resultget))
    {
        $rows[] = $setdata;
    }

    echo json_encode($rows);
}

