<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php');
	require("../incl/functions.php");
	require("../incl/batch_handle.php");
	$newid = newId(); 
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                Add New Batch
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
						  <label for="inputEmail3" class="col-sm-4 control-label" >Course Name<span style="color:#f00">*</span></label>
                          <div class="col-sm-8">
                            <select class="form-control" id="cmbcourse">
									<?php getcourse(); ?>      
                            </select>
                            <div id="errcourse" class="error_div"></div>
                         </div>   
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label" >Batch ID</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control1" name="txtbid" id="txtbid" readonly="readonly" placeholder="Batch ID" value="<?php echo($newid);?>" style="width:373px"/>
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">No of Students<span style="color:#f00">*</span></label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" id="txtnoofstu" placeholder="No of Students for a Batch">
                             <div id="errnoofstu" class="error_div"></div>
						  </div>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Remarks</label>
						  <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="txtremark" placeholder="Remarks"></textarea>
						   </div>
					   </div>   
						<div class="form-group">
                            <label for="" class="col-sm-4 control-label"> Batch Status<span style="color:#f00">*</span></label>
                            <div class="col-sm-8">
                                <label class="radio-inline">
                            	 <input type="radio"  value="1" name="rdbstatus" id="rdbactive">Active
                                </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="rdbstatus" id="rdbdeactive">Deactive
                                 </label>
                                <div id="errrdbstatus" class="error_div"></div>
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
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
						<th align="center">Batch ID</th>
						<th align="center">Course Name</th>
                        <th align="center">Batch Size</th>
                        <th align="center">Status</th>
                        <th align="center">Edit</th>					
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM batch";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="left"><?php echo $setdata['batchID'] ?></td>
                                <td><?php echo $setdata['couID'] ?></td>
								<td><?php echo $setdata['batchsize'] ?></td>
                                <td> 
                                	 <?php 
                                       switch($setdata["batchstatus"]){
                                            case "1":
                                                $status = "Active";
                                                break;
                                            case "0":
                                                $status = "Deactive";
                                                break;
                                        }
                                       echo $status;
                                    ?>
                				</td>
								<td>
									<?php 
									echo "<button type='button' value=".$setdata['batchID']." id=".$setdata['batchID']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>Edit</button>";
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
        $("#act_mode").val('add_batch');
		$('#rdbactive').attr("checked",true);
        clear_form();
		$('#table-data').DataTable();
    });
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
		$('#rdbactive').attr("checked",true);
        $(".error_div").text('');
        $(".error_div").hide();
    }
	
	/*this function is used for save and update batch information*/

    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
       	var act_mode = $("#act_mode").val();
       	var cmbcourse = $("#cmbcourse").val();
       	var txtbid = $("#txtbid").val();
        var txtnoofstu = $("#txtnoofstu").val();
		var txtremark = $("#txtremark").val();
		
        var status="";
			if($("#rdbactive").is(':checked')){
				status=1;
			}
			else{
				status=0;
			}
		var rdbstatus = status;
       
        var err = 0;

		if (cmbcourse == "") {
            $("#errcourse").text('Please select course');
            err++;
        }
        if (txtnoofstu == "") {
            $("#errnoofstu").text('Please fill no of students');
            err++;
        }

        if (err > 0) {
            $(".error_div").show();
        } else {
			
            $.post('../incl/batch_handle.php', {
                    'act_mode': act_mode,
                  	'cmbcourse': cmbcourse,
                    'txtbid': txtbid,
					'txtnoofstu':txtnoofstu,
                    'txtremark': txtremark,
                    'rdbstatus': rdbstatus,
                },
                function(data) {
                    if (data == "true") {
                        alert("New Batch added successfuly","success");
                       	location.href="";
                    }if (data == "updated") {
                         alert("batch details updated successfuly");
                        //clear_form();
						location.href="";
					}else {
                    }
                }, "json");
        }
    });
	
	//------------------------------------------------------------------------------------------------------------//	
	/*this function is used for load batch informations for update */ 
	$('.btn_edit').click(function() {
		var btn_val= $(this).val();
		
		var r=confirm("Do you want to edit this record?");
		if(r==true){
			var act_mode = "load_batch_data";
			var txtbid = $(this).val();
			
			$.post('../incl/batch_handle.php', {
                    'act_mode': act_mode,
                    'txtbid': txtbid,
                   },
			function(data) {
				if (data != "") {
					var act_mode ="update_batch";
					var txtbid = data["batchID"];
					var cmbcourse = data["couID"];
					var txtnoofstu = data["batchsize"];
					var txtremark = data["batchremark"];
					var rdbstatus = data["batchstatus"];
					
					$("#act_mode").val(act_mode);
					$("#txtbid").val(txtbid);
					$("#cmbcourse").val(cmbcourse);
					$("#txtnoofstu").val(txtnoofstu);
					$("#txtremark").val(txtremark);
				 	$("#rdbstatus").val(rdbstatus);
						if(rdbstatus==1){
							$('#rdbactive').attr("checked",true);
						}
						else{
							$('#rdbdeactive').attr("checked",true);
						}
				}
				
			},"json" );	   
		}else{
        location.href="";
		}
	});

</script>



