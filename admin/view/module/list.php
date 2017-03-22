<script>
$(document).ready(function(e) {
	$('#tukhoa').keyup(function(e) {
       ajax_module();
    });
	$('#slorder').change(function(e) {
      ajax_module();  
    });
	$('#slmenu').change(function(e) {
      ajax_module();  
    });
	$('#ipp').keyup(function(e) {
      ajax_module();  
    });
	
	function ajax_module()
	{
		$('#ajax-module').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.get('<?php echo $url; ?>ajax-module.php',$('#frmModule').serialize(),function(data){
			if(!$.trim(data)){
				alert('Dữ liệu trống !');
			}
			else{
				$('#ajax-module').html(data);
			}
			;
		});
	}
	
});

</script>
<div class="row">
	<div class="col-lg-12">
    	<form id="frmModule">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="module">
           
            <p class="col-md-4" style="float:left">
            <select  class="form-control" name="slorder" id="slorder">
            	<option  value="0">--Mới thêm--</option>
                <option  value="1">--Thêm từ thời xa xưa--</option>
                <option  value="2">--Tiêu đề từ A->Z--</option>
            	<option  value="3">--Tiêu đề từ Z->A--</option>
                <option  value="4">--Thứ tự giảm dần--</option>
                <option  value="5">--Thứ tự tăng dần--</option>
            </select>
            </p>
            <p class="col-md-4" style="float:left">
            <select  class="form-control" name="slmenu" id="slmenu">
            	<option  value="">--Tất cả--</option>
                <option  value="0">--Menu TOP--</option>
                <option  value="1">--Menu LEFT--</option>
            </select>
            </p>
            <p class="col-md-4" style="float:left">
            <input
            	 value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Tiêu đề ..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="module">
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
     <div class="col-md-12" style="margin-bottom:10px;" >
     	<a  class="btn btn-success pull-right" href="<?php echo $url; ?>index.php?page=module&action=add&form=1">Thêm mới</a>
     </div>

</div><!-- /.row -->

     <div class="col-lg-12">
        <div class="table-responsive" id="ajax-module">
        	<?php include('ajax-module.php'); ?> 
           
        </div>
    </div><!-- /.col-md-12 -->
</form>    
</div>
<!-- /.row -->

