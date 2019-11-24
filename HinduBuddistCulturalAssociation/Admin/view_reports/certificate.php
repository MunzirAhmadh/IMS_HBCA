<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php'); 
	require_once('../incl/functions.php'); 
?>
<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                 &nbsp; Generate Certificate / Transcript
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    </br>
  <div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
                        <span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with are required fields</b></span>
                        </br></br>
                          
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Select Student<span style="color:#f00">*</span></label>
                            <div class="col-sm-3">
                                <select class="form-control" id="cmbStu">
										<?php getenrollid(); ?>
                                    </select>
                                <div id="errstudent" class="error_div"></div>
                            </div>
                            <div class="col-sm-3" >  
                             <a type="button" target="_blank" class="btn btn-primary" id="btn_gencertificate" ><span class="glyphicon glyphicon-plus"></span>Generate Certificate</a>
                            </div>
                            <div class="col-sm-3" >
                            <a type="button" target="_blank" class="btn btn-primary" id="btn_gentranscript" ><span class="glyphicon glyphicon-plus"></span>Generate Transcript</a>
                            </div>
                     	</div> 
			</form>
		</div>
	</div>

</div><!-- /.page-content -->
<?php require_once('../incl/footer.php'); ?>
<script type="text/javascript">
// Function to view the certificate for selected Student
  $( "#cmbStu" ).change(function() {
    var enrollid = $( "#cmbStu" ).val();
    var url ="http://localhost/HinduBuddistCulturalAssosiation/Admin/reports/certificate.php?enrollID="+enrollid;

    $("#btn_gencertificate").attr("href", url);
  });
  
  // Function to view the trnscript for selected Student
  $( "#cmbStu" ).change(function() {
    var enrollid = $( "#cmbStu" ).val();
    var url ="http://localhost/HinduBuddistCulturalAssosiation/Admin/reports/programtranscript.php?enrollID="+enrollid;

    $("#btn_gentranscript").attr("href", url);
  });
  
</script>

