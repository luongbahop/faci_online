<?php
require_once('connect.php');
?>
<script src="<?php echo $url_dir ?>plugins/validate/jquery-1.7.2.min.js"></script>
<div class="row luonghop">
    <div class="col-lg-12">
        <div class="alert alert-<?php echo  $_SESSION['color'] ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php 
				echo $_SESSION['thongbao'];
				if(($_SESSION['start']+1)== time()) {$_SESSION['thongbao']==''; unset($_SESSION['thongbao']); }
			?>
        </div>
    </div>
</div>
<!-- /.row -->
