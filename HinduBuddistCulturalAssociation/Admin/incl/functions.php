<?php
	// Load the courses to combo box
	function getcourse($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT couID,couname FROM course;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Course --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[0]."'>".$rec[1]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	
	//Load the batch to combo box
	function getbatch($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT id,batchID FROM batch WHERE batchstatus=1;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Batch --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[1]."'>".$rec[1]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	//Load the classroom to combo box
	function getclassroom($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT clroomID,clroomname FROM classroom WHERE clroomstatus=1;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Classroom --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[1]."'>".$rec[1]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	//Load the lecturer to combo box
	function getlecturer($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT id,empcode,empfname FROM employee WHERE empjob=2;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Lecturer --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[1]."'>".$rec[2]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	//Load the employees to combo box
	function getemployee($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT id,empcode,empfname,emplname FROM employee WHERE empstatus=1;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Employee --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[1]."'>".$rec[2]." ".$rec[3]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	//Load the students to combo box
	function getstudent($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT stucode,stuinitialname FROM student;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Student --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[0]."'>".$rec[1]."</option>");
			}
		}
		mysqli_close($con);
	}
	
	//Load the enroll id to combo box
	function getenrollid($id){
		$obj = new dbconnection();
		$con = $obj->getcon();
		
		$sql = "SELECT enrollID FROM enrollment;";
		
		$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		
		$nor = mysqli_num_rows($result);
		if($nor>0){
				echo('<option value="">-- Select Student --</option>');
			while($rec = mysqli_fetch_array($result)){
				echo("<option value='".$rec[0]."'>".$rec[0]."</option>");
			}
		}
		mysqli_close($con);
	}
	
?>