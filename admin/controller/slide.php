
<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý slide';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=slide';
	if($form=='')
	{	
		$link='index.php?page=slide';
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_slide set publish='.$newtt.' where id='.$id);
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
		if(($id>0 && $action=='del'))
			{
				if($lib->delete('tb_slide','id',$id))
				{
					$lib->thongbao('Xoá slide thành công !' );
				}else 
				{
					$lib->thongbao('Xoá slide thất bại !','danger' );
				}
				
			}
			
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * from tb_slide where publish >=0 ";
		if($_SESSION['lang']!=''){$str_list.=" and lang="."'".$_SESSION['lang']."'";}else $str_list.=" and lang='vi'";
		if(isset($_REQUEST['txtKey'])){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and title like '%$key%'   ";//TÌm kiếm tương đối
		}
		if($_REQUEST['sltype']!='' ){
			 $type=$_REQUEST['sltype']; 
			 $link.='&sltype='.$type;
			 $str_list.=" and  parentid = '$type'";//TÌm kiếm tương đối
		}
		if($_REQUEST['slorder']!=''){
			switch($_REQUEST['slorder']){
				case 0: $str_list.=" ORDER BY id DESC"; break;
				case 1: $str_list.=" ORDER BY id ASC"; break;
				case 2: $str_list.=" ORDER BY title ASC"; break;
				case 3: $str_list.=" ORDER BY title DESC"; break;
				case 4: $str_list.=" ORDER BY position ASC"; break;
				case 5: $str_list.=" ORDER BY position DESC"; break;
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_slide=$lib->selectall($str_list,$ipp);
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
				//Check rong
			    if($data['title'] !='')
			    {
					if(is_numeric($lib->insert('tb_slide',$data)))
					{
						$data=null;
						$lib->thongbao('Thêm mới slide thành công !' );
					}else
					{
						
						$lib->thongbao('Thêm mới slide thất bại !','danger' );
					}
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );  
				  }	
				
					
			}
			
			if($id>0 && $action=='edit') 
			{ 
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				//Check rong
			    if($data['title'] !='')
			    {
					if($lib->update('tb_slide',$data,$id))
					{
						 
						$lib->thongbao('Sửa slide thành công !' ); 
					}else 
					{
						$lib->thongbao('Sửa slide thất bại !','danger');
					}
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập tiêu đề !','danger' );  
				  }	
					
	
				
				
			}
			
		}
		
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_slide WHERE id='$id'");
			
		}
		
	}
}
?>