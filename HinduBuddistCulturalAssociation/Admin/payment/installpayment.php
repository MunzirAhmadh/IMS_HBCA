<?php
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php');
	require("../incl/functions.php");
	require("../incl/installpayment_handle.php");
	$newid = newId();
	
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
               Installment Payment
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
		<div class="col-md-12 col-md-offset-2">
			<form class="form-inline">
				<div class="row">
					</br>
                     <div class="form-group col-sm-4">
                        <label class="control-label">Student Name</label>
                       <select class="form-control" id="cmbsid">
                                <?php getstudent();?>  
                       </select>
            		 </div>
                      <div class="form-group col-sm-5">
                       	<button type="button" class="btn btn-primary" id="btn_load" onclick="load_student()"><span class="glyphicon glyphicon-plus"></span> Load</button>
            		 </div>
                 </div>   
                 </br>
            </form>
		</div>                 
	</div>
    </br>
<div class="row">

		<div class="col-sm-12">

			<table class="table table-default table-bordered "  id="table-data">
				<thead>
					<tr>
						<th align="center">Enroll ID</th>
                        <th align="center">Course ID</th>
                        <th align="center">Batch ID</th>
                        <th align="center">Total Fee</th>
                        <th align="center">Amount Paid</th>
						<th align="center">Balance Amount</th>
                        <th align="center">Pay</th>					
					</tr>
				</thead>
				<tbody>
                

				</tbody>
			</table>
            </div>
          
	</div> <!-- / data table -->
    
    </br> </br> </br>
   
  <div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="input-group">
				<!--to get action mode whether it is search, update or insert -->
                <input type="hidden" id="act_mode" value="" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
       		<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
			<form class="form-horizontal">
				<div class="row">
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label" >Date<span style="color:#f00">*</span></label>
						  <div class="col-sm-4">
                          	<div class='input-group date date-picker'>
                                <input type="text" class="form-control" name="txtpaydate" id="txtpaydate" readonly="readonly" data-date-format="yyyy-mm-dd"   placeholder="Payment Date" value="<?php echo date('Y-m-d'); ?>"/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
						  </div>
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Enrollment ID</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txteid" readonly="readonly" placeholder="Enrollment ID" value="">
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Student ID / Student Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtsid" readonly="readonly" placeholder="Student ID" value="">
						  </div>
                          <div class="col-sm-4">
							<input type="text" class="form-control" id="txtsname" readonly="readonly" placeholder="Student Name" value="">
						  </div>
					  </div>
					   <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Course ID / Course Name</label>
                          <div class="col-sm-4">
							<input type="text" class="form-control" id="txtcid" readonly="readonly" placeholder="Course ID" value="">
						  </div>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtcname" readonly="readonly" placeholder="Course Name" value="">
						  </div>
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Total Amount</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtamount" readonly="readonly" placeholder="Total Amount" value="">
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Balance Amount</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtbalanceamount" readonly="readonly" placeholder="Due Amount" value="">
						  </div>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Paid Amount<span style="color:#f00">*</span></label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtpayamount" placeholder="Amount Pay" onblur="Calculate_balance()">
						  </div>
                           <div id="erramount" class="error_div"></div>
                          <label class="col-sm-offset-4 input-format">Format : (00000.00)</label>
                          
					  </div>
                      
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label"> Amount in Letters<span style="color:#f00">*</span></label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtamountletter" placeholder="Amount Pay in Letters">
						  </div>
                           <div id="erramountletter" class="error_div"></div>
                          <label class="col-sm-offset-4 input-format">Format : Two Thousand Rupees Only</label>
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Total Due</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtdue" readonly="readonly" placeholder="Balance Payment">
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Pay by<span style="color:#f00">*</span></label>
						  <div class="col-sm-4">
                          <input type="text" class="form-control" id="txtpayby"  placeholder="Enter the employee name"/>
						  </div>
                           <div id="errpayby" class="error_div"></div>
                           <input type="hidden" id="txtinvoice" value="<?php echo($newid);?>"  readonly="readonly"/>
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
	</div><!-- /.row -->
    
</div><!-- /.page-content -->

<script type="text/javascript">
/*This function is to load student data to add installment payment*/
 function load_student() {
        var act_mode = "load_student";
        var cmbsid = $('#cmbsid').val();
		
        $.post('../incl/installpayment_handle.php', {'act_mode':act_mode,'cmbsid':cmbsid},
            function (data) {
                if (data == "NA") {
                    row = '<tr><td colspan="4">No record found</td></tr>';
                    $("#table-data tbody").append(row);
                }
                else {
                    $("#table-data tbody").empty();

                    for (i = 0; i < data.length; i++) {
                        var enrollID   = data[i].enrollID;
						var couID = data[i].couID;
						var batchID = data[i].batchID;
						var netamnt   = data[i].netamnt;
                        var paidamount    = data[i].paidamount;
                        var balanceamnt = data[i].balanceamnt;

                        row = '<tr><td>' + enrollID + '</td><td>' + couID + '</td><td>' + batchID + '</td><td>' + netamnt + '</td><td>' + paidamount + '</td><td>' + balanceamnt + '</td>\<td><button class="btn btn-success btn_edit" value='+enrollID+' id='+enrollID+' style="padding:2px">Payment</button></td>/</tr>';
                        $("#table-data tbody").append(row);
                    }
                    $("#table-data").dataTable();
                }
            }, 'json'
        );
    }
	
	/*Calculate the balance fee*/
	function Calculate_balance(){
		var txtbalanceamount= $("#txtbalanceamount").val();
        var txtpayamount	= $("#txtpayamount").val();
		var balance 		= ( parseFloat(txtbalanceamount) - parseFloat(txtpayamount)) ;
		$("#txtdue").val(parseFloat(balance));
	}
	
	/*this function is used for load student information to add an installment payment*/ 
	$('#table-data').on("click","button",function() {
		var btn_val= $(this).val();
		
		var r=confirm("Do you want to edit this record?");
		if(r==true){
			var act_mode = "load_payment";
			var enrollID = $(this).val();
			
			$.post('../incl/installpayment_handle.php', {
                    'act_mode': act_mode,
                    'enrollID': enrollID,
                   },
			function(data) {
				if (data != "") {
					var txteid = data["enrollID"];
					var txtsid = data["stucode"];
					var txtsname = data["stuinitialname"];
					var txtcid = data["couID"];
					var txtcname = data["couname"];
					var txtamount = data["netamnt"];
					var txtbalanceamount = data["balanceamnt"];
					
					
					$("#act_mode").val(act_mode);
					$("#txteid").val(txteid);
					$("#txtsid").val(txtsid);
					$("#txtsname").val(txtsname);
					$("#txtcid").val(txtcid);
					$("#txtcname").val(txtcname);
					$("#txtamount").val(txtamount);
					$("#txtbalanceamount").val(txtbalanceamount);
									
				}
				
			},"json" );	   
		}else{
        location.href="";
		}
	});

/*this function is used for add installment information*/

    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode	 	= "add_payment";
		//alert(act_mode);
		var txtsid			=$("#txtsid").val();
		var txtsname 		=$("#txtsname").val();
       	var txtinvoice	 	= $("#txtinvoice").val();
       	var txtpaydate 		= $("#txtpaydate").val();
        var txtpayby		= $("#txtpayby").val();
       	var txteid 			= $("#txteid").val();
		var txtamount 		= $("#txtamount").val();
		var txtamountletter	= $("#txtamountletter").val();
		var txtpayamount	= $("#txtpayamount").val();
		var txtdue 			= $("#txtdue").val();
		
        var err = 0;

		if (txtpayamount == "") {
            $("#erramount").text('Please enter the amount');
            err++;
        }
		if (txtamountletter == "") {
            $("#erramountletter").text('Please enter the amount in letter');
            err++;
        }
        if (txtpayby == "") {
            $("#errpayby").text('Please type the person');
            err++;
        }
		

        if (err > 0) {
            $(".error_div").show();
        } else {
			
            $.post('../incl/installpayment_handle.php', {
                    'act_mode': act_mode,
					'txtsid':txtsid,
					'txtsname':txtsname,
                  	'txtinvoice': txtinvoice,
                    'txtpaydate': txtpaydate,
					'txtpayby':txtpayby,
                    'txteid': txteid,
					'txtamount':txtamount,
					'txtpayamount': txtpayamount,
					'txtamountletter':txtamountletter,
					 'txtdue':txtdue,
                },
                function(data) {
                    if (data == "true") {
                        alert("Installment amount added successfuly","success");
                        location.href="../reports/receipt.php";
                    }else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
</script>
<?php require_once('../incl/footer.php'); ?>


