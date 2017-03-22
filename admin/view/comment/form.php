<?php $lib->alert($alert); ?>

<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="fullname">Họ và tên</label>
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
       
   
     
       
  </div>
  <div class="col-lg-4  right-f">
  	   <header class="panel panel-primary" >
       		<h4>Nâng cao</h4>
       </header>
       <div class="form-group">
            <label for="publish">Hiển thị</label>
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
                     <b style="padding-left:5px;">Hoạt động</b>
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
   	   <br>
      
        <div class="form-group">
            <label for="content">Nội dung</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor notes" name="data[content]" id="content">
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
