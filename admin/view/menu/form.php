<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data" id="frmmenu" class="frm">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="title">Tiêu đề <span style="color:#FF0000">(*)</span></label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->title ?>"
          	 class="form-control validate[required]" 
             name="data[title]" 
             id="title" 
             required autofocus>
         
      </div>
      <div class="form-group">
         <label for="slParent">Chọn cấp</label>
         <select class="form-control" id="slParent" name="data[parentid]" >
         	<?php
				if(isset($detail->parentid) && $detail->parentid>0)
				{echo '<option value="'. $detail->parentid .'">'. $detail->title .'</option>';
				 echo '<option value="0">---Root--- </option>';
				}
				else echo '<option value="0">---Root--- </option>';
			?>
         	<?php 
				if($_SESSION['lang']=='') {$_cate="select * from tb_menu Where publish=1 and lang='vi'";}else{$_cate="select * from tb_menu Where publish=1 and lang="."'".$_SESSION['lang']."'";}
				$lib->loadoption('0','',$lib->selectall($_cate),$detail->parentid) ;
			?>
         </select>    
         
      </div>
      <div class="form-group">
         <label for="slModule">Loại menu</label>
         <select class="form-control" id="slModule" name="data[module]" >
         	<option value="0">---Chọn--- </option>
         	<option <?php if($detail->module=='module') echo 'selected';  ?>  value="module">Module</option>
            <option <?php if($detail->module=='news') echo 'selected';  ?>   value="news">Danh mục bài viết  </option>
            <option <?php if($detail->module=='detail-news') echo 'selected';  ?>  value="detail-news">Chi tiết bài viết</option>
         </select>    
         
      </div>
       <div class="form-group">
          <label style="white-space:nowrap;" for="slCate">	Chi tiết</label>
          <select class="form-control" id="slCate"  name="data[module_id]">
          	<?php
				if(isset($detail))
				echo '<option value="'. $detail->module_id .'">Đã được chọn - Bạn có thể chọn lại loại menu</option>';
				else echo '<option>---Chọn module trước---</option>';
			?>
          	 
          </select>    
         
      </div>
     
       <div class="form-group">
          <label for="position">Thứ tự</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->position ?>"
          	 class="form-control" 
             name="data[position]" 
             id="position" >
         
      </div>
     
  
  </div>
  <div class="col-lg-4  right-f">
  	   <header class="panel panel-primary" >
       		<h4>Nâng cao</h4>
       </header>
       <div class="form-group">
            <label for="publish">Trạng thái</label>
            <div class="col-md-12">
           		 <p class="col-md-5">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->publish==1) echo "checked";
							} else echo "checked"; 
						?>
                        value="1" 
                        type="radio" 
                        name="data[publish]" 
                        id="publish">
                     <b style="padding-left:5px; white-space:nowrap;">Hoạt động</b>
                 </p>
           		 <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->publish==0) echo "checked";
							}  else echo ""; 
						?>
                         
                        value="0" 
                        type="radio" 
                        name="data[publish]" 
                        id="publish"> 
                     <b style="padding-left:5px;">Khoá</b>
                 </p>
             </div>              
       </div>
      
      
  </div>
  
  <div class="col-md-12" style="padding-bottom:3em">
  	  <div class="col-md-2 col-sm-6">
      	 <button type="reset" class="btn btn-danger">Làm lại</button>
      </div>
       <div class="col-md-2 col-sm-6">
      	 <button type="submit" class="btn btn-primary" name="btnGui">Gửi</button>
      </div>    
  </div>
  </form>
</div>
<!-- /.row -->
<script>
	$(document).ready(function(e) {
        $('#slModule').change(function(e) {
            var id=$(this).val();
			//alert('<?php echo $url; ?>menu-cate.php');
			$.post('<?php echo $url; ?>menu-cate.php', $('#frmmenu').serialize(),function(data){
				$('#slCate').html(data);
		     });
        });	
    });
</script>