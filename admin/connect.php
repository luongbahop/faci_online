<?php
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
	session_start();//Khoi tao bien session
	$url_dir=$url=$host=$user=$pass=$database_name=$page=$form=$id=$action=$success=$alert=$thongbao=$cat="";
	//cấu hình
	require_once('../configs/config.php');
	require_once('../model/thuvien.php');
	//base url
	$url_dir=$url.'admin/view/all/';
	$url=$url.'admin/';
	$lib=new LIB();
	$lib->ketnoi($host,$user,$pass,$database_name);
	//Đa ngôn ngữ 
	if($_GET['redirect']!='' && isset($_GET['action'])) {$redirect=base64_decode($_GET['redirect']);} else {$redirect=$url;}
	if(isset($_GET['lang']) && $_GET['lang']=='en') {$_SESSION['lang']='en';$lib->js_header($redirect);}
	if(isset($_GET['lang']) && $_GET['lang']=='vi') {$_SESSION['lang']='vi';$lib->js_header($redirect);}
	//session
	if(isset($_SESSION['loginadmin'])){
		$loginadmin=$_SESSION['loginadmin'];
	}elseif(isset($_COOKIE['rememberadmin'])){
		$one=$lib->selectone("SELECT * FROM tb_user WHERE id=".$_COOKIE['rememberadmin']);
	if(isset($one->id)) $_SESSION['loginadmin']=$one;
		$loginadmin=$_SESSION['loginadmin'];
	}
	//kiểm tra user online
	if($loginadmin->id) 
	{
		$data=array();
		$data['logined']=gmdate('Y-m-d H:i:s', time() +7*3600 );
		$data['ip_logging']=$_SERVER['REMOTE_ADDR'];
		$data['agent']=$_SERVER['HTTP_USER_AGENT'];
		$lib->update('tb_user',$data,$loginadmin->id);
	}
	
?>