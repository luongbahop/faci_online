<?php

$link='slide.html?t=1&n=';
//Lập trình slide học viên
$str_slide_hv="select * from tb_slide where publish=1 AND parentid=2 AND  lang='".$_lang."' order by position ASC, id DESC ";
$slide_hv=$lib->selectall($str_slide_hv);

//Lập trình slide cảm nhận
$str_slide_cn="select * from tb_slide where publish=1 AND parentid=3 AND  lang='".$_lang."' order by  position ASC, id DESC";
$slide_cn=$lib->selectall($str_slide_cn,$config->perpage);
//lap trinh tin tuc noi bat
$str_hotnews="select * from tb_article_item where publish=1 and  hot=1 and lang='".$_lang."' order by position ASC, id DESC limit 1 ";
$hotnews=$lib->selectone($str_hotnews);

//Lập trình tin tuc khac
$str_othernews="select * from tb_article_item where  publish=1 and  hot=1 and lang='".$_lang."' AND id!=".$hotnews->id." order by position ASC, id DESC limit 3";
$othernews=$lib->selectall($str_othernews);

$title=$config->title;
$keywords=$config->keywords;
$description=$config->description;
?>