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
          	 class="form-control  validate[required]" 
             name="data[title]" 
             id="title" 
             autofocus>
         
      </div>
     
      <div class="form-group">
            <label>Danh mục</label>
           
            <div class="checkbox">
               
                	<select class="form-control" id="slParent" name="data[parentid]" >
                        <option value="0">---Root--- </option>
                        <?php 
							if($_SESSION['lang']=='') {$_cate="select * from tb_test_category Where publish=1 and lang='vi'";}else{$_cate="select * from tb_test_category Where publish=1 and lang="."'".$_SESSION['lang']."'";}
							$lib->loadoption('0','',$lib->selectall($_cate),$detail->parentid) ;
						?>
                     </select>  
            </div>
            
           
            
      </div>
      
      <?php //$lib->loadmenu(); ?>
     
      
      
  </div>
  <div class="col-lg-4  right-f">
  	   <header class="panel panel-primary" >
       		<h4>Nâng cao</h4>
       </header>
       <div class="form-group">
            <label for="publish">Trang thái</label>
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
                     <b style="padding-left:5px; white-space:nowrap;">Hoại động</b>
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
            <label for="description">Mô tả</label>
           <p class="row" style="overflow:auto;">
           	<textarea class="wysiwygEditor description" name="data[description]" id="description" >
            	<?php if(isset($detail)) echo $detail->description ?>
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
