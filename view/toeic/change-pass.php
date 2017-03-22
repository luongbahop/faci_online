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
                    <li onclick="browseKCFinder('','file')">
                        Thay đổi mật khẩu
                    </li> 
                </ul>
            </header>
            <section class="login">
            
            <?php
                if(isset($thongbao))
                {
                ?>
                <section class="alert">
                    <p class="thongbao"><?php echo $thongbao;?></p>
                    
                </section>

                <?php   
                } 
                else if(isset($_GET['typ']))
                {
                    ?>
                        <section class="alert">
                            <p class="thongbao">Cập nhật mật khẩu thành công !</p>
                            
                        </section>
                    <?php
                }
            ?>
                
                <form class="frmRes" name="frmRes" method="post" action="" enctype="multipart/form-data">
                    <table style="width:100%">
                        <tr >
                            <td class="forgot"><label for="username">Mật khẩu cũ</label><span> (*)</span></td>
                            <td class="input"><input 
                                name="register[oldpass]" 
                                id="oldpass" 
                                type="password" 
                                class="input-text" 
                                placeholder="Mật khẩu cũ"
                                data-validation-engine="validate[required,minSize[6]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
                                <br>
                                
                            </td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Tối thiểu 6 kí tự</td>
                        </tr>
                        <tr >
                            <td class="forgot"><label for="username">Mật khẩu mới</label><span> (*)</span></td>
                            <td class="input"><input 
                                name="register[password]" 
                                id="password" 
                                type="password" 
                                class="input-text" 
                                placeholder="Mật khẩu mới"
                                data-validation-engine="validate[required,minSize[6]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
                                <br>
                                
                            </td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Tối thiểu 6 kí tự</td>
                        </tr>
                        <tr >
                            <td class="forgot"><label for="username">Xác nhận </label><span> (*)</span></td>
                            <td class="input"><input 
                                name="register[repass]" 
                                id="repass" 
                                type="password" 
                                class="input-text" 
                                placeholder="Nhập lại mật khẩu mới"
                                data-validation-engine="validate[required,minSize[6]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
                                <br>
                                
                            </td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Tối thiểu 6 kí tự</td>
                        </tr>

                        
                      
                        <tr>
                            <td><input name="btnReset" type="reset"  class="btn" value="Làm lại"></td>
                            <td><input name="btnDangKy" type="submit" class="btn"  value="Cập nhật" ></td>
                            <td></td>
                        </tr>
                        
                    </table>
                </form>
               
                
              
            </section>
            
        </section><!-- .category-content-->
        <?php include('sidebar.php');  ?>
       
    </section><!--.wrapper-->
</section><!-- .itq-container -->
<section class="clear"></section>
