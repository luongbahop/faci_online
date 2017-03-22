<script>
$(document).ready(function(e) {
	$('#tukhoa').keyup(function(e) {
       ajax_group();
    });
	$('#sltype').change(function(e) {
      ajax_group();  
    });
	$('#slorder').change(function(e) {
      ajax_group();  
    });
	$('#ipp').keyup(function(e) {
      ajax_group();  
    });
	
	function ajax_group()
	{
		$('#ajax-group-user').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.get('<?php echo $url; ?>ajax-group-user.php',$('#frmGroup').serialize(),function(data){
			if(!$.trim(data)){
				alert('Dữ liệu trống !');
			}
			else{
				$('#ajax-group-user').html(data);
			}
			;
		});
	}
	
});
</script>
<div class="row">
	<div class="col-lg-12">
    	<form id="frmGroup">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="group-user">
          
            <p class="col-md-4" style="float:left">
            <input
            	 value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Tên nhóm tài khoản ..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="group-user">
            <p class="col-md-4 col-sm-4 col-xs-4">
            <input 
            	value="<?php echo $ipp; ?>"
            	type="text" 
                name="ipp"
                id="ipp"
                class="form-control">
             </p>   
            <span style="line-height:35px;">Bản ghi / 1 trang</span>
         </div>
		</form> 
    </div><!--.row-->
<form method="post" action="">
<div class="col-md-12">
     <div class="col-md-6" style="margin-bottom:10px;" >
     	<a  class="btn btn-success pull-left" href="<?php echo $url; ?>index.php?page=group-user&action=add&form=1">Thêm mới</a>
     </div>
</div><!-- /.row -->
     <div class="col-lg-12">
        <div class="table-responsive" id="ajax-group-user">
        	<?php include('ajax-group-user.php'); ?>
        </div>
    </div><!-- /.col-md-12 -->
</form>    
</div>
<!-- /.row -->
