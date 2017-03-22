
<section class="itq-container">
	<section class="wrapper">
		
		<section id="lecture" class="news-and-share fadeInUp wow " data-wow-duration="2s">
			
			<section style="width:100%" class="share hop fadeInUp" data-delay="200">
				<header style="height:25px;">
					<h3 class="the-title-ofcontainer" style="padding-top:2px;">Cảm Nhận Của Học Viên</h3>
				</header>
				<?php if(count(array_filter($slide_cn))>0){ ?>
				<?php foreach($slide_cn as $key=>$item){if(is_array($item)){?>
				<section class="customers">
					<figure>
						<img class="i_comment" src="<?php echo $item['image'] ?>">
						<figcaption  class="talk_comment slide">
						<div class="nghieng"><img class="mongoackep" src="<?php echo $url_dir; ?>images/mongoackep.png"><?php echo $item['content'] ?><img class="dongngoackep" src="<?php echo $url_dir; ?>images/dongngoackep.png"></div>
						<br/>
						<p class="thename"><?php echo $item['author'] ?></p>
						</figcaption>
					</figure>
				</section>
				<?php } }?>
				<?php } ?> 
	
			</section>
			<section class="clear"></section>
			<section class="pagination">
				<br/><br/><br/>
				<ul>
					<?php $lib->viewpage($link); ?>
				</ul>			
			</section><!-- .pagination -->
		</section><!-- .news-and-share -->
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