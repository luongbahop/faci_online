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
					<li>
						Quên mật khẩu
					</li>
					
				</ul>
			</header>
            <section class="login">
				<p class="thongbao">
				<?php 
					
					if(isset($_GET['typ']) && $_GET['typ']==1) echo "Tài khoản không tồn tại  !<br/>"; 
					else if(isset($_GET['typ']) && $_GET['typ']==2) echo "Cập nhật mật khẩu thất bại   !<br/>"; 
					else if(isset($_GET['typ']) && $_GET['typ']==3) echo "Gửi Email cập nhật mật khẩu thất bại  !<br/>";
					else if(isset($_GET['typ']) && $_GET['typ']==0) echo "Gửi Email lấy lại mật khẩu thành công !  Bạn vui lòng truy cập tài khoản E-mail để nhận mật khẩu mới !<br/>";
					
				?>
				</p>
            	<form class="frmForgot" name="frmForgot" method="post" action="" enctype="multipart/form-data">
                	<table>
                    	
                        <tr>
                        	<td class="forgot"><label for="email">Email của bạn</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="data[email]" 
                                id="email" 
                                type="text" 
								style="color:#000;height:50px;margin-top:1px"							
                                class="input-text"
                                data-validation-engine="validate[required,custom[email]]"
                                placeholder="Địa chỉ Email"  ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Địa chỉ E-mail của bạn </span></td>	
                        </tr>
                       
                       
                       
                        <tr>
                        	
                            <td><input name="btnQuenMK" type="submit" class="btn"  value="Gửi" ></td>
							<td></td>
							<td></td>
                        </tr>
                        
                    </table>
                </form>
				<?php require_once('view/widget/login_social.php'); ?>
            </section>
            
        </section><!-- .category-content-->
		<?php include('sidebar.php');  ?>
       
    </section><!--.wrapper-->
</section><!-- .itq-container -->
<section class="clear"></section>
