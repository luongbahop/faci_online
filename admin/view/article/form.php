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
             <i style="color:#F00">Vui lòng nhập tiêu đề để bài viết</i>
         
      </div>
     
      <div class="form-group">
            <label>Danh mục</label>
           
            <div class="checkbox">
        
                  <select class="form-control" id="slParent" name="data[parentid]" >
            <?php 
              if(isset($detail))
                 {
                  
                 }
            
            ?>
                        <?php 
              if($_SESSION['lang']=='') {$_cate="select * from tb_article_category Where publish=1 and lang='vi'";}else{$_cate="select * from tb_article_category Where publish=1 and lang="."'".$_SESSION['lang']."'";}
              $lib->loadoption('0','',$lib->selectall($_cate),$detail->parentid) ;
            ?>
                     </select> 
                     <i style="color:#F00">Vui lòng chọn danh mục cho bài viết</i>
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
                    
            <p class="col-md-10 pull-left"><button  onclick="ajaxImg('logoimg','image', 'image');return false;" class="btn btn-primary">Chọn</button></p>
           
            
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
       <div class="form-group">
              <label for="file">File đính kèm</label>
              <div class="row">
                 <p class="col-md-10"><input 
                  class="form-control" 
                    name="data[file]" 
                    value="<?php if(isset($detail)) echo $detail->file; ?>"
                    id="file"  >
                    <i style="color:#F00">Chọn file bạn muốn , nếu có nhiều file thì zip thành 1 file</i></p>
               <p class="col-md-2"><button  onclick="browseKCFinder('file', 'file');return false;" class="btn btn-primary">Chọn</button></p>
                 
              </div>
       </div>
      
     
      
      
     
      
  </div>
  <div class="col-lg-4  right-f">
       <header class="panel panel-primary" >
          <h4>Nâng cao</h4>
       </header>
       <div class="form-group">
            <label for="publish">Trạng thái</label>
            <div class="col-md-12">
               <p class="col-md-12">
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
               <p class="col-md-12">
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
            <label for="hot">Tin mới</label>
            <div class="col-md-12">
               <p class="col-md-12">
                   <input 
                      <?php if(isset($detail)){ 
              if($detail->hot==1) echo "checked";
              }  else echo ""; 
            ?>
                      value="1" 
                        type="radio" 
                        name="data[hot]" 
                        id="hot"> 
                    <b style="padding-left:5px;">Tin mới</b>
                 </p>
               <p class="col-md-12">
                  <input 
                      <?php if(isset($detail)){ 
              if($detail->hot==0) echo "checked";
              }  else echo "checked"; 
            ?>
                       
                        value="0" 
                        type="radio" 
                        name="data[hot]" 
                        id="hot"> 
                    <b style="padding-left:5px;">Không</b>
                 </p>
             </div>              
       </div>
       <div class="form-group">
            <label for="marketing">Gửi Email marketing</label>
            <div class="col-md-12">
               <p class="col-md-12">
                     <input 
                     
                        value="1" 
                        type="checkbox" 
                        name="marketing" 
                        id="marketing">
                     <b style="padding-left:5px; white-space:nowrap;">Có</b>
                 </p>
              
             </div>              
       </div>
      <!--<div class="form-group">
            <label for="is_home">Hiển thị trang chủ</label>
            <div class="col-md-12">
               <p class="col-md-5">
                   <input 
                      <?php if(isset($detail)){ 
              if($detail->is_home==1) echo "checked";
              }  else echo ""; 
            ?>
                      value="1" 
                        type="radio" 
                        name="data[is_home]" 
                        id="hot"> 
                    <b style="padding-left:5px;">Co&#769;</b>
                 </p>
               <p class="col-md-4">
                  <input 
                      <?php if(isset($detail)){ 
              if($detail->is_home!=1) echo "checked";
              }  else echo "checked"; 
            ?>
                       
                        value="0" 
                        type="radio" 
                        name="data[is_home]" 
                        id="hot"> 
                    <b style="padding-left:5px;">Không</b>
                 </p>
             </div>              
       </div>-->






     <div class="form-group">
          <label for="position">Thứ tự</label>
          <input value="<?php if(isset($detail)) echo $detail->position; elseif(isset($data['position'])) echo $data['position']; ?>"   class="form-control" name="data[position]" id="position" >  <i style="color:#F00">Bài viết hiển thự theo thứ tự bạn nhập</i>
        </div>
       <!-- <div class="form-group">
          <label for="meta_title">Thẻ Meta Title:</label>
          <input value="<?php if(isset($detail)) echo $detail->meta_title; elseif(isset($data['meta_title'])) echo $data['meta_title']; ?>"   class="form-control" name="data[meta_title]" id="meta_title" >  
        </div>-->
        <div class="form-group">
          <label for="meta_keywords">Thẻ Meta Keywords:</label>
          <input value="<?php if(isset($detail)) echo $detail->meta_keywords; elseif(isset($data['meta_keywords'])) echo $data['meta_keywords']; ?>"  class="form-control" name="data[meta_keywords]" id="meta_keywords" >  <i style="color:#F00">Hỗ trợ cho SEO</i>
        </div>
    <div class="form-group">
          <label for="meta_description">Thẻ Meta Description:</label>
          <input value="<?php if(isset($detail)) echo $detail->meta_description; elseif(isset($data['meta_description'])) echo $data['meta_description']; ?>"  class="form-control" name="data[meta_description]" id="meta_keywords" >  <i style="color:#F00">Hỗ trợ cho SEO</i>
        </div>
        
           
  </div>
   <div class="col-md-12" style="padding-bottom:3em">
       <br>
       <div class="form-group">
            <label for="description">Trích dẫn</label>
           <p class="row" style="overflow:auto;">
            <textarea class="wysiwygEditor description" name="data[description]" id="description" >
                <?php if(isset($detail)) echo $detail->description; elseif(isset($data['description'])) echo $data['description']; ?>
            </textarea>
            <i style="color:#F00">Phần mở đầu , mô tả , trích dẫn của bài viết</i>
           </p>
        </div>
        <div class="form-group">
            <label for="content">Nội dung</label>
            <p class="row" style="overflow:auto;">
              <textarea class="wysiwygEditor content validate[required]" name="data[content]" id="content">
                    <?php if(isset($detail)) echo $detail->content; elseif(isset($data['content'])) echo $data['content']; ?>
                </textarea>
                <i style="color:#F00">Nội dung chi tiết của bài viết</i>
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