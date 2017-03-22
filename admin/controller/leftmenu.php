<?php
//--------------Hien thi left menu----------------
$str_module_id="SELECT module_id FROM tb_module_user_group WHERE user_group_id=".$loginadmin->groupid; 
$module_id=$lib->selectall($str_module_id);
$list_id='';
foreach($module_id as $k){
	if(is_array($k))
	{
		$list_id.=$k['module_id'].',';
	}
}
//Lay ra danh sach module
$list_id=trim($list_id,',');
$str_module="SELECT * FROM tb_module WHERE id IN ($list_id) and parentid=0 and in_menu='left' order by position";
$module=$lib->selectall($str_module);
?>