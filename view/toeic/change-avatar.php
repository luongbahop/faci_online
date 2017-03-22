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
                        Thay đổi ảnh đại diện
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
                            <p class="thongbao">Cập nhật ảnh đại diện thành công !</p>
                            
                        </section>
                    <?php
                }
            ?>
                <div style="float:left;font-size:19px;">
                    <br><br>
                    <a href="" title="<?php echo $login->fullname; ?>"><img style="margin-right:50px;border:1px solid #444; padding:3px;" align="left" hspace="20" vspace="40" src="<?php if($detail->avatar!='') echo $detail->avatar; else echo $url_dir.'images/123.png'; ?>" width="173" alt=""></a>
                    Chọn file ảnh từ máy tính của bạn . Chỉ chấp nhận định dạng <span style="color:red;font-size:14px"> jpeg, png,gif
                </div>
                <section class="clear"></section>
                <form class="frmRes" name="frmRes" method="post" action="" enctype="multipart/form-data">

                    <table style="width:100%">
                        <tr >
                            <td class="forgot"><label for="f_file">Chọn ảnh</label><span> (*)</span></td>
                            <td class="input"><input 
                                name="f_file" 
                                id="f_file" 
                                type="file" 
                                style="border:1px solid #ccc;color:#444;padding:10px 2px;width:70%"
                
                                data-validation-engine="validate[required,minSize[6]]"
                                data-errormessage-value-missing="Bạn vui lòng nhập trường này !" 
                                autofocus >
                                <br>
                                
                            </td>
                            <td style="text-align:left;width:165px;padding-left:0px;color:#444"></td>
                        </tr>
                        
                        <tr>
                            
                            <td><input name="btnDangKy" type="submit" class="btn"  value="Cập nhật thay đổi" ></td>
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
