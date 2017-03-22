<?php $lib->alert($alert); ?>

<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data" class="frm">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="title">Tiêu đề <span style="color:#FF0000">(*)</span></label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->title; elseif(isset($data['title'])) echo $data['title']; ?>"
          	 class="form-control validate[required]" 
             name="data[title]" 
             id="title" 
             required autofocus>
         
      </div>
	  <div class="form-group">
            <label for="allow" style="white-space:nowrap">Đăng nhập quản trị </label> <b style="color:#FF0000"> (*)</b>
            <div class="col-md-12">
           		 <p class="col-md-4">
                	 <input 
                     	<?php if(isset($detail)){ 
							if($detail->allow==1) echo "checked";
							}  else echo ""; 
						?>
                     	value="1" 
                        type="radio" 
                        name="data[allow]" 
                        id="allow"> 
                    <b style="padding-left:5px;">Được phép</b>
                 </p>
           		 <p class="col-md-4">
                 	<input 
                    	<?php if(isset($detail)){ 
							if($detail->allow==0) echo "checked";
							}  else echo "checked"; 
						?>
                    	 
                        value="0" 
                        type="radio" 
                        name="data[allow]" 
                        id="allow"> 
                    <b style="padding-left:5px;">Không được phép</b>
                 </p>
             </div>              
       </div>   
  </div>
 
   <div class="col-md-12" style="padding-bottom:3em">
   	   <br>
      
        <div class="form-group">
            <label for="content">Mô tả</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor content" name="data[content]" id="content">
                	<?php if(isset($detail)) echo $detail->content ?>
                </textarea>
            </p>
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
