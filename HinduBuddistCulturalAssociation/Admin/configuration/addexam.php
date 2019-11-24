<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php');
	require("../incl/functions.php");
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                Add New Exams
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

	<div class="row">
		<div class="col-md-6 col-md-offset-1">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
			<form class="form-horizontal">
				<div class="row">
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label" >CourseName<span style="color:#f00">*</span></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="cmbcourse">
                                <?php getcourse(); ?> 
                            </select>
                            <div id="errcourse" class="error_div"></div>
                             <input type="hidden" id="txteid" />
                         </div>   
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label" >Exam Type<span style="color:#f00">*</span></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="cmbetype">
                                <option value="">-- Select Exam Type -- </option>
                                <option value="1">Written</option>
                                <option value="2">Oral</option>
                                <option value="3">Practical</option>   
                            </select>
                            <div id="erretype" class="error_div"></div>
                         </div>   
					  </div>
                       <div class="form-group">
                        <label for="exampleInputFile" class="col-sm-4 control-label">Upload Paper</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                             <input type="file" class="form-control-file" id="paper" aria-describedby="fileHelp">
                             <div id="errfile" class="error_div"></div>
                            </div>	
                        </div>
                       </div>  
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Marks<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="number" class="form-control" id="txtmarks" placeholder="Marks">
                            <div id="errmarks" class="error_div"></div>
						  </div>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Duration<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<select class="form-control" id="cmbduration">
                                <option value="">-- Select Duration -- </option>
                                <option value="1">1 hour</option>
                                <option value="2">2 hour</option> 
                            </select>
                            <div id="errduration" class="error_div"></div>
						   </div>
					   </div>  
				</div> 
				</br>         
                
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
			<table class="table table-default table-bordered "  id="table-data" align="center" >
				<thead>
					<tr>
						<th align="center">Exam ID</th>
						<th align="center">Course Name</th>
                        <th align="center">Course Type</th>
                        <th align="center">Marks</th>
                        <th align="center">Duration</th>
                        <th align="center">Edit</th>					
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM exam";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td><?php echo $setdata['examID'] ?></td>
								<td><?php echo $setdata['couID'] ?></td>
                                <td>
                                	<?php 
                                       switch($setdata["examtype"]){
                                            case "1":
                                                $status = "Written";
                                                break;
                                            case "2":
                                                $status = "Oral";
                                                break;
											case "3":
                                                $status = "Practical";
                                                break;
                                        }
                                       echo $status;
                                    ?>
                                </td>
                                <td><?php echo $setdata['exammarks'] ?></td>
                                <td>
                                	<?php 
                                       switch($setdata["examduration"]){
                                            case "1":
                                                $status = "i hour";
                                                break;
                                            case "2":
                                                $status = "2 hour";
                                                break;
                                        }
                                       echo $status;
                                    ?>
                                </td>
								<td align="center">
									<?php 
									echo "<button type='button' value=".$setdata['examID']." id=".$setdata['examID']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>Edit</button>";
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
	</div> <!-- / data table -->   
<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add_exam');
    });
	
	$('#table-data').DataTable();

	/*this function is used for save and update exam information*/

    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
		//alert(act_mode);
       	var cmbcourse = $("#cmbcourse").val();
       	var cmbetype = $("#cmbetype").val();
        var paper = $("#paper").val();
		var txtmarks = $("#txtmarks").val();
        var cmbduration = $("#cmbduration").val();
		if(act_mode=='update_exam'){
            txteid=$("#txteid").val();
        }else{
             txteid=0;
        }
       
        var err = 0;

		if (cmbcourse == "") {
            $("#errcourse").text('Please select course');
            err++;
        }
		if (cmbetype == "") {
            $("#erretype").text('Please select exam type');
            err++;
        }
        /*if (paper == "") {
            $("#errfile").text('Please attach the paper');
            err++;
        }*/
		if (txtmarks == "") {
            $("#errmarks").text('Please enter the marks');
            err++;
        }
		if (cmbduration == "") {
            $("#errduration").text('Please select duration');
            err++;
        }

        if (err > 0) {
            $(".error_div").show();
        } else {
            $.post('../incl/exam_handle.php', {
                    'act_mode'	: act_mode,
					'txteid'   	:txteid,
                  	'cmbcourse': cmbcourse,
                    'cmbetype': cmbetype,
					'paper':paper,
                    'txtmarks': txtmarks,
                    'cmbduration': cmbduration,
                },
                function(data) {
                    if (data == "true") {
                        alert("New Exam added successfuly","success");
                       // clear_form();
                    	location.href="";
                    } if (data == "updated") {
                         alert("Exam details updated successfuly");
                        //clear_form();
						location.href="";
					}else {
                        alert("data");
                    }
                }, "json");
        }
    });
	
	//------------------------------------------------------------------------------------------------------------//	
	/*this function is used for load exam informations for update */ 
	$('.btn_edit').click(function() {
		var r=confirm("Do you want to edit this record?");
		if(r==true){
			//alert("abc");
			var act_mode = "load_exam_data";
			var txteid = $(this).val();
			
			$.post('../incl/exam_handle.php', {
                    'act_mode': act_mode,
                    'txteid': txteid,
                   },
			function(data) {
				if (data != "") {
					var act_mode ="update_exam";
					var txteid = data["examID"];
					var cmbcourse = data["couID"];
					var cmbetype = data["examtype"];
					//var paper = data["paper"];
					var txtmarks = data["exammarks"];
					var cmbduration = data["examduration"];
										
					$("#act_mode").val(act_mode);
					$("#txteid").val(txteid);
					$("#cmbcourse").val(cmbcourse);
					$("#cmbetype").val(cmbetype);
					//$("#paper").val(paper);
					$("#txtmarks").val(txtmarks);
					$("#cmbduration").val(cmbduration);
					
				}
				
			},"json" );	   
		}else{
        location.href="";
		}
	});

</script>
