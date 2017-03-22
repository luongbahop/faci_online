<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý đề thi';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
	if($form=='')
	{	
		$link='index.php?page=category-test';
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_test_category set publish='.$newtt.' where id='.$id);
		}
		//Doi trang thai in_home
		if($id>0 && isset($_REQUEST['in_home']))
		{
		   $tt=$_REQUEST['in_home'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_test_category set in_home='.$newtt.' where id='.$id);
		  
		}
		//Doi trang thai in_sidebar
		if($id>0 && isset($_REQUEST['in_sidebar']))
		{
		   $tt=$_REQUEST['in_sidebar'];
		   if($tt==0) $newtt=1; else $newtt=0; 
		   mysql_query('UPDATE tb_test_category set in_sidebar='.$newtt.' where id='.$id);
		  
		}
		//xoá đề thi
		if(($id>0 && $action=='del'))
			{
				
				$str_count="SELECT * FROM tb_test_category WHERE  parentid=".$id;$_count=$lib->selectall($str_count);
				if($lib->total($_count)>0) $lib->thongbao('Vẫn còn đề thi con  !','danger' );
				else
				{
					$str_count1="SELECT * FROM tb_test_item WHERE  parentid=".$id;$_count1=$lib->selectall($str_count1);
					if($lib->total($_count1)>0) $lib->thongbao('Vẫn còn bài viết trong đề thi này  !','danger' );
					else
					{
						if($lib->delete('tb_test_category','id',$id))
						{
							$lib->thongbao('Xoá đề thi thành công !' );
						}else 
						{
							$lib->thongbao('Xoá đề thi thất bại !','danger' );
						}
					}
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
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_test_category where publish >=0 ";
		if($_SESSION['lang']!=''){$str_list.=" and lang="."'".$_SESSION['lang']."'";}else $str_list.=" and lang='vi'";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" AND title like '%$key%'   ";//TÌm kiếm tương đối
		}
		if($loginadmin->groupid!=1){
			 $str_list.=" and userid_created=".$loginadmin->id;
		}
		$str_list.=" ORDER BY id DESC";
		$list_category=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';
		
	}else{//Lập trình hiển thị form tài khoản
		$str_category="SELECT * FROM tb_test_category";
		$list_category=$lib->selectall($str_category);
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		
		if(isset($_POST['btnGui'])){
			$data=$_POST['data']; 
			if($action=='add')
			{ 
				
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['alias']=$lib->maketitle($data['title']);
				$data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_created']=$loginadmin->id;
				if($data['title']!='')
				{
					if(is_numeric($lib->insert('tb_test_category',$data)))
					{
						$data=null;
						$lib->thongbao('Thêm mới đề thi thành công !' );
					}else
					{
						$lib->thongbao('Thêm mới đề thi thất bại !','danger' );
					}
				}else
				{
					$lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );
				}

				
					
			}
			
			if($id>0 && $action=='edit') 
			{
				$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=category-test';
				$data['alias']=$lib->maketitle($data['title']);
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				$lib->update('tb_test_category',$data,$id);
				if($data['title']!='')
				{
					if($lib->update('tb_test_category',$data,$id))
					{
						$lib->thongbao('Sửa đề thi thành công !' );
					}else 
					{
						$lib->thongbao('Sửa đề thi thất bại !','danger' );
					}
				}else
				{
					$lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );
				}	
			}
			
		}
		
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_test_category WHERE id='$id'");
			if($detail->title=='' && $action!='del')
			{
				$lib->js_header($url.'index.php?page=category-test&error=1');
			}
		}
		
	}
}
?>