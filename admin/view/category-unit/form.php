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
              <label for="file">File âm thanh đính kèm</label>
              <div class="row">
              	 <p class="col-md-10"><input 
                 	class="form-control" 
                    name="data[file]" 
                    value="<?php if(isset($detail)) echo $detail->file; ?>"
                    id="file"  >
                    <i style="color:#F00">File audio đề thi </i></p>
             	 <p class="col-md-2"><button  onclick="browseKCFinder('file', 'file');return false;" class="btn btn-primary">Chọn</button></p>
                 
              </div>
       </div>
  </div>
  <div class="col-lg-4  right-f">
  	   <header class="panel panel-primary" >
       		<h4>Nâng cao</h4>
       </header>
       <div class="form-group">
            <label for="publish">Trang thái</label>
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
            <label for="type">Loại đề thi</label>
            <div class="col-md-12">
               <p class="col-md-12">
                     <input 
                      <?php if(isset($detail)){ 
              if($detail->type==0) echo "checked";
              } else echo "checked"; 
            ?>
                        value="0" 
                        type="radio" 
                        name="data[type]" 
                        id="type">
                     <b style="padding-left:5px; white-space:nowrap;">Actual test</b>
                 </p>
               <p class="col-md-12">
                     <input 
                      <?php if(isset($detail)){ 
              if($detail->type==1) echo "checked";
              }  else echo ""; 
            ?>
                         
                        value="1" 
                        type="radio" 
                        name="data[type]" 
                        id="type"> 
                     <b style="padding-left:5px;">Test từ mới</b>
                 </p>
             </div>              
       </div>
       <div class="form-group">
          <label for="position">Số thứ tự </label>
          <input 
             value="<?php if(isset($detail)) echo $detail->position; elseif(isset($data['position'])) echo $data['position']; ?>"
             class="form-control  validate[required]" 
             name="data[position]" 
             id="position" 
             >
         
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
        <br>
       <div class="form-group">
            <label for="new_word">Từ mới</label>
           <p class="row" style="overflow:auto;">
            <textarea class="wysiwygEditor new_word" name="data[new_word]" id="new_word" >
              <?php if(isset($detail)) echo $detail->new_word ?>
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
