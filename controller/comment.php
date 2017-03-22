<?php
	// lay ra comment
	$vitri=$page.'/'.$id;
    $sql_comment="SELECT * FROM tb_comment where publish=1 and param = '$vitri' order by id desc ";
	$comment=$lib->selectall($sql_comment,10);
	
	if(isset($_POST[data]))
	{	
		$data=$_POST[data];
		$data['created']=date('Y-m-d H:i:s', time());
		$data['publish']=1;
		if($data['fullname']!='')
		{
			if($data['email']!='')
			{
				if($data['content']!='')
				{
					$lib->insert('tb_comment',$data);
				}
				else echo '<p style="color:red">Bạn chưa nhập nội dung bình luận</p>';
			}
			else echo '<p style="color:red">Bạn chưa nhập E-mail</p>';
		}
		else echo '<p style="color:red">Bạn chưa nhập họ tên</p>';
		$vitri=$data['param'];
		$sql_comment="SELECT * FROM tb_comment where publish=1 and param = '$vitri' order by id desc ";
		$comment=$lib->selectall($sql_comment,10);
		
	}

?>