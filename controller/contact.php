<?php
	//lay ra lien he
	$sql_contact="SELECT * FROM tb_article_item WHERE parentid=3 limit 1";
	$contact=$lib->selectone($sql_contact);
	
	
	$title=$contact->title;
	$keywords='Giới thiệu UTC , FIT ';
	$description='Giới thiệu UTC , FIT , GTVT HÀ NỘI';	
	

?>