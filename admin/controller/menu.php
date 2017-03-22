<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý menu';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
	if($form=='')
	{	
	 	$link='index.php?page=menu';
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
		   //echo $a='UPDATE tb_user set publish='.$newtt.' where id='.$id;die; 
		   mysql_query('UPDATE tb_menu set publish='.$newtt.' where id='.$id);
		  
		}
		//Số bản ghi trên 1 trang
		if(isset($_REQUEST['ipp']))  $ipp=$_SESSION['ipp']=$_REQUEST['ipp'];
		if(isset($_SESSION['ipp'])) $ipp=$_SESSION['ipp'];
		else
		{
			$perpage=$lib->selectone('select perpage from tb_configs where id=1');
			$ipp=$perpage->perpage;	
		}	

		if(($id>0 && $action=='del'))
			{
				$str_count="SELECT * FROM tb_menu WHERE  parentid=".$id;$_count=$lib->selectall($str_count);
				if($lib->total($_count)>0) $lib->thongbao('Vẫn còn menu con  !','danger' );
				else
				{
					if($lib->delete('tb_menu','id',$id))
					{
						$lib->thongbao('Xoá menu thành công !' );
					}else 
					{
						$lib->thongbao('Xoá menu thất bại !','danger' );
					}
				}
				
			}
			
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_menu  WHERE publish<=1";
		if($_SESSION['lang']!=''){$str_list.=" and lang="."'".$_SESSION['lang']."'";}else $str_list.=" and lang='vi'";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and title like '%$key%' ";//TÌm kiếm tương đối
		}
		if($_REQUEST['slorder']!=''){
			$order=$_REQUEST['slorder'];
			switch($_REQUEST['slorder']){
				case 0: {$str_list.=" ORDER BY id DESC"; $link.='&slorder='.$order; break;}
				case 1: {$str_list.=" ORDER BY id ASC"; $link.='&slorder='.$order; break;}
				case 2: {$str_list.=" ORDER BY title ASC"; $link.='&slorder='.$order; break;}
				case 3: {$str_list.=" ORDER BY title DESC"; $link.='&slorder='.$order; break;}
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_menu=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form tài khoản
	
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		
		if(isset($_POST['btnGui'])){
			$data=$_POST['data']; 
			if($action=='add')
			{ 
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_created']=$loginadmin->id;
				if(is_numeric($lib->insert('tb_menu',$data)))
				{
					$data=null;
					$lib->thongbao('Thêm mới menu thành công !' );
				}else
				{
					$lib->thongbao('Thêm mới menu thất bại !' );
				}	
					
			}
			
			if($id>0 && $action=='edit') 
			{
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				$lib->update('tb_menu',$data,$id);
				if($lib->update('tb_menu',$data,$id))
				{
					$lib->thongbao('Sửa menu thành công !' );
				}else 
				{
					$lib->thongbao('Sửa menuthất bại !' );
				}
				
				
			}
			
		}
		
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_menu WHERE id='$id'");
			
		}
		
	}
}
?>