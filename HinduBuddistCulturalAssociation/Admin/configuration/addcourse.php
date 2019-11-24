<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php');
	require("../incl/course_handle.php");
	$newid = newId();
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                Add New Course
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
	
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="input-group">
				<!--to get action mode whether it is search, update or insert -->
                <input type="hidden" id="act_mode" value="" />
			</div>
		</div>
	</div>
	
		<div class="col-md-6 col-md-offset-1">
        <span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
			<form class="form-horizontal">
				<div class="row">
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label" >Course ID</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="cid" readonly="readonly" value="<?php echo($newid);?>"  />
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Course Name<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="txtcname" placeholder="Course Name">
						  	<div id="errcname" class="error_div"></div>
                          </div>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Course Title<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="txtctitle" placeholder="Course Title">
						  	<div id="errctitle" class="error_div"></div>
                          </div>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Duration \ Type<span style="color:#f00">*</span></label>
						  <div class="col-sm-3">
							<input type="text" class="form-control" id="txtcduration" placeholder="Duration">
						   	<div id="errcduration" class="error_div"></div>
                           </div>
						   <div class="col-sm-5">
								<select class="form-control" id="cmbtype">
                                	<option value="">-- Select Duration Type --</option>
									<option value="1">Month</option>
									<option value="2">Week</option>
								</select>
                                <div id="errctype" class="error_div"></div>
						   </div>
					   </div>  
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Admission Fee<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="txtaddfee" placeholder="Admission Fee">
                            <div id="erraddfee" class="error_div"></div>
                          </div>
                          <label class="col-sm-offset-4 input-format">Format : (00000.00)</label>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Course Fee<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="txtcfee" placeholder="Course Fee" >
                            <div id="errcfee" class="error_div"></div> 
						  </div>
                           <label class="col-sm-offset-4 input-format">Format : (00000.00)</label>
					  </div>
                      <div class="form-group">
							  <label for="inputEmail3" class="col-sm-4 control-label">Description</label>
							  <div class="col-sm-8">
                                    <textarea  id="txtcdes" class="form-control" placeholder="Description"></textarea>
							  </div>
						</div>
				</div>         
                
                <div class="row">
                    <div class="col-md-12 col-md-offset-1">
                        <div class="buttons pull-right">
                            <button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                        </div>
                    </div>
              </div>  
			</form>
		</div>
	</div>
    
    </br>
    
    <!-- View the course table -->
  <div class="row">
		<div class="col-sm-12" >
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
						<th align="center">Course ID</th>
						<th align="center">Course Name</th>
                        <th align="center">Course Title</th>
                        <th align="center">Admission Fees</th>
						<th align="center">Course Fees</th>
                        <th align="center">Edit</th>						
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM course";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="left"><?php echo $setdata['couID'] ?></td>
								<td><?php echo $setdata['couname'] ?></td>
                                <td><?php echo $setdata['coutitle'] ?></td>
                                <td><?php echo $setdata['couaddfee'] ?></td>
                                <td><?php echo $setdata['coufee'] ?></td>
								<td>
									<?php 
									echo "<button type='button' value=".$setdata['couID']." id=".$setdata['couID']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>&nbsp;Edit</button>";
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
	
    
     <!-- Button Group -->
          <div class="row">
				<div class="col-lg-12  pull-right">
					<div class="buttons pull-right">
					</br>
						<button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
						<button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
					</div>
				</div>
			 </div>
        </div> <!-- / data table -->   
<?php require_once('../incl/footer.php'); ?>                
</div><!-- /.page-content -->


<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add_course');
       // clear_form();
		$('#table-data').DataTable();
    });
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
        $(".error_div").text('');
        $(".error_div").hide();
    }
	
	
//------------------------------------------------------------------------------------------------------------//
	/*this function is used for save and update course information*/       
	$('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
		var act_mode = $("#act_mode").val();
       	var cid = $("#cid").val();
        var txtcname = $("#txtcname").val();
        var txtctitle = $("#txtctitle").val();
        var txtcduration = $("#txtcduration").val();
        var cmbtype = $("#cmbtype").val();
		var txtaddfee = $("#txtaddfee").val();
		var txtcfee = $("#txtcfee").val();
		var txtcdes = $("#txtcdes").val(); 
	   
        var err = 0;
		
		if (txtcname == "") {
            $("#errcname").text('Please fill course name');
            err++;
        }
        if (txtctitle == "") {
            $("#errctitle").text('Please fill course title');
            err++;
        }
		if (txtcduration == "") {
            $("#errcduration").text('Please select course duration');
            err++;
        }
         if (cmbtype == "") {
            $("#errctype").text('Please select type');
            err++;
        }
         if (txtaddfee == "") {
            $("#erraddfee").text('Please fill admision fee');
            err++;
        }
		 if (txtcfee == "") {
            $("#errcfee").text('Please fill course fee');
            err++;
        }
		

         if (err > 0) {
            $(".error_div").show();
        } else {
			 $.post('../incl/course_handle.php', {
                    'act_mode'		: act_mode,
                    'cid'			: cid,
                    'txtcname'		: txtcname,
					'txtctitle'		: txtctitle,
					'txtcduration'	: txtcduration,
                    'cmbtype'		: cmbtype,
                    'txtaddfee'		: txtaddfee,
                    'txtcfee'		: txtcfee,
					'txtcdes'		: txtcdes,   
                },
                function(data) {
                    if (data == "true") {
                        alert("New Course added successfuly");
						location.href="";
                    }if (data == "updated") {
                         alert("Course details updated successfuly");  
						location.href="";
					}else {
                    }
                }, "json");
        }
    });
	
//------------------------------------------------------------------------------------------------------------//	
	/*this function is used for load course informations for update */
	$('.btn_edit').click(function() {
		var btn_val= $(this).val();
		//alert(btn_val);
		
		var r=confirm("Do you want to edit this record?");
		if(r==true){
			//alert("abc");
			var act_mode = "load_course_data";
			var cid = $(this).val();
			
			$.post('../incl/course_handle.php', {
                    'act_mode': act_mode,
                    'cid': cid,
                   },
			function(data) {
				if (data != "") {
					var act_mode ="update_course";
					var cid = data["couID"];
					var txtcname = data["couname"];
					var txtctitle = data["coutitle"];
					var txtcduration = data["couduration"];
					var cmbtype = data["coutype"];
					var txtaddfee = data["couaddfee"];
					var txtcfee = data["coufee"];
					var txtcdes = data["coudescription"];
					
					$("#act_mode").val(act_mode);
					$("#cid").val(cid);
					$("#txtcname").val(txtcname);
					$("#txtctitle").val(txtctitle);
					$("#txtcduration").val(txtcduration);
					$("#cmbtype").val(cmbtype);
					$("#txtaddfee").val(txtaddfee);
					$("#txtcfee").val(txtcfee);
					$("#txtcdes").val(txtcdes);
					
				}
				
			},"json" );	   
		}else{
        location.href="";
		}
	});

</script>


