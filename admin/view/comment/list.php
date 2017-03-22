<script>
$(document).ready(function(e) {
	$('#tukhoa').keyup(function(e) {
       ajax_comment();
    });
	$('#slorder').change(function(e) {
      ajax_comment();  
    });
	$('#ipp').keyup(function(e) {
      ajax_comment();  
    });
	
	function ajax_comment()
	{
		$('#ajax-comment').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.get('<?php echo $url; ?>ajax-comment.php',$('#frmComment').serialize(),function(data){
			if(!$.trim(data)){
				alert('Dữ liệu trống !');
			}
			else{
				$('#ajax-comment').html(data);
			}
			;
		});
	}
	
});

</script>
<div class="row">
	<div class="col-lg-12">
    	<form id="frmComment">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="comment">
            <p class="col-md-4" style="float:left">
            <select  class="form-control" name="slorder" id="slorder">
            	<option  value="0">--Mới bình luận--</option>
                <option  value="1">--Bình luận từ thời xa xưa--</option>
                <option  value="2">--Tên người BL từ A->Z--</option>
            	<option  value="3">--Tên người BL từ Z->A--</option>
            </select>
            </p>
           
            <p class="col-md-4" style="float:left">
            <input
            	 value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Họ và tên , E-mail..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="comment">
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
	
        <div class="col-md-6 " style="margin-bottom:10px;" >
            
             <input type="submit" name="btnDel" value="Delete" class="btn btn-danger" >
         </div>

</div><!-- /.row -->

     <div class="col-lg-12">
        <div class="table-responsive" id="ajax-comment">
        	<?php include('ajax-comment.php'); ?> 
        </div>
    </div><!-- /.col-md-12 -->
</form>    
</div>
<!-- /.row -->

<script>
$(document).ready(function(e) {
 	/* ================ #CHECK-ALL =================== */
	$('#check-all').click(function(){
		
		if($(this).prop('checked')){
			$('.check-all').prop('checked', true).parent().parent().find('td').addClass('select');
		}
		else{
			$('.check-all').prop('checked', false).parent().parent().find('td').removeClass('select');
		}
	});
	$('.check-all').click(function(){
		if($(this).prop('checked') == false){
			$(this).parent().parent().find('td').removeClass('select');
			$('#check-all').prop('checked', false);
		}
		else{
			$(this).parent().parent().find('td').addClass('select');
		}
		if($('.check-all:checked').length == $('.check-all').length){
			$('#check-all').prop('checked', true);
		}
	});
});
	
</script>