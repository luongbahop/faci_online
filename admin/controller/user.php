<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý người dùng';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=user';
	if($form=='')
	{	
		$link='index.php?page=user';
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_user set publish='.$newtt.' where id='.$id);
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
		
		// Xoá tài khoản
		if(($id>0 && $action=='del'))
			{
				if($id==$loginadmin->id) {$lib->thongbao('Không được phép xoá chính mình !','danger' );}
				else{
					$str_count="SELECT * FROM tb_article_item WHERE  userid_created=".$id;
					$_count=$lib->selectall($str_count);
					if($lib->total($_count)>0) $lib->thongbao('Vẫn còn bài viết do tài khoản này tạo !','danger' );
					else
					{
						if($lib->delete('tb_user','id',$id)){$lib->thongbao('Xoá tài khoản thành công !' );}
						else {$lib->thongbao('Xoá tài khoản thất bại !','danger' );}
					}
				}
			}
				
			
		
		
		//Lập trình hiển thị danh sách san pham
		$str_list="SELECT * FROM tb_user  WHERE publish<=1 ";
		if($_REQUEST['txtKey']!=''){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and (username like '%$key%'  OR  email like '%$key%' or fullname like '%$key%' ) ";//TÌm kiếm tương đối
		}
		 if($_REQUEST['sltype']!='' ){
			 $type=$_REQUEST['sltype'];
			 $link.='&sltype='.$type;
			 $str_list.=" and groupid=$type";//TÌm kiếm tương đối
		}
		if($loginadmin->groupid!=1){
			 $str_list.=" and id=".$loginadmin->id;//TÌm kiếm tương đối
		}
		if($_REQUEST['slstatus']!=''){
			$status=$_REQUEST['slstatus'];
			switch($status){
				case 1: 
				{	
					$str_list.=" and publish=1"; 
					 $link.='&slstatus='.$status;
					break;
				}
				case 2: 
				{	
					$str_list.=" and publish=0"; 
					 $link.='&slstatus='.$status;
					break;
				}
				
			}
		}
		
		if($_REQUEST['slorder']!=''){
			$order=$_REQUEST['slorder'];
			$link.='&slorder='.$order;
			switch($order){
				case 0: {$str_list.=" ORDER BY id DESC"; break;}
				case 1: {$str_list.=" ORDER BY id ASC"; break;}
				case 2: {$str_list.=" ORDER BY username ASC"; break;}
				case 3: {$str_list.=" ORDER BY username DESC"; break;}
			}
		}else  $str_list.="  ORDER BY id DESC";
		//echo $str_list; 
		$list_user=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp;
		
	}else{//Lập trình hiển thị form tài khoản------------------------------------------
		$str_role="SELECT * FROM tb_user_group";
		$list_role=$lib->selectall($str_role);
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		
		if(isset($_POST['btnGui'])){
			$data=$_POST["data"];	
			$email=$data['email'];
			$username=$data['username'];
		    $password=$data['password'];
			$data['birthday']=date('Y-m-d H:i:s', strtotime($data['birthday']));
		    $data['salt']=md5(rand().time());//Tạo mã bảo mật 32 ký tự
			//Thêm mới tài khoản
			if($id=='' && $action=='add')
			{ 
				$data['created']=gmdate('Y-m-d H:i:s', time()+7*3600);
				//Check rong
				  if($email !='' && $username !='')
				  {
					  //Check ton tai tai khoan (username)
					  $sql_username=mysql_query("SELECT * FROM tb_user WHERE username ='$username'");
					  if(mysql_num_rows($sql_username)==0)
					   {
						  //Check ton tai email
						  $sql_email=mysql_query("SELECT * FROM tb_user WHERE email ='$email'");
						  if(mysql_num_rows($sql_email)==0)
						  {
							  //Check nhap lại mk
							  if($data['password']==$_POST['txtrepass'])
							  {
								  $data['password']=md5($data['password']);
								  //Check insert
								  if($lib->insert('tb_user',$data))
									{
										
										$data=null;
										$lib->thongbao('Thêm mới tài khoản thành công !','success' );
									}else
									{
										$lib->thongbao('Thêm mới tài khoản thất bại !','danger' );
									}
								  
							  }
							  else//Check nhap lại mk
							  {
								   $lib->thongbao('Mật khẩu không khớp !','danger' ); 
							  }
						  }
						  else//Check ton tai email
						  {
							   $lib->thongbao('E-mail đã tồn tại !','danger' ); 
						  }	
						}
					  else//Check ton tai username
					  {
						  $lib->thongbao('Tài khoản đã tồn tại !','danger' ); 
					  }	 
						  
					  }
				  else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập đầy đủ thông tin !','danger' );  
				  }	
			}//Ket thuc Thêm mới tài khoản
			//sửa tài khoản
			if($id>0 && $action=='edit') 
			{	
				$data['updated']=gmdate('Y-m-d H:i:s', time()+7*3600);
				if($password=='')
				{
					unset($data['password']);
					//Check insert
					if($lib->update('tb_user',$data,$id))
					{
						$lib->js_header($redirect);
						$lib->thongbao('Sửa tài khoản thành công !' );
					}else 
					{
						$lib->thongbao('Sửa tài khoản thất bại !','danger' );
					}
						
				}
				else
				{ 
					//Check mat khau cu
					if(md5($_POST['txtPassOld'])==$_POST['now-pass'])
					{
						//Check nhap lại mk
						if($data['password']==$_POST['txtrepass'])
						{
							$data['password']=md5($data['password']);
							//Check insert
							if($lib->update('tb_user',$data,$id))
							{
								$lib->thongbao('Sửa tài khoản thành công !' );
								$lib->js_header($redirect);
							}else 
							{
								$lib->thongbao('Sửa tài khoản thất bại !','danger' );
							}
						}else{
							 echo $lib->thongbao('Xác nhận mật khẩu không khớp !' );
						  }
					}else
					{
						$lib->thongbao('Mật khẩu cũ không đúng !','danger' );
					}
				}
			}
		}
		
		
	}
	if($id!='' && $id>0){
		//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
		$detail=$lib->selectone("SELECT * FROM tb_user WHERE id='$id'");
		
	}
}
?>