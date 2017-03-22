<?php
if(isset($login))
{
$link=$url.'test.html?t=1';
$title='Actual test Ms Hoa Ly';
$keywords='';
$description='';

if(isset($_GET['typ']) && $_GET['typ']==1)
{
	//Lập trình hiển thị danh sách sản phẩm và phân trang cho sản phẩm đó
	$str_listtest="SELECT * FROM tb_unit_category WHERE publish=1 and type=1 and lang='".$_lang."'";
}
else
{
	//Lập trình hiển thị danh sách sản phẩm và phân trang cho sản phẩm đó
	$str_listtest="SELECT * FROM tb_unit_category WHERE publish=1 and type=0 and lang='".$_lang."'";
}

$str_listtest.=" ORDER BY position ASC , id ASC";
$test=$lib->selectall($str_listtest,$config->perpage);//Gọi Pt lấy về danh sách dữ liệu ko phân trang
$link.='&n=';
}else $lib->js_header($url.'login.html?typ=1');  

   

?>