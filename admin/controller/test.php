<?php
//Check quyen
if($lib->ckrole($_REQUEST['page'],$_REQUEST['action'],$_REQUEST['id'],$loginadmin))
{
//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
$cat=$_REQUEST['cat'];
$ck_cat=$lib->selectone("SELECT * FROM tb_unit_category WHERE id='$cat'");
if($ck_cat->title!=''){	
$title='Quản lý câu hỏi';
$keywords='Trang quản trị câu hỏi';
$description='Web site phát triển bởi anh Hợp đẹp trai';
$redirect=!empty($redirect)?base64_decode($redirect):$url.'index.php?page=test';
	if($form=='')
	{	
		$link='index.php?page=test';
		// Lay so trang hien tai
		if(isset($_REQUEST['n']) && $_REQUEST['n']!=''){$n= $_REQUEST['n'];}
		//Doi trang thai
		if($id>0 && isset($_REQUEST['status']))
		{
		   $tt=$_REQUEST['status'];
		   if($tt==0) $newtt=1; else $newtt=0;
		   mysql_query('UPDATE tb_test_item set publish='.$newtt.' where id='.$id);
		   $lib->js_header($redirect); 
		}

		//xoá câu hỏi
		if(($id>0 && $action=='del') || isset($_POST['btnDel']))
			{
				if($lib->delete('tb_test_item','id',$id))
				{
					$lib->thongbao('Xoá câu hỏi thành công !' );
				}else 
				{
					$lib->thongbao('Xoá câu hỏi thất bại !','danger' );
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
		//Lập trình hiển thị danh sách câu hỏi
		$str_list="SELECT * FROM tb_test_item WHERE publish<=1 ";
		if($_SESSION['lang']!=''){$str_list.=" and lang="."'".$_SESSION['lang']."'";}else $str_list.=" and lang='vi'";
		if(isset($_REQUEST['txtKey']) ){
			 $key=$_REQUEST['txtKey']; 
			 $link.='&txtKey='.$key;
			 $str_list.=" and (title like '%$key%'  or question like '%$key%' ) ";//TÌm kiếm tương đối
		 } 
		 if(isset($_REQUEST['cat']) ){ 
			 $link.='&cat='.$_REQUEST['cat'];
			 $str_list.=" and catid=".$_REQUEST['cat'];//TÌm kiếm tương đối
		 } 
		
		 if($_REQUEST['sltype']!='' ){
			 $type=$_REQUEST['sltype']; 
			 $allid=trim($lib->getall('tb_test_category',$type,'',0),',');
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
		}else  $str_list.="  ORDER BY position DESC";
		//echo $str_list;
		$list_test=$lib->selectall($str_list,$ipp);
		
		$link.='&ipp='.$ipp.'&n=';	
	}else{//Lập trình hiển thị form tài khoản
		$str_category="SELECT * FROM tb_test_category";
		$list_category=$lib->selectall($str_category);
		//Kiểm tra nút cập nhật đã đc bấm hay chưa
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($action=='add')
			{ 
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['created']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_created']=$loginadmin->id;
				$data['catid']=$cat;
				//Check rong
			    if($data['position'] !='' )
			    {
					if(is_numeric($lib->insert('tb_test_item',$data)))
					{
						$data=null;
						$lib->thongbao('Thêm mới câu hỏi thành công !' );
					}else
					{
						$lib->thongbao('Thêm mới  câu hỏi thất bại !','danger' );
					}
					  
				}else//Check rong
				  {
					   $lib->thongbao('Bạn chưa nhập thứ tự của câu hỏi !','danger' );  
				  }		
			}
			if($id>0 && $action=='edit') 
			{
				if($_SESSION['lang']=='') {$data['lang']='vi';}else{$data['lang']=$_SESSION['lang'];}
				$data['updated']=gmdate('Y-m-d H:i:s', time() +7*3600 );
				$data['userid_updated']=$loginadmin->id;
				$data['question']=str_replace("'",' &rsquo; ',$data['question']);
				$data['title']=str_replace("'",' &rsquo; ',$data['title']);
				if($lib->update('tb_test_item',$data,$id))
				{
					$lib->thongbao('Sửa  câu hỏi thành công !' );
				}else 
				{
					$lib->thongbao('Sửa  câu hỏi  thất bại !','danger' );
				}	
			}	
		}	
	}
	if($id!='' && $id>0){
		//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
		$detail=$lib->selectone("SELECT * FROM tb_test_item WHERE id='$id'");
		
	}
}//check catid	
else {
		//$lib->js_header($url.'index.php?page=category-unit&error=2');
	}
}//check role
?>