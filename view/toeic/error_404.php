<?php
$title='Không tìm thấy trang';
$keywords=$config->keywords;
$description=$config->description;

?>

<section class="itq-container">
	<section class="wrapper">
		<section class=" detail-article">
        	<figure class="notfound">
            	<img src="<?php echo $url_dir; ?>images/pnf.png">
                <figcaption>
                 	<h2>Xin lỗi bạn !</h2>
                    <h3>						<?php if(isset($_GET['typ']) && $_GET['typ']==1) echo "Đăng kí khoá học thất bại !<br/>"; ?>
                    	Hệ thống không tìm thấy thông tin bạn cần!<br> 
                        Bạn có thể tra cứu lại thông tin trên website<br>
					</h3>
					<section class="search" style="margin-top:0px;margin-left:0px;margin-bottom:10px;">
						<form >
							<input placeholder="Từ khoá tìm kiếm..." type="text" name="" />
							<input type="submit" value=""/>
						</form>
					</section><!--.search-->
					<section class="clear"></section>
					<h3>		
						hoặc  <a href="<?php echo $url; ?>">Quay lại trang chủ</a>
                    </h3>
                </figcaption>
            </figure><!--notfound-->  
				
        </section>
        
    </section>
</section><!--end .itq-master-wrapper-->
<section class="clear"></section>