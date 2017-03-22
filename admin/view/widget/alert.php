<?php if(isset($_SESSION['thongbao']) && $_SESSION['thongbao']!=''){ ?>
<section id="ajax-thongbao">
	<div class="row luonghop">
		<div class="col-lg-12">
			<div class="alert alert-<?php echo  $_SESSION['color'] ?> alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php 
					echo $_SESSION['thongbao'];unset($_SESSION['thongbao']);
				?>
			</div>
		</div>
	</div>	
</section>
<script> $(document).ready(function(e) { $('#ajax-thongbao').delay(7000).fadeOut('slow');}); </script>
<?php } ?>

<?php  if(isset($_GET['error'])){ if($_GET['error']==1){?>
	<div class="alert thongbao alert-danger alert-dismissible" role="alert" ><button type="button"  class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Bản ghi không tồn tại !</strong> </div>
	<script> $(document).ready(function(e) { $('.thongbao').delay(7000).fadeOut('slow');}); </script>
<?php
	}else if($_GET['error']==2){
?>
	<div class="alert thongbao alert-danger alert-dismissible" role="alert" ><button type="button"  class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Bạn chưa chọn đề thi !</strong> </div>
	<script> $(document).ready(function(e) { $('.thongbao').delay(7000).fadeOut('slow');}); </script>
<?php		
	}
	 }
?>