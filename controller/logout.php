<?php
unset($_SESSION['login']);//Hủy biến SESSION
unset($_SESSION['logingoogle']);
unset($_SESSION['token']);

unset($_COOKIE['rememberuser']);//Hủy biến COOKIE
setcookie('rememberuser','',time()-1);//Hủy file COOKIE
$lib->js_header($url.'home.html');
?>