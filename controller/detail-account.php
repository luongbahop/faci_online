<?php
if(isset($login))
{
if(isset($_GET['id']) && $page=='detail-account'){
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
			$data['updated']=date('Y-m-d H:i:s', time());
			$data['birthday']=date('Y-m-d H:i:s', strtotime($data['birthday']));
			
			//Check insert
			if($lib->update('tb_user',$data,$id))
			{
				$lib->js_header($url.$lib->maketitle($detail->fullname).'/2015'.$login->id.'.html?typ=1');
				
			}else 
			{
				$thongbao="Cập nhật tài khoản thất bại !";
			}				
			
		}
	}
	$title=$detail->fullname;
	$keywords=$config->keywords;
	$description=$config->description;
	
}
}else $lib->js_header($url.'login.html?typ=1'); 

?>