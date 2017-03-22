<?php
require('connect.php');
$data=array();
$data=$_POST;
if(isset($data[data]['module']))
{
	
	if($data[data]['module']=='detail-news')
	{
		echo '<option value="0">---Chọn mục---</option>';
		if($_SESSION['lang']=='') {$_cate="select * from tb_article_item Where publish=1 and lang='vi'";}else{$_cate="select * from tb_article_item Where publish=1 and lang="."'".$_SESSION['lang']."'";}
		$items=$lib->selectall($_cate) ;
		foreach( $items as $k)
		{
		if(is_array($k))
			{
				echo "<option value=".$k['id'].">".$k['title']."</option>";
			}
		}
	}
	if($data[data]['module']=='news')
	{
		echo '<option value="0">---Chọn mục---</option>';
		if($_SESSION['lang']=='') {$_cate="select * from tb_article_category Where publish=1 and lang='vi'";}else{$_cate="select * from tb_article_category Where publish=1 and lang="."'".$_SESSION['lang']."'";}
		$lib->loadoption('0','',$lib->selectall($_cate)) ;
	}
	if($data[data]['module']=='module')
	{
		if($_SESSION['lang']=='' or $_SESSION['lang']=='vi')
		{
			echo '<option value="home">Trang chủ</option>';
			echo '<option value="test">Actual test</option>';
			
		}
		if($_SESSION['lang']=='en')
		{
			echo '<option value="home">Home</option>';
			echo '<option value="test">Actual test</option>';
			
		}
		
	}
}

?>
