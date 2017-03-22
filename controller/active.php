<?php
$title='Kích hoạt tài khoản';
$keywords=$config->keywords;
$description=$config->description;

//Lấy biến trên URL
if(isset($_GET['id'])) $id=$_GET['id']; else $id='';
if(isset($_GET['coded'])) $coded=$_GET['coded']; else $coded='';
//Kiểm tra biến nếu có đủ giá trị thì...

if($id>0 && $coded!=''){
	$strcheck="SELECT * FROM tb_user WHERE id='$id' AND salt='$coded' limit 1";
	$re=mysql_query($strcheck);//Chạy câu lệnh SQL bên trên
	if(mysql_num_rows($re)>0){
		$detail_account=mysql_fetch_object($re);
		$this_time=( $detail_account->time_created + 3600*24*3);
		if($this_time > time() ){
			mysql_query("UPDATE tb_user SET publish=1,groupid=3  WHERE id='$id'");
			$thongbao='Kích hoạt tài khoản thành công ! Chức năng nâng cao chỉ dành cho học viên của trung tâm , bạn vui lòng chờ xác nhận của quản trị viên !';	
		}else 
		{
			mysql_query("DELETE FROM tb_user  WHERE id='$id'");
			$thongbao='Link kích hoạt hết hạn sử dụng !';
		}	
		
	}else $thongbao='Thông tin kích hoạt không chính xác';	
}else $thongbao='Thông tin kích hoạt không đầy đủ';


?>