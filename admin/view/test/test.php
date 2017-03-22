<?php
if($form=='')
	{	
		if($action=='detail' && $id>0) include('detail.php');
		else include('list.php');
	}
else{
		include('form.php');
	}
?>