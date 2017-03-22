<?php
//Lấy ra ID trên URL về nếu có (Lấy ra các sản phẩm trong 1 danh mục)
if(isset($_GET['id']) && is_numeric($_GET['id']) && $page=='list-news')
{
     $id=$_GET['id'];
	 $cate=$lib->selectone("SELECT * FROM tb_article_category WHERE publish=1 AND id=$id");
	 $link=$lib->makeTitle($cate->title).'/'.$id.'.html?t=1';
	 $title=$cate->title;
	 $keywords='Trị mụn , đông y, thuốc , tin tức';
	 $description='Hệ thống trị mụn đông y lớn nhất việt nam';
		
}else{
	$id='';
	$link='list-news.html?t=1';
	$title='Tin tức mới';
    $keywords='';
    $description='';
}




//danh muc tin tuc
$str_category="SELECT * FROM tb_article_category where show_menu=1 and publish=1 limit 0,4 ";
$category=$lib->selectall($str_category);




//Lập trình hiển thị danh sách sản phẩm và phân trang cho sản phẩm đó
$str_listnews="SELECT * FROM tb_article_item WHERE publish=1";
if(isset($_GET['txtSearch'])){
	 $key=$_GET['txtSearch']; 
	 $link.='&txtSearch='.$key;
	 $str_listnews.=" AND title like '%$key%' ";//TÌm kiếm tương đối
}


if(isset($_REQUEST['tukhoa']))
{
	$tukhoa=$_REQUEST['tukhoa'];
	$str_listnews.=" AND title  LIKE '%$tukhoa%' ";		
}
$more='';
$cateid='';
foreach($category as $k)
	{
		if(is_array($k) )
		{
			if(isset($_REQUEST[$lib->maketitle($k['title'])]))
			{
				$cateid.=','.$k['id'];
				$more.='&'.$lib->maketitle($k['title']).'=1';
			}
		}
    }
if($more!='')
{
	$link.=$more;	
	$cateid=trim($cateid,',');
	$str_listnews.=" AND parentid  IN ($cateid)";
}
if($id>0 && $page=='list-news'){
	$allid=trim($lib->getall('tb_article_category',$id,'',0),',');
	$str_listnews.=" AND parentid IN ($allid)";
}
if($_REQUEST['txtid']>0 && $_REQUEST['txtpage']=='list-news'){
	$allid=trim($lib->getall('tb_article_category',$_REQUEST['txtid'],'',0),',');
	$str_listnews.=" AND parentid IN ($allid)";
}
if(isset($_REQUEST['slorder'])){
	switch($_REQUEST['slorder']){
		case 1: $str_listnews.=" ORDER BY id DESC"; break;
		case 2: $str_listnews.=" ORDER BY id ASC"; break;
		case 3: $str_listnews.=" ORDER BY id ASC"; break;
		case 4: $str_listnews.=" ORDER BY id DESC"; break;
	}
}
$listnews=$lib->selectall($str_listnews,7);//Gọi Pt lấy về danh sách dữ liệu ko phân trang
   $link.='&n=';
   
   
   

?>