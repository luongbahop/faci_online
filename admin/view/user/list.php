<script>
$(document).ready(function(e) {
	var page=1;
	$('#tukhoa').keyup(function(e) {
       ajax_user();
    });
	$('#sltype').change(function(e) {
      ajax_user();  
    });
	$('#slorder').change(function(e) {
      ajax_user();  
    });
	$('#slstatus').change(function(e) {
      ajax_user();  
    });
	$('#ipp').keyup(function(e) {
      ajax_user();  
    });
	$('#btnDel').click(function(e) {
	  page="<?php  echo $n; ?>";	
      $.post('<?php echo $url; ?>ajax-user.php?n='+page,$('#frmUser').serialize(),function(data){
			$('#ajax-user').html(data);	
		}); 
	  $.post('<?php echo $url; ?>ajax-thongbao.php',function(data){
			$('#ajax-thongbao').html(data);	
		});	
    });
	function ajax_user()
	{
		page="<?php echo $_GET['n']; ?>";
		$('#ajax-user').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.post('<?php echo $url; ?>ajax-user.php?n='+page,$('#frmUser').serialize(),function(data){
			$('#ajax-user').html(data);
		});
	}	
});

</script>
<form id="frmUser">
<div class="row">
	<div class="col-lg-12">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="user">
            <input type="hidden" name="n" value="<?php echo $_GET['n']; ?>">
            <input type="hidden" name="number" value="<?php echo count(array_filter($list_user)); ?>">
            <p class="col-md-3" style="float:left">
            <select   class="form-control" name="sltype" id="sltype">
            	<option  value="">---Tất cả---</option>
				<?php $lib->loadoption('0','',$lib->selectall('select * from tb_user_group '),'') ;?>
            </select>
            </p>
            <p class="col-md-3" style="float:left">
            <select  class="form-control" name="slorder" id="slorder">
            	<option <?php if($_REQUEST['slorder']==0) echo 'selected';?>  value="0">--Mới đăng ký--</option>
                <option <?php if($_REQUEST['slorder']==1) echo 'selected';?> value="1">--Đăng ký từ thời xa xưa--</option>
                <option <?php if($_REQUEST['slorder']==2) echo 'selected';?> value="2">--Tên tài khoản từ A->Z--</option>
            	<option <?php if($_REQUEST['slorder']==3) echo 'selected';?> value="3">--Tên tài khoản từ Z->A--</option>
            </select>
            </p>
             <p class="col-md-3" style="float:left">
             <select  class="form-control" name="slstatus" id="slstatus">
             	<option  value="">--Tất cả--</option>
            	<option <?php if($_REQUEST['slstatus']==1) echo 'selected';?> value="1">--Đang hoạt động--</option>
                <option <?php if($_REQUEST['slstatus']==2) echo 'selected';?> value="2">--Bị khoá--</option>
             </select>
            </p>
            <p class="col-md-3" style="float:left">
            <input
            	 value="<?php  if(isset($key)) echo $key;?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Tài khoản , email , họ và tên ..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="user">
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
    </div><!--.row-->
    <div class="col-md-12">
         <div class="col-md-6" style="margin-bottom:10px;" >
            <a  class="btn btn-success pull-left" href="<?php echo $url; ?>index.php?page=user&action=add&form=1">Thêm mới </a>
         </div>
    
    </div><!-- /.row -->
    <div class="col-lg-12">
        <div class="table-responsive" id="ajax-user">
			<?php include('ajax-user.php'); ?>
        </div>
    </div><!-- /.col-md-12 -->
   
</div>
<!-- /.row -->
</form> 