<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml"
	  lang="vi-VN"
<head> 
	<meta name="google-site-verification" content="WrtkS-hhabw79HpzDSfN98HrBfKLewNhOhxGz8FQuQ8" />
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="Googlebot" content="index,follow,NOODP" />
	<meta name="robots" content="index,follow,noodp" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if(isset($title)) echo $title; ?>" />
	<meta property="og:description" content="<?php if(isset($description)) echo $description; ?>" />
	<meta property="og:image" content="<?php if(isset($fb_image) && $fb_image!='') echo $fb_image;else echo $config->logo; ?>" />
	<meta property="og:url" content="<?php if(isset($fb_url) && $fb_url!='') echo $fb_url;else echo $url; ?>" />
	<meta property="og:site_name" content="<?php if(isset($title)) echo $title; ?>" />
	<meta property="fb:admins" content="100001283187916"/>
	<meta property="fb:app_id" content="214678972067158" />
	<!--ICON-->
	<link href="<?php if($config->icon!='') echo  $config->icon; ?>" rel="icon"/>
	<meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">
	<meta name="description" content="<?php if(isset($description)) echo $description; ?>">

	<title><?php if(isset($title)) echo $title; ?></title>
	<link rel="canonical" href="<?php if(isset($fb_url) && $fb_url!='') echo $fb_url;else echo $url; ?>" />
	<!--Reset css về mặc định trên các trình duyệt-->
	<link href="<?php echo $url_dir; ?>css/normalize.css"  rel="stylesheet" type="text/css"/>
    <!--Css dùng chung -->
	<link href="<?php echo $url_dir; ?>css/reset.css"  rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url_dir; ?>plugins/owl/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo $url_dir; ?>plugins/owl/owl.theme.css" rel="stylesheet" type="text/css" >
    <!--Thư viện hiệu ứng animate-->
    <link href="<?php echo $url_dir; ?>css/animate.min.css" rel="stylesheet" type="text/css"/>
     <!--css for supper slide -->
    <link href="<?php echo $url_dir; ?>plugins/supperslide/superslides.css" rel="stylesheet" type="text/css">
    <!--Thư viện icon font-awesome-->
    <link href="<?php echo $url_dir; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--Css chính cho toàn trang -->
	<link href="<?php echo $url_dir; ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url_dir; ?>css/reponsive.css" rel="stylesheet" type="text/css" >
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link  href="<?php echo $url_dir ?>plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
    <link  href="<?php echo $url_dir ?>plugins/validate/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <meta name="google-site-verification" content="WrtkS-hhabw79HpzDSfN98HrBfKLewNhOhxGz8FQuQ8" />
    
	
	

	<!--Jquery -->
    <script type="text/javascript" src="<?php echo $url_dir; ?>js/1.7.2.jquery.min.js"></script>


	
	<script src="<?php echo $url_dir; ?>js/jquery.appear.js"></script>
    
	<script language="javascript">
		var h = null; // Giờ
		var m = null; // Phút
		var s = null; // Giây
		
		var timeout = null; // Timeout
		
		function start()
			{
				/*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/
				if (h === null)
				{
					h = 2;
					m = 0;
					s = 0;
				}

				/*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
				// Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
				//  - giảm số phút xuống 1 đơn vị
				//  - thiết lập số giây lại 59
				if (s === -1){
					m -= 1;
					s = 59;
				}

				// Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
				//  - giảm số giờ xuống 1 đơn vị
				//  - thiết lập số phút lại 59
				if (m === -1){
					h -= 1;
					m = 59;
				}

				// Nếu số giờ = -1 tức là đã hết giờ, lúc này:
				//  - Dừng chương trình
				if (h == -1){
					clearTimeout(timeout);
					alert('Hết giờ làm bài !');
					return false;
				}

				/*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
				document.getElementById('gio').innerText = h.toString();
				document.getElementById('phut').innerText = m.toString();
				document.getElementById('giay').innerText = s.toString();

				/*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
				timeout = setTimeout(function(){
					s--;
					start();
				}, 1000);
			}
		
		function stop(){
			clearTimeout(timeout);
		}		
	</script>
	<script>
			jQuery(function($) {
			// Asynchronously Load the map API 
			var script = document.createElement('script');
			script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
			document.body.appendChild(script);
		});

		function initialize() {
			var map;
			var bounds = new google.maps.LatLngBounds();
			var mapOptions = {
				mapTypeId: 'roadmap'
			};
							
			// Display a map on the page
			map = new google.maps.Map(document.getElementById("map"), mapOptions);
			map.setTilt(45);
				
			// Multiple Markers
			var markers = [
				['<?php echo $config->map_cs1_address; ?>', <?php echo trim($config->map_cs1); ?>],
				['<?php echo $config->map_cs2_address; ?>',<?php echo trim($config->map_cs2); ?>]
			];
								
			// Info Window Content
			var infoWindowContent = [
				['<div class="info_content"><h3><?php echo $config->map_cs1_address; ?></h3></div>'],
				['<div class="info_content"><h3><?php echo $config->map_cs2_address; ?></h3></div>']
			];
				
			// Display multiple markers on a map
			var infoWindow = new google.maps.InfoWindow(), marker, i;
			
			// Loop through our array of markers & place each one on the map  
			for( i = 0; i < markers.length; i++ ) {
				var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
				bounds.extend(position);
				marker = new google.maps.Marker({
					position: position,
					map: map,
					title: markers[i][0]
				});
				
				// Allow each marker to have an info window    
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infoWindow.setContent(infoWindowContent[i][0]);
						infoWindow.open(map, marker);
					}
				})(marker, i));

				// Automatically center the map fitting all markers on the screen
				map.fitBounds(bounds);
			}

			// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
			var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
				this.setZoom(12);
				google.maps.event.removeListener(boundsListener);
			});
			
		}
	    </script>
	    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqmLidsemjpAxlB1Tb9wrGdHZkO6ZiEc&callback=initMap' async defer></script>
    <style type="text/css">
        #carousel{
            width:665px;
            height: 208px;
        }
        #carousel img {
            display: hidden; /* hide images until carousel prepares them */
            cursor: pointer; /* not needed if you wrap carousel items in links */
        }
    </style>
	

</head>
<body onload="start();">
<?php if($config->closed==1) echo $config->alert;else{  ?>

<header class="itq-header">
	<section class="wrapper">
    	<figure class="logo animated bounceInLeft col-sm-3 col-xs-4">
        	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>"><img title="<?php echo $config->title; ?>" alt="<?php echo $config->title; ?>" id="pic" src="<?php echo $config->logo; ?>"></a>
        </figure>
		<section class="head">
			<section class="search">
				<form method="get" action="">
					<input type="hidden" name="page" value="news">
					<input value="<?php if(isset($_REQUEST['txtSearch'])) echo $_REQUEST['txtSearch']; ?>" placeholder="Từ khoá tìm kiếm..." type="text" name="txtSearch" />
					<input type="submit" value=""/>
				</form>
			</section><!--.search-->	
			<nav>
				<p>Follow us :</p>
				<a target="_blank" href="<?php echo $config->facebook; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/face.png"/></a>
				<a target="_blank" href="<?php echo $config->youtube; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/tweet.png"/></a>
				<a target="_blank" href="<?php echo $config->google; ?>"><img class="f-icon" alt="<?php echo $config->title; ?>" title="<?php echo $config->title; ?>" src="<?php echo $url_dir; ?>images/goo.png"/></a>
			</nav>
			<nav class="contact">
				<p>Contact us :</p>
				<a href=""><img src="<?php echo $url_dir; ?>images/contact.png" alt="<?php echo $config->title; ?>"/></a>
			</nav>
		</section>
        <nav class="menu">
			<?php if($page!='' && $page!='home'){ 
				$lib->loadmenu('tb_menu','0','',$url,$_GET['page'],$_GET['id'],'vi');
			}else{ ?>
			<ul>
            	<li class="active"><a class="page-scroll" href="#home">Trang chủ</a></li>
                <li><a class="page-scroll" href="#about">Về chúng tôi</a></li>
				<li><a class="page-scroll" href="#calendar">Lịch khai giảng</a></li>
                <li><a class="page-scroll" href="#lecture">Bài giảng</a></li>
				<li><a class="page-scroll" href="#video">Video </a></li>
                <li><a class="page-scroll" href="#album">Góc vinh danh</a></li>
				<li><a class="page-scroll" href="#book">Đăng ký học</a></li>
				<li><a class="page-scroll" href="#contact">Liên hệ</a></li>
            </ul>
			<?php } ?>
        </nav>
    </section><!-- .wrapper -->
	
</header><!-- .itq-header -->
<section class="clear"></section>
<?php if($page!='' && $page!='home'){ echo '<img  style="margin-top:130px;width:100%" alt="trung tâm toeic building , tiếng anh" src="'.$url_dir.'uploads/baner.jpg"/>'; }?>
<?php if($file!='') require($file);?>

<footer class="itq-footer  wow bounce" data-wow-duration="2s"> 
	<section class="wrapper">
    	<section class="foot"> 
			<?php if(count(array_filter($viewed))>0){ ?>
            <ul> 
            	<li>
                	<h2>Bài viết xem nhiều nhất</h2>
                </li>
				<?php foreach($viewed as $key=>$item){if(is_array($item)){?>
			    <li>
                	<p><a   title="<?php echo ($item['title']!='')?$item['title']:''; ?> "  alt="<?php echo ($item['title']!='')?$item['title']:''; ?> " href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php echo ($item['title']!='')?$item['title']:''; ?> </a></p>
                </li>
				<?php }} ?>
		    </ul>
			<?php }else echo "<p class='nodata'>Không có dữ liệu</p>"; ?>
        </section> <!-- .foot -->
		<section class="foot"> 
            <?php if(count(array_filter($lectures))>0){ ?>
            <ul> 
            	<li>
                	<h2>Bài giảng</h2>
                </li>
				<?php foreach($lectures as $key=>$item){if(is_array($item)){?>
			    <li>
                	<p><a   title="<?php echo ($item['title']!='')?$item['title']:''; ?> "  alt="<?php echo ($item['title']!='')?$item['title']:''; ?> " href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php echo ($item['title']!='')?$item['title']:''; ?> </a></p>
                </li>
				<?php }} ?>
		    </ul>
			<?php }else echo "<p class='nodata'>Không có dữ liệu</p>"; ?>
        </section> <!-- .foot -->
		<section class="foot"> 
            <?php if(count(array_filter($khoahoc))>0){ ?>
            <ul> 
            	<li>
                	<h2>Các khoá học</h2>
                </li>
				<?php foreach($khoahoc as $key=>$item){if(is_array($item)){?>
			    <li>
                	<p><a   title="<?php echo ($item['title']!='')?$item['title']:''; ?> "  alt="<?php echo ($item['title']!='')?$item['title']:''; ?> " href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php echo ($item['title']!='')?$item['title']:''; ?> </a></p>
                </li>
				<?php }} ?>
		    </ul>
			<?php }else echo "<p class='nodata'>Không có dữ liệu</p>"; ?>
        </section> <!-- .foot -->
		<section class="clear"></section>
    </section><!-- .wrapper -->
	<section  class="copyright">
				<ul style="float:left" class="gtweb"> 
					<li>
						<h3 style="">Địa chỉ trung tâm</h3>
					</li>
					<li>
						Cơ sở 1 :  <?php echo $config->map_cs1_address; ?></a> 
					</li>
					<li>
						Cơ sở 2 :  <?php echo $config->map_cs2_address; ?></a> 
					</li>
					
				</ul>
				<ul style="float:left" class="gtweb"> 
					<li>
						<h3 style="">Thông tin liên hệ</h3>
					</li>					
					<li>
						Điện thoại :<?php echo $config->phone; ?></li>
					<li>
						Email : <?php echo $config->email; ?></li>
					<li>
						Website : <a target="_blank" href="<?php echo $config->website; ?>" title="" alt="" ><?php echo $config->website; ?></a>
					</li>
				</ul>
				
				<ul style="width:30%;float:left;padding-left:20px;" class="gtweb"> 
					
					<li>
						<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="website free tracking" ><script  type="text/javascript" >
try {Histats.start(1,3207669,4,406,165,100,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3207669&101" alt="website free tracking" border="0"></a></noscript>
<!-- Histats.com  END  -->
					</li>
				</ul>
				<section class="clear"></section>
		</section>
		<section style="border-top:1px solid #ccc;font-size:14px;background:#e2e2e2; padding-top:25px;font-family: Arial;" class="copyright"><p style="text-align: center;line-height:170%;"><span>
		<?php echo $config->footer; ?>

		</span></p></section>
</footer><!-- .itq-footer -->
<section class="clear"></section>
<div class="adleft" style="">
	<ul>
		<li class="st">
			<a href="<?php echo $url.'test.html' ?>" >Actual Test</a>	
		</li>
		<li class="st">
			<a href="<?php echo $url.'test.html?typ=1' ?>" >New Word</a>	
		</li>
		<li class="st">
			<a href="http://toeicbuilding.com/bai-giang/663.html" >Bài Giảng</a>	
		</li>
		
	</ul>
</div>
<div class="adright" style="">
	<ul>
		
		<li>
			<?php   if(isset($login) && $login->email!=''){ ?>			
			<a title="Click để xem thông tin tài khoản của bạn " href="<?php echo $url.'account.html'; ?>" ><?php echo $login->username; ?></a>	
			<?php }else{ ?>
			<a title="đăng nhập" href="<?php echo $url.'login.html' ?>" >Đăng nhập</a>	
			<?php } ?>
			
		</li>
		<li>
			<?php  if(isset($login) && $login->email!=''){ ?>			
			<a title="đăng xuất" href="<?php echo $url.'logout.html' ?>" >Đăng xuất</a>	
			<?php }else{ ?>
			<a title="đăng ký tài khoản để học tại toeic building" href="<?php echo $url.'register.html' ?>" >Đăng ký</a>		
			<?php } ?>
		</li>
		<li class="st">
			<?php  if(isset($login) && $login->email!=''){ ?>			
			<a style="padding-left:12px" title="đăng xuất" href="<?php echo $url.$lib->maketitle($login->fullname).'/2016'.$login->id.'.html'; ?>" >Đổi mật khẩu</a>	
			<?php }else{ ?>
			<a style="padding-left:8px" title="toeic building" href="<?php echo $url.'forgot-pass.html' ?>" >Quên mật khẩu</a>		
			<?php } ?>	
		</li>
	</ul>
</div>


<script>
$(window).scroll(function (){
	var topPage = $(window).scrollTop();
	if(topPage > 5) {
		$(".itq-header").addClass("itq-top");
		$(".itq-header .wrapper .logo a img").addClass("animated swing");
		document.getElementById("pic").src="<?php echo $url_dir; ?>uploads/lg2.jpg";
		
	
	}else{
		$(".itq-header").removeClass("itq-top");
		document.getElementById("pic").src="<?php echo $url_dir; ?>uploads/lg.png";	
	}
	var a = $('.itq-header').height();
	var c = $('.itq-wrapper ').height();
	var d = $('.adleft').height();
	var total = a + 20;
	var total_s = total + 8000 - d;
	var top = c - d;
	if (($(this).scrollTop() > total) && ($(this).scrollTop() < total_s)) {
		$('.adleft').css({top: '130px', position: 'fixed'});
		$('.adright').css({top: '130px', position: 'fixed'});
	} else if ($(this).scrollTop() > total_s) {
		$('.adleft').css({top: top, position: 'absolute'});
		$('.adright').css({top: top, position: 'absolute'});
	}else{
		$('.adleft').css({top: '130px', position: 'absolute'});
		$('.adright').css({top: '130px', position: 'absolute'});
	}
});
</script>
<div id="main-back-top">
	<div id="back-top">
		<center><a><img alt="lên đầu trang"  src="<?php echo $url_dir; ?>images/backtotop.png"/></a></center>
	</div>
	<script type='text/javascript'>
		$(function(){
			$(window).scroll(function(){
				if($(this).scrollTop()>200){$('#back-top').fadeIn();}
				else{$('#back-top').fadeOut();}
			});
			$('#back-top').click(function()
			{
				$('body,html').animate({scrollTop:0},800);
			});
		});
	</script>
</div>

<script src="<?php echo $url_dir; ?>js/wow.min.js"></script>
<!--Thư viện owl -->
<script src="<?php echo $url_dir; ?>plugins/owl/owl.carousel.js"></script>


<!--Thư viện superslide -->
<script src="<?php echo $url_dir; ?>plugins/supperslide/jquery.easing.1.3.js"></script>
<script src="<?php echo $url_dir; ?>plugins/supperslide/jquery.animate-enhanced.min.js"></script>
<script src="<?php echo $url_dir; ?>plugins/supperslide/hammer.min.js"></script>
<script src="<?php echo $url_dir; ?>plugins/supperslide/jquery.superslides.min.js"></script>
<script>new WOW().init();</script>  
<script>
	$(document).ready(function(e) {
		//owl-slide		
	   $("#owl-demo").owlCarousel({
			autoPlay: 10000, //Set AutoPlay to 3 seconds
			items : 2,
			itemsDesktop : [1020,2],
			itemsDesktopSmall :[788,2],
			itemsMobile :[480,2]
			
		});	
		$("#owl-demo-99").owlCarousel({
			  navigation : true,
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem : true,
			  autoPlay:true,
			  navigation : true,
			  pagination : false,
		});
		 
		 
		
        //goi slide supperslide
		$('#slides').superslides({
			play:10000,
			pagination:true,
			hashchange:false,
			inherit_width_from:'.itq-slider',
			inherit_height_from:'.itq-slider',
			animation:'fade'
			
		  });
		   //goi slide supperslide
		$('#slidepro').superslides({
			play:0,
			pagination:true,
			hashchange:false,
			inherit_width_from:'#slidepro',
			inherit_height_from:'#slidepro',
			
			
		  });
		 //icon 
		$('.f-icon').hover(function(e) {
			  $(this).addClass('animated wobble');
		  },function(e) {
		   $(this).removeClass('animated wobble');
		  }); 
    });
</script>
<script>
	// Hỗ trợ hiệu ứng trên thiết bị di động;
    window.open    = function(){};
    window.print   = function(){};
    
    if (false) {
      window.ontouchstart = function(){};
    }
</script>
<script>
//Hiệu ứng di chuyển đến block qua ID
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)-50
        }, 800);
        event.preventDefault();
    });
});
</script>
<!--<script type="text/javascript">
	var yourtitle="..:|:..<?php if(isset($title)) echo $title; ?>";
	var tocdo=200;
	var laptitle=null;
	function rotulo_title()
	{
	document.title=yourtitle;
	yourtitle=yourtitle.substring(1,yourtitle.length)+yourtitle.charAt(0);
	laptitle=setTimeout("rotulo_title()",tocdo);
	}
	rotulo_title();
</script>-->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '480284985486612',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
window.___gcfg = {lang: 'vi'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/platform.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<script>
$(document).ready(function(e) {
	$('.main li').hover(function(e) {
        $(this).find('ul:first').css({'display':'block'});
    },function(e) {
        $(this).find('ul:first').hide('fast');
    });
});
</script>


<script src="<?php echo $url_dir ?>plugins/validate/jquery.validationEngine-vi.js"></script>
<script src="<?php echo $url_dir ?>plugins/validate/jquery.validationEngine.js"></script>
<script src="<?php echo $url_dir ?>plugins/datetimepicker/jquery.datetimepicker.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$("form").validationEngine();
		$('.picker').datetimepicker({
			format:'d-m-Y'
		});
	 });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69246399-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69261505-1', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1683088768604882";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
    #cfacebook{
        position: fixed; 
        bottom: 0px;
        right: 8px;
        z-index: 999999999999999;
        width: 250px; height: auto;
        box-shadow: 6px 6px 6px 10px rgba(0,0,0,0.2);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        overflow: hidden;
    }
    #cfacebook .fchat{float: left; width: 100%; height: 295px; overflow: hidden; display: none; background-color: #fff;}
    #cfacebook .fchat .chat-single{float: left; line-height: 25px; line-height: 25px; color: #333; width: 100%;}
    #cfacebook .fchat .chat-single a{float: right; text-decoration: none; margin-right: 10px; color: #888; font-size: 12px;}
    #cfacebook .fchat .chat-single a:hover{color: #222;}

    #cfacebook .fchat .fb-page{margin-top: -130px; float: left;}
    #cfacebook a.chat_fb{
        float: left;
        padding: 0 25px;
        width: 200px;
        color: #fff;
        text-decoration: none;
        height: 40px;
        line-height: 40px;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);        
    
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);
        background-repeat: repeat-x;
        background-size: auto;
        background-position: 0 0;
        background-color: #F77213;
        border: 0;
        border-bottom: 1px solid #F77213;
        z-index: 9999999;
        margin-right: 12px; 
        margin-bottom: 0px; 
        font-size: 18px;}
   #cfacebook a.chat_fb:hover{color: yellow; text-decoration: none;}
</style>
<script>
    function fchat()
    {
            var tchat= document.getElementById("tchat").value;
            if(tchat==0 || tchat=='0')
            {                
                document.getElementById("fchat").style.display = "block";
                document.getElementById("tchat").value=1;
            }else{
                document.getElementById("fchat").style.display = "none";
                document.getElementById("tchat").value=0;
            }             
    }
    setTimeout(function() {document.getElementById("fchat").style.display = "none";}, 2000);
</script>
 
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb" onclick="javascript:fchat();"><i class="fa fa-comments"></i> Hỗ trợ trực tuyến</a>
    <div id="fchat" class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/TOEIC-Building-631606856877926/?fref=ts" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        <div class="chat-single"><a target="_blank" href="<?php echo $config->facebook; ?>"><i class="fa fa-facebook-square"></i> Fanpage Toeic Building </a></div>
    </div>
    <input type="hidden" id="tchat" value="0"/>
</div>


</body>



</html>