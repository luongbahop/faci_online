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
                        Cập nhật tài khoản
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
                            <p class="thongbao">Cập nhật tài khoản thành công !</p>
                            
                        </section>
                    <?php
                }
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
                                disabled
                                value="<?php echo $detail->username; ?>"
                                placeholder="Tài khoản"
                                data-validation-engine="validate[required,minSize[6]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
                                <br>
                                
                            </td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Bạn không thể thay đổi trường này</td>
                        </tr>
                        
                       
                        <tr >
                            <td class="forgot"><label for="email">Email</label><span> (*)</span></td>
                            <td class="input"><input 
                                name="register[email]" 
                                id="email" 
                                disabled
                                value="<?php echo $detail->email; ?>"
                                type="email" 
                                class="input-text"
                                data-validation-engine="validate[required,custom[email]]"
                                
                                placeholder="Email"  ></td>
                                <td style="text-align:left;width:165px;padding-left:0px"><span style="color:red;font-size:14px">Bạn không thể thay đổi trường này</span></td> 
                        </tr>
                        <tr>
                            <td class="forgot"><label for="fullname">Họ và tên</label><span> (*)</span></td>
                            <td class="input"><input 
                                name="register[fullname]" 
                                id="fullname" 
                                value="<?php echo $detail->fullname; ?>"
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
                                 value="<?php echo $detail->phone; ?>"
                                type="text" 
                                class="input-text" 
                                data-validation-engine="validate[required]"
                                placeholder="Số điện thoại"  ></td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Vui lòng nhập số điện thoại của bạn</span></td>    
                        </tr>
                        <tr>
                            <td class="forgot"><label for="birthday">Ngày sinh</label></td>
                            <td class="input"><input  value="<?php echo date('d-m-Y', strtotime($detail->birthday)); ?>" name="register[birthday]" id="birthday" type="text" class="input-text picker" placeholder="Ngày sinh"  ></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="forgot"><label for="sex">Giới tính</label></td>
                            <td>
                                <input <?php if($detail->sex==1) echo 'checked'; ?> name="register[sex]" id="sex" type="radio" value="1"  > <span style="color:#000;padding-right:20px">Nam</span>
                                <input <?php if($detail->sex==0) echo 'checked'; ?> name="register[sex]" id="sex" type="radio"  value="0"  > <span style="color:#000;">Nữ</span>
                           
                           </td>
                           <td></td>
                        </tr>
                        <tr>
                            <td class="forgot"><label for="address">Địa chỉ</label></td>
                            <td class="input"><input value="<?php echo $detail->address; ?>" name="register[address]" id="address" type="text" class="input-text" placeholder="Địa chỉ"  ></td>
                            <td style="text-align:left;width:165px;padding-left:0px"><span style="color:#444;font-size:14px">Nơi ở hiện tại của bạn </span></td>    
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
