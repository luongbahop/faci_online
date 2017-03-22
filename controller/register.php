<?php
$title='Đăng kí tài khoản';
//Xử lí đăng kí
if(isset($_POST['txtcode'])){
    //check ma bao mat	
    $code=$_POST['txtcode'];
    if($code!=$_SESSION['sercode']){
       $lib->js_redirect('Mã bảo mật sai !',$url.'register.html');
        
    }
    else{
      $data=$_POST[register];
	  
      $data['groupid']='4';
      $data['publish']='0';
	  $data['time_created']=time();
	  $data['birthday']=date('Y-m-d H:i:s', strtotime($data['birthday']));
      $data['salt']=$code=md5(rand().time());//Tạo mã bảo mật 32 ký tự
      $email=$data['email'];
      $username=$data['username'];
      $password=$data['password'];
      
      //Check rong
      if($email !='' && $username !='' && $password !='')
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
                      if($id=$lib->insert('tb_user',$data))
                      {
                          $name=$data['fullname']; //Tên người nhận
                          $link=$url.'index.php?page=active&id='.$id.'&coded='.$code;	 
                          $tieude='Đăng kí thành viên '.$config->title;//Tiêu đề
            						  $website_name=$config->title;//Tên của người gửi Email
            						  $email_author='system.email.vn@gmail.com';//email nguoi gui
            						  $pass_author='hophop01';//email nguoi gui
                          $noidung='<p>Xin chào tài khoản : <b>'.$username.'</b></p><h1>Chào mừng bạn tham gia vào hệ thống <span style="color:violet">'.$config->title.'</span></h1>
						  <h4>Cám ơn bạn đã sử dụng Email <b style="color:red">'.$email.'</b> để kích hoạt tài khoản tại <a style="color:violet" target="_blank" href="$config->website">'.$config->title.'</a></h4>
                          <h3>Để có thể  kích hoạt , bạn vui lòng  <a target="_blank" href="'.$link.'">Click đây để xác thực
</a></h3>';//Nội dung
                           //Check gui mail
                          if($lib->sendmail($email,$name,$tieude,$noidung,$email_author,$pass_author,$website_name))
                          {
                             
							           $lib->js_header($url.'login.html?typ=2'); 
                          }
                          else //Check gui mail
                          {
                            $lib->delete('tb_user','id',$id);
                            $lib->js_redirect('Đăng kí thất bại !',$url.'register.html'); 
                          }
                          
                      }
                      else ///Check insert
                      {
                          $lib->js_redirect('Đăng kí thất bại !',$url.'register.html');
                      }
                      
                  }
                  else//Check nhap lại mk
                  {
                      $lib->js_redirect('Mật khẩu không khớp !',$url.'register.html');
                  }
              }
              else//Check ton tai email
              {
                  $lib->js_redirect('Email đã tồn tại !',$url.'register.html'); 
              }	
            }
          else//Check ton tai username
          {
            $lib->js_redirect('Tài khoản đã tồn tại !',$url.'register.html');
          }	 
              
          }
      else//Check rong
      {
          $lib->js_redirect('Bạn chưa nhập đầy đủ thông tin !',$url.'register.html'); 
      }
      
    }//check ma bao mat
      
     

     
}//isset btnSign
?>