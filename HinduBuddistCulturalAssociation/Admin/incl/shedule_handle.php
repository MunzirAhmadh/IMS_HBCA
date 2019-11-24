<?php
require_once("dbconnection.php");
if(isset($_POST['act_mode'])){

    if($_POST['act_mode']=="load_data"){
        load_data();
    }
	if($_POST['act_mode']=="add_shedule"){
        add_shedule();
    }

}
/*This function is to load data related to schedule*/
function load_data()
{
    $obj=new dbconnection();
    $con=$obj->getcon();
    $data   = array();

    $batch 	= mysqli_real_escape_string($con,$_POST['batch']);
    $lec 	= mysqli_real_escape_string($con,$_POST['lec']);
    $chkstatus 	= mysqli_real_escape_string($con,$_POST['chkstatus']);


    if($chkstatus == "ALL") {
        //fetch table rows from mysql db
        $sql = "SELECT
            employee.empfname,
            employee.emplname,
            classroom.clroomname,
            shedule.batchID,
            shedule.schID,
            shedule.schtype,
            shedule.examtype,
            shedule.date,
            shedule.starttime,
            shedule.endtime,
            shedule.clroomID,
            shedule.lecID,
            shedule.schstatus,
            classroom.clroomlocation
            FROM
            shedule
            INNER JOIN classroom ON classroom.clroomname = shedule.clroomID
            INNER JOIN batch ON batch.batchID = shedule.batchID
            INNER JOIN employee ON employee.empcode = shedule.lecID";

        $result = mysqli_query($con, $sql) or die ("SQL Error:" . mysqli_error($con));
    }
    else{
        $where ="";
        if($lec !="" && $batch !=""){
           $where ="WHERE shedule.lecID = '".$lec."' AND shedule.batchID = '".$batch."'";
        }
        else if($lec ==""){
            $where ="WHERE shedule.batchID = '".$batch."'";
        }
        else if($batch ==""){
            $where ="WHERE shedule.lecID = '".$lec."'";
        }
        $sql = "SELECT
            employee.empfname,
            employee.emplname,
            classroom.clroomname,
            shedule.batchID,
            shedule.schID,
            shedule.schtype,
            shedule.examtype,
            shedule.date,
            shedule.starttime,
            shedule.endtime,
            shedule.clroomID,
            shedule.lecID,
            shedule.schstatus,
            classroom.clroomlocation
            FROM
            shedule
            INNER JOIN classroom ON classroom.clroomname = shedule.clroomID
            INNER JOIN batch ON batch.batchID = shedule.batchID
            INNER JOIN employee ON employee.empcode = shedule.lecID
            ".$where."";



        $result = mysqli_query($con, $sql) or die ("SQL Error:" . mysqli_error($con));
    }

    $nor = $result->num_rows;

    if($nor > 0)
    {

        while( $row = mysqli_fetch_assoc( $result ) ){

            $date = $row["date"]." ".$row["starttime"];
            $evt_data = array(

            "date"          => $date,
            "caltype"       => "EVENT",
            "id"            => $row["schID"],
            "type"          => $row["schtype"],
            "dates"         => $row["date"],
            "title"         => $row["schtype"]." Batch : ". $row["batchID"]." Class Room : " .$row["clroomname"],
            "description"   => " Location : ".$row["clroomlocation"]." Exam Type : ".$row["examtype"]." Lecturer Name : ".$row["empfname"]." ".$row["emplname"]." Batch : ". $row["batchID"]." Class Room : " .$row["clroomname"],
            "add"           => $row["schtype"]." Batch : ". $row["batchID"]." Class Room : " .$row["clroomname"],
            "aurth"         => $row["empfname"]." ".$row["emplname"],
            "starts"        => $row["starttime"],
            "ends"          => $row["endtime"],
            "status"        => $row["schstatus"],
            "url"           => $row["schtype"]." Batch : ". $row["batchID"]." Class Room : " .$row["clroomname"]
            );
            $data[] = $evt_data;
        }
    }

    echo json_encode($data);
}

/*Shedule class & exams*/
	
	function add_shedule(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$cmbtype 		= mysqli_real_escape_string($con,$_POST['cmbtype']);
		$cmbexamtype = mysqli_real_escape_string($con,$_POST['cmbexamtype']);
		$cmbbatch = mysqli_real_escape_string($con,$_POST['cmbbatch']);
		$cmbclroom 	= mysqli_real_escape_string($con,$_POST['cmbclroom']);
		$cmblecturer 	= mysqli_real_escape_string($con,$_POST['cmblecturer']);
		$txtdosch = mysqli_real_escape_string($con,$_POST['txtdosch']);
		$txtstime 	= mysqli_real_escape_string($con,$_POST['txtstime']);
		$txtetime 	= mysqli_real_escape_string($con,$_POST['txtetime']);	
		
		$sqlget1 ="SELECT * FROM shedule WHERE schtype='$cmbtype' AND examtype='$cmbexamtype' AND batchID='$cmbbatch' AND lecID ='$cmblecturer' AND clroomID ='$cmbclroom' AND date='$txtdosch' AND (starttime >='$txtstime' AND endtime <='$txtetime');";
		
		
		$resultget1 = mysqli_query($con,$sqlget1) or die("SQL Error : ".mysqli_error($con));
		$recget1= mysqli_fetch_assoc($resultget1);
		
		
		$sqlget2 ="SELECT * FROM shedule WHERE lecID ='$cmblecturer' AND date='$txtdosch' AND (starttime >='$txtstime' OR endtime <='$txtetime');";
		
		$resultget2 = mysqli_query($con,$sqlget2) or die("SQL Error : ".mysqli_error($con));
		$recget2= mysqli_fetch_assoc($resultget2);
		
		$sqlget3 ="SELECT * FROM shedule WHERE clroomID ='$cmbclroom' AND date='$txtdosch' AND (starttime >='$txtstime' OR endtime <='$txtetime');";
		
		$resultget3 = mysqli_query($con,$sqlget3) or die("SQL Error : ".mysqli_error($con));
		$recget3= mysqli_fetch_assoc($resultget3);
	
			
		if(count($recget1)>0){
			$recget1 ="sch1";
			echo json_encode($recget1);
		}
		else if(count($recget2)>0){
			$recget2 ="sch2";
			echo json_encode($recget2);
		}
		else if(count($recget3)>0){
			$recget3 ="sch3";
			echo json_encode($recget3);
		}

		else{
		
		$sth = $dbh->prepare('INSERT INTO shedule (schtype,examtype,date,starttime,endtime,batchID,clroomID,lecID,schstatus) VALUES(?,?,?,?,?,?,?,?,?);');
		$sth->execute(Array($cmbtype,$cmbexamtype,$txtdosch,$txtstime,$txtetime,$cmbbatch,$cmbclroom,$cmblecturer,1));

				if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);

		}  

	}
?>