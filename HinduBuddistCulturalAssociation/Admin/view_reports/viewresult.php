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
                 &nbsp; View Result Sheet
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    <h4>Select Student wise resultsheet / batch wise resulsheet</h4>
    </br>
  	<div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
                         <div class="form-group">
                            	 <label for="inputEmail3" class="col-sm-2 control-label">Student :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbStu">
										<?php getenrollid(); ?>
                                    </select>
                                </div>
                            	 <label for="inputEmail3" class="col-sm-1 control-label">Batch :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbBatch">
										<?php getbatch(); ?>
                                    </select>
                                </div>
                                <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="generateReport" ><span class="glyphicon glyphicon-plus"></span>Generate</a>
                                </div>
                     	</div>
			</form>
		</div>
	</div>
 <?php require_once('../incl/footer.php'); ?>   
</div><!-- /.page-content -->

<script type="text/javascript">
  // Function to view the student results according to the selected batch	
  $( "#cmbBatch" ).change(function() {
	$('#cmbStu').attr('disabled', true);
    var batchcode = $( "#cmbBatch" ).val();
    var url ="http://localhost/HinduBuddistCulturalAssosiation/admin/reports/batchresult.php?batchID="+batchcode;

    $("#generateReport").attr("href", url);
  });
  
  // Function to view the student results according to the selected student	
  $( "#cmbStu" ).change(function() {
	$('#cmbBatch').attr('disabled', true);
    var stucode = $( "#cmbStu" ).val();
    var url ="http://localhost/HinduBuddistCulturalAssosiation/admin/reports/studentresult.php?enrollID="+stucode;

    $("#generateReport").attr("href", url);
  });
</script>

