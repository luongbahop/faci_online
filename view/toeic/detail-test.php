<?php if($detail->title=='') include_once('error_404.php');else{ ?>
<?php
$this_item="select * from tb_test_category where id=".$id;
$parentid=$lib->selectone($this_item);
$p=$parentid->parentid;
$this_cate="select * from tb_article_category where id=".$p;
$title_cate=$lib->selectone($this_cate);
 
 ?>
<link rel="stylesheet" href="<?php echo $url_dir.'plugins/media/'; ?>lib/circle-player/skin/circle.player.css">
<script type="text/javascript" src="<?php echo $url_dir.'plugins/media/'; ?>lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url_dir.'plugins/media/'; ?>dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo $url_dir.'plugins/media/'; ?>lib/circle-player/js/jquery.transform2d.js"></script>
<script type="text/javascript" src="<?php echo $url_dir.'plugins/media/'; ?>lib/circle-player/js/jquery.grab.js"></script>
<script type="text/javascript" src="<?php echo $url_dir.'plugins/media/'; ?>lib/circle-player/js/mod.csstransforms.min.js"></script>
<script type="text/javascript" src="<?php echo  $url_dir.'plugins/media/'; ?>lib/circle-player/js/circle.player.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
	{
		mp3: "<?php echo $detail->file; ?>",
		oga: "<?php echo $detail->file; ?>"
	}, {
		cssSelectorAncestor: "#cp_container_1",
		swfPath: "<?php echo  $url_dir.'plugins/media/'; ?>dist/jplayer",
		wmode: "window",
		canplay: function() {
			$("#jquery_jplayer_1").jPlayer("play");
		},
		keyEnabled: true
	});
	
	
});
</script>
<section class="itq-container">
	<section class="wrapper">
		<section style="width:100%" class="main-content detail-article">
            <!--<header class="breabcrumb">
              	<ul>
                	<li>
                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>
                    </li>
                    <li>
                    	Actual Test
                    </li>
                    <li>
                    	<?php
							if((strlen($detail->title)>50))
							{
								echo $lib->cut_string($detail->title,50);
							}
							else echo $detail->title;
						
						?>
                    </li>
                </ul>
            </header>-->

            <article class="paragraph" style="width:100%">
				<section class="title-test">
					<h3><?php  echo $detail->title;?> </h3>
					<p></p>
				</section>
				<section class="clear"></section>
				
				<?php if(isset($_POST['btnNopbai'])){ //thi xong ?>
				<section class="detail-test">
				<?php
					if(isset($_GET['typ']) && $_GET['typ']==0 ) $str_cat1="SELECT * FROM tb_test_category where publish=1 and parentid=0";
					else $str_cat1="SELECT * FROM tb_test_category where publish=1 and parentid=0 limit 1,1";
					$cat1=$lib->selectall($str_cat1);
					$kq=0;
					$kq1=0;
					$kq2=0;
					$stt1=0;
					foreach($cat1 as $item1) {if(is_array($item1)){
					$stt1++;
				?>
					<h2 class="cat1"><?php echo $item1['title']; ?></h2>
					<p class="cat1">
						<?php echo $item1['description']; ?>
					</p>
					<?php
						$str_cat2="SELECT * FROM tb_test_category where publish=1 and parentid=".$item1['id'];
						$cat2=$lib->selectall($str_cat2);
						$stt2=0;
						foreach($cat2 as $item2) {if(is_array($item2)){
						$stt2++;
					?>
					<h3 class="cat2"><?php echo $item2['title']; ?></h3>
					<p class="cat1">
						 <?php echo $item2['description']; ?>
					</p>
					
					<section class="question">
						<?php
							$str_cat3="SELECT * FROM tb_test_item where publish=1 and parentid=".$item2['id']." and catid=".$id." order by position ASC  ";
							$cat3=$lib->selectall($str_cat3);
							$stt3=0;
							foreach($cat3 as $k3 => $item3) {if(is_array($item3)){
								$stt3++;
								$iditem='number'.$item3['id'];
								if($_POST[$iditem]==$item3['answer'] && $stt1==1) $kq1++;
								if($_POST[$iditem]==$item3['answer'] && $stt1==2) $kq2++;
						?>
						<h4 class="question"><?php if($item3['title']!='') echo $item3['title'];else echo ''; ?></h4>
						<h2 class="<?php if($_POST[$iditem]==$item3['answer']) {echo 'dung';}else echo 'sai'; ?>"><?php echo "Question number  ".$item3['position']." : ".$item3['question']; ?> ( <?php if($_POST[$iditem]==$item3['answer']) {echo '<span style="color:blue;font-size:22px;">ĐÚNG</span>';}else echo '<span style="color:#F60;font-size:22px;">SAI</span>'; ?> )</h2>
						<ul class="answer <?php if($stt2==1 or $stt2==2) echo "part1"; ?>">
							<li class="<?php if($item3['answer']==1) echo "dung"; ?>"><span>( A ) <?php if($item3['answer']==1) echo '<i style="color:red;font-size:20px;" class="fa fa-check"></i>'; ?></span><input <?php if($_POST[$iditem]==1) echo 'checked'; ?> type="radio" name="number<?php echo $item3['id']; ?>" value="1"><?php echo $item3['answer_a']; ?></li>
							<li class="<?php if($item3['answer']==2) echo "dung";  ?>"><span>( B ) <?php if($item3['answer']==2) echo '<i style="color:red;font-size:20px;" class="fa fa-check"></i>'; ?></span><input <?php if($_POST[$iditem]==2) echo 'checked'; ?> type="radio" name="number<?php echo $item3['id']; ?>" value="2"><?php echo $item3['answer_b']; ?> </li>
							<li class="<?php if($item3['answer']==3) echo "dung";  ?>"><span>( C ) <?php if($item3['answer']==3) echo '<i style="color:red;font-size:20px;" class="fa fa-check"></i>'; ?></span><input <?php if($_POST[$iditem]==3) echo 'checked'; ?> type="radio" name="number<?php echo $item3['id']; ?>" value="3"><?php echo $item3['answer_c']; ?> </li>
							<?php if($stt2!=2 || $stt1!=1){ ?>
							<li class="<?php if($item3['answer']==4) echo "dung";  ?>"><span>( D )<?php if($item3['answer']==4) echo '<i style="color:red;font-size:20px;" class="fa fa-check"></i>'; ?></span><input <?php if($_POST[$iditem]==4) echo 'checked'; ?> type="radio" name="number<?php echo $item3['id']; ?>" value="4"><?php echo $item3['answer_d']; ?> </li>
							<?php } ?>
						</ul>
						<br/>
						<section class="clear"></section>
						<?php }}//cat3 ?>	
						
					</section>
					<?php }}//cat2 ?>	
					
				<?php }} //cat1?>	
				</section>
				<p style="font-size:2em;color:green;font-family: 'Myriad Pro Condensed';text-transform:uppercase;padding:30px;">kết quả :<br/><BR/><?php 
				$str_cat4="SELECT * FROM tb_test_item where publish=1 and catid=".$id;
				$cat4=$lib->selectall($str_cat4);
				$number_question=count(array_filter($cat4));
				$point1=0;
				$point2=0;
				if($kq1>=0 && $kq1<=6) $point1=5;
				else if($kq1 > 6 && $kq1<=25 ) $point1=(($kq1-7)*5)+10;
				else if($kq1 > 25 && $kq1<=34 ) $point1=(($kq1-26)*5)+110;
				else if($kq1 > 34 && $kq1<=43 ) $point1=(($kq1-35)*5)+160;
				else if($kq1 > 43 && $kq1<=46 ) $point1=(($kq1-44)*5)+210;
				else if($kq1 ==47 ) $point1=230;
				else if($kq1 ==48 ) $point1=240;
				else if($kq1 > 48 && $kq1<=52 ) $point1=(($kq1-49)*5)+245;
				else if($kq1 > 52 && $kq1<=55 ) $point1=(($kq1-53)*5)+270;
				else if($kq1 > 55 && $kq1<=58 ) $point1=(($kq1-56)*5)+290;
				else if($kq1 > 58 && $kq1<=63 ) $point1=(($kq1-59)*5)+310;
				else if($kq1 > 63 && $kq1<=66 ) $point1=(($kq1-64)*5)+340;
				else if($kq1 > 66 && $kq1<=69 ) $point1=(($kq1-67)*5)+360;
				else if($kq1 > 69 && $kq1<=76 ) $point1=(($kq1-70)*5)+380;
				else if($kq1 > 76 && $kq1<=79 ) $point1=(($kq1-77)*5)+420;
				else if($kq1 > 79 && $kq1<=82 ) $point1=(($kq1-80)*5)+440;
				else if($kq1 > 82 && $kq1<=90 ) $point1=(($kq1-83)*5)+460;
				else if($kq1 > 90 && $kq1<=100 ) $point1=495;
				else $point1="Lỗi không xác định .";
				
				if($kq2>=0 && $kq2<=15) $point2=5;
				else if($kq2 > 15 && $kq2<=24 ) $point2=(($kq2-16)*5)+10;
				else if($kq2 > 24 && $kq2<=27 ) $point2=(($kq2-25)*5)+60;
				else if($kq2 > 27 && $kq2<=32 ) $point2=(($kq2-28)*5)+80;
				else if($kq2 > 32 && $kq2<=37 ) $point2=(($kq2-33)*5)+110;
				else if($kq2 > 37 && $kq2<=40 ) $point2=(($kq2-38)*5)+140;
				else if($kq2 > 40 && $kq2<=45 ) $point2=(($kq2-41)*5)+160;
				else if($kq2 > 45 && $kq2<=48 ) $point2=(($kq2-46)*5)+190;
				else if($kq2 > 48 && $kq2<=55 ) $point2=(($kq2-49)*5)+210;
				else if($kq2 > 55 && $kq2<=60 ) $point2=(($kq2-56)*5)+250;
				else if($kq2 > 60 && $kq2<=63 ) $point2=(($kq2-61)*5)+280;
				else if($kq2 > 63 && $kq2<=66 ) $point2=(($kq2-64)*5)+300;
				else if($kq2 > 66 && $kq2<=71 ) $point2=(($kq2-67)*5)+320;
				else if($kq2 > 71 && $kq2<=76 ) $point2=(($kq2-72)*5)+350;
				else if($kq2 > 76 && $kq2<=88 ) $point2=(($kq2-77)*5)+380;
				else if($kq2 > 88 && $kq2<=91 ) $point2=(($kq2-89)*5)+445;
				else if($kq2 ==92 ) $point2=465;
				else if($kq2 ==93 ) $point2=470;
				else if($kq2 > 93 && $kq2<=97 ) $point2=(($kq2-94)*5)+480;
				else if($kq2 > 97 && $kq2<=100 ) $point2=495;
				
				$dulieu=array(
					'userid_created'=>$login->id,
					'catid'=>$_GET['id'],
					'kq1'=>$kq1,
					'point1'=>$point1,
					'kq2'=>$kq2,
					'point2'=>$point2,
					'total'=>($point1+$point2),
					'created'=>gmdate('Y-m-d H:i:s', time() +7*3600 )				
				);
				if($lib->insert('tb_point',$dulieu))
				{
					echo "<span style='color:red;'> PHẦN LISTENING ( ".$kq1.' ) </span> CÂU ĐÚNG ('.$point1.' point )<BR/><BR/>'; 
					echo "<span style='color:red;'> PHẦN READING ( ".$kq2.' ) </span> CÂU ĐÚNG ('.$point2.' point ) <BR/><BR/>'; 
					echo "<span style='color:red;'> TỔNG ĐIỂM : ".($point1+$point2)." point ";
				}
				
				?></p>
				<p style="text-right:center;padding:30px;float:right;margin-right:10%;"><a class="btn" href="<?php echo $url.'test.html'; ?>">Danh sách bài test</a></p>
				<?php 
				}else{ //đang thi
					if(isset($_GET['typ']) && $_GET['typ']==0 ) {
				?>
				<!-- The jPlayer div must not be hidden. Keep it at the root of the body element to avoid any such problems. -->
				<div id="jquery_jplayer_1" class="cp-jplayer"></div>

				<!-- The container for the interface can go where you want to display it. Show and hide it as you need. -->
				
				<div id="cp_container_1" class="cp-container">
					<div class="cp-buffer-holder"> <!-- .cp-gt50 only needed when buffer is > than 50% -->
						<div class="cp-buffer-1"></div>
						<div class="cp-buffer-2"></div>
					</div>
					<div class="cp-progress-holder"> <!-- .cp-gt50 only needed when progress is > than 50% -->
						<div class="cp-progress-1"></div>
						<div class="cp-progress-2"></div>
					</div>
					<div class="cp-circle-control"></div>
					<ul class="cp-controls">
						<li><a class="cp-play" tabindex="1">play</a></li>
						<li><a class="cp-pause" style="display:none;" tabindex="1">pause</a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
					</ul>
				</div>
				<script>
					function web_function(event){
						 event.stopPropagation();
						// execute a bunch of action to preform
					});

					function add_ClickEvent() {
					   $('#cp_container_1').on('click', function(event){
						   web_function(event)
					   });
					}
				</script>
				<section  class="time">					
					<span  id="gio">Giờ</span>:<span id="phut">Phút</span>:<span id="giay">giây</span>
				</section>
				<?php } ?>
				<form method="post" action="" id="sendResult">
				
				<?php 
					$type_unit=$lib->selectone("SELECT * FROM tb_unit_category WHERE id=".$_GET['id']);
					if($type_unit->type==1) echo '<section class="detail-test"><h2 class="cat1">Từ mới</h2>'.$type_unit->new_word.'</section>';
				?>
					
				<section class="detail-test">
				<?php
					if(isset($_GET['typ']) && $_GET['typ']==0 ) $str_cat1="SELECT * FROM tb_test_category where publish=1 and parentid=0";
					else $str_cat1="SELECT * FROM tb_test_category where publish=1 and parentid=0 limit 1,1";
					$cat1=$lib->selectall($str_cat1);
					$stt1=0;
					foreach($cat1 as $item1) {if(is_array($item1)){
					$stt1++;
				?>
					<h2 class="cat1"><?php echo $item1['title']; ?></h2>
					<p class="cat1">
						<?php echo $item1['description']; ?>
					</p>
					<?php
						$str_cat2="SELECT * FROM tb_test_category where publish=1 and parentid=".$item1['id'];
						$cat2=$lib->selectall($str_cat2);
						$stt2=0;
						foreach($cat2 as $item2) {if(is_array($item2)){
						$stt2++;
					?>
					<h3 class="cat2"><?php echo $item2['title']; ?></h3>
					<p class="cat1">
						 <?php echo $item2['description']; ?>
					</p>
					
					<section class="question">
						<?php
							$str_cat3="SELECT * FROM tb_test_item where publish=1 and parentid=".$item2['id']." and catid=".$id." order by position ASC  ";;
							$cat3=$lib->selectall($str_cat3);
							$stt3=0;
							foreach($cat3 as $k3 => $item3) {if(is_array($item3)){
								$stt3++;
						?>
						<h4 class="question"><?php if($item3['title']!='') echo $item3['title'];else echo ''; ?></h4>
						<h2><?php echo "Question number  ".$item3['position']." : ".$item3['question']; ?></h2>
						<ul class="answer <?php if($stt2==1 or $stt2==2) echo "part1"; ?>">
							<li><span>( A )</span><input type="radio" name="number<?php echo $item3['id']; ?>" value="1"><?php echo $item3['answer_a']; ?></li>
							<li><span>( B )</span><input type="radio" name="number<?php echo $item3['id']; ?>" value="2"><?php echo $item3['answer_b']; ?> </li>
							<li><span>( C )</span><input type="radio" name="number<?php echo $item3['id']; ?>" value="3"><?php echo $item3['answer_c']; ?> </li>
							<?php if($stt2!=2 || $stt1!=1){ ?>
							<li><span>( D )</span><input type="radio" name="number<?php echo $item3['id']; ?>" value="4"><?php echo $item3['answer_d']; ?> </li>
							<?php } ?>
						</ul>
						<br/>
						<section class="clear"></section>
						<?php }}//cat3 ?>	
						
					</section>
					<?php }}//cat2 ?>	
					
				<?php }} //cat1?>	
				</section>
				<p style="text-right:center;padding:30px;float:right;margin-right:10%;"><input onclick=" return confirm('Bạn có chắc muốn nộp bài chưa ? ');" type="submit" value="Nộp bài" name="btnNopbai" class="btn" /></p>
                </form>
				
				<?php
				}
				?>
            </article>
		<h1>Phản hồi từ học viên !</h1>
		<section  

			style="margin:15px 0px"

			class="fb-comments" 

			data-href='<?php $url.$detail->alias."/11".$detail->id.".html"; ?>' 

			data-numposts="10" 

			data-width="700" 

			data-colorscheme="light">

	   </section>
        </section><!-- .detail-article--> 
    </section><!--.wrapper-->
	 
</section><!-- .itq-container -->
<section class="clear"></section>
<?php } ?>