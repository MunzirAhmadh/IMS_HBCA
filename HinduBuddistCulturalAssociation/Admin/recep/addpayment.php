<?php 
	require_once('../incl/header.php');
	require_once('../incl/recepsidebar.php'); 
	require_once('../incl/dbconnection.php');
	require("../incl/functions.php");
	require("../incl/payment_handle.php");
	$newid = newId();
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
               	 &nbsp;&nbsp; Add Payment
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
							<input type="text" class="form-control" id="txteid" readonly="readonly" placeholder="Enrollment ID" value="<?php echo($_SESSION['student']['eid'])?>">
						  </div>
					  </div>
                       <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Student ID / Student Name</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtsid" readonly="readonly" placeholder="Student ID" value="<?php echo($_SESSION['student']['sid'])?>">
						  </div>
                          <div class="col-sm-4">
							<input type="text" class="form-control" id="txtsname" readonly="readonly" placeholder="Student Name" value="<?php echo($_SESSION['student']['sname'])?>">
						  </div>
					  </div>
					   <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Course ID / Course Name</label>
                          <div class="col-sm-4">
							<input type="text" class="form-control" id="txtcid" readonly="readonly" placeholder="Course ID" value="<?php echo($_SESSION['student']['cid'])?>">
						  </div>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtsname" readonly="readonly" placeholder="Course Name" value="<?php echo($_SESSION['student']['cname'])?>">
						  </div>
					  </div>
                      <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Total Amount</label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtamount" value="<?php echo($_SESSION['student']['amount'])?>">
						  </div>
                          <label class="col-sm-offset-4 input-format">Format : (00000.00)</label>
					  </div>
					  <div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label">Paid Amount<span style="color:#f00">*</span></label>
						  <div class="col-sm-4">
							<input type="text" class="form-control" id="txtpayamount" placeholder="Amount Pay" onblur="Calculate_balance()">
						  </div>
                           <div id="erramount" class="error_div"></div>
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
   
    </br> 
    <?php unset($_SESSION["student"]);?>
<?php require_once('../incl/footer.php'); ?>                

</div><!-- /.page-content -->

<script type="text/javascript">  
    $(document).ready(function() {
        $("#act_mode").val('add_payment');
    });
	
   /*Calculate the balance fee*/
	function Calculate_balance(){
		var txtamount 		= $("#txtamount").val();
        var txtpayamount	= $("#txtpayamount").val();
		var balance 		= ( parseFloat(txtamount) - parseFloat(txtpayamount)) ;
		$("#txtdue").val(parseFloat(balance));
	}

	/*this function is used for add  payment information*/

    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode	 	= $("#act_mode").val();
		//alert(act_mode);
		var txtsid			=$("#txtsid").val();
		var txtsname		=$("#txtsname").val();
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
			//alert(cid);
            $.post('../incl/payment_handle.php', {
                    'act_mode': act_mode,
					'txtsid':txtsid,
					'txtsname':txtsname,
                  	'txtinvoice': txtinvoice,
                    'txtpaydate': txtpaydate,
					'txtpayby':txtpayby,
                    'txteid': txteid,
					'txtpayamount': txtpayamount,
					'txtamountletter':txtamountletter,
					'txtdue':txtdue,
                },
                function(data) {
                    if (data == "true") {
                        alert("Amount added successfuly","success");
                        location.href="../reports/receipt.php";
                    }else {
                        alert("unknown error");
                    }
                }, "json");
        }
    });
</script>


