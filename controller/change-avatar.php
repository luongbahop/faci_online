<?php
if(isset($login))
{
if(isset($_GET['id']) && $page=='change-avatar'){
	$id= $_GET['id'];
	//lay ra chi tiet tai khoan
	$sql_detail="SELECT * FROM tb_user WHERE id=$id AND publish=1";
	$detail=$lib->selectone($sql_detail);
	
	if(isset($_POST['btnDangKy']))
	{
		//	LẤY THÔNG TIN FILE
		$name=$_FILES['f_file']['name'];//tên của file được upload
		$size=$_FILES['f_file']['size'];//dung lượng file
		$type=$_FILES['f_file']['type'];//loại file
		
		$tmp_name=$_FILES['f_file']['tmp_name'];//đường dẫn tạm thời
		$error=$_FILES['f_file']['error'];//lỗi upload
		$newname=time().$lib->maketitle($name);
		$fullnamea=$url.'uploads/thanh-vien/'.$newname;
		if($error==0)
		{
			if($type=='image/jpeg'  || $type=='image/png' || $type=='image/gif')
			{
				//tiến hành upload file
				if(move_uploaded_file($tmp_name,'uploads/thanh-vien/'.$newname))
				{
					if($lib->update('tb_user',array('avatar'=>$fullnamea),$detail->id))
					{
						$lib->js_header($url.$lib->maketitle($login->fullname).'/2017'.$login->id.'.html?typ=1');
					} else  $thongbao= "Thay đổi ảnh đại diện thất bại !";
				}							
			} else $thongbao="Định dạng file ảnh không chính xác !";
			
		}
		else if($error==1) $thongbao= "Thay đổi ảnh đại diện thất bại !";
		else if($error==2) $thongbao= "Thay đổi ảnh đại diện thất bại !";
		else if($error==3) $thongbao= "Thay đổi ảnh đại diện thất bại !";
		else  $thongbao= "Thay đổi ảnh đại diện thất bại !";
	}
	$title=$detail->fullname;
	$keywords=$config->keywords;
	$description=$config->description;
	
}
}else $lib->js_header($url.'login.html?typ=1'); 

?>