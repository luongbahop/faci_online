<?php
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//Khoi tao bien session
	@ini_set('max_execution_time', 25000);
	set_time_limit(0);
	//Khai bao các bien , va gan bang rong
	$url_dir=$url=$host=$user=$pass=$database_name=$page=$id=$giaodien="";
	
	//Nhung 2 file config.php và thuvien.php
	require_once('configs/config.php');//File luu lai cau hinh của website
	require_once('model/thuvien.php');//File luu tru cac function xu li nghiep vu cua website
	 $giaodien='toeic';
	
	//Gan doi tuong LIB nen bien $lib .
	$lib=new LIB();
	$lib->ketnoi($host,$user,$pass,$database_name);
	$url_dir=$url.'view/'.$giaodien.'/';
	
	//Đa ngôn ngữ 
	if($_GET['redirect']!='') $redirect=base64_decode($_GET['redirect']);
	if(isset($_GET['lang']) && $_GET['lang']=='en') {$_SESSION['lang']='en';$lib->js_header($url);}
	if(isset($_GET['lang']) && $_GET['lang']=='vi') {$_SESSION['lang']='vi';$lib->js_header($url);}
	if($_SESSION['lang']!='' && isset($_SESSION['lang']))
	{
			include('lang/'.$_SESSION['lang'].'.php');
	}
	else include('lang/vi.php');
	//section
	if(is_array($lib->login_google() ))
	{
		$google_data=$lib->login_google();
		$_email=$google_data['email'];
		$ck_email="SELECT * FROM tb_user WHERE  email='$_email'";
		$check=mysql_query($ck_email);
		if(mysql_num_rows($check) >= 1)
		{
			$_SESSION['logingoogle']=mysql_fetch_object($check);	
		}
		else 
		{			
			$gt=($google_data['gender']=='male')?1:0;
			$thongtin=array(
				'username'=>$google_data['email'],
				'email'=>$google_data['email'],
				'fullname'=>$google_data['name'],
				'avatar'=>$google_data['picture'],
				'groupid'=>3,
				'publish'=>0,
				'created'=>gmdate('Y-m-d H:i:s', time() +7*3600 ),
				'sex'=>$gt,
			);
			$lib->insert('tb_user',$thongtin);
			$lib->js_reload();
			$lib->js_reload();						
		}
	}
	
	if(isset($_SESSION['login'])){
		$login=$_SESSION['login'];
	}
	else if(isset($_SESSION['logingoogle'])){
		$login=$_SESSION['logingoogle'];
	}
	elseif(isset($_COOKIE['rememberuser'])){
		$one=$lib->selectone("SELECT * FROM tb_user WHERE id=".$_COOKIE['rememberuser']);
	if(isset($one->id)) $_SESSION['login']=$one;
		$login=$_SESSION['login'];
	}
	require_once('controller/global.php');
	
?>