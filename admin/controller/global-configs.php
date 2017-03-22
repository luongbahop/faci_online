<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
if($_SESSION['lang']=='en') {
$str_config="SELECT * FROM tb_configs where id=2";
$config=$lib->selectone($str_config); 
if(isset($_POST['btnGui'])){
	$data=$_POST['data']; 
	if($lib->update('tb_configs',$data,2))
			{
				$lib->thongbao('Sửa cấu hình thành công !' );
				$lib->js_header($url.'index.php?page=global-configs');
			}else 
			{
				$lib->thongbao('Sửa cấu hình thất bại !' );
				$lib->js_header($url.'index.php?page=global-configs');
			}

}
}//session
else{
	$str_config="SELECT * FROM tb_configs where id=1";
	$config=$lib->selectone($str_config); 
	if(isset($_POST['btnGui'])){
		$data=$_POST['data']; 
		if($lib->update('tb_configs',$data,1))
				{
					$lib->thongbao('Sửa cấu hình thành công !' );
					$lib->js_header($url.'index.php?page=global-configs');
				}else 
				{
					$lib->thongbao('Sửa cấu hình thất bại !' );
					$lib->js_header($url.'index.php?page=global-configs');
				}
	
	}

}//session
$title='Quản lý cấu hình';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
}
?>