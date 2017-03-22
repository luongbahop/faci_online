<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <a href="<?php echo $url; ?>">Trang chủ</a>
            </li>
            <?php  
			if(isset($page) && $page!='home' && $page!='')
			{
			?>
             <li class="active">
                 <a href="<?php if(isset($_GET['cat'])) echo $url.'index.php?page='.$page.'&cat='.$_GET['cat'] ; else echo $url.'index.php?page='.$page ?>">
				 	<?php 
						switch($page)
						{
							case'article':
							{
								echo 'Bài viết ';break;
							}
							case'category-article':
							{
								echo 'Danh muc bài viết ';break;
							}
							case'user':
							{
								echo 'Tài khoản ';break;
							}
							case'group-user':
							{
								echo 'Nhóm tài khoản ';break;
							}
							case'slide':
							{
								echo 'Slide ảnh';break;
							}
							case'slide-group':
							{
								echo 'Danh mục slide ảnh';break;
							}
							case'contact':
							{
								echo 'Đăng ký học ';break;
							}
							case'global-configs':
							{
								echo 'Cấu hình chung ';break;
							}
							case'module':
							{
								echo 'Modun chức năng';break;
							}
							case'role':
							{
								echo 'Phân quyền nhóm tài khoản ';break;
							}
							case'menu':
							{
								echo 'Menu chính ';break;
							}
							case'test':
							{
								echo 'Câu hỏi  ';break;
							}
							case'category-test':
							{
								echo 'Danh mục câu hỏi';break;
							}
							case'category-unit':
							{
								echo 'Đề actual test';break;
							}
							default:
							{
							echo $page;	break;
							}
						}
					 ?>
                 </a>
            </li>
            <?php
			}
			?>
            <?php  
			if(isset($page) && isset($action))
			{
			?>
             <li class="active">
                 <?php 
				 switch($action)
					{
						case'add':
						{
							echo 'Thêm mới ';break;
						}
						case'edit':
						{
							echo 'Chỉnh sửa ';break;
						}
						case'del':
						{
							echo 'Xoá ';break;
						}
						case'detail':
						{
							echo 'Chi tiết ';break;
						}
						default:
						{
							 echo $action;break;
						}
					}
				
				  ?>
            </li>
            <?php
			}
			
			?>
        </ol>
    </div>
</div>