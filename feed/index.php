<?php
 // Thiết lập cấu trúc fiel là xml
header("Content-type: text/xml");

 // Hàm chuyển đổi những ký tự đặc biệt để khỏi lỗi XML
function xml_entities($string) {
    return str_replace(
            array("&", "<", ">", '"', "'"), array("&amp;", "&lt;", "&gt;", "&quot;", "&apos;"), $string
    );
}
//Hàm tạo url
function makeTitle($strTitle){
	$strTitle=strtolower($strTitle);
	//Code loại bỏ ký hiệu đặc biệt
	$strTitle=trim($strTitle);//Loại bỏ các dấu cách(khoảng trắng) ở đầu và cuối 1 chuỗi
	$strTitle=str_replace(' ','-',$strTitle);
	$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
	$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
	$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
	$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
	$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
	$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
	$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
	$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
	$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
	$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
	$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
	$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
	$strTitle=str_replace('đ','d',$strTitle);
	$strTitle=str_replace('Đ','d',$strTitle);
	$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
	return $strTitle;
}
include('../configs/config.php');
// Kết nối CSDL và lấy danh sách 10 tin mới nhất
$conn = mysqli_connect($host,$user, $pass, $database_name) or die("Connect server error !");
mysqli_set_charset($conn,"utf8");
$query = "SELECT * FROM tb_article_item order by id desc";
$result = mysqli_query($conn, $query);

// Lặp dư liệu và đưa ra các items XML
$items = '';
while ($row = mysqli_fetch_array($result)) {
	$alias=maketitle($row['title']);
    $items .= '<item>';
        $items .= "<title>" . xml_entities($row['title']) . "</title>";
        $items .= "<link>" . xml_entities("{$url}detail-news/{$alias}/{$row['id']}.html") . "</link>";
        $items .= "<description>" . xml_entities($row['description']) . "</description>";
        $items .= "<guid>" . xml_entities("{$url}detail-news/{$alias}/{$row['id']}.html") . "</guid>";
         $items .= "<pubDate>{$row['created']}</pubDate>";
    $items .= '</item>';
}

// Xuất thông tin website và nối $items vào
echo '<?xml version="1.0"?>
<rss version="2.0">
    <channel>
        <title> ' . xml_entities('Website của anh Hợp') . ' </title>
        <link>' . xml_entities("{$url}") . '</link>
        <description> ' . xml_entities('Website của anh Hợp là số 1 ') . ' </description>
        <language>vi_VN</language>
        '.$items.'
    </channel>
</rss>';
?>
	