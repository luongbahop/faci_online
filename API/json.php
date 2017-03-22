<?php  
	include('../connect.php');
	$data=$lib->selectall("SELECT username FROM tb_user");
	$json=json_encode($data);
	print_r($json);
?>