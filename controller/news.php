<?php
$lib->idall='';
//Lấy ra ID trên URL về nếu có (Lấy ra các sản phẩm trong 1 danh mục)
if(isset($_GET['id']) && is_numeric($_GET['id']) && $page=='news')
{
     $id=$_GET['id'];
	 $cate=$lib->selectone("SELECT * FROM tb_article_category WHERE publish=1 AND id=$id order by id DESC");
	 $link=$url.$cate->alias.'/66'.$id.'.html?t=1';
	 $title=$cate->title;
	 $keywords='toeic buiding, tiếng anh';
	 $description='toeic buiding, tiếng anh';
		
}else{
	$id='';
	$link='news.html?t=1';
	$title='Tin tức mới';
    $keywords='';
    $description='';
}




//danh muc tin tuc
$str_category="SELECT * FROM tb_article_category where show_menu=1 and publish=1 and lang='".$_lang."' limit 0,4 ";
$category=$lib->selectall($str_category);


//Lập trình hiển thị danh sách sản phẩm và phân trang cho sản phẩm đó
$str_listnews="SELECT * FROM tb_article_item WHERE publish=1 and lang='".$_lang."'";
if(isset($_REQUEST['txtSearch'])){
	 $key=$_REQUEST['txtSearch'];
	 $link.='&txtSearch='.$key;
	 $str_listnews.=" AND title like '%$key%' ";//TÌm kiếm tương đối
}

if($id>0 && $page=='news'){
	$allid=trim($lib->getall('tb_article_category',$id,'',0),',');
	$lib->idall='';
	$str_listnews.=" AND parentid IN ($allid)";	
}
$allid='';
$str_listnews.=" ORDER BY position ASC , id DESC";

$news=$lib->selectall($str_listnews,$config->perpage);//Gọi Pt lấy về danh sách dữ liệu ko phân trang
$link.='&n=';
   

   

?>