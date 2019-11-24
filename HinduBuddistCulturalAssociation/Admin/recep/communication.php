<?php 
	require_once('../incl/header.php');
	require_once('../incl/recepsidebar.php'); 
	require_once('../incl/dbconnection.php');
	require_once('../incl/functions.php'); 
?>


<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>
				&nbsp;&nbsp; Send Mail
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

    </div>
	</br> 
   
   
   	   <div class="container home">
      <br>
			<div class="col-sm-10 col-sm-offset-1">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
					<form class="form-horizontal" name="frmContact" id="" frmContact"" method="post" action="" enctype="multipart/form-data" onsubmit="return validateContactForm()">

						 <div class="form-group">
							<label>Reciver's Email</label><span style="color:#f00">*</span> <span id="userEmail-info" class="info"></span><br /> 
							<div class="col-sm-8">
							<input type="text"class="input-field" name="userEmail" id="userEmail"/>
						</div>
						</div>
						 <div class="form-group">
							<label>Subject</label><span style="color:#f00">*</span> <span id="subject-info" class="info"></span><br /> 
							<div class="col-sm-8">
								<input type="text" class="input-field" name="subject" id="subject" />
						</div>
						</div>
						 <div class="form-group">
							<label>Message</label><span style="color:#f00">*</span> <span id="userMessage-info" class="info"></span><br />
							<div class="col-sm-8">
							<textarea name="content" id="content" class="input-field" cols="60" rows="6"></textarea>
						</div>
						</div>
						<div>
							<a type="submit" name="send" target="_blank" class="btn btn-primary" id="send" ><span class="glyphicon glyphicon-plus"></span>Send Mail</a>
                    </div>

							<div id="statusMessage"> 
									<?php
									if (! empty($message)) {
										?>
										<p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
									<?php
									}
									?>
								</div>
						</div>
					</form>
				</div>
				</div>

				<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
				<script type="text/javascript">
					function validateContactForm() {
						var valid = true;

						$(".info").html("");
						$(".input-field").css('border', '#e0dfdf 1px solid');
						var userEmail = $("#userEmail").val();
						var subject = $("#subject").val();
						var content = $("#content").val();
						
						if (userEmail == "") {
							$("#userEmail-info").html("Required.");
							$("#userEmail").css('border', '#e66262 1px solid');
							valid = false;
						}
						if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
						{
							$("#userEmail-info").html("Invalid Email Address.");
							$("#userEmail").css('border', '#e66262 1px solid');
							valid = false;
						}

						if (subject == "") {
							$("#subject-info").html("Required.");
							$("#subject").css('border', '#e66262 1px solid');
							valid = false;
						}
						if (content == "") {
							$("#userMessage-info").html("Required.");
							$("#content").css('border', '#e66262 1px solid');
							valid = false;
						}
						return valid;
					}
			</script>
		</div>
</div>

<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<?php
if(!empty($_POST["send"])) {
	$email = "HinduBuddhistCulturalAssosiation@gmail.com"; 
	$toEmail = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	
	$mailHeaders = "From: <". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your mail send successfully.";
	    $type = "success";
	}
}
?>
