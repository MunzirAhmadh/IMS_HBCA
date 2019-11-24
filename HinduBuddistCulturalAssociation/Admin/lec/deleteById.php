<?php 
include "connection.php"; 

$id = $_GET['id']; 

mysql_query("DELETE FROM files where id = '$id'"); 

header("Location: delete.php"); 



