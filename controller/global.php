<?php
	// đa ngôn ngữ 
	$_lang='vi';
	if($_SESSION['lang'] =='') $_lang='vi';else $_lang=$_SESSION['lang'];
	
	//Lập trình xem nhiều nhất
	$str_viewed="select * from tb_article_item where  publish=1  and lang='".$_lang."' order by viewed DESC, id DESC limit 8";
	$viewed=$lib->selectall($str_viewed);
	
	
	//Lập trình danh mục sidebar
	$str_list_cate="select * from tb_article_category where  publish=1 and parentid=0  and lang='".$_lang."' order by   id ASC limit 10";
	$list_cate=$lib->selectall($str_list_cate);
	
	//Lập trình khoá học
	$str_khoahoc="select * from tb_article_item where  publish=1 and parentid = 6  and lang='".$_lang."' order by position ASC, id DESC limit 10";
	$khoahoc=$lib->selectall($str_khoahoc);
	
	//Lập trình bài giảng
	$all_id_lectures=trim($lib->getall('tb_article_category',3,'',0),',');
	$str_lectures="select * from tb_article_item where  publish=1 and parentid in ($all_id_lectures) and hot=1  and lang='".$_lang."' order by position DESC, id DESC limit 7";
	$lectures=$lib->selectall($str_lectures);

	// cấu hình 
	if($_SESSION['lang'] =='en')
	{
		$str_config="SELECT * FROM tb_configs where id=2";
    	$config=$lib->selectone($str_config);
	}else{
		$str_config="SELECT * FROM tb_configs where id=1";
    	$config=$lib->selectone($str_config);
	}

	//Xử lí đăng kí email
	if(isset($_POST['btnSubemail'])){
		$data=$_POST[data];
		$email=$data['email'];
		if($data['email']!='')
		{
			//Check ton tai email
			  $sql_email=mysql_query("SELECT * FROM tb_email WHERE email ='$email'");
			  if(mysql_num_rows($sql_email)==0)
			  {
				if($lib->insert('tb_email',$data))
				{
					$lib->thongbao('Đăng kí email theo dõi thông tin thành công');
					$lib->js_header($url);
				}
				else
				{
					$lib->thongbao('Đăng kí email theo dõi thông tin thất bại');
					$lib->js_header($url);	
				}
			 }
			 else//Check ton tai email
			 {
				 $lib->thongbao('Email đã tồn tại ! ');
				 $lib->js_header($url);
			 }		
		}
		else
		{
			$lib->thongbao('Bạn chưa nhập email');
			$lib->js_header($url);	
		}
		
	}
		
	//đăng kí học 
	if(isset($_POST['btnGui']))
	{
	   $data=$_POST[data];
	   $data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
	  //Check rong
	  if($data['fullname'] !='' && $data['email'] !='' && $data['class'] !='')
	  {	  
			  //Check insert
			  if($id=$lib->insert('tb_contact',$data))
			  { 
				  $lib->js_header($url.'success.html?typ=1');	
			  }
			  else ///Check insert
			  {
				   $lib->js_header($url.'error.html?typ=1');	
			  }
		  }
	  else//Check rong
	  {
		   $lib->js_header($url.'error_404.html?typ=1');
	  }
	}//btnGui
	
	
	//Xử lí đăng nhập
	if(isset($_POST['btnLogin'])){
		$info=$_POST[info];
	    $username=$info['username'];
		$pass=md5($info['password']);
		if($username!='' && $info['password']!='')
		{
		    $strcheck="SELECT * FROM tb_user WHERE  username='$username' AND password='$pass'";
			$re=mysql_query($strcheck);//Chạy câu lệnh SQL bên trên
			if(mysql_num_rows($re)>0){//Nếu thông tin đăng nhập đúng
				$_user=mysql_fetch_object($re);//Gán giá trị cho biến SESSION
				if($_user->publish==1)
				{
					$_SESSION['login']=$_user;
					if(isset($_POST['ckRem'])){//Ghi nhớ mật khẩu
						setcookie('rememberuser',$_SESSION['login']->id,time()+30*24*60*60);
					}
					$thongbao='Đăng nhập thành công !';
					$lib->js_header($url.'account.html');
				}
				else if($_user->publish==0) $thongbao='Tài khoản đang bị khoá  !';
				
				
			}else 
			{
				 $thongbao='Thông tin đăng nhập không chính xác';
			}
		}else $thongbao='Bạn chưa nhập đầy đủ thông tin !';		
	}	
?>