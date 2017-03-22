<script>
$(document).ready(function(e) {
	$('#tukhoa').keyup(function(e) {
       ajax_contact();
    });
	$('#slorder').change(function(e) {
      ajax_contact();  
    });
	$('#ipp').keyup(function(e) {
      ajax_contact();  
    });
	
	function ajax_contact()
	{
		$('#ajax-contact').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.get('<?php echo $url; ?>ajax-contact.php',$('#frmContact').serialize(),function(data){
			if(!$.trim(data)){
				alert('Dữ liệu trống !');
			}
			else{
				$('#ajax-contact').html(data);
			}
			;
		});
	}
	
});

</script>
<div class="row">
	<div class="col-lg-12">
    	<form id="frmContact">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="contact">
            <p class="col-md-4" style="float:left">
            <select  class="form-control" name="slorder" id="slorder">
            	<option  value="0">--Mới gửi--</option>
                <option  value="1">--Gửi từ thời xa xưa--</option>
                <option  value="2">--Tên người gửi từ A->Z--</option>
            	<option  value="3">--Tên người gửi từ Z->A--</option>
            </select>
            </p>
           
            <p class="col-md-4" style="float:left">
            <input
            	 value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Họ và tên , email , nội dung ..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="contact">
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
</div><!-- /.row -->
     <div class="col-lg-12">
        <div class="table-responsive" id="ajax-contact">
			<?php include('ajax-contact.php'); ?>
        </div>
    </div><!-- /.col-md-12 -->
</div>
<!-- /.row -->
 </form>
