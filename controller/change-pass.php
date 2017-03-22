<?php
if(isset($login))
{
if(isset($_GET['id']) && $page=='change-pass'){
	$id= $_GET['id'];
	//lay ra chi tiet tai khoan
	$sql_detail="SELECT * FROM tb_user WHERE id=$id AND publish=1";
	$detail=$lib->selectone($sql_detail);
	
	if(isset($_POST['btnDangKy']))
	{
		$id=$_GET['id'];
		$data=$_POST[register];
		if($id>0) 
		{	
			if($detail->password==md5($data['oldpass']))
			{
				if($data['password']==$data['repass'])
				{
					//Check insert
					if($lib->update('tb_user',array('password'=>md5($data['password'])),$id))
					{
						$lib->js_header($url.$lib->maketitle($detail->fullname).'/2016'.$login->id.'.html?typ=1');
						
					}else 
					{
						$thongbao="Cập nhật tài khoản thất bại !";
					}	
				}
				else $thongbao="Xác nhận mật khẩu không khớp !";
				
			}
			else $thongbao="Mật khẩu không đúng  !";
						
			
		}
	}
	$title=$detail->fullname;
	$keywords=$config->keywords;
	$description=$config->description;
	
}
}else $lib->js_header($url.'login.html?typ=1'); 

?>