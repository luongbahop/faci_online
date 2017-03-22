<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý bình luận';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';		
	if($form=='')
	{	
		$link='index.php?page=comment';
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!='')
		{
			$n= $_REQUEST['n'];
		}
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_comment set publish='.$newtt.' where id='.$id);
		  
		}
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				$lib->delete('tb_comment','id',$id);
				
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
		$str_list="SELECT * from tb_comment ";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" WHERE content like '%$key% or fullname like '%$key% ' or email like '%$key%   ";//TÌm kiếm tương đối
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
		$list_comment=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form tài khoản
		
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		
		if(isset($_POST['btnGui'])){
			$data=$_POST['data']; 
			if($id>0 && $action=='edit') 
			{
				if($lib->update('tb_comment',$data,$id))
				{
					$lib->thongbao('Sửa  bình luận thành công !' );
					$lib->js_reload();
				}else 
				{
					$lib->thongbao('Sửa bình luận thất bại !','danger' );
					$lib->js_reload();
				}
			}
			
		}
		
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_comment WHERE id='$id'");
			
		}
		
	}
}
?>

