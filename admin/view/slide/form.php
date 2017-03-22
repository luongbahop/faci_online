<?php $lib->alert($alert); ?>

<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data" class="frm">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="title">Tiêu đề</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->title; elseif(isset($data['title'])) echo $data['title']; ?>"
          	 class="form-control validate[required]" 
             name="data[title]" 
             id="title" 
             required autofocus>
             <i style="color:#F00">Tiêu đề của slide</i>
         
      </div>
      <div class="form-group">
            <label>Danh mục</label>
            <div class="checkbox">
                	<select class="form-control" id="slParent" name="data[parentid]" >
                        <option value="0">---Root--- </option>
                        <?php 
							if($_SESSION['lang']=='') {$_cate="select * from tb_slide_group Where publish=1 and lang='vi'";}else{$_cate="select * from tb_slide_group Where publish=1 and lang="."'".$_SESSION['lang']."'";}
							$lib->loadoption('0','',$lib->selectall($_cate),$detail->parentid) ;
						?>
                     </select>  
            </div>     
      </div> 
      
      
     
       <div class="form-group">
          <label for="image">Ảnh</label>
          <?php if(isset($detail)){?>
          <div class="row">
          	  <ul class="ajaximg">
                 <li>
                    	<?php if($detail->image!='') {?><img id="logoimg" src="<?php echo $detail->image;?>"/><?php } else {?>
                        <img id="logoimg" src="<?php echo $url_dir;?>images/not-found.png">
                        <?php
						}
						?>
                 </li>
              </ul>
              <input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[image]" 
                    value="<?php echo $detail->image;?>"
                    id="image"  >
            <p class="col-md-10 pull-left"><button onclick="ajaxImg('logoimg','image', 'image');return false;" class="btn btn-primary">Chọn</button></p>
            
          </div>
          <?php }else{ ?>
           <div class="row">
          	  <ul class="ajaximg">
                 <li>
                    	<img id="logoimg" src="<?php  if(isset($data['image']) && $data['image']!='') echo $data['image']; else  echo $url_dir;?>images/not-found.png">
                 </li>
              </ul>
              <input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[image]" 
                    value="<?php if(isset($data['image'])) echo $data['image'];  ?>"
                    id="image"  >
            <p class="col-md-10 pull-left"><button onclick="ajaxImg('logoimg','image', 'image');return false;" class="btn btn-primary">Chọn</button></p>
            
          </div>
          <?php }?>
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
          <label for="url">Url</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->url ?>"
          	 class="form-control" 
             name="data[url]" 
             id="url" >
             <i style="color:#F00">Link đường dẫn di chuyển đến  khi click vào slide</i>
         
      </div>
       <div class="form-group">
          <label for="position">Thứ tự</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->position ?>"
          	 class="form-control" 
             name="data[position]" 
             id="position" >
             <i style="color:#F00">Thứ tự hiển thị của slide</i>
         
      </div>
	  <div class="form-group">
          <label for="author">Tác giả</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->author ?>"
          	 class="form-control" 
             name="data[author]" 
             id="author" >
             
         
      </div>
       
        
           
  </div>
  <div class="col-md-12" style="padding-bottom:3em">
   	   <br>      
        <div class="form-group">
            <label for="content">Nội dung</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor content validate[required]" name="data[content]" id="content">
                    <?php if(isset($detail)) echo $detail->content; elseif(isset($data['content'])) echo $data['content']; ?>
                </textarea>
                <i style="color:#F00">Nội dung ảnh slide , cảm nhận của học viên </i>
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
