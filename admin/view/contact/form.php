<?php $lib->alert($alert); ?>

<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="fullname">Người gửi</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->fullname ?>"
          	 class="form-control" 
             name="data[fullname]" 
             id="fullname" 
             required autofocus>
         
      </div>
      
      <div class="form-group">
          <label for="email">Email</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->email ?>"
          	 class="form-control" 
             name="data[email]"             
             id="email" >        
      </div>
	  <div class="form-group">
          <label for="class">Khoá học</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->class ?>"
          	 class="form-control" 
             name="data[class]"             
             id="class" >        
      </div>
	  <div class="form-group">
          <label for="place">Cơ sở</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->place ?>"
          	 class="form-control" 
             name="data[place]"             
             id="place" >        
      </div>
       
      <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->address ?>"
          	 class="form-control" 
             name="data[address]" 
             
             id="address" >
         
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
                     <b style="padding-left:5px; white-space:nowrap">Hoạt động</b>
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
       <div class="form-group">
          <label for="position" style="white-space:nowrap">Thứ tự</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->position ?>"
          	 class="form-control" 
             name="data[position]" 
             id="position" >
      </div>
	  <div class="form-group">
		  <label for="created">Ngày gửi</label>
		  <input 
			value="<?php 
			if(isset($detail))
			{
				if($detail->created != '0000-00-00 00:00:00' && $detail->created!='' ) echo date('Y-m-d H:i', strtotime($detail->created)); else echo '';
			}	
			else echo gmdate('d-m-Y',time()+7*3600); ?>"
			class="form-control tim" 
			name="data[created]"
			id="created" >
	  </div>  
        
           
  </div>
   <div class="col-md-12" style="padding-bottom:3em">
   	   <br>
      
        <div class="form-group">
            <label for="content">Ghi chú</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor content" name="data[content]" id="content" >
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
