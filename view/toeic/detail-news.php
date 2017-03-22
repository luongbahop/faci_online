<?php if($detail->title=='') include_once('error_404.php');else{ ?>

<?php

$this_item="select * from tb_article_item where id=".$id;

$parentid=$lib->selectone($this_item);

$p=$parentid->parentid;

$this_cate="select * from tb_article_category where id=".$p;

$title_cate=$lib->selectone($this_cate);

 

 ?>

<section class="itq-container">

	<section class="wrapper">

		<section class="main-content detail-article">

            <header class="breabcrumb">

              	<ul>

                	<li>

                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>

                    </li>
					<li>
                    	&raquo;
                    </li>
                    <li>

                    	<?php echo $lib->casetitle($title_cate->id,$title_cate->parentid,$title_cate->title); ?>

                    </li>
					<li>
                    	&raquo;
                    </li>
                    <li>
                    	<?php						
							echo $lib->cut_string($detail->title,40);
						?>

                    </li>

                </ul>

            </header>

            <article class="title">

                <h3><?php echo ($detail->title!='')?$detail->title:''; ?></h3>

				<ul class="info">

					<li class="user">Đăng bởi : <?php echo ($author->fullname!='')?'<a href="">'.$author->fullname.'</a>':'-'; ?></li>

					<li class="time">Đăng vào : <?php echo ($detail->created!='' && $detail->created!='0000-00-00 00:00:00')?date('H:i', strtotime($detail->created)).' ngày '.date('d-m-Y', strtotime($detail->created)):'-'; ?></li>

					<li class="view">Lượt xem : <?php echo ($detail->viewed!='')?$detail->viewed:'-'; ?></li>

				</ul>

            </article> 

            <article class="paragraph">
                <?php if($detail->image!='') { ?><img class="avatar" src="<?php echo $detail->image; ?>" width="200" style="padding:3px; border:1px solid #c0c0c0;margin-right:12px;margin-bottom:12px; " align="left"/><?php } ?>
                <?php echo ($detail->content!='')?$detail->content:'<h1 class="nodata">Nội dung bài viết đang được xây dựng</h1> '; ?>
           <div class="clear"></div>
            <?php
                 if($detail->file!='')
                 {
                 
                 ?>
                
                 <h3 style="font-size:20px;line-height:200%;padding-top:40px">TẢI FILE Ở ĐÂY ...</h3>
                 <h3><a title="<?php echo $detail->title; ?>" href="<?php  echo  $detail->file; ?>"><img  style="width:100px" src="http://fit.utc.edu.vn/view/cntt/images/download.jpg"/> </a></h3>
                 <?php } ?>
            </article>
			<section class='clear'> </section>
			<section class="fb-like" >

				<div class="button"><div class="fb-like" data-href='<?php echo  $url.$detail->alias."/88".$detail->id.".html"; ?>' data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></div>

				<div class="button"><div class="fb-share-button" data-href='<?php echo  $url.$detail->alias."/88".$detail->id.".html"; ?>' data-type="button_count"></div></div>

				<div class="button"><div class="g-plus" data-action="share" data-annotation="bubble"></div></div>

				<div class="button"><div class="g-plusone" data-size="medium"></div></div>

				<div class="clear"></div>

			</section><!-- .fb-like -->
            
            <section  

            	style="margin:15px 0px"

            	class="fb-comments" 

                data-href='<?php echo $url.$detail->alias."/88".$detail->id.".html"; ?>' 

                data-numposts="10" 

                data-width="700" 

                data-colorscheme="light">

           </section>
            <!--.fb-comments-->  

			
        </section><!-- .detail-article-->
		<?php include('sidebar.php'); ?>
        
    </section><!--.wrapper-->
    <section class="wrapper">
        <?php if(count(array_filter($same))>0){ ?>      
        <section class="article-relative">
            <h3>Bài viết liên quan</h3> 
            <ul>
                <?php foreach($same as $key=>$item){if(is_array($item)){?>

                <li style="width:40%;float:left;padding-right:20px;margin-bottom:20px;background:none;">
                    <img src="<?php echo $item['image']; ?>" width="100" align="left" >
                    <a style="padding-left:12px;" title="<?php echo isset($item['title'])?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php echo isset($item['title'])?$item['title']:''; ?></a>
                </li>

                <?php }} ?>
            </ul>   
        </section><!--article-relative-->    
        <?php } ?>  
    </section>
</section><!-- .itq-container -->

<section class="clear"></section>

<?php } ?>