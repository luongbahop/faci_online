<aside class="sidebar">
	<?php if(count(array_filter($list_cate))>0){ ?>
	<section class="block-side">
		<header>
			<h3>Danh mục bài viết</h3>
		</header>
		<article id="side" > 
			<ul class="list">
				<?php foreach($list_cate as $item){ ?>
				<li><a title="<?php echo isset($item['title'])?$item['title']:''; ?>" href="<?php echo $url.$item['alias'].'/66'.$item['id'].'.html'; ?>"><?php echo isset($item['title'])?$item['title']:''; ?></a>
				<?php
					$str_con="SELECT * FROM tb_article_category where publish=1  and parentid=".$item['id'];
					$con=$lib->selectall($str_con);
					if(count($con)>1)
					{
						echo '<ul class="item">';
							foreach($con as $vl)
							{
								echo '<li>';
								echo '<a href="'.$url.$vl['alias'].'/66'.$vl["id"].'.html">';
								echo $vl['title'];
								echo '</a>';
								echo '</li>';
							}
						echo '</ul>';
					}
				?>
				
				<?php } ?>
				</li>
			</ul>
		</article>    
	</section><!-- .feedback-customer--> 
	<?php } ?>
	<section class="clear"></section> 
	<section class="block-side">
		<header>
			<h3>Đăng kí học</h3>
		</header>
		<article>
		<form method="post" action="">
			<table>
				<tr>
					<td><input 
					name="data[fullname]" required 
					class="s_input" 
					placeholder="Họ và tên" 
					value="<?php echo ($login->fullname!='')?$login->fullname:''; ?>"
					type="text"/></td>
				</tr>
				<tr>
					<td><input 
					name="data[birthday]" required
					class="s_input picker" 
					placeholder="Ngày sinh" 
					type="text"/></td>
				</tr>
				<tr>
					<td><input 
					name="data[email]"
					class="s_input" 
					placeholder="E-mail"
					value="<?php echo ($login->email!='')?$login->email:''; ?>"
					type="email"/></td>
				</tr>
				<tr>
					<td><input 
					name="data[phone]" required
					class="s_input"
					placeholder="Số điện thoại" 
					value="<?php echo ($login->phone!='')?$login->phone:''; ?>"
					type="text"/></td>
				</tr>
				<tr>
					<td>
						<select name="data[place]" class="i_input" required>							
						<option value="">-----Cơ sở học----</option>
						<option>Cơ sở 1 : Nguyễn Chí Thanh</option>							
						<option>Cơ sở 2 : Đông Ngạc</option>						
						</select >
					</td>
				</tr>
				<tr>
					<td>
						<?php if(count(array_filter($khoahoc))>0){ ?>							
						<select name="data[class]" class="i_input" required>
						<option value=''>-----Lớp học----</option>
						<?php foreach($khoahoc as $key=>$item){if(is_array($item)){?>
							<option value="<?php echo $item['title']; ?>">
							<?php echo $item['title']; ?>
							</option>						
						<?php }} ?>							
						</select>							
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>					<input name="data[type]"  class="i_input"  type="hidden" value="1"/>					<input name="btnGui" class="s_submit" value="Đăng ký" type="submit"/>					</td>
				</tr>
			</table>
		</form>
		</article>
	</section><!-- .feedback-customer--> 
	<section class="clear"></section>  
	
	
	<section class="block-side">
		<header>
			<h3>Tư vấn - Hỏi đáp</h3>
		</header>    
		<article>
			<p class="text"><b>M</b>ọi thắc mắc mà bạn muốn  được chúng tôi tư vấn. Xin vui lòng liên hệ với chúng tôi. Chúng tôi sẽ giải đáp tận tình cho bạn !!!</p>
			<p class="hotline">Hotline:  <span><?php echo $config->phone; ?></span></p>
			<p class="email">Email: <a title="liên hệ" href="mailto:<?php echo $config->email; ?>"><?php echo $config->email; ?></a></p>                
		</article>
	</section><!-- .aks-->
	<section class="clear"></section> 
	<section class="share-fb">
		<header><h3>Chia sẻ facebook</h3></header>
		<section class="like-box">
			<section class="fb-like-box" data-href="<?php echo $config->facebook; ?>" data-width="236px" data-height="230px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></section>
			</section><!--.shate-fb-->
		</section><!--.like-box-->    
</aside><!--.sidebar-->