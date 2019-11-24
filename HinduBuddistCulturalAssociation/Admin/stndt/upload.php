<?php 
	require_once('header.php');
	require_once('../incl/stusidebar.php');
	require_once('connection.php'); 
	require_once('../incl/functions.php'); 
?>
<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                 &nbsp; Download Files
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
        <?php
			if(!empty($_POST))
			{
				$con = mysql_connect("localhost","root","");
				if (!$con)
					echo('Could not connect: ' . mysql_error());
				else
				{
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"../download/" . $_FILES["file"]["name"]) ;
						mysql_select_db("upload", $con);
						$sql = "INSERT INTO files(subject,topic,file) VALUES ('" . $_POST["sub"] ."','" . $_POST["pre"] . "','" . 
							  $_FILES["file"]["name"] ."');";
						if (!mysql_query($sql,$con))
							echo('Error : ' . mysql_error());
						else
							echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
						}
				}
				mysql_close($con);
			}
        ?>

	   <div class="container home">
      <br>

		
		
		
		
		
		
		
		
		
		
		
		<!--this to view -->
		
<div class="row">
		<div class="col-sm-12" >
			<table class="table table-default table-bordered "  id="table-data" >
				<thead>
					<tr>
					<th align="center">Subject</font></th>
					<th align="center">Topic </font></th>
					<th align="center">Download Files </font></th>
					</tr>
				</thead>
					<tbody>
                        <?php

					$link=mysql_connect("localhost","root","");
					mysql_select_db("upload",$link);
					$q="select count(*) \"total\"  from files";
					$ros=mysql_query($q,$link);
					$row=(mysql_fetch_array($ros));
					$total=$row['total'];
					$q="SELECT * FROM files ORDER BY subject ASC";
					$ros=mysql_query($q,$link);
					
					while($row=mysql_fetch_array($ros))
					{
						echo '<tr>';
						echo '<td align=center>' . $row['subject'];
						echo '<td align=center>' .$row['topic'];
						echo "<td align=center><a title='Click here to download in file.'href='download.php?id={$row['file']}'>{$row['file']} </a>"; 
						echo '</tr>';
						
					}

				   
				?>
				</tbody>
			</table>
		</div>
		</div>
		
		
		
		<?php require_once('../incl/footer.php'); ?>
