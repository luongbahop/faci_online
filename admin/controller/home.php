<?php
$title='Trang chủ-Trang quản trị';
$keywords='Trang quản trị ';
$description='Web site phát triển bởi anh Hợp đẹp trai';

$year=date('Y');
$month=date('m');
$timestart=$year.'-'.$month.'-01';
$monthnext=$month+1;
if($monthnext==13){
	$monthnext=1;
	$year++;
}
$timeend=$year.'-'.$monthnext.'-01';
//Dem so tai khoan moi
$newuser=count(array_filter($lib->selectall("SELECT * FROM tb_user where '$timestart' <= created AND created < '$timeend' ")));
//Dem so thu lien he moi
$newcontact=count(array_filter($lib->selectall("SELECT * FROM tb_contact where publish=0 ")));
//Dem so de thi
$allunit=count(array_filter($lib->selectall("SELECT * FROM tb_unit_category  ")));




?>