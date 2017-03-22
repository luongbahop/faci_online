
<section class="itq-container">
	<section class="wrapper">
		<section class="main-content category-content  detail-article">
			<header class="breabcrumb">
              	<ul>
                	<li>
                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>
                    </li>
					<li>
                    	&raquo;
                    </li>
					<li>
                    	Đăng nhập
                    </li> 
                </ul>
            </header>
            <section class="login">
            	<p class="thongbao">
				<?php 
					if(isset($thongbao)) echo $thongbao.'<br/>'; 
					if(isset($_GET['typ']) && $_GET['typ']==1) echo "Bạn chưa đăng nhập hệ thống !<br/>"; 
					else if(isset($_GET['typ']) && $_GET['typ']==2) echo "Đăng ký tài khoản thành công ! <br/> Vui lòng truy cập Email bạn vừa đăng ký để kích hoạt tài khoản ( LINK có hiệu lực   trong vòng 3 ngày ) .";
					else if(isset($_GET['typ']) && $_GET['typ']==3) echo "Tài khoản đang bị khoá . Bạn vui lòng chờ sự phê  duyệt của quản trị viên .";
				?>
				</p>
            	<form method="post" action="" >
                	<table>
                    	<tr>
                        	<td class="user"><label for="username">Tài khoản</label></td>
                            <td class="input"><input name="info[username]" id="username" type="text" class="input-text" placeholder="Tài khoản" autofocus ></td>
                        </tr>
                        <tr>
                        	<td class="pass"><label for="password">Mật khẩu</label></td>
                            <td class="input"><input name="info[password]" id="password" type="password" class="input-text" placeholder="Mật khẩu " ></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td>
                            	<input name="ckRem" id="ckRem" type="checkbox">
                                <label style="color:blue" for="ckRem"> Ghi nhớ mật khẩu</label>
                                <a style="color:green" href="<?php echo $url?>forgot-pass.html">Quên mật khẩu</a>
                                <a style="color:violet" href="<?php echo $url?>register.html">Đăng kí tài khoản</a>
                             </td>
                        </tr>
                       
                        <tr>
                        	<td><input name="btnReset" type="reset"  class="btn" value="Nhập lại"></td>
                            <td><input name="btnLogin" type="submit" class="btn"  value="Đăng nhập"></td>
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


