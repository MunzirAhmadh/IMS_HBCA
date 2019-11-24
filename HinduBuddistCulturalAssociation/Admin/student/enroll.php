<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php');
	require("../incl/functions.php");
	require("../incl/enroll_handle.php");
	$newid = newId();
?>


<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>
				&nbsp;&nbsp; Enroll Student
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
		<div class="col-sm-8 col-sm-offset-1">
			<form class="form-horizontal">
				<div class="col-lg-10">
                    <span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with are required fields</b></span>
				 	</br></br>
                    <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Date of Registration</label>
          				<div class="col-sm-4">
            				<div class='input-group date date-picker'>
                            	 <input type="text" class="form-control1" id="txtdreg" readonly="readonly" value="<?php echo date('Y-m-d'); ?>" style="width:140px"/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
         				</div>
        			</div> 
                     <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Enrollment ID</label>
          				<div class="col-sm-5">
            				 <input type="text" id="txteid" value="<?php echo($newid);?>"  readonly="readonly"/>                      
         				</div>
        			</div>    
                    <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Select Student<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<select class="form-control" id="cmbsid">
                                <?php getstudent();?>  
                            </select>
                            <div id="errstudent" class="error_div"></div>
         				</div>
          				<div class="col-sm-4" >
							<a href="addstudent.php"> <button type="button" class="btn btn-default" id="btn_addnewstu"  style="padding:3px; border-radius:10px; width:150px; font-weight:bold"><span class="glyphicon glyphicon-plus" ></span> Add New Student</button></a>
						</div>
        		 </div> 
				 
                 
                 <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Select Course<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<select class="form-control" id="cmbcid">
                                <?php getcourse();?>    
                            </select>
                            <div id="errcourse" class="error_div"></div>
         				</div>
          				<div class="col-sm-4" >
							<a href="../configuration/addcourse.php"> <button type="button" class="btn btn-default" id="btn_addnewcou"  style="padding:3px; border-radius:10px; width:150px; font-weight:bold"><span class="glyphicon glyphicon-plus" ></span> Add New Course</button></a>
						</div>
        		 </div>
                 <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Select Batch<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<select class="form-control" id="cmbbid">
                                  <?php getbatch();?>
                            </select>
                            <div id="errbatch" class="error_div"></div>
         				</div>
          				<div class="col-sm-4" >
							<a href="../configuration/addbatch.php"> <button type="button" class="btn btn-default" id="btn_addnewbat"  style="padding:3px; border-radius:10px; width:150px; font-weight:bold"><span class="glyphicon glyphicon-plus" ></span> Add  New  Batch</button></a>
						</div>
        		</div>  
                
                <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Admission Fee</label>
          				<div class="col-sm-4">
            				<input type="text" id="txtafee" class="form-control"  placeholder="Admission Fee" readonly="readonly"/>                       
         				</div>
        		</div> 
                
                
                 <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Course Fee</label>
          				<div class="col-sm-4">
            				<input type="text" id="txtcfee" class="form-control"  placeholder="Course Fee" readonly="readonly"/>                       
         				</div>
        		</div>  
                
                 <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Discount Fee<span style="color:#f00">*</span></label>
          				<div class="col-sm-4">
            				<input type="text" id="txtdfee" class="form-control" placeholder="Discount Fee"  onblur="Calculate_total()"/>
                            <div id="errdfee" class="error_div"></div>
         				</div>
                        <label class="col-sm-offset-4 input-format">Format : (00000.00)</label>
        		</div>  
                
                 <div class="form-group">
         			 	<label for="inputEmail3" class="col-sm-4 control-label">Net Amount</label>
          				<div class="col-sm-4">
            				<input type="text" id="txtnetfee" class="form-control" placeholder="Net Amount" readonly="readonly" >
         				</div>
        		</div>   
		</br>
        
            <!-- Button Group -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="buttons pull-right">
                            <button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                            <button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                        </div>
                    </div>
                 </div>
         
				</div>    
			</form>
		</div>
	</div>
    
     </br>
    
    <!-- View the enroll table -->
  <div class="row">
		<div class="col-sm-12" >
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
						<th align="center">Enrollment ID</th>
						<th align="center">Student ID</th>
                        <th align="center">Course ID</th>
                        <th align="center">Batch ID</th>
                        <th align="center">Admission Fees</th>
						<th align="center">Course Fees</th>
                        <th align="center">Discount Fees</th>
                        <th align="center">Total Amount</th>
                        <th align="center">Balance Amount</th>
						<th align="center">Delete</th>						
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					//fetch table rows from mysql db
					$sql = "SELECT * FROM  enrollment INNER JOIN course ON enrollment.couID = course.couID WHERE 1";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						?>
							<tr align="center">
								<td><?php echo $setdata['enrollID'] ?></td>
								<td><?php echo $setdata['stuID'] ?></td>
                                <td><?php echo $setdata['couID'] ?></td>
                                <td><?php echo $setdata['batchID'] ?></td>
                                <td><?php echo $setdata['couaddfee'] ?></td>
                                <td><?php echo $setdata['coufee'] ?></td>
                                <td><?php echo $setdata['dfee'] ?></td>
                                <td><?php echo $setdata['netamnt'] ?></td>
                                <td><?php echo $setdata['balanceamnt'] ?></td>
								<td align="center">
									<?php 
									echo "<button type='button' value=".$setdata['enrollID']." id=".$setdata['enrollID']." class='btn btn-warning btn_delete' style='padding:2px'><span class='glyphicon glyphicon-trash'></span>Delete</button>";
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
	
    
<!-- / data table --> 
    
    <?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add_enroll');
        clear_form();
		$('#table-data').DataTable();
    });
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
        $(".error_div").text('');
        $(".error_div").hide();
    }

	/*Get the course fee, admission fee for the relevent select course*/
    $("#cmbcid").change(function(){
		var act_mode = "load_fee";
		var cmbcid = $(this).val();
		
		 $.post('../incl/enroll_handle.php', {
            'act_mode': act_mode,
            'cmbcid': cmbcid,
        },
        function(data) {
			if (data != "") {
				var txtafee = data["couaddfee"];
				var txtcfee = data["coufee"];

				$("#txtafee").val(txtafee);	
				$("#txtcfee").val(txtcfee);			
			}
        },"json" );		
	});

	//Get the batch for the relevent select course
	$("#cmbcid").change(function(){

        var cmbcusid = $("#cmbcid").val();

        $.post('../incl/enroll_handle.php', {
                'cmbcusid': cmbcusid,
                'act_mode': 'load_batches'

            },
            function(data) {
                $("#cmbbid").empty();

                for (i = 0; i < data.length; i++) {
                    var batchCode   = data[i].batchID;
                    var batid    = data[i].id;

                    row = '<option value="'+batchCode+'">'+batchCode+'</option>';
                    $("#cmbbid").append(row);
                }

            }, "json");

    });

	
	/*Calculate the net fee*/
	function Calculate_total(){
		var txtafee = $("#txtafee").val();
        var txtcfee = $("#txtcfee").val();
		var txtdfee = $("#txtdfee").val(); 
		var total 	= ( parseFloat(txtafee) + parseFloat(txtcfee)) - parseFloat(txtdfee) ;
		$("#txtnetfee").val(parseFloat(total));
	}
	
	/*this function is used for save student enroll information*/
    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
		var txteid = $("#txteid").val();
		var txtdreg = $("#txtdreg").val();
       	var cmbsid = $("#cmbsid").val();
        var cmbcid = $("#cmbcid").val();
		var cmbbid = $("#cmbbid").val();
		var txtafee = $("#txtafee").val();
        var txtcfee = $("#txtcfee").val();
        var txtdfee = $("#txtdfee").val(); 
        var txtnetfee = $("#txtnetfee").val();
		
        var err = 0;

		if (cmbsid == "") {
            $("#errstudent").text('Please select student');
            err++;
        }
        if (cmbcid == "") {
            $("#errcourse").text('Please select course');
            err++;
        }
		if (cmbbid == "") {
            $("#errbatch").text('Please select batch');
            err++;
        }
         if (txtdfee == "") {
            $("#errdfee").text('Please fill discount fee');
            err++;
        }
 
        if (err > 0) {
            $(".error_div").show();
        } else {
			$.post('../incl/enroll_handle.php', {
                    'act_mode': act_mode,
					'txteid': txteid,
                  	'txtdreg': txtdreg,
                    'cmbsid': cmbsid,
					'cmbcid': cmbcid,
                    'cmbbid': cmbbid,
					'txtdfee': txtdfee,
					'txtnetfee': txtnetfee,
                },
                function(data) {
                    if (data == "true") {
                        alert("Student Enroll Successfuly","success");
						location.href="../payment/addpayment.php";
                    } else if (data == "error1") {
                        alert("This student enrollment already exists ","warning");
					}else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
	
	/*this function is used for delete student enroll information*/
	$('.btn_delete').click(function() {
    var r=confirm("Do you want to delete this record?");
    if(r==true){
        
        var act_mode = "delete_enroll";
        var txteid = $(this).val();

		
        $.post('../incl/enroll_handle.php', {
            'act_mode': act_mode,
            'txteid': txteid,
        },
        function(data) {
          
            if(data!=="")
            {
                if(data == "deleted"){
                    alert("Enroll information successfully deleted");
                    clear_form();
                    location.href="";
                }
                
            }
        },"json" );
    }else{
        location.href="";
    }

     
});
</script>

