<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý email';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';	
	if($form=='')
	{	
		$link='index.php?page=email';
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!='')
		{
			$n= $_REQUEST['n'];
		}
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				if($lib->delete('tb_email','id',$id))
				{
					$lib->thongbao('Xoá email thành công !' );
				}else 
				{
					$lib->thongbao('Xoá email thất bại !','danger' );
				}
				
			}	
		//Số bản ghi trên 1 trang
		if(isset($_REQUEST['ipp']))  $ipp=$_SESSION['ipp']=$_REQUEST['ipp'];
		if(isset($_SESSION['ipp'])) $ipp=$_SESSION['ipp'];
		else
		{
			$perpage=$lib->selectone('select perpage from tb_configs where id=1');
			$ipp=$perpage->perpage;	
		}	
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * from tb_email ";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" WHERE email like '%$key%'     ";//TÌm kiếm tương đối
		}
	    if($_REQUEST['slorder']!=''){
			$order=$_REQUEST['slorder'];
			switch($_REQUEST['slorder']){
				case 0: {$str_list.=" ORDER BY id DESC"; $link.='&slorder='.$order; break;}
				case 1: {$str_list.=" ORDER BY id ASC"; $link.='&slorder='.$order; break;}
				case 2: {$str_list.=" ORDER BY email ASC"; $link.='&slorder='.$order; break;}
				case 3: {$str_list.=" ORDER BY email DESC"; $link.='&slorder='.$order; break;}
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_email=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}
}
?>