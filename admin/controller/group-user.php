<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý nhóm tài khoản';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=group-user';
	if($form=='')
	{	
		$link='index.php?page=group-user';
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_user_group set publish='.$newtt.' where id='.$id);
		   mysql_query('UPDATE tb_user set publish='.$newtt.' where groupid ='.$id); 
		}
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!='')
		{
			$n= $_REQUEST['n'];
		}
		
		if(($id>0 && $action=='del'))
			{
				$str_count="SELECT * FROM tb_user WHERE groupid=".$id;
				$_count=$lib->selectall($str_count);
				if($lib->total($_count)>0) $lib->thongbao('Vẫn còn thành viên trong nhóm tài khoản bạn chọn !','danger');
				else
				{
					
					if($lib->delete('tb_user_group','id',$id)){$lib->thongbao('Xoá nhóm tài khoản thành công !');}
					else {$lib->thongbao('Xoá nhóm tài khoản thất bại !' );}
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
			

		//Lập trình hiển thị danh sách nhóm tài khoản
		$str_list="SELECT * from tb_user_group  ";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" WHERE title like '%$key%' ";//TÌm kiếm tương đối
		}
		 $str_list.=" ORDER BY id DESC";
		$list_group=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form nhóm tài khoản---------------------------------
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		if(isset($_POST['btnGui'])){
			$data=$_POST['data']; 
			if($action=='add')
			{ 
				
				$data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_created']=$loginadmin->id;
				if($data['title']!='' && $data['allow']!='')
				{
					if(is_numeric($lib->insert('tb_user_group',$data)))
					{
						$data=null;
						$lib->thongbao('Thêm mới nhóm tài khoản thành công !' );
					}else
					{
						$lib->thongbao('Thêm mới nhóm tài khoản thất bại !','danger' );
					}
				}
				else{
					$lib->thongbao('Bạn chưa nhập đầy đủ thông tin bắt buộc !','danger' );
				}
					
			}
			
			if($id>0 && $action=='edit') 
			{
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				if($lib->update('tb_user_group',$data,$id))
				{
					$data=null;
					$lib->thongbao('Sửa  nhóm tài khoản thành công !' );
				}else 
				{
					$lib->thongbao('Sửa nhóm tài khoản thất bại !','danger' );
				}
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_user_group WHERE id='$id'");
			
		}
		
	}
}
?>