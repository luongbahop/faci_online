<?php
if($id!='')
{
	$this_cate="select * from tb_unit_category where id=".$id;
	$title_cate=$lib->selectone($this_cate);
}
?>
<section class="itq-container">
	<section class="wrapper">
		<section style="width:100%" class="main-content category-content">
            <header class="breabcrumb">
              	<ul>
                	<li>
                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>
                    </li>
					<li>
                    	&raquo;
                    </li>
                    <li>
						<?php if(isset($_GET['typ']) && $_GET['typ']==1 ) echo 'Test từ mới'; else echo 'Actual Test'; ?>
					</li>
                </ul>
            </header>
			<?php 
            if(isset($_GET['typ']) && $_GET['typ']==1 ) $typ=1;else $typ=0;
            if(count(array_filter($test))>0){ ?>
            <ul>
				<?php foreach($test as $key=>$item){if(is_array($item)){?>
                <li class="test">
                    <figure>
                        <a title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/88'.$item['id'].'.html'; ?>"><img alt="<?php echo ($item['title']!='')?$item['title']:''; ?>" title="<?php echo ($item['title']!='')?$item['title']:''; ?>" src="<?php echo ($item['image']!='')?$item['image']:$url_dir.'images/actual.png'; ?>"></a>
                        <figcaption>
                            <h4><?php echo ($item['title']!='')?$item['title']:''; ?></h4>
                            <p><?php echo ($item['description']!='')?$lib->cut_string($item['description'],230):''; ?></p>
                            <a  title="<?php echo ($item['title']!='')?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/11'.$item['id'].'.html?typ='.$typ; ?>"><img src="<?php echo $url_dir.'images/start.png'; ?>"</a>
                        </figcaption>
                    </figure>
                </li>
				 <?php }} ?>	
            </ul>
			<?php }else echo "<p class='nodata'>Không có dữ liệu !</p>"; ?>  
			<section class="clear"></section>
			<section class="pagination">
				<ul>
					<?php $lib->viewpage($link) ?>
				</ul>
			</section><!-- .pagination -->
        </section><!-- .category-content--> 
    </section><!--.wrapper-->
</section><!-- .itq-container -->
<section class="clear"></section>