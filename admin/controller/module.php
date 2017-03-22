<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý module';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
	if($form=='')
	{	
		$link='index.php?page=module';
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				if($lib->delete('tb_module','id',$id))
				{
					$lib->thongbao('Xoá module thành công !' );
				}else 
				{
					$lib->thongbao('Xoá module thất bại !','danger' );
				}
				
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
			

		//Lập trình hiển thị danh sách nhóm tài khoản
		$str_list="SELECT * from tb_module where parentid >=0  ";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and (title like '%$key%'  OR  url_name like '%$key%' ) ";//TÌm kiếm tương đối
		}
		if($_REQUEST['slmenu']!='' ){
			 $menu=$_REQUEST['slmenu'];
			 switch($menu){
				case 0: { $link.='&slmenu=top';  $str_list.=" and in_menu='top'"; break;}
				case 1: { $link.='&slmenu=left';  $str_list.=" and in_menu='left'"; break;}

			}
		}
		if($_REQUEST['slorder']!=''){
			switch($_REQUEST['slorder']){
				case 0: $str_list.=" ORDER BY id DESC"; break;
				case 1: $str_list.=" ORDER BY id ASC"; break;
				case 2: $str_list.=" ORDER BY title ASC"; break;
				case 3: $str_list.=" ORDER BY title DESC"; break;
				case 4: $str_list.=" ORDER BY position DESC"; break;
				case 5: $str_list.=" ORDER BY position ASC"; break;
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_module=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form nhóm tài khoản---------------------------------
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($action=='add')
			{ 
				//Check rong
			    if($data['title'] !='')
			    {
					$_insert_id=$lib->insert('tb_module',$data);
					if(is_numeric($_insert_id))
					{
						$luu="INSERT INTO tb_module_user_group (user_group_id, module_id) VALUES (1,$_insert_id)";
						mysql_query($luu);
						$lib->thongbao('Thêm mới module thành công !' );
						$lib->js_reload();
					}else
					{
						$lib->thongbao('Thêm mới module thất bại !' );
						$lib->js_reload();
					}
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );  
				  }		
			}
			
			if($id>0 && $action=='edit') 
			{
				//Check rong
			    if($data['title'] !='')
			    {
					if($lib->update('tb_module',$data,$id))
					{
						$lib->thongbao('Sửa  module thành công !' );
						$lib->js_reload();
					}else 
					{
						$lib->thongbao('Sửa module thất bại !' );
						$lib->js_reload();
					}
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );  
				  }
				
			}
			
		}
		
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_module WHERE id='$id'");
			
		}
		
	}
}
?>