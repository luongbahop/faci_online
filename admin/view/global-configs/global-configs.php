

<div class="row">
  <form method="post" action="">
  <div class="col-lg-6">
          <div class="form-group">
              <label for="title">Tên website</label>
              <input 
              	class="form-control" 
                name="data[title]" 
                id="title" 
                value="<?php echo $config->title;?>"
                required 
                autofocus>
             
          </div>
          <div class="form-group">
              <label for="logo">Logo </label>
              <div class="row">
              	 <ul class="ajaximg">
                 	<li>
                    	<img id="logoimg" src="<?php echo $config->logo;?>"/>
                    </li>
                 </ul>
              	
                 <input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[logo]" 
                    value="<?php echo $config->logo;?>"
                    id="logo"  >
             	 <p class="col-md-10 pull-left"><button onclick="ajaxImg('logoimg','logo', 'image');return false;" class="btn btn-primary">Chọn</button></p>
              </div>
          </div>
          
         <div class="form-group">
              <label for="name">Tên tổ chức</label>
              <input 
              	class="form-control" 
                name="data[name]" 
                value="<?php echo $config->name;?>"
                id="name" >
             
          </div>
           <div class="form-group">
              <label for="slogan">Slogan </label>
              <input 
              	class="form-control" 
                name="data[slogan]" 
                value="<?php echo $config->slogan;?>"
                id="slogan" >
             
          </div>
          <div class="form-group">
              <label for="address">Địa chỉ</label>
              <input 
              	class="form-control" 
                name="data[address]" 
                value="<?php echo $config->address;?>"
                id="address" >
             
          </div>
           <div class="form-group">
              <label for="keywords">Thẻ meta keywords (Hỗ trợ seo)</label>
              <input 
              	class="form-control" 
                name="data[keywords]" 
                value="<?php echo $config->keywords;?>"
                id="keywords" >
             
          </div>
           <div class="form-group">
              <label for="description">Thẻ meta description(Hỗ trợ seo)</label>
              <input 
              	class="form-control" 
                name="data[description]" 
                value="<?php echo $config->description;?>"
                id="description" >
             
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input 
              	class="form-control" 
                name="data[email]" 
                value="<?php echo $config->email;?>"
                id="email" >
             
          </div>
          <div class="form-group">
              <label for="fax">Fax</label>
              <input
              	 class="form-control" 
                 name="data[fax]" 
                 value="<?php echo $config->fax;?>"
                 id="fax" >
             
          </div>
          <div class="form-group">
              <label for="perpage">Số bản ghi trên 1 trang</label>
              <input
              	 class="form-control" 
                 name="data[perpage]" 
                 value="<?php echo $config->perpage;?>"
                 id="perpage" >
             
          </div>
  </div>
  <div class="col-lg-6">
  		  <div class="form-group">
              <label for="website">Link website</label>
              <input class="form-control" value="<?php echo $config->website;?>" name="data[website]" id="website" >
             
          </div>
           <div class="form-group">
              <label for="icon">Icon</label>
              <div class="row">
              	  <ul class="ajaximg2">
                 	<li>
                    	<img id="iconimg" src="<?php echo $config->icon;?>"/>
                    </li>
                  </ul>
              	 <p><input 
                 	type="hidden"
                 	class="form-control" 
                    name="data[icon]" 
                    value="<?php echo $config->icon;?>"
                    id="icon"  >
             	 <p class="col-md-10"><button   onclick="ajaxImg('iconimg','icon', 'image');return false;" class="btn btn-primary">Chọn</button></p>
              </div>
          </div>
          <div class="form-group">
              <label for="phone">Số điện thoại</label>
              <input 
              	class="form-control" 
                name="data[phone]" 
                value="<?php echo $config->phone;?>"
                id="phone" >
             
          </div>
          <div class="form-group">
              <label for="hotline">Đường dây nóng</label>
              <input 
              	class="form-control" 
                name="data[hotline]" 
                value="<?php echo $config->hotline;?>"
                id="hotline" >
             
          </div>
        
           <div class="form-group">
              <label for="facebook">Facebook</label>
              <input class="form-control"  value="<?php echo $config->facebook;?>" name="data[facebook]" id="facebook" >
             
          </div>
          <div class="form-group">
              <label for="google">Google</label>
              <input class="form-control" name="data[google]" value="<?php echo $config->google;?>" id="google" >
             
          </div>
          
           <div class="form-group">
              <label for="youtube">Youtube</label>
              <input class="form-control" name="data[youtube]" value="<?php echo $config->youtube;?>" id="youtube" >
          </div> 
		  <div class="form-group">
              <label for="map_cs1_address">Địa chỉ CS 1 </label>
              <input class="form-control" name="data[map_cs1_address]" value="<?php echo htmlspecialchars($config->map_cs1_address);?>" id="map_cs1_address" >
          </div> 
		  <div class="form-group">
              <label for="map_cs1">Toạ độ CS 1 </label>
              <input class="form-control" name="data[map_cs1]" value="<?php echo htmlspecialchars($config->map_cs1);?>" id="map_cs1" >
          </div> 
		   <div class="form-group">
              <label for="map_cs2_address">Địa chỉ CS 2 </label>
              <input class="form-control" name="data[map_cs2_address]" value="<?php echo htmlspecialchars($config->map_cs2_address);?>" id="map_cs2_address" >
          </div> 
		   <div class="form-group">
              <label for="map_cs2">Toạ độ CS 2 </label>
              <input class="form-control" name="data[map_cs2]" value="<?php echo htmlspecialchars($config->map_cs2);?>" id="map_cs2" >
          </div>
		 <div class="form-group">
              <label for="video_hot">Video nổi bật</label>
              <textarea class="form-control" rows="6" name="data[video_hot]" id="video_hot"><?php echo $config->video_hot;?></textarea>

			  <i style="color:red">Width 300 - Height 200</i>
          </div> 			  
		  
		  
  </div>
   <div class="col-md-12" style="padding-bottom:3em">
   	  <div class="form-group">
            <label for="closed">Đóng cửa website</label>
            <div class="row">
           		 <p class="col-md-2">
                 <input 
                 	type="radio" 
                    value="1"
                    <?php  if($config->closed ==1) echo "checked";  else echo "";?>
                    name="data[closed]" 
                    id="closed"> 
                 <b style="padding-left:5px;">Có</b>
                 </p>
           		 <p class="col-md-2">
                 <input 
                 	<?php  if($config->closed ==0) echo "checked";  else echo "";?>
                    value="0"
                 	type="radio" 
                    name="data[closed]" 
                    id="closed">
                  <b style="padding-left:5px;">Không</b>
                 </p>
             </div>    
       </div>
       <div class="form-group">
            <label for="alert">Thông báo đóng cửa website</label>
           <p class="row" style="overflow:scroll;">
           <textarea class="wysiwygEditor" name="data[alert]" id="alert"><?php echo $config->alert;?></textarea>
           </p>
        </div>
		
        <div class="form-group">
            <label for="footer">Chân trang</label>
            <p class="row" style="overflow:scroll;">
            <textarea class="wysiwygEditor" name="data[footer]" id="footer"><?php echo $config->footer;?></textarea>
            </p>
        </div>
  </div>
  <div class="col-md-12" style="padding-bottom:3em">
  	  <div class="col-md-2 col-sm-6">
      	 <button type="reset" class="btn btn-danger">Làm lại</button>
      </div>
       <div class="col-md-2 col-sm-6">
      	 <button type="submit" class="btn btn-primary" name="btnGui">Thay đổi</button>
      </div>    
  </div>
  </form>
</div>
<!-- /.row -->