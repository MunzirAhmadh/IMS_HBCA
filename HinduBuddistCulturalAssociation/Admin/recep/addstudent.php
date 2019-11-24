<?php 
	require_once('../incl/header.php');
	require_once('../incl/recepsidebar.php'); 
	require_once('../incl/dbconnection.php'); 
	require("../incl/stu_handle.php");
	$newid = newId();
?>


<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>
				&nbsp;&nbsp; Register Student
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
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label" >Student ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control1" id="txtsid" readonly="readonly" value="<?php echo($newid);?>"  style="width:610px"/>
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">First Name<span style="color:#f00">*</span></label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" id="txtsfname" placeholder="Student Name">
                  	 <div id="errfname" class="error_div"></div>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name<span style="color:#f00">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtslname" placeholder="Student Name">
                     <div id="errlname" class="error_div"></div>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name with Initial<span style="color:#f00">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtsiname" placeholder="Name with Initial">
                     <div id="erriname" class="error_div"></div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Address<span style="color:#f00">*</span></label>
                    <div class="col-sm-8">
                        <textarea id="txtsadd" class="form-control" placeholder="Address"></textarea>
                        <div id="erradd" class="error_div"></div>
                    </div>
                </div>
                
                 <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">City<span style="color:#f00">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtscity" placeholder="City" value="">
                            <div id="errcity" class="error_div"></div>
                        </div>
                    </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">NIC No \ Date of Birth<span style="color:#f00">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  id="txtsnic" placeholder="NIC">
                     <div id="errnic" class="error_div"></div>
                    <label class="col-sm-10  input-format">Format : (000000000V / 000000000000)</label>
                  </div>
                  
                  <div class="col-sm-4">
                      <div class='input-group date date-picker'>
                        <input type="text" class="form-control" id="txtsdob" data-date-format="yyyy-mm-dd"   placeholder="Date of Birth"/>
                         <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>
                      </div>
                       <div id="errdob" class="error_div"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="inputEmail3">Gender<span style="color:#f00">*</span></label>
                  <div class="col-sm-8">
                    <label class="radio-inline">
                              <input type="radio" value="1" name="rdbgen" id="rdbmale">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="0" name="rdbgen" id="rdbfemale">Female
                        </label>
                         <div id="errgender" class="error_div"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Mobile No \ Landline No<span style="color:#f00">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtsmobile" placeholder="Mobile No">
                    <div id="errmobile" class="error_div"></div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtsland" placeholder="Landline No">
                    <div id="errland" class="error_div"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Email<span style="color:#f00">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtsemail" placeholder="Email">
                     <div id="erremail" class="error_div"></div>
                  </div>
                </div>
				</br>
				
				<!-- Button Group -->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="buttons pull-right">
                        <button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                        <button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                    </div>
                </div>
             </div>
	 
		  </form>
		</div>
	</div><!-- /row -->
    
    </br>
    <!---------------------- View Student -------------------->
    
    <div class="row">
		<div class="col-sm-12" >
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
						<th align="center">Student ID</th>
						<th align="center">First Name</th>
						<th align="center">Last Name</th>
                        <th align="center">Name with Initial</th>
                        <th align="center">Email</th>
                        <th align="center">Edit</th>				
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM student";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="left"><?php echo $setdata['stucode'] ?></td>
								<td><?php echo $setdata['stufname'] ?></td>
								<td><?php echo $setdata['stulname'] ?></td>
                                <td><?php echo $setdata['stuinitialname'] ?></td>
                                <td><?php echo $setdata['stuemail'] ?></td>
                               <td align="center">
                               	<?php 
									echo "<button type='button' value=".$setdata['stucode']." id=".$setdata['stucode']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>&nbsp;Edit</button>";
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
	</div>
    

<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add_student');
        clear_form();

    });
	
	$('#table-data').DataTable();
	
	/*this function is used for calender setup*/	
	$('#txtsdob').datepicker({
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

    /*this function is used for save and update student iformation*/
    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
        var txtsid = $("#txtsid").val();
        var txtsfname = $("#txtsfname").val();
        var txtslname = $("#txtslname").val();
		var txtsiname = $("#txtsiname").val();
		var txtsadd = $("#txtsadd").val();
		var txtscity = $("#txtscity").val();
		var txtsnic = $("#txtsnic").val();
		var txtsdob = $("#txtsdob").val();
		var txtsmobile = $("#txtsmobile").val();
		var txtsland = $("#txtsland").val();
        var txtsemail = $("#txtsemail").val();
	    var rdbgen = $("input[name='rdbgen']:checked").val();
		//alert(txteid);
		
        var err = 0;

        var pnumrule = /^[0][0-9]{9}$/;
        var emailrule = /^[a-zA-Z\d\.\_]+\@[a-zA-Z\d\-]+\.[a-zA-Z]{2,4}$/;
        var nicrule = /(^[0-9]{9}[v,x,V,X]$)|(^[0-9]{12}$)/;

         if (txtsfname == "") {
            $("#errfname").text('Please fill student first name');
            err++;
        }
        if (txtslname == "") {
            $("#errlname").text('Please fill student last name');
            err++;
        }
		if (txtsiname == "") {
            $("#erriname").text('Please fill student name with initials');
            err++;
        }
		if (txtsadd == "") {
            $("#erradd").text('Please fill student address line');
            err++;
        }
		 if (txtscity == "") {
            $("#errcity").text('Please fill student city');
            err++;
        }
		 if (txtsnic != "") {
            if (!txtsnic.match(nicrule)) {
                $("#errnic").text("Invalid NIC number");
                err++;
            }
        }
		if (txtsdob == "") {
            $("#errdob").text('Please fill student date of birth');
            err++;
        }
		if (rdbgen == "") {
            $("#errgender").text('Please fill student gender');
            err++;
        }
		 if (txtsmobile == "") {
            $("#errmobile").text('Please fill student phone number');
            err++;
        }
        if (txtsmobile != "") {
            if (!txtsmobile.match(pnumrule)) {
                $("#errmobile").text("Invalid Phone number");
                err++;
            }
        }
		if (txtsland == "") {
            $("#errland").text('Please fill student phone number');
            err++;
        }
        if (txtsland != "") {
            if (!txtsland.match(pnumrule)) {
                $("#errland").text("Invalid Phone number");
                err++;
            }
        }
		 if (txtsemail == "") {
            $("#erremail").text('Email can not leave empty');
            err++;
        }
		if (txtsemail != "") {
            if (!txtsemail.match(emailrule)) {
                $("#erremail").text("Invalid email address");
                err++;
            }
        }
		
        if (err > 0) {
            $(".error_div").show();
        } else {
            $.post('../incl/stu_handle.php', {
                    'act_mode': act_mode,
                    'txtsid': txtsid,
                    'txtsfname': txtsfname,
                    'txtslname': txtslname,
					'txtsiname': txtsiname,
					'txtsadd': txtsadd,
					'txtscity': txtscity,
					'txtsnic': txtsnic,
					'txtsdob': txtsdob,
                    'rdbgen': rdbgen,
					'txtsmobile': txtsmobile,
                    'txtsland': txtsland,
                    'txtsemail': txtsemail,
                },
			
                function(data) {
                    if (data == "true") {
                        alert("New Student added successfuly","success");
                        location.href="";
                    }else if(data == "updated"){
                        alert("Student details updated successfuly");
                        location.href="";
                    }else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
	
	//------------------------------------------------------------------------------------------------------------//	
	/*this function is used for load student information*/ 
	$('.btn_edit').click(function() {
	var btn_val= $(this).val();
	
    var r=confirm("Do You Want to Edit Employee Details?");
    if(r==true){
        
        var act_mode = "load_student_data";
        var txtsid = $(this).val();


        $.post('../incl/stu_handle.php', {
            'act_mode': act_mode,
            'txtsid': txtsid,
        },
		
        function(data) {
          
            if(data!=="")
            {
				$("#act_mode").val("update_student");
                $("#txtsid").val(data["stucode"]);
                $("#txtsfname").val(data["stufname"]);
                $("#txtslname").val(data["stulname"]);
				$("#txtsiname").val(data["stuinitialname"]);
                $("#txtsadd").val(data["stuaddress"]);
				$("#txtscity").val(data["stucity"]);
                $("#txtsnic").val(data["stunic"]);
                $("#txtsdob").val(data["studob"]);
                $("#txtsmobile").val(data["stumobile"]);
                $("#txtsland").val(data["stuland"]);
                $("#txtsemail").val(data["stuemail"]);
				$("#txtspic").val(data["stupic"]);
				var rdbgen = data["stugender"];
				$("#rdbgen").val(rdbgen);
						if(rdbgen==1){
							$('#rdbmale').attr("checked",true);
						}
						else{
							$('#rdbfemale').attr("checked",true);
						}
            }
        },"json" );
    }else{
        location.href="";
    }
});
</script>



