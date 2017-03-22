<?php
if(isset($login))
{
	$id= $login->id;
	//lay ra chi tiet tai khoan
	$sql_detail="SELECT * FROM tb_user WHERE id=$id AND publish=1";
	$detail=$lib->selectone($sql_detail);
	
	$history=$lib->selectall("SELECT * FROM tb_point where userid_created=".$login->id); 
	//SEO
	$title='Thông tin tài khoản  | '.$detail->fullname;
	$keywords=$detail->meta_title;
	$description=$detail->meta_description;
}else $lib->js_header($url.'login.html?typ=1'); 


?>