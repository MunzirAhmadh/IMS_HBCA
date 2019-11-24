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
				&nbsp;&nbsp; Employee Profile
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
    		<div class="col-sm-9 col-sm-offset-2">
			<form class="form-horizontal">
            </br>
                          
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Select Employee</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="cmbStu">
                                <?php getemployee(); ?>
                            </select>
                        <div id="errstudent" class="error_div"></div>
                    </div>
                    <div class="col-sm-3" >  
                     <a type="button" target="_blank" class="btn btn-primary" id="btn_view" ><span class="glyphicon glyphicon-plus"></span>View</a>
                    </div>
                </div> 
			</form>
		</div>
    </div>
	</br> 
   
    
    <div class="row">
    	<div class="col-sm-7 col-sm-offset-2">
        	<div class="panel panel-default">
                <div class="panel-heading">
                    <h4><a data-toggle="collapse" data-parent="#accordion">Basic Information </a></h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Employee ID</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txteid" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="txtefname" style="border-style:none"></input>
                        </div>
                   </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtelname" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Job Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="cmbjtitle" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtedob" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">NIC</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtenic" style="border-style:none"></input>
                        </div>
                  </div><div class="form-group">
                        <label class="col-sm-3 control-label">Date of Join</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtedoj" style="border-style:none"></input>
                        </div>
                  </div>
                </div>
                <div class="panel-heading">
                    <h4><a data-toggle="collapse" data-parent="#accordion">Contact Information </a></h4>
                </div>
                <div class="panel-body">
                     <div class="form-group">
                            <label class="col-sm-3 control-label" id="eid">Address</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control" id="txteadd" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtecity" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label">Land No</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txteland" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Mobile No</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtemobile" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label" id="eid">E-mail Address</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtemail" style="border-style:none"></input>
                            </div>
                      </div>
                  </div>
                
        	</div>
        </div>
    </div>
    

<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
	 $(document).ready(function() {
        //clear_form();
    });

   /*this function is used to view employee profile information*/ 
	$('#btn_view').click(function() {
        
        var act_mode = "load_emp_data";
        var cmbStu =  $("#cmbStu").val();
        $.post('../incl/empprofile_handle.php', {
            'act_mode': act_mode,
            'cmbStu': cmbStu,
        },
		
        function(data) {
          
            if(data!=="")
            {
                $("#txteid").val(data["empcode"]);
                $("#txtefname").val(data["empfname"]);
                $("#txtelname").val(data["emplname"]);
                $("#cmbjtitle").val(data["empjob"]);
                $("#txtedoj").val(data["empdoj"]);
                $("#txtedob").val(data["empdob"]);
                $("#txtenic").val(data["empnic"]);
                $("#txteadd").val(data["empadd"]);
				$("#txtecity").val(data["empcity"]);
                $("#txteland").val(data["empland"]);
                $("#txtemobile").val(data["empmobile"]);
                $("#txtemail").val(data["empemail"]);
            }
        },"json" );
    
});
</script>


