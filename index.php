<?php
	ini_set('display_errors','off');
	require_once('connect.php');
	//Lấy gia tri cho toan trang
	//Lay bien page tren url  để điều hướng
	if(isset($_GET['page'])) 
	{
		$page=$_GET['page'];	
	}

	else $page='home';
	if($_GET['page']=='index') $page='home';

	
	//Nếu tồn tại file controller trùng với bien page thì nhúng file controller 
	//nếu tồn tại file view trùng với tên biến page
	
	if(file_exists('controller/'.$page.'.php'))
	{
		require('controller/'.$page.'.php');
		if(file_exists('view/'.$giaodien.'/'.$page.'.php'))
		{
			$file=$page.'.php';	
		}
		else $file='error.php';	
		
	}
	else {require('controller/error_404.php');$file='error_404.php';}	
	
	require('view/'.$giaodien.'/index.php');	
?>