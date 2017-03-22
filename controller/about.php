<?php
	//lay ra chi tiet tin
	$sql_about="SELECT * FROM tb_article_item WHERE parentid=2 limit 1";
	$about=$lib->selectone($sql_about);
	
	
	$title='Giới thiệu';
	$keywords='Giới thiệu UTC , FIT ';
	$description='Giới thiệu UTC , FIT , GTVT HÀ NỘI';	
	

?>