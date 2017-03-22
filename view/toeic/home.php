<section id="home" class="itq-slider">
	 <section id="slides">
		<?php if(count(array_filter($slide))>0){ ?>
        <ul class="slides-container">
		<?php foreach($slide as $key=>$item){if(is_array($item)){?>
            <li><a title="<?php echo  isset($item['title'])?$item['title']:''; ?>" href="<?php echo  isset($item['url'])?$item['url']:''; ?>"><img title="<?php echo  isset($item['title'])?$item['title']:''; ?>" src="<?php echo  isset($item['image'])?$item['image']:''; ?>" alt="<?php echo  isset($item['title'])?$item['title']:''; ?>"/></a></li>
		<?php } }?>
        </ul> 
		<?php }else echo "<p class='nodata'>Không có dữ liệu !</p>"; ?>  
      </section> <!-- .itq-slides -->
</section><!-- .itq-slider -->
<section class="clear"></section>


<section id="about" class=" itq-article flipInY wow" data-wow-duration="2s">
	<section class="wrapper">
		<h2 class="ttnc">
			<span class="green"> Toeic Building </span><span class="violet"> Smart Home For Toeic</span>
		</h2>
		<figure>
			<a target="_blank" href="<?php echo $config->facebook; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/face.png"/></a>
			<a target="_blank" href="<?php echo $config->youtube; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/tweet.png"/></a>
			<a target="_blank" href="<?php echo $config->google; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/goo.png"/></a>
		</figure>
		<article>
			 <?php echo ($about->description!='')?$lib->cut_string($about->description,300).' ...':'';  ?>
			<a title="<?php echo ($about->title!='')?$about->title:'';  ?>" class="tht" href="<?php echo $url.$about->alias.'/88'.$about->id.'.html'; ?>">tìm hiểu thêm</a>
		</article>	
		
		
    </section><!-- .wrapper -->
	
</section><!-- .itq-article -->

<br>
<section class="clear"></section>

<section class="itq-hai-slide tada wow" style="position:relative;width:750px;height:250px;margin:0 auto;text-align:center;">
	<?php if(count(array_filter($khoahoc))>0){ ?>			
	<div id="carousel" style="position:absolute;float:left;">
	<?php foreach($khoahoc as $key=>$item){if(is_array($item)){?>															
		<a title="<?php echo $item['title']; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>"  /></a>
		<?php }} ?>	   
	</div>
	<?php } ?>
	<script src="<?php echo $url_dir; ?>js/jquery.waterwheelCarousel.min.js"></script>
	<script> 	
		$("#carousel").waterwheelCarousel({autoPlay:5000}); 	
	</script>
	<p class="videohot" style="float:right"></p>
</section><!--end .itq-hai-slide-->	


<section class="clear"></section>
<section class="itq-category" >
	<section class="wrapper">
		<ul class="list-item" >
			<?php 
			foreach($video_hot as $item ){ if(is_array($item)){
			 ?>
			<li class="list-item bounceIn wow " data-wow-duration="1s" style="visibility: visible; -webkit-animation: bounceIn 1s;">
				<figure>
					
					 <?php echo $item['description']; ?>
					<figcaption>
						<?php echo $item['title']; ?>
					</figcaption>
				</figure>
			</li><!--.list-item-->
			<?php }} ?>
		</ul>
    </section><!-- .wrapper -->
</section><!-- .itq-category -->
<section class="clear"></section>


<section class="itq-container"  id="calendar">
	<section class="wrapper">
		<section id="tkb" class="khachtieubieu hop wow rollIn" data-delay="200">
			<header>
				<h2 class="khach">Lịch Khai Giảng</h2>
				<span></span>
			</header>
			<div class="tkb_img" style="">
				<?php if(count(array_filter($calendar))>0){
				foreach($calendar as $key=>$item){if(is_array($item)){
					echo $item['content'];
				}}} 
				?>	
			</div>
		</section>
		<section class="clear"></section>
		<section id="lecture" class="news-and-share fadeInUp wow " data-wow-duration="2s">
			<section class="news hop fadeInUp" data-delay="200">
				<header>
					<h3 class="the-title-ofcontainer">Bài giảng</h3>
				</header>
				<?php if(count(array_filter($lectures))>0){ ?>
				<?php foreach($lectures as $key=>$item){if(is_array($item)){?>
				<figure>
					<a  title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><img alt="<?php echo ($item['title']!='')?$item['title']:''; ?>" title="<?php echo ($item['title']!='')?$item['title']:''; ?>" src="<?php echo ($item['image']!='')?$item['image']:$url_dir.'images/pnf.png'; ?>" /></a>
					<figcaption>
						<p><?php echo ($item['title']!='')?$item['title']:''; ?></p>
						<a title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>">Xem ngay</a>
					</figcaption>
				</figure>
				<?php }}}else echo "<p class='nodata'>Không có dữ liệu !</p>"; ?>		
			</section>
			<section class="share hop fadeInUp" data-delay="200">
				<header style="height:25px;">
					<h3 class="the-title-ofcontainer" style="padding-top:2px;">Cảm Nhận Của Học Viên</h3>
				</header>
				<?php if(count(array_filter($slide_cn))>0){ ?>
				<?php foreach($slide_cn as $key=>$item){if(is_array($item)){?>
				<section class="customers">
					<figure>
						<img title="<?php echo $item['title']; ?>" alt="<?php echo $item['title']; ?>" class="i_comment"  src="<?php echo $item['image'] ?>">
						<figcaption class="talk_comment">
						<div class="nghieng"><img alt="ngoặc kép mở" class="mongoackep" src="<?php echo $url_dir; ?>images/mongoackep.png"><?php echo $item['content'] ?><img alt="ngoặc kép đóng"  class="dongngoackep" src="<?php echo $url_dir; ?>images/dongngoackep.png"></div>
						<br/>
						<p class="thename"><?php echo $item['author'] ?></p>
						</figcaption>
					</figure>
				</section>
				
				<?php } }?>
				<?php } ?> 
			<footer>
				<a style="text-align:center;" class="tht" href="<?php echo $url.'slide.html' ?>">còn nhiều lắm </a>
				
			</footer>
			</section>
			
		</section><!-- .news-and-share -->
		<section class="clear"></section>
		<section class="care wow fadeInUp" data-wow-duration="2s">
			<header class="why">
					<h3 class="the-title-ofcontainer">Bài viết mới</h3>
			</header>
			<figure>
				<a title="<?php echo isset($hotnews->title)?$hotnews->title:''; ?>" href="<?php echo $url.$hotnews->alias.'/88'.$hotnews->id.'.html'; ?>"><img alt="<?php echo isset($hotnews->title)?$hotnews->title:''; ?>"  title="<?php echo isset($hotnews->title)?$hotnews->title:''; ?>" src="<?php echo isset($hotnews->image)?$hotnews->image:''; ?>"/></a>
				<figcaption>
					<h5 class="tit"><a title="<?php echo isset($hotnews->title)?$hotnews->title:''; ?>" href="<?php echo $url.$hotnews->alias.'/88'.$hotnews->id.'.html'; ?>"><?php echo isset($hotnews->title)?$hotnews->title:''; ?></a></h5>
					
					<section class="view"><?php echo isset($hotnews->viewed)?$hotnews->viewed:''; ?></section>
					<p><?php echo isset($hotnews->description)? $lib->cut_string(strip_tags($hotnews->description),250):''; ?></p>
					<?php if(count(array_filter($othernews))>0){ ?>
					<ul>
					<?php foreach($othernews as $key=>$item){if(is_array($item)){?>
						<li><a title="<?php echo isset($item['title'])?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php echo isset($item['title'])?$item['title']:''; ?></a></li>
					<?php }} ?>
					</ul>
					<?php }else echo "<p class='nodata'>Không có dữ liệu !</p>"; ?>		
				</figcaption>
			</figure>
		</section><!-- .care -->
		<section class="clear"></section>
		<section id="video" class="video-tuvan fadeInUp wow " data-wow-duration="2s">
			<section class="video hop bounceIn" data-delay="200">
				<header style="height:25px;">
					<h3 class="the-title-ofcontainer">Video Ngữ Âm Cơ Bản</h3>	
				</header>
				
				<h4 class="ten ten1"><?php echo $video_nguam->title;  ?></h4>	
				<?php echo $video_nguam->description;  ?>
				<footer>
					<a href="<?php echo $url.'?page=news&id=8' ?>">xem thêm video khác</a>
					<p>Có rất nhiều video hướng dẫn  có thể giúp bạn tiến nhanh hơn trên con đường chinh phục ngọn núi Tiêng Anh.</p>
				</footer>
			</section>
			
			<section class="tuvan hop bounceIn" data-delay="200">
				<header style="height:25px;">
					<h3 class="the-title-ofcontainer" style="padding-top:3px;">Video Khác </h3>
				</header>
				<?php if(count(array_filter($video_khac))>0){ ?>
                <section id="slidepro" style="height:500px; position:relative;padding-top:55px">                
				<ul class="slides-container">
				<?php foreach($video_khac as $item){ if(is_array($item)){ ?>
					<li>
						<h4 class="ten"><?php echo $item['title'];  ?></h4>
						<?php echo $item['description'];  ?>
					</li>
				<?php }} ?>						        
				</ul>
                </section><!--#slidepro-->
                <br/>
                <a style="color:red;font-size:20px;" href="<?php echo $url.'?page=news&id=19' ?>" clas="nth">Xem thêm</a>
 
				<?php } else echo "<br><br><br><br><p>Updating ...</p>"; ?>
			</section>
		</section><!-- .video-tuvan -->
		<section class="clear"></section>
		<?php if(count(array_filter($slide_hv))>0){ ?>
		<section id="album" class="khachtieubieu hop wow rollIn" data-delay="200">
			<header>
				<h2 class="khach">Góc vinh danh</h2>
				<span></span>
			</header>
			<ul id="owl-demo"  style="width:1020px">
			<?php foreach($slide_hv as $item){ if(is_array($item)){ ?>
				<li class="item"><a href="<?php echo ($item["url"]!='')?$item["url"]:''; ?>" title='<?php echo ($item["title"]!='')?$item["title"]:''; ?>'><img title='<?php echo ($item["title"]!='')?$item["title"]:''; ?>' alt='<?php echo ($item["title"]!='')?$item["title"]:''; ?>' src='<?php echo ($item["image"]!='')?$item["image"]:''; ?>'/></a></li>
            <?php }} ?>    
			</ul>
		</section>
		<section class="clear"></section>
		<?php } ?>
		<section id="book" class="expire wow fadeInUp" data-wow-duration="2s">
			<h3>Đăng ký học ngay</h3>
			<form method="post" action="">
			<section class="i_left">
				<p>
					<input name="data[fullname]" value="<?php echo ($login->fullname!='')?$login->fullname:''; ?>" required class="i_input" placeholder="Họ và tên" type="text"/>
				</p>
				<p>
					<input name="data[birthday]" required  class="i_input picker" placeholder="Ngày sinh" type="text"/>
				</p>
				<p>
					<select name="data[place]" class="i_input" required>
						<option value="">-----Cơ sở học----</option>
						<option>Cơ sở 1 : Nguyễn Chí Thanh</option>
						<option>Cơ sở 2 : Đông Ngạc</option>
					</select >
				</p>
			</section>
			<section class="i_right">
				<p>
					<input value="<?php echo ($login->email!='')?$login->email:''; ?>" name="data[email]" required class="i_input" placeholder="E-mail" type="email"/>
				</p>
				<p>
					<input value="<?php echo ($login->phone!='')?$login->phone:''; ?>" name="data[phone]" required class="i_input" placeholder="Số điện thoại" type="phone"/>
				</p>
				<p>					
				<?php if(count(array_filter($khoahoc))>0){ ?>
					<select name="data[class]" class="i_input" required>
						<option value=''>-----Lớp học----</option>						
						<?php foreach($khoahoc as $key=>$item){if(is_array($item)){?>
							<option value="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></option>						
							<?php }} ?>
					</select>	
				<?php } ?>
				</p>
				
			</section>
			<p>
				<input name="data[type]"  class="i_input"  type="hidden" value="1"/>
				<input name="btnGui" class="tht" value="Đăng Ký" type="submit"/>
			</p>
			</form>
		</section><!-- .expire -->
		<section class="clear"></section>
		<section id="contact" class="mapface wow flipInY" data-wow-duration="2s">
			<section class="map">
				<header>
					<h3 class="the-title-ofcontainer">Google Map</h3>
				</header>
				<section id="map" style="width:480px;height:280px;"></section>
			</section>
			
			<section class="face">
				<header>
					<h3 class="the-title-ofcontainer">Fanpage facebook</h3>
				</header>
                <div class="fb-page" data-href="<?php echo $config->facebook; ?>" data-width="450" data-height="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Toeic.Building.Center?fref=ts"><a href="https://www.facebook.com/Toeic.Building.Center?fref=ts">TOEIC Building</a></blockquote></div></div>
				
				
			</section>
		</section>
    </section>
</section><!-- .itq-container -->
<section class="clear"></section>