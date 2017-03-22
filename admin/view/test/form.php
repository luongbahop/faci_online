<div class="col-md-12 row" >
  <form method="post" action="" enctype="multipart/form-data" class="frm">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
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
							if($_SESSION['lang']=='') {$_cate="select * from tb_test_category Where publish=1 and lang='vi'";}else{$_cate="select * from tb_test_category Where publish=1 and lang="."'".$_SESSION['lang']."'";}
							$lib->loadoption('0','',$lib->selectall($_cate),$detail->parentid) ;
						?>
                     </select> 
                     <i style="color:#F00">Vui lòng chọn danh mục cho câu hỏi</i>
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

	   <div class="form-group">
          <label for="position">Thứ tự hiển thị câu hỏi</label>
          <input value="<?php if(isset($detail)) echo $detail->position; elseif(isset($data['position'])) echo $data['position']; ?>"   class="form-control" name="data[position]" id="position" >  <i style="color:#F00">Câu hỏi hiển thự theo thứ tự bạn nhập</i>
       </div>
    
  </div>
   <div class="col-md-12" style="padding-bottom:3em">
   	   <br>
       <div class="form-group">
            <label for="title">Nhóm câu hỏi , nội dung câu hỏi chung</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor" name="data[title]" id="title">
                    <?php if(isset($detail)) echo $detail->title; elseif(isset($data['title'])) echo $data['title']; ?>
                </textarea>
                <i style="color:#F00">Vui lòng nhập tiêu đề nhóm câu hỏi</i><br/>
				<i style="color:#F00">Ví dụ : Từ câu 100 đến cấu 103...</i><br/>
            </p>
        </div>
        <div class="form-group">
            <label for="question">Nội dung câu hỏi</label>
            <p class="row" style="overflow:auto;">
            	<textarea class="wysiwygEditor content validate[required]" name="data[question]" id="question">
                    <?php if(isset($detail)) echo $detail->question; elseif(isset($data['question'])) echo $data['question']; ?>
                </textarea>
                <i style="color:#F00">Nội dung chi tiết của câu hỏi</i>
            </p>
        </div>
		<div class="form-group">
          <label for="answer_a">Đáp án A</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->answer_a; elseif(isset($data['answer_a'])) echo $data['answer_a']; ?>"
          	 class="form-control" 
             name="data[answer_a]" 
             id="answer_a" 
             >
             <i style="color:#F00">Vui lòng nhập nội dung đáp án A</i>
        </div>
		<div class="form-group">
          <label for="answer_b">Đáp án B</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->answer_b; elseif(isset($data['answer_b'])) echo $data['answer_b']; ?>"
          	 class="form-control" 
             name="data[answer_b]" 
             id="answer_b" 
             >
             <i style="color:#F00">Vui lòng nhập nội dung đáp án B</i>
        </div>
		<div class="form-group">
          <label for="answer_c">Đáp án C</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->answer_c; elseif(isset($data['answer_c'])) echo $data['answer_c']; ?>"
          	 class="form-control" 
             name="data[answer_c]" 
             id="answer_c" 
             >
             <i style="color:#F00">Vui lòng nhập nội dung đáp án C</i>
        </div>
		<div class="form-group">
          <label for="answer_d">Đáp án D</label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->answer_d; elseif(isset($data['answer_d'])) echo $data['answer_d']; ?>"
          	 class="form-control" 
             name="data[answer_d]" 
             id="answer_d" 
             >
             <i style="color:#F00">Vui lòng nhập nội dung đáp án D</i><br/>
			 <i style="color:#F00">Lưu ý : PART 2 chỉ có 3 đáp án A,B,C</i>
        </div>
		<div class="form-group">
          <label for="answer">Đáp án đúng</label>
		  <select class="form-control" 
                  name="data[answer]" 
                  id="answer" >
				  <option <?php if(isset($detail) && $detail->answer==1) echo 'selected'; ?> value="1">Đáp án A</option>
				  <option <?php if(isset($detail) && $detail->answer==2) echo 'selected'; ?> value="2">Đáp án B</option>
				  <option <?php if(isset($detail) && $detail->answer==3) echo 'selected'; ?> value="3">Đáp án C</option>
				  <option <?php if(isset($detail) && $detail->answer==4) echo 'selected'; ?> value="4">Đáp án D</option>
		   </select>		  
		   <i style="color:#F00">Vui lòng nhập nội dung đáp án đúng nhất</i>	           
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