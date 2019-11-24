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
                Shedule Classes / Exam
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
		<div class="col-sm-10 col-sm-offset-1">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
			<form class="form-horizontal">
				<div class="row">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label" >Select Type<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                            	<input type="text" class="form-control" id="cmbtype" placeholder="Select Type"/>
                             <div id="errtype" class="error_div"></div>
                         </div>
						<label class="col-sm-3 control-label" >Exam Type</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="cmbexamtype">
									<option value="">-- Select Exam Type -- </option>
									<option value="1">Written</option>
									<option value="2">Oral</option>
									<option value="3">Practical</option>  
                                    <option value="4">No</option>    
								</select>
                            </div>
					  </div>
					   <div class="form-group">
						  <label for="inputEmail3" class="col-sm-3 control-label" >Select Date<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                          	<div class='input-group date date-picker'>
                            	<input type="text" class="form-control" id="txtdosch" data-date-format="yyyy-mm-dd"  placeholder="Select Date "/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span> 
                            </div>
                            <div id="errdate" class="error_div"></div>
                         </div>
						 <label for="inputEmail3" class="col-sm-3 control-label" >Select Batch<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                            <select class="form-control" id="cmbbatch">
                                <?php getbatch(); ?>   
                            </select>
                             <div id="errbatch" class="error_div"></div>
                         </div>   
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-3 control-label" >Start Time<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                               <div class='input-group date'>
                            	<input type="text" class="form-control" id="txtstime" placeholder="Select Start Time "/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-clock-o bigger-110"></i>
                                </span> 
                            	</div>
                        	</div>
                             <div id="errstime" class="error_div"></div>
						 <label for="inputEmail3" class="col-sm-3 control-label" >End Time<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                               <div class='input-group date'>
                            	<input type="text" class="form-control" id="txtetime" placeholder="Select End Time "/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-clock-o bigger-110"></i>
                                </span> 
                            	</div>
                        	</div>
                             <div id="erretime" class="error_div"></div> 
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-3 control-label" >Select Class Room<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                            <select class="form-control" id="cmbclroom">
                                <?php getclassroom(); ?>   
                            </select>
                             <div id="errclroom" class="error_div"></div>
                         </div>
						  <label for="inputEmail3" class="col-sm-3 control-label" >Select Lecturer<span style="color:#f00">*</span></label>
                          <div class="col-sm-3">
                            <select class="form-control" id="cmblecturer">
                                 <?php getlecturer(); ?>   
                            </select>
                             <div id="errlecturer" class="error_div"></div>
                         </div>   
					  </div>
                      
                       
				</div> 
				</br>         
                
                <div class="row">
                <div class="col-sm-12">
                    <div class="buttons pull-right">
                        <button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Add to Schedule</button>
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
                    	<th align="center">SchID</th>
						<th align="center">Date</th>
						<th align="center">Start Time</th>
                        <th align="center">End Time</th>
                        <th align="center">Type</th>
                        <th align="center">Exam Type</th>
                        <th align="center">Batch</th>
                        <th align="center">Lecturer</th>
						<th align="center">Classroom</th>
						<th align="center">Edit</th>
						<th align="center">Delete</th>						
					</tr>
				</thead>
				<tbody>
				<?php
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM shedule";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="left"><?php echo $setdata['schID'] ?></td>
                                <td><?php echo $setdata['date'] ?></td>
								<td><?php echo $setdata['starttime'] ?></td>
                                <td><?php echo $setdata['endtime'] ?></td>
                                <td><?php echo $setdata['schtype'] ?></td>
                                 <td>
                                	<?php 
                                    	 switch($setdata["examtype"]){
                                            case "1":
                                                $etype = "Written";
                                                break;
                                            case "2":
                                                $etype = "Oral";
                                                break;
											case "3":
                                                $etype = "Practical";
                                                break;
                                            case "4":
                                                $etype = "No";
                                                break;
											}
                                       echo $etype;
                                    ?>
                                </td>
								<td><?php echo $setdata['batchID'] ?></td>
								<td><?php echo $setdata['lecID'] ?></td>
								<td><?php echo $setdata['clroomID'] ?></td>
								<td>
									<?php 
									echo "<button type='button' value=".$setdata['schID']." id=".$setdata['schID']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>Edit</button>";
									?>
                                </td>
								<td>
									<?php 
									echo "<button type='button' value=".$setdata['schID']." id=".$setdata['schID']." class='btn btn-warning btn-delete' style='padding:2px'><span class='glyphicon glyphicon_trash'></span>Delete</button>";
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
        $("#act_mode").val('add_shedule');
        clear_form();
		$('#table-data').DataTable();
    });
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
        $(".error_div").text('');
        $(".error_div").hide();
    }
	
	$('#txtdosch').datepicker({
			autoclose: true,
            todayHighlight: true
        });
	$('#txtstime').datetimepicker({
			format: 'HH:mm'
        });	
	$('#txtetime').datetimepicker({
		format: 'HH:mm'
	});	

	/*this function is used for save and update user information*/
    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
		var cmbtype = $("#cmbtype").val();
       	var cmbexamtype = $("#cmbexamtype").val();
        var cmbbatch = $("#cmbbatch").val();
		var cmbclroom = $("#cmbclroom").val();
        var cmblecturer = $("#cmblecturer").val();
        var txtdosch = $("#txtdosch").val();
        var txtstime = $("#txtstime").val();
		var txtetime = $("#txtetime").val();
		
        var err = 0;

		if (cmbtype == "") {
            $("#errtype").text('Please select type');
            err++;
        }
        if (cmbbatch == "") {
            $("#errbatch").text('Please select batch');
            err++;
        }
		if (cmbclroom == "") {
            $("#errclroom").text('Please select classroom');
            err++;
        }
		if (cmblecturer == "") {
            $("#errlecturer").text('Please select lecturer');
            err++;
        }
		if (txtdosch == "") {
            $("#errdate").text('Please select date');
            err++;
        }
		if (txtstime == "") {
            $("#errstime").text('Please select start time');
            err++;
        }
		if (txtetime == "") {
            $("#erretime").text('Please select end time');
            err++;
        }
 
        if (err > 0) {
            $(".error_div").show();
        } else {
			//alert(cid);
			//alert(txtcname);
            $.post('../incl/shedule_handle.php', {
                    'act_mode': act_mode,
                  	'cmbtype': cmbtype,		
					'cmbexamtype': cmbexamtype,
                    'cmbbatch': cmbbatch,
                    'cmbclroom': cmbclroom,
					'cmblecturer': cmblecturer,
					'txtdosch': txtdosch,
					'txtstime': txtstime,
					'txtetime': txtetime,
                },
                function(data) {
                    if (data == "true") {
                        alert("Shedule Created Successfuly","success");
                        clear_form();
						location.href="";
                    } else if (data == "sch1") {
                        alert("This schedule already exists","warning");
					}else if (data == "sch2") {
                        alert("This lecturer already has a schedule on this time ","warning");
					}else if (data == "sch3") {
                        alert("This classroom is already booked","warning");
					}
					 else {
                        alert();
                    }
                }, "json");
        }
    });

</script>
