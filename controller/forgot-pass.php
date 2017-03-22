<?php
if(isset($_POST['btnQuenMK'])){
	  $data=$_POST[data];
	  $name='Lương Bá Hợp';
	  $email=trim($data['email']);  //email
	  if($email!='')
	  {
		  $re=mysql_query("select * from tb_user where email='$email'");//Chạy câu lệnh SQL bên trên
		  if(mysql_num_rows($re)>0){
			  //reset mat khau 
			  $pass=substr(md5(rand().time()),0,6);
			  $newspass=md5($pass);
			  if(mysql_query("UPDATE tb_user SET password='$newspass'  WHERE email='$email'")==TRUE)
			  {
				  $tieude='Quên mật khẩu - '.$config->title;//Tiêu đề
				  $link=$url.'index.php?page=forgot-pass&email='.$email;	 
				  $website_name=$config->title;//Tên của người gửi Email
				  $email_author='system.email.vn@gmail.com';//email nguoi gui
				  $pass_author='hophop01';//email nguoi gui
				  $info=$lib->selectone("select * from tb_user where email='$email'");
				  $noidung=' <h4>Xin chào tài khoản : '.$info->username.' . Cám ơn bạn đã sử dụng Email <b style="color:red">'.$email.'</b> để đăng ký tài khoản tại <a style="color:violet" target="_blank" href="$config->website">'.$config->title.'</a></h4><h1>Mật khẩu mới của bạn là : '.$pass.'</h1>';//Nội dung
				  //Check gui mail
				  if($lib->sendmail($email,$name,$tieude,$noidung,$email_author,$pass_author,$website_name))
				  {
					 $lib->js_header($url.'forgot-pass.html?typ=0'); 
					   
				  }
				  else //Check gui mail
				  {
				   
				   $lib->js_header($url.'forgot-pass.html?typ=3'); 
				  }
			   }//update lại mat khau	
			   else{
				
				 $lib->js_header($url.'forgot-pass.html?typ=2'); 
			  }
			   
		  }
		  else{
			 $lib->js_header($url.'forgot-pass.html?typ=1'); 
		  }
	  }	 
}
$title='Quên mật khẩu';
?>