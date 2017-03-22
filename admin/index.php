<?php

	ini_set('display_errors','off');
        error_reporting(0);
	require_once('connect.php');

	//GET URL 
	if(isset($_GET['page'])) {$page=$_GET['page'];	}else $page='home';
	if(isset($_GET['form'])) {$form=$_GET['form'];}
	if(isset($_GET['redirect'])) {$redirect=$_GET['redirect'];	}
	if(isset($_GET['id'])) {$id=$_GET['id'];	}else $id=''; 
	if(isset($_GET['action'])) {$action=$_GET['action'];}else $action='';
	if(isset($_GET['success'])) {$success=$_GET['success'];	}else $success='';
	if(isset($_GET['cat'])) {$cat=$_GET['cat'];	}else $cat='';
	
	//REDIRECT WEBSITE
	if(file_exists('controller/'.$page.'.php'))
	{
		require('controller/'.$page.'.php');
		$file=$page.'/'.$page.'.php';	
	}
	else 
	{
		require('controller/error_404.php');
		$file='error_404/error_404.php';
	}
	
	//LOGIN 
	if(isset($_POST['btnGui']))
		{
		 $datalogin=$_POST[datalogin];	
		 $username=$datalogin['username'];
		 $password=md5($datalogin['password']);
		 // kiem tra user pass và allow thi moi duoc vào quan tri 
		 $strlogin="SELECT a.* , b.allow FROM tb_user as a
					inner join tb_user_group as b 
					on a.groupid=b.id
				    WHERE a.username='$username' 
				    AND a.password='$password' 
				    AND a.publish=1 
				    AND b.publish=1
				    AND allow=1
				   ";
		$re=mysql_query($strlogin);
		if($username!='' and $datalogin['password']!='')
			{  
			    if(mysql_num_rows($re)>0)
				{
				    $_SESSION['loginadmin']=mysql_fetch_object($re);
					if(isset($datalogin['cbrem']))
					{
						  setcookie('rememberadmin',$_SESSION['loginadmin']->id,time()+30*24*3600);  
					}
					$lib->thongbao('Đăng nhập thành công  !' );
					$lib->js_header($url);  
			     } else $thongbao='Tài khoản không tồn tại !';
		    } else $thongbao='Tài khoản && mật khẩu không được phép để rỗng !';
		
	}

	//CHECK AND LOAD VIEW
	if(isset($loginadmin))
	{
		require('view/index.php');	
	}
	else require('view/login.php');	
?>