<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php'); 
	require_once('../incl/dbconnection.php'); 
	require("../incl/emp_handle.php");
	$newid = newId();
?>


<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>
				&nbsp;&nbsp; Add New Employee
			</h1>
		</div><!-- /.page-header -->
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="input-group">
				<!--to get action mode whether it is search, update or insert -->
                <input type="hidden" id="act_mode" value="" />
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
			<form class="form-horizontal">
				<div class="col-lg-10">                                   
                    <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Employee ID \ E.P.F. No<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<input type="text" class="form-control1" id="txteid" readonly="readonly" value="<?php echo($newid);?>"  style="width:225px">
         				</div>
          				<div class="col-sm-4">
							<input type="text" class="form-control" id="txtepfno" placeholder="E.P.F. No" value="">
						</div>
        			</div>
                
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">First Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtefname" placeholder="First Name" value="">
                            <div id="errfname" class="error_div"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Last Name<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtelname" placeholder="Last Name" value="">
                            <div id="errlname" class="error_div"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Job Title \ Department<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<select class="form-control" id="cmbjtitle" >
                                <option value="">-- Select Job Title --</option>
                                <option value="1">Administrator</option>
                                <option value="2">Lecturer</option>
                                <option value="3">Branch Manager</option>
                            </select>
                            <div id="errjtitle" class="error_div"></div>
         				</div>
          				<div class="col-sm-4">
							<select class="form-control" id="cmbdepartment" >
                            	<option value="">-- Select Department --</option>
                                <option value="1">English</option>
                                <option value="2">SInhala</option>
                            </select>
                            <div id="errdepartment" class="error_div"></div>
						</div>
        			</div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Date of Join \ Date of Birth<span style="color:#f00">*</span></label>
                        <div class="col-sm-4">
                            <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"   placeholder="Date of Join"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            </div>
                            <div id="errdoj" class="error_div"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedob" data-date-format="yyyy-mm-dd"   placeholder="Date of Birth"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            </div>
                            <div id="errdob" class="error_div"></div>
                        </div>
                    </div>
           
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">NIC<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtenic" placeholder="NIC" value="" maxlength="12">
                            <div id="errnic" class="error_div"></div>
                        </div>
                        <label class="col-sm-offset-4  input-format">Format : (000000000V / 000000000000)</label>
                    </div>
                    
                     <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Gender \ Civil Status<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<label class="radio-inline">
								 <input type="radio" value="1" name="rdbgen" id="rdbmale">Male
							</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<label class="radio-inline">
								<input type="radio" value="0" name="rdbgen" id="rdbfemale">Female
							</label>
                            <div id="errgender" class="error_div"></div>
         				</div>
          				<div class="col-sm-4">
							<label class="radio-inline">
								 <input type="radio" value="1" name="rdbcivil" id="rdbsingle">Single
							</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<label class="radio-inline">
								<input type="radio" value="0" name="rdbcivil" id="rdbmarried">Married
							</label>
						</div>
        			</div>
                    

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Address <span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                         	<textarea class="form-control" id="txteadd" placeholder="Address"></textarea>
                            <div id="erradd1" class="error_div"></div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">City<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtecity" placeholder="City" value="">
                            <div id="errcity" class="error_div"></div>
                        </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Contact Number<span style="color:#f00">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txteland" placeholder="Land Number" value="" maxlength="10">
                            <div id="errland" class="error_div"></div>
                        </div>
                         <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtemobile" placeholder="Mobile Number" value="" maxlength="10">
                            <div id="errmobile" class="error_div"></div>
                        </div>
                        <label class="col-sm-offset-4  input-format">Format : (0000000000)</label>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Email<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="txtemail" placeholder="Email" value="">
                            <div id="erremail" class="error_div"></div>
                        </div>
                        <label class="col-sm-offset-4  input-format">Format : (abc@abc.lk)</label>
                    </div>
                    
                     <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Status<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                            	 <input type="radio" value="1" name="rdbstatus" id="rdbactive">Active
                            </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        	<label class="radio-inline">
                            	<input type="radio" value="0" name="rdbstatus" id="rdbdeactive">Deactive
                       		 </label>
                        </div>
                         <div id="errstatus" class="error_div"></div>
                     </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">User Type<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" id="cmbeutype">
                            	<option value="">-- Select User Type --</option>
                                <option value="1">Administrator</option>
                                <option value="2">Lecturer</option>
                                <option value="3">Branch Manager</option>
                            </select>
                            <div id="errutype" class="error_div"></div>
                        </div>
                	</div> 
                     
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label"id="pw"> Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="txtepwd" placeholder="Password" value="">
                            <div id="errpass" class="error_div"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label"id="cpw">Confirm Password<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="txteconfpwd" placeholder="Confirm Password" value="">
                            <div id="errconfpass" class="error_div"></div>
                        </div>
                    </div>         
		</br>
        
        <!-- Button Group -->
					<div class="row">
						<div class="col-lg-12  pull-right">
							<div class="buttons pull-right">
								<button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
								<button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
							</div>
						</div>
					 </div>
				</div>    
			</form>
		</div>
	</div><!-- /.row -->
    
    </br>
       <!---------------------- View Employee -------------------->
    
    <div class="row">
		<div class="col-sm-12" >
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
						<th align="center">Employee ID</th>
						<th align="center">First Name</th>
                        <th align="center">Last Name</th>
						<th align="center">Job Title</th>
						<th align="center">Department</th>
                        <th align="center">Status</th>
                        <th align="center">Edit</th>					
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM employee";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="left"><?php echo $setdata['empcode'] ?></td>
								<td><?php echo $setdata['empfname'] ?></td>
								<td><?php echo $setdata['emplname'] ?></td>
								<td>
									<?php 
                                    	 switch($setdata["empjob"]){
                                            case "1":
                                                $job = "Admin";
                                                break;
                                            case "2":
                                                $job = "Lecturer";
                                                break;
											case "3":
                                                $job = "Branch Manager";
                                                break;
                                        }
                                       echo $job;
                                    ?>
                                </td>
                                <td>
									<?php 
									switch($setdata["empdepartment"]){
                                            case "1":
                                                $dep = "English";
                                                break;
                                     }
                                     echo $dep;
									?>
                                </td>
                                <td> 
								   <?php 
                                       switch($setdata["empstatus"]){
                                            case "1":
                                                $status = "Active";
                                                break;
                                            case "2":
                                                $status = "Deactive";
                                                break;
                                        }
                                       echo $status;
                                    ?>
                                </td>
                                <td align="center"> 
									<?php 
									echo "<button type='button' value=".$setdata['empcode']." id=".$setdata['empcode']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>&nbsp;Edit</button>";
									?>
                                </td>
                            </tr>
						<?php
								
						}

					}
					else{
					?>
						<tr><td colspan="6">No record found</td></tr>
					<?php
					}

				 
				?>

				</tbody>
			</table>
		</div>
	</div><!-- /.row -->
    
<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->



<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add_emp');
        //clear_form();
		$('#table-data').DataTable();
		$('#rdbactive').attr("checked",true);
    });
	
	/*this function is used for calender setup*/
	$('#txtedoj').datepicker({
			autoclose: true,
            todayHighlight: true
        });	
	$('#txtedob').datepicker({
			autoclose: true,
            todayHighlight: true,
			endDate: '+0d'
        });	
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
        $(".error_div").text('');
        $(".error_div").hide();
    }

    /*this function is used for save and update employee iformation*/
    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
        var txteid = $("#txteid").val();
		var txtepfno = $("#txtepfno").val();
        var txtefname = $("#txtefname").val();
        var txtelname = $("#txtelname").val();
		var cmbjtitle = $("#cmbjtitle").val();
		var cmbdepartment = $("#cmbdepartment").val();
		var txtedoj = $("#txtedoj").val();
		var txtedob = $("#txtedob").val();
        var txtenic = $("#txtenic").val();
        var txteadd = $("#txteadd").val();
        var txtecity = $("#txtecity").val();
		var txteland = $("#txteland").val();
        var txtemobile = $("#txtemobile").val();
        var txtemail = $("#txtemail").val();
		var cmbeutype = $("#cmbeutype").val();
		var txtepwd = $("#txtepwd").val();
        var txteconfpwd = $("#txteconfpwd").val();
		var rdbcivil = $("input[name='rdbcivil']:checked").val(); 
		var rdbgen = $("input[name='rdbgen']:checked").val();
	    var status="";
			if($("#rdbactive").is(':checked')){
				status=1;
			}
			else{
				status=0;
			}
		var rdbstatus = status;
		
        var err = 0;
		
        var pnumrule = /^[0][0-9]{9}$/;
        var emailrule = /^[a-zA-Z\d\.\_]+\@[a-zA-Z\d\-]+\.[a-zA-Z]{2,4}$/;
        var nicrule = /(^[0-9]{9}[v,x,V,X]$)|(^[0-9]{12}$)/;

        if (txtefname == "") {
            $("#errfname").text('Please fill employee first name');
            err++;
        }
        if (txtelname == "") {
            $("#errlname").text('Please fill employee last name');
            err++;
        }
		if (cmbjtitle == "") {
            $("#errjtitle").text('Please select employee job title');
            err++;
        }
		 if (cmbdepartment == "") {
            $("#errdepartment").text('Please fill employee department');
            err++;
        }
		 if (txtedoj == "") {
            $("#errdoj").text('Please fill employee date of join');
            err++;
        }
		 if (txtedob == "") {
            $("#errdob").text('Please fill employee date of birth');
            err++;
        }
        if (txtenic == "") {
            $("#errnic").text('Please fill employee NIC');
            err++;

        }
        if (txtenic != "") {

            if (!txtenic.match(nicrule)) {
                $("#errnic").text("Invalid NIC number");
                err++;
            }
        }
        if (txteadd == "") {
            $("#erradd1").text('Please fill employee address');
            err++;
        }
        if (txtecity == "") {
            $("#errcity").text('Please fill employee city');
            err++;
        }
		if (txteland == "") {
            $("#errland").text('Please fill employee phone number');
            err++;
        }
        if (txteland != "") {
            if (!txteland.match(pnumrule)) {
                $("#errland").text("Invalid Phone number");
                err++;
            }
        }
        if (txtemobile == "") {
            $("#errmobile").text('Please fill employee phone number');
            err++;
        }
        if (txtemobile != "") {
            if (!txtemobile.match(pnumrule)) {
                $("#errmobile").text("Invalid Phone number");
                err++;
            }
        }
        if (txtemail == "") {
            $("#erremail").text('Email can not leave empty');
            err++;
        }
        if (txtemail != "") {
            if (!txtemail.match(emailrule)) {
                $("#erremail").text("Invalid email address");
                err++;
            }
        }
		if (cmbeutype == "") {
            $("#errutype").text('Please fill employee type');
            err++;
        }
      
		if (txtepwd == "") {
                $("#errpass").text('Password can not leave empty');
                err++;
            }

            else {
    
                if (txteconfpwd == "" || txteconfpwd  != txtepwd ) {
                $("#errconfpass").text('Password verification failed');
                err++;
            }

        }
		
        if (err > 0) {
            $(".error_div").show();
        } else {
            $.post('../incl/emp_handle.php', {
                    'act_mode': act_mode,
                    'txteid': txteid,		
					'txtepfno': txtepfno,
                    'txtefname': txtefname,
                    'txtelname': txtelname,
					'cmbjtitle': cmbjtitle,
					'cmbdepartment': cmbdepartment,
					'txtedoj': txtedoj,
					'txtedob': txtedob,
                    'txtenic': txtenic,
                    'rdbgen': rdbgen,
					'rdbcivil': rdbcivil,
					'txteadd': txteadd,
                    'txtecity': txtecity,
                    'txteland': txteland,
                    'txtemobile': txtemobile,
                    'txtemail': txtemail,
					'rdbstatus': rdbstatus,
					'cmbeutype': cmbeutype,
                    'txtepwd': txtepwd,
                    'txteconfpwd': txteconfpwd,
                },
				
				 function(data) {
                    if (data == "true") {
                        alert("New Employee added successfuly");
                        location.href="";
                    }else if (data == "user_alr") {
                        alert("This email already exists");
                        $("#erremail").text("This email already exists");
                        $("#erremail").show();
                        $("#txtemail").focus();
                    } else if(data == "updated"){
                        alert("Employee details updated successfuly");
                        location.href="";
                    }else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
	
	
	//------------------------------------------------------------------------------------------------------------//	
	/*this function is used to load employee information*/ 
	$('.btn_edit').click(function() {
	var btn_val= $(this).val();
	
    var r=confirm("Do You Want to Edit Employee Details?");
    if(r==true){
        
        var act_mode = "load_emp_data";
        var txteid = $(this).val();


        $.post('../incl/emp_handle.php', {
            'act_mode': act_mode,
            'txteid': txteid,
        },
		
        function(data) {
          
            if(data!=="")
            {
				$("#act_mode").val("update_emp");
                $("#txteid").val(data["empcode"]);
                $("#txtepfno").val(data["empepfno"]);
                $("#txtefname").val(data["empfname"]);
                $("#txtelname").val(data["emplname"]);
                $("#cmbjtitle").val(data["empjob"]);
                $("#cmbdepartment").val(data["empdepartment"]);
                $("#txtedoj").val(data["empdoj"]);
                $("#txtedob").val(data["empdob"]);
                $("#txtenic").val(data["empnic"]);
				var rdbgen = data["empgender"];
				$("#rdbgen").val(rdbgen);
						if(rdbgen==1){
							$('#rdbmale').attr("checked",true);
						}
						else{
							$('#rdbfemale').attr("checked",true);
						}
				var rdbcivil = data["empcivil"];
				$("#rdbcivil").val(rdbcivil);
						if(rdbgen==1){
							$('#rdbsingle').attr("checked",true);
						}
						else{
							$('#rdbmarried').attr("checked",true);
						}
                $("#txteadd").val(data["empadd"]);
				$("#txtecity").val(data["empcity"]);
                $("#txteland").val(data["empland"]);
                $("#txtemobile").val(data["empmobile"]);
                $("#txtemail").val(data["empemail"]);
				$("#rdbstatus").val(data["empstatus"]);
                $("#cmbeutype").val(data["emptype"]);
				
            }
        },"json" );
    }else{
        location.href="";
    }   
});
</script>



