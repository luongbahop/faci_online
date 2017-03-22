<?php
//Lập trình phần trang chủ 
if(isset($_POST['btnGui']))
{
if(isset($_POST['txtcode'])){
    //check ma bao mat	
    $code=$_POST['txtcode'];
    if($code!=$_SESSION['sercode']){
       $lib->js_redirect('Mã bảo mật sai !',$url.'feedback.html');   
    }
    else{
   $data=$_POST[data];
   $data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
  //Check rong
  if($data['fullname'] !='' && $data['email'] !='' && $data['content'] !='')
  {	  
		  //Check insert
		  if($id=$lib->insert('tb_contact',$data))
		  { 
			  $lib->js_redirect('Gửi liên hệ thành công !',$url.'feedback.html');	
		  }
		  else ///Check insert
		  {
			   $lib->js_redirect('Gửi liên hệ thất bại !',$url.'feedback.html');
		  }
	  }
  else//Check rong
  {
	   $lib->js_redirect('Bạn chưa nhâp !',$url.'feedback.html');
  }
}}//txtcode 
}//btnGui
$title=$lang['phanhoi'];
$keywords=$config->keywords;
$description=$config->description;
?>