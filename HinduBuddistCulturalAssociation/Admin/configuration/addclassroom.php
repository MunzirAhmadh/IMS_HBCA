<?php require_once('../incl/header.php');?>
<?php require_once('../incl/sidebar.php'); ?>
<?php require_once('../incl/dbconnection.php'); ?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                Add Class Room
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
						  <label for="inputEmail3" class="col-sm-4 control-label">Classroom Name<span style="color:#f00">*</span></label>
							  <div class="col-sm-8">
                              <input type="text" class="form-control" id="txtclname" placeholder="Class size">
                                <div id="errclname" class="error_div"></div>
                                <input type="hidden" id="txtclid" />
							  </div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Location<span style="color:#f00">*</span></label>
							  <div class="col-sm-8">
								<select class="form-control"  id="cmblocation">
                                    <option value="">-- Select Location --</option>
                                    <option value="1">Ground Floor</option>
                                    <option value="2">1st Floor</option>
                                    <option value="3">2nd Floor</option>
                                </select>
                                <div id="errlocation" class="error_div"></div>
							  </div>   
					  </div>  
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Class size<span style="color:#f00">*</span></label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" id="txtclsize" placeholder="Class size">
                                <div id="errclsize" class="error_div"></div>
							  </div>
					  </div>  
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Class Status<span style="color:#f00">*</span></label>
							  <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio"  value="1" name="rdbclstatus" id="rdbavailable">Available
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" name="rdbclstatus" id="rdbnotavailable">Not Available
                                    </label>
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
						<th align="center">Classroom ID</th>
						<th align="center">Classroom Name</th>
						<th align="center">Classroom Location</th>
                        <th align="center">Classroom Size</th>
                        <th align="center">Status</th>
                        <th align="center">Edit</th>				
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM classroom";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr>
								<td align="center"><?php echo $setdata['clroomID'] ?></td>
								<td><?php echo $setdata['clroomname'] ?></td>
                                <td>
                                	<?php 
                                    	 switch($setdata["clroomlocation"]){
                                            case "1":
                                                $loc = "Ground Floor";
                                                break;
                                            case "2":
                                                $loc = "1st Floor";
                                                break;
											case "3":
                                                $loc = "2nd Floor";
                                                break;
                                        }
                                       echo $loc;
                                    ?>
                                </td>
                                <td><?php echo $setdata['clroomsize'] ?></td>
                                <td> 
                                	 <?php 
                                       switch($setdata["clroomstatus"]){
                                            case "1":
                                                $status = "Available";
                                                break;
                                            case "0":
                                                $status = "Not Available";
                                                break;
                                        }
                                       echo $status;
                                    ?>
                				</td>
								<td>
									<?php 
									echo "<button type='button' value=".$setdata['clroomID']." id=".$setdata['clroomID']." class='btn btn-success btn_edit' style='padding:2px' ><span class='glyphicon glyphicon-edit'></span>Edit</button>";
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
        $("#act_mode").val('add_clroom');
        clear_form();
	$('#table-data').DataTable();
    });
	
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
		$('#rdbavailable').attr("checked",true);
        $(".error_div").text('');
        $(".error_div").hide();
    }
	
	/*this function is used for save and update classroom information*/

    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
       	var txtclname = $("#txtclname").val();
       	var cmblocation = $("#cmblocation").val();
        var txtclsize = $("#txtclsize").val();
        var status="";
			if($("#rdbavailable").is(':checked')){
				status=1;
			}
			else{
				status=0;
			}
		var rdbclstatus = status;
		
		if(act_mode=='update_clroom'){
        	txtclid=$("#txtclid").val();
        }else{
             txtclid=0;
        }
       
        var err = 0;

		if (txtclname == "") {
            $("#errclname").text('Please select classroom');
            err++;
        }
        if (cmblocation == "") {
            $("#errlocation").text('Please select location');
            err++;
        }
		if (txtclsize == "") {
            $("#errclsize").text('Please fill class size');
            err++;
        }

        if (err > 0) {
            $(".error_div").show();
        } else {
			//alert(cid);
            $.post('../incl/classroom_handle.php', {
                    'act_mode': act_mode,
					'txtclid': txtclid,
                  	'txtclname': txtclname,
                    'cmblocation': cmblocation,
					'txtclsize':txtclsize,
                    'rdbclstatus': rdbclstatus,
                },
                function(data) {
                    if (data == "true") {
                        alert("New Batch added successfuly","success");
                        location.href="";
                    }if (data == "updated") {
                         alert("Batch details updated successfuly");
                        //clear_form();
						location.href="";
					}else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
	
	//------------------------------------------------------------------------------------------------------------//	
	/*this function is used for load classroom informations for update */
	$('.btn_edit').click(function() {
		//alert(btn_val);
		
		var r=confirm("Do you want to edit this record?");
		if(r==true){
			//alert("abc");
			var act_mode = "load_clroom_data";
			var txtclid = $(this).val();
			
			$.post('../incl/classroom_handle.php', {
                    'act_mode': act_mode,
                    'txtclid': txtclid,
                   },
			function(data) {
				if (data != "") {
					var act_mode ="update_clroom";
					var txtclid = data["clroomID"];
					var txtclname = data["clroomname"];
					var cmblocation = data["clroomlocation"];
					var txtclsize = data["clroomsize"];
					var rdbclstatus = data["clroomstatus"];
					
					$("#act_mode").val(act_mode);
					$("#txtclid").val(txtclid);
					$("#txtclname").val(txtclname);
					$("#cmblocation").val(cmblocation);
					$("#txtclsize").val(txtclsize);
				 	$("#rdbclstatus").val(rdbclstatus);
						if(rdbclstatus==1){
							$('#rdbavailable').attr("checked",true);
						}
						else{
							$('#rdbnotavailable').attr("checked",true);
						}
				}
				
			},"json" );	   
		}else{
        location.href="";
		}
	});

</script>



