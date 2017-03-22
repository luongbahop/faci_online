
<section class="login-social">

<h2>Hoặc đăng nhập bằng :</h2>
<!--<a  title="login facebook" href=""><img title="login facebook" alt="login facebook" src="<?php echo $url_dir.'images/loginfb.png'; ?>"/></a>-->
<a title="login google" href=" <?php if( !is_array( $lib->login_google() )) echo $lib->login_google();  ?> "><img title="login google" alt="login google" src="<?php echo $url_dir.'images/logingg.png'; ?>"/></a>
</section>