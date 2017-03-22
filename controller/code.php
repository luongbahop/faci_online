<?php
session_start();//Khởi động SESSION
$code=md5(rand().time()); //Mã hóa chuỗi sinh ra mặc đinh -> 32 ký tự
$code=substr($code,rand(0,26),3);//Cắt chuỗi lấy 6 ký tự từ 1 vị trí mặc định
$_SESSION['sercode']=$code;//Lưu lại giá trị mã bảo mật vào biến SESSION
//Vẽ mã bảo mật lên 1 bức ảnh
$img=imagecreatefrompng('b.png');//Tạo đối tượng ảnh từ 1 ảnh đã có
$red=imagecolorallocate($img,250,0,0);//Tạo mã màu đỏ cho hình ảnh
$font='Gabriola.ttf';//Khai báo biến chứa đường dẫn FONT
imagettftext($img,25,5,13,30,$red,$font,$code);//Vẽ đoạn văn bản lên đối tượng ảnh
header('Content-type: image/png');//ĐỊnh nghĩa lại kiểu dữ liệu cho file
imagepng($img);//Lệnh tạo mã nhị phân cho bức ảnh
imagedestroy($img);//Lệnh hủy biến $img
