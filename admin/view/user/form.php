<div class="col-md-12 row" >
  <form method="post" action="" class="frm" enctype="multipart/form-data">
  <div class="col-lg-7 left-f">
  	 <header class="panel panel-primary" >
        <h4>Thông tin chung</h4>
    </header>
      <div class="form-group">
          <label for="username">Tài khoản <span style="color:#FF0000">(*)</span></label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->username; elseif(isset($data['username'])) echo $data['username']; ?>"
             <?php if(isset($detail)) echo 'disabled';  ?>
          	 class="form-control validate[required,minSize[6]]" 
             name="data[username]" 
             id="username" 
             autofocus>
             <i style="color:#F00">Viết liền không dấu , không chưa kí tự đặc biệt , tối thiểu 6 kí tự .</i>
         
      </div>
       <div class="form-group">
          <label for="email">Email <span style="color:#FF0000">(*)</span></label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->email;elseif(isset($data['email'])) echo $data['email']; ?>"
             <?php if(isset($detail)) echo 'disabled';  ?>
          	 class="form-control validate[required,custom[email]]" 
             name="data[email]" 
             id="email"  
             type="email"
              >
            <i style="color:#F00">Vui lòng nhập chính xác email , nếu không sẽ không lấy lại mật khẩu được .</i>
      </div>
      <?php
	  if(isset($detail))
	  {
	  ?>
      <div id="change">
       	  <p><button  type="button" class="btn btn-info" id="btnchange" >Đổi mật khẩu </button></p>
          
      </div>
      <section id="ChangePass">
      	  <div class="form-group">
              <label for="txtPassOld"> Mật khẩu cũ <span style="color:#FF0000">(*)</span></label>
              <input 
                 class="form-control validate[required,minSize[6]]" 
                 placeholder="Mật khẩu cũ"
                 name="txtPassOld" 
                 id="txtPassOld" 
                 type="password"
                  >
                 <i style="color:#F00">Nhập chính xác mật khẩu cũ của bạn</i>
          </div>
          <div class="form-group">
              <label for="password">Mật khẩu <span style="color:#FF0000">(*)</span></label>
              <input 
                 class="form-control validate[required,minSize[6]]" 
                 placeholder="Mật khẩu mới"
                 name="data[password]" 
                 id="password" 
                 type="password"
                  >
                  <i style="color:#F00">Mật khẩu mới của bạn</i>
              <input 
                 name="now-pass" 
                 value="<?php echo  $detail->password;?>"
                 id="password" 
                 type="hidden"
                  >    
          </div>
          <div class="form-group">
              <label for="txtRePass"> Nhập lại mật khẩu<span style="color:#FF0000">(*)</span></label>
              <input 
                 class="form-control validate[required,equals[password]]" 
                 placeholder="Nhập lại mật khẩu"
                 name="txtrepass" 
                 id="txtrepass" 
                 type="password"
                  >
                  <i style="color:#F00">Nhập lại chính xác mật khẩu mới vừa nhập.</i>
          </div>
      </section> <!--#ChangePass-->
	  <?php 
	  }
	  else
	  {
	  ?>
       <div class="form-group">
          <label for="password">Mật khẩu <span style="color:#FF0000">(*)</span></label>
          <input 
          	 placeholder="Mật khẩu"
          	 class="form-control validate[required]" 
             name="data[password]" 
             id="password" 
             type="password"
              >
              <i style="color:#F00">Tối thiểu 6 kí tự</i>
      </div>
      <div class="form-group">
          <label for="password">Nhập lại mật khẩu <span style="color:#FF0000">(*)</span></label>
          <input 
			 placeholder="Nhập lại mật khẩu"
          	 class="form-control validate[required,equals[password]]" 
             name="txtrepass" 
             id="password" 
             type="password"
              >
              <i style="color:#F00">Nhập lại chính xác mật khẩu vừa nhập</i>
      </div>
     <?php } ?>
      <?php if($loginadmin->groupid==1){ ?>
      <div class="form-group">
            <label>Nhóm tài khoản <span style="color:#FF0000">(*)</span></label>
           
            <div class="checkbox">
                	<select name="data[groupid]"  class="form-control"type="radio" value="<?php echo $item['id']; ?> ">
                         <?php foreach($list_role as $key=>$item){if(is_array($item)){ ?>
                        		<option value="<?php echo  $item['id']; ?>" <?php if($detail->groupid == $item['id']) echo "selected";  ?> >
									<?php   echo  $item['title']; ?>
                                </option>
                        <?php
								}
							}
						?> 
                    </select>
                    <i style="color:#F00">Phân nhóm cho tài khoản</i>   
            </div> 
      </div>
      <?php } ?>
      <div class="form-group">
          <label for="fullname">Họ và tên </label>
          <input 
          	 value="<?php if(isset($detail)) echo $detail->fullname;  elseif(isset($data['fullname'])) echo $data['fullname'];?>"
          	 class="form-control validate[required]" 
             name="data[fullname]" 
             id="fullname" >
         <i style="color:#F00">Vui lòng nhập chính xác họ và tên </i>
      </div>
     
       <div class="form-group">
          <label for="avatar">Ảnh đại diện</label>
          <?php if(isset($detail)){?>
          <div class="row">
          	  <ul class="ajaximg">
                 <li>
                    	<?php if($detail->avatar!='') {?><img id="logoimg" src="<?php echo $detail->avatar;?>"/><?php } else {?>
                        <img id="logoimg" src="<?php echo $url_dir;?>images/not-found.png">
                        <?php
						}
						?>
                 </li>
              </ul>
              <input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[avatar]" 
                    value="<?php echo $detail->avatar;?>"
                    id="avatar"  >
            <p class="col-md-10 pull-left"><button onclick="ajaxImg('logoimg','avatar', 'image');return false;" class="btn btn-primary">Chọn</button></p>
            
          </div>
          <?php }else{ ?>
           <div class="row">
          	  <ul class="ajaximg">
                 <li>
                    	<img id="logoimg" src="<?php echo $url_dir;?>images/not-found.png">
                 </li>
              </ul>
              <input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[avatar]" 
                    value="<?php if(isset($data['avatar'])) echo $data['avatar'];  ?>"
                    id="avatar"  >
            <p class="col-md-10 pull-left"><button onclick="ajaxImg('logoimg','avatar', 'image');return false;" class="btn btn-primary">Chọn</button></p>
            
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
             <br>
             <i style="color:#F00">Hoạt động : bình thường </i>  <br>
             <i style="color:#F00">Khoá : bị khoá  , không được phép hoạt động</i>        
       </div>      
  </div><!--right-f-->
  <div class="col-lg-4  right-f">
  	   <header class="panel panel-primary" >
       		<h4>Thông tin thêm</h4>
       </header>
       <div class="form-group">
            <label for="sex">Giới tính</label>
            <div class="col-md-12">
           		 <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->sex==1) echo "checked";
							} else echo "checked"; 
						?>
                        value="1" 
                        type="radio" 
                        name="data[sex]" 
                        id="sex">
                     <b style="padding-left:5px;">Nam</b>
                 </p>
           		 <p class="col-md-4">
                     <input 
                     	<?php if(isset($detail)){ 
							if($detail->sex==0) echo "checked";
							}  else echo ""; 
						?>
                         
                        value="0" 
                        type="radio" 
                        name="data[sex]" 
                        id="sex"> 
                     <b style="padding-left:5px;">Nữ</b>
                 </p>
             </div>              
       </div>  
		  <div class="form-group">
              <label for="phone">SĐT</label>
              <input 
                 value="<?php if(isset($detail)) echo $detail->phone;elseif(isset($data['phone'])) echo $data['phone']; ?>"
                 class="form-control" 
                 name="data[phone]" 
                 id="phone" >
             
          </div>           
        <div class="form-group">
          <label for="birthday">Sinh nhật</label>
          <input 
          	value="<?php 
			if(isset($detail))
			{
				if($detail->birthday != '0000-00-00 00:00:00' && $detail->birthday!='' ) echo date('d-m-Y', strtotime($detail->birthday)); else echo '';
			}	
			else echo gmdate('d-m-Y',time()+7*3600); ?>"
          	class="form-control" 
            name="data[birthday]" 
            id="birthday" >
        </div>  
        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <textarea class="form-control" name="data[address]" id="address"><?php if(isset($detail)) echo $detail->address;  elseif(isset($data['address'])) echo $data['address']; ?></textarea>

      </div>    
  </div><!--right-f-->
  
  
  
  
  
  
  <div class="col-md-12" style="padding-bottom:3em">
  	  <div class="col-md-2 col-sm-6">
      	 <button type="reset" class="btn btn-danger">Làm lại</button>
      </div>
       <div class="col-md-2 col-sm-6">
      	 <button type="submit" class="btn btn-primary" name="btnGui">Gủi</button>
      </div>    
  </div>
  </form>
</div>
<!-- /.row -->
<script>
	$(document).ready(function(e) {
        $('#btnchange').click(function(e) {
            $("#ChangePass").css("display","block");
       	    $("#btnchange").css("display","none");
        });
    });
</script>