<script>
$(document).ready(function(e) {
	$('#tukhoa').keyup(function(e) {
       ajax_test();
    });
	$('#sltype').change(function(e) {
      ajax_test();  
    });
	$('#slorder').change(function(e) {
      ajax_test();  
    });
	$('#slstatus').change(function(e) {
      ajax_test();  
    });
	$('#ipp').keyup(function(e) {
      ajax_test();  
    });
	
	function ajax_test()
	{
		$('#ajax-test').html('<p style="text-align:center"><img src="<?php echo $url_dir; ?>images/loading.gif"></p>');
		$.get('<?php echo $url; ?>ajax-test.php',$('#frmtest').serialize(),function(data){
			if(!$.trim(data)){
				alert('Dữ liệu trống !');
			}
			else{
				$('#ajax-test').html(data);
			}
			;
		});
	}
	
});

</script>
<div class="row">
	<div class="col-lg-12">
    	<form id="frmtest">
    	 <div class="form-group input-group col-lg-9" style="float:left;" >
         	<input type="hidden" name="page" value="test">
            <p class="col-md-3" style="float:left">
            <select   class="form-control" name="sltype" id="sltype">
            	<option  value="">---Tất cả---</option>
				 <?php 
				 	$_cat="select * from tb_test_category ";
				 	if($_SESSION['lang']!=''){$_cat.=" WHERE lang="."'".$_SESSION['lang']."'";}else $_cat.=" WHERE lang='vi'";
				 	$lib->loadoption('0','',$lib->selectall($_cat),'') ;
				 
				 ?>	
            </select>
            </p>
            <p class="col-md-3" style="float:left">
            <select  class="form-control" name="slorder" id="slorder">
            	<option  value="0">--Mới xuất bản--</option>
                <option  value="1">--Xuất bản từ thời xa xưa--</option>
                <option  value="2">--Tên tài khoản từ A->Z--</option>
            	<option  value="3">--Tên tài khoản từ Z->A--</option>
            </select>
            </p>
            
            <p class="col-md-3" style="float:left">
            <input
            	 value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>"
            	 name="txtKey"
                 id="tukhoa"
            	 type="text" 
                 placeholder="Tiêu đề , tags , mô tả..."
                 class="form-control">
             </p>
           
         </div>
         
        <div class="form-group input-group col-lg-3" style="float:right;" >
        	<input type="hidden" name="page" value="test">
            <p class="col-md-4 col-sm-4 col-xs-4">
			<input 
            	value="<?php echo $cat; ?>"
            	type="hidden" 
                name="cat"
                id="cat"
                class="form-control">
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
     	<a  class="btn btn-success pull-left" href="<?php echo $url; ?>index.php?page=test&action=add&form=1&cat=<?php echo $cat; ?>">Thêm mới </a>
     </div>

</div><!-- /.row -->

     <div class="col-lg-12">
        <div class="table-responsive" id="ajax-test">
        	<?php include('ajax-test.php'); ?>	 
        </div>
    </div><!-- /.col-md-12 -->
</form>    
</div>
<!-- /.row -->

