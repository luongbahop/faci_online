<?php

//Lập trình slide chinh
$str_slide="select * from tb_slide where publish=1 AND parentid=1 AND  lang='".$_lang."' order by position ASC, id DESC limit 0,10";
$slide=$lib->selectall($str_slide);

//Lập trình slide học viên
$str_slide_hv="select * from tb_slide where publish=1 AND parentid=2 AND  lang='".$_lang."' order by position ASC, id DESC limit 0,10";
$slide_hv=$lib->selectall($str_slide_hv);

//Lập trình slide cảm nhận
$str_slide_cn="select * from tb_slide where publish=1 AND parentid=3 AND  lang='".$_lang."' order by RAND() limit 3";
$slide_cn=$lib->selectall($str_slide_cn);

//lap trinh giới thiệu home
$str_about="select * from tb_article_item where publish=1 and parentid=1 and  hot=1 and lang='".$_lang."' order by position ASC, id DESC limit 1 ";
$about=$lib->selectone($str_about);

//lap trinh video ngữ âm
$str_video_nguam="select * from tb_article_item where publish=1 and parentid=8  and lang='".$_lang."' order by position ASC, id DESC limit 1 ";
$video_nguam=$lib->selectone($str_video_nguam);

//lap trinh lịch khai giảng
$str_calendar="select * from tb_article_item where publish=1 and parentid=7  order by id DESC limit 1 ";
$calendar=$lib->selectall($str_calendar);


//lap trinh video khac
$str_video_khac="select * from tb_article_item where publish=1 and parentid=19  and lang='".$_lang."' order by id DESC limit 7 ";
$video_khac=$lib->selectall($str_video_khac);

//lap trinh video noi bat
$str_video_hot="select * from tb_article_item where publish=1 and parentid=20  and lang='".$_lang."' order by id DESC limit 3 ";
$video_hot=$lib->selectall($str_video_hot);



//lap trinh tin tuc noi bat
$str_hotnews="select * from tb_article_item where publish=1 and  hot=1 and lang='".$_lang."' order by position ASC, id DESC limit 1 ";
$hotnews=$lib->selectone($str_hotnews);

//Lập trình tin tuc khac
$str_othernews="select * from tb_article_item where  publish=1 and  hot=1 and lang='".$_lang."' AND id!=".$hotnews->id." order by position ASC, id DESC limit 3";
$othernews=$lib->selectall($str_othernews);




/*
//Lay ra danh muc hien thi o trang chu
$str_in_home="select * from tb_article_category where in_home=1 and   publish=1 and lang='".$_lang."'  order by position ASC, id ASC limit 10";
$in_home=$lib->selectall($str_in_home);
*/
$title=$config->title;
$keywords=$config->keywords;
$description=$config->description;
?>