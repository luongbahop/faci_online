<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link href="<?php echo $url_dir ?>images/admin.png" rel="icon">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>css/style1.css">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>css/login.css">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>css/bootstrap.min.css">
<script src="<?php  echo $url_dir ?>js/jquery-1.11.0.js"></script>
<script src="<?php  echo $url_dir ?>js/bootstrap.min.js"></script>
</head>
<body>
	<section class="top">
    	<h3>Đăng nhập phần mềm quản lý website</h3>
    </section>
    <?php  if($thongbao!='') {?>
         <div 
         	class="alert thongbao alert-danger alert-dismissible" role="alert" >
              <button type="button"  class="close" data-dismiss="alert"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong><?php echo isset($thongbao)?$thongbao:''; ?></strong> 
        </div>
		<script>
			$(document).ready(function(e) {
				$('.thongbao').delay(10000).fadeOut('slow');
			});
		</script>
    <?php	 
		 }
    ?>
	<div class="container">
      <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4 bglogin">
      <h1 class="text-center login-title"><b>ĐĂNG NHẬP HỆ THỐNG</b></h1>
      <div class="account-wall">
      <img class="profile-img"  src="<?php  echo $url_dir ?>images/admin.png"alt="">
      
      <form class="form-signin" action="" method="post" name="frmLogin">
          <input 
          	   type="text" 
               class="form-control" 
               placeholder="Tài khoản" 
               name="datalogin[username]" 
               required
               autofocus>
          <br>      
          <input 
          	   type="password" 
               class="form-control"
               placeholder="Mật khẩu" 
               name="datalogin[password]"
               required>
          <button class="btn btn-lg btn-primary btn-block" name="btnGui" type="submit">Đăng nhập</button>
          <label class="checkbox pull-left">
          	 <input type="checkbox" value="remember-me" name="datalogin[cbrem]" checked>
         	 Ghi nhớ
          </label>
          <a href="../index.php?page=forgot-pass" class="pull-right need-help">Quên mật khẩu </a><span class="clearfix"></span>
      </form>
      </div>
     
      
      </div>
      </div>
      </div>
	<footer class="container">
	<h3 class="trungtam " >
    	Học viện công nghệ VietPro - Vietpro Education
    </h3>
    <h3 class="myname ">
    	CopyRight @ <?php echo gmdate('Y', time() + 7*3600);?> , Hệ thống được phát triển bởi  <a target="_blank" href="http://hocthietkeweb.net.vn/">VietPro</a>
    </h3>
</footer>
</body>
</html>
<script type="text/javascript">
var yourtitle="Đăng nhập ..:|:.. Chào mừng bạn đã truy cập phần mềm quản lý website ..:|:.. ";
var tocdo=200;
var laptitle=null;
function rotulo_title()
{
document.title=yourtitle;
yourtitle=yourtitle.substring(1,yourtitle.length)+yourtitle.charAt(0);
laptitle=setTimeout("rotulo_title()",tocdo);
}
rotulo_title();
</script>