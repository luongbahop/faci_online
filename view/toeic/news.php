<?php
if($id!='')
{
	$this_cate="select * from tb_article_category where id=".$id;
	$title_cate=$lib->selectone($this_cate);
}
?>
<section class="itq-container">
	<section class="wrapper">
		<section class="main-content category-content">
            <header class="breabcrumb">
              	<ul>
                	<li>
                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>
                    </li>
					<li>
                    	&raquo;
                    </li>
                    <?php 

					    if($title_cate->title!='') 
						{echo $lib->casetitle($title_cate->id,$title_cate->parentid,$title_cate->title); }
						
						else echo '<li>Tìm kiếm</li>'; 
				   ?>
                </ul>
            </header>
			<?php if(count(array_filter($news))>0){ ?>
            <ul>
				<?php foreach($news as $key=>$item){if(is_array($item)){?>
                <li>
                    <figure>
                        <a title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><?php if(($item['image']!='')){ ?><img alt="<?php echo ($item['title']!='')?$item['title']:''; ?>" title="<?php echo ($item['title']!='')?$item['title']:''; ?>" src="<?php echo $item['image']; ?>"> <?php }else?> </a>
                        <figcaption>
                            <h4><?php echo ($item['title']!='')?$item['title']:''; ?></h4>
                            <p><?php echo ($item['description']!='')?$item['description']:''; ?></p>
                            <a title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><img src="<?php echo $url_dir; ?>images/more3.png" width="50px" alt="xem chi tiết "/></a>
                        </figcaption>
                    </figure>
                </li>
				 <?php }} ?>	
            </ul>
			<?php }else echo "<p class='nodata' style='font-size:22px;line-height:300%;'>Không có dữ liệu !</p>"; ?>  
			
			<section class="pagination">
				<ul>
					<?php $lib->viewpage($link); ?>
				</ul>			
			</section><!-- .pagination -->
			
		</section><!-- .category-content-->
		<?php include('sidebar.php'); ?> 
    </section><!--.wrapper-->
</section><!-- .itq-container -->
<section class="clear"></section>