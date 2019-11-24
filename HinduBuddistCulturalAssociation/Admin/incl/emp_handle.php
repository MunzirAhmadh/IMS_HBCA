<?php
	
	/*act_mode post value contain the information of selecting perticular function*/

	if(isset($_POST['act_mode'])){

		if($_POST['act_mode']=="add_emp"){
			add_employee();
		}
		if($_POST['act_mode']=="load_emp_data"){
			load_emp_data();
		}
		if($_POST['act_mode']=="update_emp"){
			update_employee();
		}
	}
	
	/*This function is to add an employee*/
	function add_employee(){
		
		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		$dbh=$obj->get_pod();

		
		$act_mode 		= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 		= mysqli_real_escape_string($con,$_POST['txteid']);
		$txtepfno		= mysqli_real_escape_string($con,$_POST['txtepfno']);
		$txtefname 		= mysqli_real_escape_string($con,$_POST['txtefname']);
		$txtelname 		= mysqli_real_escape_string($con,$_POST['txtelname']);
		$cmbejtitle 	= mysqli_real_escape_string($con,$_POST['cmbjtitle']);
		$cmbedepartment= mysqli_real_escape_string($con,$_POST['cmbdepartment']);
		$txtedoj 		= mysqli_real_escape_string($con,$_POST['txtedoj']);
		$txtedob 		= mysqli_real_escape_string($con,$_POST['txtedob']);
		$txtenic 		= mysqli_real_escape_string($con,$_POST['txtenic']);
		$rdbgen 		= mysqli_real_escape_string($con,$_POST['rdbgen']);
		$rdbcivil 		= mysqli_real_escape_string($con,$_POST['rdbcivil']);
		$txteadd 		= mysqli_real_escape_string($con,$_POST['txteadd']);
		$txtecity 		= mysqli_real_escape_string($con,$_POST['txtecity']);
		$txteland 		= mysqli_real_escape_string($con,$_POST['txteland']);
		$txtemobile 	= mysqli_real_escape_string($con,$_POST['txtemobile']);
		$txtemail 		= mysqli_real_escape_string($con,$_POST['txtemail']);
		$cmbeutype 		= mysqli_real_escape_string($con,$_POST['cmbeutype']);
		$rdbstatus 		= mysqli_real_escape_string($con,$_POST['rdbstatus']);
		$txtepwd 		= mysqli_real_escape_string($con,$_POST['txtepwd']);
		$txteconfpwd	 = mysqli_real_escape_string($con,$_POST['txteconfpwd']);
		
		$sqlget = "SELECT empemail FROM employee WHERE empemail='$txtemail';";
		$resultget = mysqli_query($con,$sqlget) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);
	
		$getemail = $recget["empemail"];
		/*if email alreay exsist retrun error message*/

		if($getemail == $txtemail){
			$status ="user_alr";
			echo json_encode($status);
		}
		else{
		
		$sth = $dbh->prepare('INSERT INTO employee(empcode, empfname, emplname, empepfno, empjob, empdepartment, empdoj, empdob, empnic, empgender, empcivil, empadd, empcity, empland, empmobile, empemail, empstatus,emptype) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);');
		$sth->execute(Array($txteid,$txtefname,$txtelname,$txtepfno,$cmbejtitle,$cmbedepartment,$txtedoj,$txtedob,$txtenic,$rdbgen,$rdbcivil,$txteadd,$txtecity,$txteland,$txtemobile,$txtemail,$rdbstatus,$cmbeutype));
	
			if(count($sth)>0){
		
				$txteid = md5($txteid);
				$sth = $dbh->prepare('INSERT INTO users(uname, upwd, emptype)
				VALUES(?,?,?);');
				$sth->execute(Array($txtemail,$txteid,$cmbeutype));

				if(count($sth)<0){
					  
					  $status ="false";
				}
				else{
				
					$status ="true";
				}
	
				echo json_encode($status);
				
			}
			else{
					
				$status ="false";
			}
			echo json_encode($status);
		}

	
	
	}
	
	//load employee data
	function load_emp_data(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$act_mode 	  = mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 		  = mysqli_real_escape_string($con,$_POST['txteid']);

		$sql = "SELECT * FROM employee  WHERE empcode='$txteid';";
        $resultget = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
		$recget= mysqli_fetch_assoc($resultget);

        echo json_encode($recget);

	}

	/*Update employee details*/
	function update_employee(){

		require_once("dbconnection.php");
		$obj=new dbconnection();
		$con=$obj->getcon();
		
		
		$dbh=$obj->get_pod();
		
		$err=0;

		$act_mode 	= mysqli_real_escape_string($con,$_POST['act_mode']);
		$txteid 		= mysqli_real_escape_string($con,$_POST['txteid']);
		$txtepfno = mysqli_real_escape_string($con,$_POST['txtepfno']);
		$txtefname = mysqli_real_escape_string($con,$_POST['txtefname']);
		$txtelname 	= mysqli_real_escape_string($con,$_POST['txtelname']);
		$cmbejtitle 	= mysqli_real_escape_string($con,$_POST['cmbjtitle']);
		$cmbedepartment 	= mysqli_real_escape_string($con,$_POST['cmbdepartment']);
		$txtedoj 	= mysqli_real_escape_string($con,$_POST['txtedoj']);
		$txtedob = mysqli_real_escape_string($con,$_POST['txtedob']);
		$txtenic 	= mysqli_real_escape_string($con,$_POST['txtenic']);
		$rdbgen = mysqli_real_escape_string($con,$_POST['rdbgen']);
		$rdbcivil 	= mysqli_real_escape_string($con,$_POST['rdbcivil']);
		$txteadd 	= mysqli_real_escape_string($con,$_POST['txteadd']);
		$txtecity = mysqli_real_escape_string($con,$_POST['txtecity']);
		$txteland 	= mysqli_real_escape_string($con,$_POST['txteland']);
		$txtemobile 	= mysqli_real_escape_string($con,$_POST['txtemobile']);
		$txtemail 	= mysqli_real_escape_string($con,$_POST['txtemail']);
		$cmbeutype = mysqli_real_escape_string($con,$_POST['cmbeutype']);
		$rdbstatus 	= mysqli_real_escape_string($con,$_POST['rdbstatus']);
		$txtepwd 		= mysqli_real_escape_string($con,$_POST['txtepwd']);
		$txteconfpwd	 = mysqli_real_escape_string($con,$_POST['txteconfpwd']);
		
		$sql = "UPDATE employee SET empfname=?, emplname=?, empepfno=?, empjob=?, empdepartment=?, empdoj=?, empdob=?, empnic=?, empgender=?, empcivil=?,  empadd=?, empcity=?, empland=?, empmobile=?, empemail=?, empstatus=?, emptype=? WHERE empcode=?";
		$sth = $dbh->prepare($sql);
		$sth->execute(Array($txtefname,$txtelname,$txtepfno,$cmbejtitle,$cmbedepartment,$txtedoj,$txtedob,$txtenic,$rdbgen,$rdbcivil,$txteadd,$txtecity,$txteland,$txtemobile,$txtemail,$rdbstatus,$cmbeutype,$txteid));
				
			if(count($sth)<0){
				  
				$status ="false";
			}
			else{
			
				$status ="updated";
			}
			echo json_encode($status);	
	}

	/*Get auto generated newid for employees*/
	if(isset($_GET["type"])){
			if($_GET["type"]=="newid"){
			newId();
			}
		}
		
		function newId(){
			$obj = new dbconnection();
			$con = $obj->getcon();
			
			$sql = "SELECT empcode FROM employee ORDER BY empcode DESC LIMIT 1;";
			
			$result = mysqli_query($con,$sql) or die("SQL Error : ".mysqli_error($con));
			$nor = $result->num_rows;
			if($nor==0){
				$newid = "E0001";
				//echo($newid);
			}
			else{
				$rec = mysqli_fetch_assoc($result);
				$lastid = $rec["empcode"];
				$pat_id = substr($lastid,4);
				$pat_id++;
				if($pat_id<9)
					$newid = "E"."000".$pat_id;
				else if($pat_id<99)
					$newid =  "E"."00".$pat_id;
				else if($pat_id<999)
					$newid =  "E"."0".$pat_id;
				else
					$newid =  "E".$pat_id;
				
				//echo($newid);
			}
			mysqli_close($con);	
			return $newid;
		}
?>