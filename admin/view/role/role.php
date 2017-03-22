<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data" id="frmrole">
  <div class="col-lg-12 left-f">
  	 <header class="panel panel-primary" >
        <h4> <label for="title">Nhóm tài khoản</label></h4>
    </header>
     <div class="form-group col-md-12">
          <input type="hidden" value="<?php echo $_GET['page'];?>" name="page">
          <select class="form-control" id="slGroup" name="data[slGroup]">
          	<option value="">--Chọn nhóm tài khoản--</option>
          	<?php
			foreach($group as $item )
			{
				if(is_array($item))
				{
					
					?>
                    <option 
                    	value='<?php echo $item['id']; ?>'><?php echo $item['title']; ?></option>
					<?php
					
				}
				
			}
			?>
          </select>
          <br>
          <br>
      </div>   
 </div>
 <div class="col-lg-12 right-f pull-right">
  	 <header class="panel panel-primary" >
        <h4><label for="title">Danh sách Module</label></h4>
    </header>
     <section id="listmodule">
     	<h3 class="well">Bạn vui lòng chọn nhóm tài khoản</h3>
        <h3 class="well">Lưu ý : Quản trị viên có toàn quyền </h3>
      </section>    
 </div>
  <div class="col-md-12" style="padding-bottom:3em">
  	  <div class="col-md-2 col-sm-6">
      	 <button type="reset" class="btn btn-danger">Làm lại</button>
      </div>
       <div class="col-md-2 col-sm-6" >
       	<span id="gui"></span>
      	 <input type="button" class="btn btn-primary" id="btnRole"  value="Gửi">
      </div>    
  </div>
  </form>
</div>
<!-- /.row -->
<script>
	$(document).ready(function(e) {
        $('#slGroup').change(function(e) {
			$('#gui').html('<input type="hidden" class="btn btn-primary"  name="btngui" value="">');
			$.post('<?php echo $url; ?>ajax-role.php', $('#frmrole').serialize(),function(data){
				$('#listmodule').html(data);
		     });
        });	
		$('#btnRole').click(function(e) {
			$('#gui').append('<input type="hidden" class="btn btn-primary"  name="btngui" value="1">');
			$.post('<?php echo $url; ?>ajax-role.php', $('#frmrole').serialize(),function(data){
				$('#listmodule').html(data);
		     });
        });
    });
</script>