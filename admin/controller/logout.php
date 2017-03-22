<?php
unset($_SESSION['loginadmin']);//Hủy biến SESSION
unset($_COOKIE['rememberadmin']);//Hủy biến COOKIE
setcookie('rememberadmin','',time()-1);//Hủy file COOKIE
header('Location: index.php');
?>