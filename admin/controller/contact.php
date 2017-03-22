<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý thư liên hệ';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=contact';
	if($form=='')
	{	
		$link='index.php?page=contact';
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_contact set publish='.$newtt.' where id='.$id);
		   $lib->js_header($redirect); 
		}
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!='')
		{
			$n= $_REQUEST['n'];
		}
		//Số bản ghi trên 1 trang
		if(isset($_REQUEST['ipp']))  $ipp=$_SESSION['ipp']=$_REQUEST['ipp'];
		if(isset($_SESSION['ipp'])) $ipp=$_SESSION['ipp'];
		else
		{
			$perpage=$lib->selectone('select perpage from tb_configs where id=1');
			$ipp=$perpage->perpage;	
		}
		//xoá bài viết
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				if($lib->delete('tb_contact','id',$id))
				{
					$lib->thongbao('Xoá liên hệ thành công !' );
				}else 
				{
					$lib->thongbao('Xoá liên hệ thất bại !','danger' );
				}	
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * from tb_contact ";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" WHERE (fullname like '%$key%' or email like '%$key%' or content like '%$key%' or email like '%$key%' )    ";//TÌm kiếm tương đối
		}
	   if($_REQUEST['slorder']!=''){
			$order=$_REQUEST['slorder'];
			switch($_REQUEST['slorder']){
				case 0: {$str_list.=" ORDER BY id DESC"; $link.='&slorder='.$order; break;}
				case 1: {$str_list.=" ORDER BY id ASC"; $link.='&slorder='.$order; break;}
				case 2: {$str_list.=" ORDER BY fullname ASC"; $link.='&slorder='.$order; break;}
				case 3: {$str_list.=" ORDER BY fullname DESC"; $link.='&slorder='.$order; break;}
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_contact=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form tài khoản
		
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		
		if(isset($_POST['btnGui'])){
			if($id>0 && $action=='edit') 
			{
				$data=$_POST['data']; 
				if($lib->update('tb_contact',$data,$id))
				{
					$lib->thongbao('Sửa liên hệ thành công !' );
					
				}else 
				{
					$lib->thongbao('Sửa liên hệ thất bại !' );
				
				}	
			}	
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_contact WHERE id='$id'");	
			if($detail->fullname=='' && $action!='del')
			{
				$lib->js_header($url.'index.php?page=contact&error=1');
			}
		}
		
	}
}
?>