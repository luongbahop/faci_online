<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
	$title='Quản lý phân quyền';
	$keywords='Trang quản trị ';
	$description='Web site phát triển bởi anh Hợp đẹp trai';
	//Lấy danh sách nhóm tài khoản
	$str_group="SELECT * FROM tb_user_group ";
	$group=$lib->selectall($str_group);
	//Lấy danh sách module
	$str_module="SELECT * FROM tb_module order by url_name ASC ";
	$module=$lib->selectall($str_module);
	$data=$_POST['data'];
	if(isset($_POST['data'])){	
		if($data['slGroup']!='')
		{
			//Kiem tra cac role va checked
			//lay ra cac module_id ma group_user_id nhan duoc co
			$str_check="SELECT module_id FROM tb_module_user_group where user_group_id=".$data['slGroup'];
			$check=$lib->selectall($str_check);
		 }
		 else {echo 'Bạn vui lòng chọn nhóm tài khoản';die;}
		
			
		}
	
	if($_POST['btngui']=='1')
	{
		if($data['slGroup']!='')
		{
			foreach($module as $k)
			{
				if(is_array($k))
				{
					if($k['id']==$_POST['cb'.$k['id']]){
						// kiem tra xem module-group-user đã tồn tại chưa ?
						$sql_tontai="select * from tb_module_user_group where user_group_id=".$data['slGroup']." AND module_id=".$_POST['cb'.$k['id']];
						$tontai=$lib->selectall($sql_tontai);
						// neu chua ton tai thi them vào
						if(count(array_filter($tontai))==0)
						{
							$luu="INSERT INTO tb_module_user_group (user_group_id, module_id) VALUES (".$data['slGroup'].", ".$_POST['cb'.$k['id']].")";
							mysql_query($luu);
							$check=$lib->selectall($str_check);
							$lib->thongbao('Cập nhật viết thành công !' );
							//$lib->js_reload();
						}
							
					}
					else
					{
						
						   $xoa="DELETE FROM tb_module_user_group WHERE user_group_id=".$data['slGroup']." AND module_id=".$k['id'];
							mysql_query($xoa);
							$check=$lib->selectall($str_check);
							$lib->thongbao('Cập nhật thành công !' );
							//$lib->js_reload();
						
					}
				}
			}
			
		 }
		 else {echo 'Bạn vui lòng chọn nhóm tài khoản';die;}
	
	}

}
	
	

?>