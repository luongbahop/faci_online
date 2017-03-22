<?php
require('connect.php');
require('controller/role.php');
require_once('ajax-javascript.php');
?>
<script src="<?php echo $url_dir ?>js/jquery-1.11.0.js"></script>
<?php
foreach($module as $vl)
{
	if(is_array($vl))
	{
?> 

    <div class="form-group <?php if($vl['parentid']==0) echo "col-md-12 well"; else echo "col-md-3" ?>">
      <input 
      	  name="cb<?php echo $vl['id']; ?>"
          id="cb<?php echo $vl['id']; ?>"
      	  value="<?php echo $vl['id']; ?>"
          <?php
		  foreach($check as $value)
		  {
			  if(is_array($value))
			  {	
			  	if($vl['id']==$value['module_id']) echo 'checked';
			  }
		  }
		  	
		  ?>
      	  type="checkbox">
     <h4 style="margin-top:0"><label for="cb<?php echo $vl['id']; ?>"><?php echo $vl[title]; ?></label></h4>
    </div>
<?php
	}
	}
?>
<?php  
	 if($_SESSION['thongbao']!='')
	 {
	 ?>
<div class="row luonghop">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php 
				echo $_SESSION['thongbao']; 
				if($_SESSION['start']+1 <= time()) $_SESSION['thongbao']='';
			?>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
		$('.luonghop').delay(5000).fadeOut('slow');
	});
</script>
<!-- /.row -->
 <?php	 
 }
 ?>