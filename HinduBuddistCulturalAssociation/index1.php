<?php 
	require("header.php");
?>

<style type="text/css">
	.loginbox{
		border:1px solid #999 ;
		width:400px;
		height:250px;
		margin-top:150px;
		margin-left:30%;
		border-radius:10px;
		padding-left:5%;
		padding-right:5%;
		box-shadow:2px 2px 8px #003399;
	}
	h2{
		font-family:Arial, Helvetica, sans-serif;
		color:#666;
		font-weight:bold;
	}
	.form-control:hover , .form-control:focus{
		border: 2px solid #CCC;
		border-radius: 5px;
	}
	#btnlogin{
	font-weight:bold;
	border:5px 2px #000066;
	}

</style>

<body background="img/body.png">
<div class="container">
	<div class="loginbox">
		<h2 align="center"> &nbsp; Login</h2><hr/>
		<form class="form-horizontal">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</div>
					<input type="text" class="form-control" name="txtuname" id="txtuname" placeholder="Username"/>
				</div>
            </div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</div>
					<input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Password"/>
				</div>
			</div>
			<div class="form-group" align="center">
				<input type="button" value="Back" class="btn btn-primary" id="btnback" onclick="window.location.href='index.php'"/>
				<input type="button" value="Login" class="btn btn-primary" id="btnlogin"/>
				<input type="reset" value="Reset" class="btn btn-primary" id="btnreset"/>
			</div>
		</form>
	</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function(){
	//login to the system using enter button
	$("#txtpass").keypress(function(e){
			if(e.which==13){
				$("#btnlogin").click();
			}
	});
	
		$("#btnlogin").click(function(){
			var uname=$("#txtuname").val();
			var pass=$("#txtpass").val();
			

			
			if(uname==""||pass==""){
				$.notify("Please enter both user name and password","warning");
				return;
			}
			var url="login.php";
			$.post(url,{txtuname:uname,txtpass:pass},function(data,status){
				if(status=="success"){
					if(data=="1"){
						$.notify("Please enter both user name and password","error","error");
						return;
					}
					else if(data=="2"){
						$.notify("Invalid user name or password","error");
						return;
					}
					else if(data=="3"){
						$.notify("Your account has been disabled,<br/>Please contact adminstrator","warning");
						return;
					}
					else if(data=="4"){
						var url = "route.php";
						$(location).attr("href",url);
					}
				}
					//alert(data);
					//$.notify(data,"warning");
			});
		});
	});
</script>
<?php
require("footer.php");
?>