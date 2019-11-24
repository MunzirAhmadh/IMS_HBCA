<?php 
	require_once('header.php');
	require_once('../incl/lecturer.php');
	require_once('connection.php'); 
	require_once('../incl/functions.php'); 
?>

<div class="page-content">

<div class="row">
		<div class="page-header">
              <h1>
                 &nbsp; Delete Files
              </h1>
        </div><!-- /.page-header -->
	</div>

		<?php include "connection.php" ?>
		<div class="row">
		<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="60px" align="center"> No</th>
				  <th align="center">Subject</th>
                  <th align="center">Topic</th>
                  <th align="center">File</th>
               	  <th align="center"> Action </th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			    $no=1;
				$result = mysql_query("SELECT * FROM files  ORDER BY subject ASC");
				while($data = mysql_fetch_object($result) ):
			  ?>
                <tr>
				  <td><?php echo $no;?></td>
                  <td><?php echo $data->subject ?></td>
                  <td><?php echo $data->topic?></td>
				  <td><?php echo $data->file?></td>
				  <td>
				 <a href="deleteById.php?id=<?php echo $data->id ?> ">
				<button class="btn btn-warning btn_delete" title="Click here to erase file."><span class="glyphicon glyphicon-trash"></span> Delete </button>
					</a>
					

				  </td>
                </tr>
			  <?php
				$no++;
				endwhile;
			  ?>
              </tbody>
		</table>
</div>	
</div>


		<?php require_once('../incl/footer.php'); ?>
