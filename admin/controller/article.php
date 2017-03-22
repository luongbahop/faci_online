<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
$title='Quản lý bài viết';
$keywords='Trang quản trị bài viết';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=article';
	if($form=='')
	{	
		$link='index.php?page=article';
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!=''){$n= $_REQUEST['n'];}
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_article_item set publish='.$newtt.' where id='.$id);
		   $lib->js_header($redirect); 
		}
		//san pham noi bat
		if($id>0 && isset($_REQUEST['hot']))
		{
		   $hot=$_REQUEST['hot'];
		   if($hot==0) $newhot=1; else $newhot=0;
		   mysql_query('UPDATE tb_article_item set hot='.$newhot.' where id='.$id);
		   $lib->js_header($redirect); 
		}
		//xoá bài viết
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				if($lib->delete('tb_article_item','id',$id))
				{
					$lib->thongbao('Xoá bài viết thành công !' );
				}else 
				{
					$lib->thongbao('Xoá bài viết thất bại !','danger' );
				}	
			}
		//Số bản ghi trên 1 trang
		if(isset($_REQUEST['ipp']))  $ipp=$_SESSION['ipp']=$_REQUEST['ipp'];
		if(isset($_SESSION['ipp'])) $ipp=$_SESSION['ipp'];
		else
		{
			$perpage=$lib->selectone('select perpage from tb_configs where id=1');
			$ipp=$perpage->perpage;	
		}	
		//Lập trình hiển thị danh sách bài viết
		$str_list="SELECT * FROM tb_article_item WHERE publish<=1 ";
		if($_SESSION['lang']!=''){$str_list.=" and lang="."'".$_SESSION['lang']."'";}else $str_list.=" and lang='vi'";
		if(isset($_REQUEST['txtKey']) ){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and (title like '%$key%'  OR  tags like '%$key%' or description like '%$key%' ) ";//TÌm kiếm tương đối
		 } 
		 if($_REQUEST['slstatus']!=''){
			switch($_REQUEST['slstatus']){
				case 1: 
				{	
					$str_list.=" and publish=1"; 
					 $link.='&slstatus=active';
					break;
				}
				case 2: 
				{	
					$str_list.=" and timer>=NOW()"; 
					$link.='&slstatus=timer';
					break;
				}
				case 3: 
				{	
					$str_list.=" and publish=0"; 
					 $link.='&slstatus=lock';
					break;
				}	
			}
		}
		 if($_REQUEST['sltype']!='' ){
			 $type=$_REQUEST['sltype']; 
			 $allid=trim($lib->getall('tb_article_category',$type,'',0),',');
			 $lib->idall='';
			 $link.='&sltype='.$type;
			 $str_list.=" and  parentid in ($allid)";//TÌm kiếm tương đối
		}
		if($loginadmin->groupid!=1){
			 $str_list.=" and userid_created=".$loginadmin->id;
		}
		if($_REQUEST['slorder']!=''){
			$order=$_REQUEST['slorder'];
			switch($_REQUEST['slorder']){
				case 0: {$str_list.=" ORDER BY id DESC"; $link.='&slorder='.$order; break;}
				case 1: {$str_list.=" ORDER BY id ASC"; $link.='&slorder='.$order; break;}
				case 2: {$str_list.=" ORDER BY title ASC"; $link.='&slorder='.$order; break;}
				case 3: {$str_list.=" ORDER BY title DESC"; $link.='&slorder='.$order; break;}
			}
		}else  $str_list.="  ORDER BY id DESC";
		$list_article=$lib->selectall($str_list,$ipp);
		$link.='&ipp='.$ipp.'&n=';	
	}else{//Lập trình hiển thị form tài khoản
		$str_category="SELECT * FROM tb_article_category";
		$list_category=$lib->selectall($str_category);
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($action=='add')
			{ 
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['alias']=$lib->maketitle($data['title']);
				$data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['content']=str_replace("'",' &rsquo; ',$data['content']);
				$data['description']=str_replace("'",' &sbquo; ',$data['description']);
				$data['userid_created']=$loginadmin->id;
				//Check rong
			    if($data['title'] !='' && $data['description']!='' && $data['content']!='')
			    {
					
					if(is_numeric($_id=$lib->insert('tb_article_item',$data)))
					{
						//email marketing
						if(isset($_POST['marketing'])){
							$email=array();
							$list_email=$lib->selectall("SELECT email from tb_user order by id DESC  ");
							foreach($list_email as $item){if(is_array($item)){
								$email[]=$item;
							}}	
							//print_r($email);die;
							$tieude='[Bài viết mới] - '.$data['title'];//Tiêu đề	 
							$website_name=$config->title;//Tên của người gửi Email
							$email_author='system.email.vn@gmail.com';//email nguoi gui
							$pass_author='hophop01';//email nguoi gui
							$info=$lib->selectone("select * from tb_user where email='$email'");
							$noidung=
								"
									<div style='width:100%;background:#e5e5e5;padding:30px 0px;'><table style='margin:0 auto;width:80%;background:#fff'>
										
										
										<tbody>
											<tr><td style='text-align:center;color:#990000;font-weight:bold;'><h3 style='padding:15px;border-bottom:5px solid green'>TRUNG TÂM TIẾNG ANH TOEIC BUILDING -  MS LÝ</h3></td></tr>
											<tr><td style='text-align:center;font-size:26px;font-weight:bold;color:#990000;padding:15px 0px;text-transform:capitalize;'>".$data['title']."</td></tr>
											<tr>
												<td style='margin-top:0;margin-bottom:.5em;font-size:18px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;padding:20px;line-height:170%;font-size:15px;font-family:arial;color:#666;font-weight:bold'>".$data['content']."</td>
											</tr>
											<tr><td style='padding:15px'><b>Chi tiết bài viết xem tại : <a target='_blank' href='http://toeicbuilding.com/".$data['alias']."/88".$_id.".html'>".$data['title']."</a></b></td></tr>
										</tbody>
									</table></div>
								";//Nội dung
							//Check gui mail
							$lib->sendmail($email,$name,$tieude,$noidung,$email_author,$pass_author,$website_name);
							
						}//if end



						$data=null;
						$lib->thongbao('Thêm mới bài viết thành công !' );
					}else
					{
						$lib->thongbao('Thêm mới  bài viết thất bại !','danger' );
					}
					  
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập đầy đủ thông tin !','danger' );  
				  }		
			}
			if($id>0 && $action=='edit') 
			{
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['alias']=$lib->maketitle($data['title']);
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				$data['content']=str_replace("'",' &rsquo; ',$data['content']);
				$data['description']=str_replace("'",' &sbquo; ',$data['description']);
				if($lib->update('tb_article_item',$data,$id))
				{
					//email marketing
					if(isset($_POST['marketing'])){
						$email=array();
						$list_email=$lib->selectall("SELECT email from tb_user order by id DESC  ");
						foreach($list_email as $item){if(is_array($item)){
							$email[]=$item;
						}}	
						$tieude='[Bài viết mới] - '.$data['title'];//Tiêu đề	 
						$website_name=$config->title;//Tên của người gửi Email
						$email_author='system.email.vn@gmail.com';//email nguoi gui
						$pass_author='hophop01';//email nguoi gui
						$info=$lib->selectone("select * from tb_user where email='$email'");
						$noidung=
							"
								<div style='width:100%;background:#e5e5e5;padding:30px 0px;'><table style='margin:0 auto;width:80%;background:#fff'>
									
									
									<tbody>
										<tr><td style='text-align:center;color:#990000;font-weight:bold;'><h3 style='padding:15px;border-bottom:5px solid green'>TRUNG TÂM TIẾNG ANH TOEIC BUILDING -  MS LÝ</h3></td></tr>
										<tr><td style='text-align:center;font-size:26px;font-weight:bold;color:#990000;padding:15px 0px;text-transform:capitalize;'>".$data['title']."</td></tr>
										<tr>
											<td style='margin-top:0;margin-bottom:.5em;font-size:18px;font-weight:bold;font-family:Arial,Helvetica,sans-serif;padding:20px;line-height:170%;font-size:15px;font-family:arial;color:#666;font-weight:bold'>".$data['content']."</td>
										</tr>
										<tr><td style='padding:15px'><b>Chi tiết bài viết xem tại : <a target='_blank' href='http://toeicbuilding.com/".$data['alias']."/88".$id.".html'>".$data['title']."</a></b></td></tr>
									</tbody>
								</table></div>
							";//Nội dung
						//Check gui mail
						$lib->sendmail($email,$name,$tieude,$noidung,$email_author,$pass_author,$website_name);
						
					}//if end
					$lib->thongbao('Sửa  bài viết thành công !' );
				}else 
				{
					$lib->thongbao('Sửa  bài viết  thất bại !','danger' );
				}	
			}	
		}	
	}
	if($id!='' && $id>0){
		//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
		$detail=$lib->selectone("SELECT * FROM tb_article_item WHERE id='$id'");
		if($detail->title=='' && $action!='del')
		{
			$lib->js_header($url.'index.php?page=article&error=1');
		}
	}
}//check role
?>