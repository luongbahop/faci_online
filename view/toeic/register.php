<section class="itq-container">
	<section class="wrapper">
		<section class="main-content category-content detail-article">
			<header class="breabcrumb">
              	<ul>
                	<li>
                    	<a title="<?php echo $config->title; ?>" href="<?php echo $url; ?>">Trang chủ</a>
                    </li>
					<li>
                    	&raquo;
                    </li>
					<li>
                    	Đăng ký tài khoản
                    </li> 
                </ul>
            </header>
            <section class="login">
            <p class="alert" style="color:rgba(255,0,0,1);">
				<?php
					if($validation_error['username']!='') echo $validation_error['username'].'<br>';  
					if($validation_error['email']!='') echo $validation_error['email'].'<br>'; 
					if($validation_error['isset_email']!='') echo $validation_error['isset_email'].'<br>'; 
				?>	
            </p>
            <?php
				if(isset($thongbao))
				{
				?>
                <section class="alert">
                	<h3><?php echo $thongbao;?></h3>
                    <p>Vui lòng truy cập tài khoản email để kích hoạt !</p>
                </section>
                <?php	
				}
				else
				{
			?>
            	
            	<form class="frmRes" name="frmRes" method="post" action="" enctype="multipart/form-data">
                	<table style="width:100%">
                    	<tr >
                        	<td class="forgot"><label for="username">Tài khoản</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="register[username]" 
                                id="username" 
                                type="text" 
                                class="input-text" 
                                placeholder="Tài khoản"
                                data-validation-engine="validate[required,minSize[6],custom[onlyLetterNumber]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
								<br>
								
							</td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Tài khoản tối thiểu 6 ký tự , không có khoảng trắng - dấu tiếng việt<br/>Ex: lucky_nhan</span></td>
                        </tr>
                        <tr>
                        	<td class="forgot"><label for="password">Mật khẩu</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="register[password]" 
                                id="password" 
                                type="password" 
                                class="input-text" 
                                data-validation-engine="validate[required,minSize[6]]"
                                placeholder="Mật khẩu " ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Mật khẩu không có khoảng trắng - dấu tiếng việt</span></td>		
                        </tr>
                        <tr>
                        	<td class="forgot"><label for="password">Xác nhận mật khẩu</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="txtrepass" 
                                id="password" 
                                type="password" 
                                class="input-text " 
                                data-validation-engine="validate[equals[password]]"
                                placeholder="Xác nhận mật khẩu " ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Nhập lại mật khẩu bạn vừa nhập</span></td>	
                        </tr>
                        <tr >
                        	<td class="forgot"><label for="email">Email</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="register[email]" 
                                id="email" 
                                type="email" 
                                class="input-text"
                                data-validation-engine="validate[required,custom[email]]"
                            	
                                placeholder="Email"  ></td>
								<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Email đăng ký phải là email thật để bạn có được những quyền lợi về sau như đổi mật khẩu...</span></td>	
                        </tr>
                        <tr>
                        	<td class="forgot"><label for="fullname">Họ và tên</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="register[fullname]" 
                                id="fullname" 
                                type="text" 
                                class="input-text" 
                                data-validation-engine="validate[required]"
                                placeholder="Họ và tên"  ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Vui lòng nhập đầy đủ họ tên của bạn</span></td>	
                        </tr>
						<tr>
                        	<td class="forgot"><label for="phone">Số điện thoại</label><span> (*)</span></td>
                            <td class="input"><input 
                            	name="register[phone]" 
                                id="phone" 
                                type="text" 
                                class="input-text" 
                                data-validation-engine="validate[required]"
                                placeholder="Số điện thoại"  ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Vui lòng nhập số điện thoại của bạn</span></td>	
                        </tr>
                        <tr>
                        	<td class="forgot"><label for="birthday">Ngày sinh</label></td>
                            <td class="input"><input name="register[birthday]" id="birthday" type="text" class="input-text picker" placeholder="Ngày sinh"  ></td>
							<td></td>
						</tr>
                        <tr>
                        	<td class="forgot"><label for="sex">Giới tính</label></td>
                            <td>
                           	    <input name="register[sex]" id="sex" type="radio" value="1"  > <span style="color:#000;padding-right:20px">Nam</span>
                                <input name="register[sex]" id="sex" type="radio"  value="0"  > <span style="color:#000;">Nữ</span>
                           
						   </td>
						   <td></td>
                        </tr>
                        <tr>
                        	<td class="forgot"><label for="address">Địa chỉ</label></td>
                            <td class="input"><input name="register[address]" id="address" type="text" class="input-text" placeholder="Địa chỉ"  ></td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Nơi ở hiện tại của bạn </span></td>	
						</tr>
                        <tr>
                        	<td class="forgot"><label for="txtcode">Mã bảo mật</label><span>(*)</span></td>
                        	<td class="input"> 
                            <input 
                             style="width:90px; height:40px;float:left;"
                             class="input-text"
                             value="" 
                             name="txtcode"
							 placeholder="Mã bảo mật"
                             data-validation-engine="validate[required,minSize[3]]"
                             id="txtcode"
                             type="text">
                             <img 
                                style="display:block;
                                float:left;margin-left:5px;" 
                                src="<?php echo $url; ?>controller/code.php" 
                                id="imgcode"
                                alt=""/>
                              <img src="<?php echo $url_dir; ?>images/reload.png" 
                                alt="" width="42" 
                                style="margin-left:10px;cursor:pointer;"
                                id="reload">  
                              <script>
                                 $(document).ready(function(e) {
                                    $('#reload').click(function(e) {
                                       $('#imgcode').attr('src','<?php echo $url; ?>controller/code.php');
                                    });
                                 });
                             </script>    
                    		</td>
							<td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Vui lòng nhập 3 ký tự</span></td>	
                       </tr>
                    
                       
                       
                        <tr>
                        	<td><input name="btnReset" type="reset"  class="btn" value="Làm lại"></td>
                            <td><input name="btnDangKy" type="submit" class="btn"  value="Đăng kí" ></td>
							<td></td>
						</tr>
                        
                    </table>
                </form>
				<?php require_once('view/widget/login_social.php'); ?>
				
                <?php
				}
				?>
            </section>
            
        </section><!-- .category-content-->
		<?php include('sidebar.php');  ?>
       
    </section><!--.wrapper-->
</section><!-- .itq-container -->
<section class="clear"></section>
