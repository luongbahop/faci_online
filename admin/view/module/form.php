<?php $lib->alert($alert); ?>

<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data">
  <div class="col-lg-10 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="title">Tiêu đề</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->title ?>"
          	 class="form-control" 
             name="data[title]" 
             id="title" 
             required autofocus>
         
      </div>
      <div class="form-group">
          <label for="url_name">Giá trị biến page trên  Url</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->url_name ?>"
          	 class="form-control" 
             name="data[url_name]" 
             id="url_name" 
             required >
         
      </div>
      <div class="form-group">
          <label for="action">Giá trị biến action trên  Url</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->action ?>"
          	 class="form-control" 
             name="data[action]" 
             id="action" 
              >
         
      </div>
       <div class="form-group">
            <label for="in_menu">Vị trí module trên menu</label>
            <div class="col-md-12">
           		 <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->in_menu=='left') echo "checked";
							} else echo "checked"; 
						?>
                        value="left" 
                        type="radio" 
                        name="data[in_menu]" 
                        id="in_menu">
                     <b style="padding-left:5px; white-space:nowrap;">Left</b>
                 </p>
           		 <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->in_menu=='top') echo "checked";
							}  else echo ""; 
						?>
                         
                        value="0" 
                        type="radio" 
                        name="data[in_menu]" 
                        id="in_menu"> 
                     <b style="padding-left:5px;">Top</b>
                 </p>
                  <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->in_menu=='') echo "checked";
							}  else echo ""; 
						?>
                         
                        value="" 
                        type="radio" 
                        name="data[in_menu]" 
                        id="in_menu"> 
                     <b style="padding-left:5px;">Rỗng</b>
                 </p>
             </div>              
       </div>   
       <div class="form-group">
          <label for="in_table">Lấy dữ liệu từ bảng</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->in_table ?>"
          	 class="form-control" 
             name="data[in_table]" 
             id="in_table" 
              >
      </div>   
      <div class="form-group">
        <label for="parentid">Module cha</label>
        <div class="checkbox">
        <select class="form-control" id="parentid" name="data[parentid]" >
            <option value="0">---Root--- </option>
            <?php
            $lib->loadoption('0','',$lib->selectall('select * from tb_module '),$detail->parentid) ;
            ?>
         </select>           
        </div>
            
           
            
      </div>
       <div class="form-group">
          <label for="icon">Icon</label>
          <input 
          	 value='<?php if(isset($detail)) echo $detail->icon ?>'
          	 class="form-control" 
             name="data[icon]" 
             id="icon" 
              >
         
      </div>
	 
        <div class="form-group">
          <label for="position" style="white-space:nowrap">Vị trí</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->position ?>"
          	 class="form-control" 
             name="data[position]" 
             id="position" >
         
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
