<?php
if(isset($login))
{
if(isset($_GET['id']) && $page=='detail-test'){
	$id= $_GET['id'];
	//lay ra chi tiet tin
	$sql_detail="SELECT * FROM tb_unit_category WHERE publish=1 and id=$id and lang='".$_lang."'" ;
	$detail=$lib->selectone($sql_detail);
	if($detail->title!=''){ 
		//Tác giả
		$sql_author="SELECT * FROM tb_user WHERE publish=1 and id=".$detail->userid_created ;
		$author=$lib->selectone($sql_author);
		// lay ra tin lien quan
		$sql_same="SELECT * FROM tb_test_category WHERE parentid=$detail->parentid and id!=$id and lang='".$_lang."' order by position ASC , id DESC limit 0,7 ";
		$same=$lib->selectall($sql_same);
		
		
		
		
		//SEO
		$title=$detail->title;
		$keywords=$detail->meta_title;
		$description=$detail->meta_description;
	}
	
}
}else $lib->js_header($url.'login.html?typ=1'); 

?>