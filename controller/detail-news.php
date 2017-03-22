<?php
if(isset($_GET['id']) && $page=='detail-news'){
	$id= $_GET['id'];
	//lay ra chi tiet tin
	$sql_detail="SELECT * FROM tb_article_item WHERE publish=1 and id=$id and lang='".$_lang."'" ;
	$detail=$lib->selectone($sql_detail);
	$this_view=(int)$detail->viewed;
	if($detail->title!=''){
		// đếm số lượt xem
		$this_view++;
		mysql_query("UPDATE tb_article_item SET viewed = $this_view WHERE id=".$id); 
		//Tác giả
		$sql_author="SELECT * FROM tb_user WHERE publish=1 and id=".$detail->userid_created ;
		$author=$lib->selectone($sql_author);
		// lay ra tin lien quan
		$sql_same="SELECT * FROM tb_article_item WHERE parentid=$detail->parentid and publish=1 and id!=$id and lang='".$_lang."' order by position DESC , id DESC limit 0,15 ";
		$same=$lib->selectall($sql_same);			
		//SEO
		$title=$detail->title;
		$keywords=$detail->meta_title;
		$description=$detail->meta_description;
		$fb_url=$url.$detail->alias.'/88'.$detail->id.'.html';
		$fb_image=$detail->image;
	}
	
}

?>