<?php
//Tầng MODEL thực các nghiệp vụ của chương trình 
//Khai báo đối tượng LIB: OOP
class LIB
{
	private $page,$n;
	public $idall='';
/*
-----------------------------------------------------
-----------------------------------------------------
					DATABASE GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/	 
	//Phương thức ketnoi: có nhiệm chạy các hàm kết nối CSDL
	public function ketnoi($host,$user,$pass,$database_name)
	{	
		//Chạy hàm kết nối CSDL
		if(!mysql_connect($host,$user,$pass))die('Connection Server Error !');//In ra thông báo nếu hàm kết nối ko thành công
		//Chạy hàm lựa chọn CSDL
		if(!mysql_select_db($database_name))die('Connection Database Error!');//In ra thông báo nếu hàm lựa chọn ko thành công
		//Chạy lệnh xác định CSDL với font là utf8
		mysql_query("SET NAMES 'utf8'");
	}
	//Phương thức selectall : lấy nhiều bản ghi
	public function selectall($sql,$p=0)
	{
		$re=mysql_query($sql);//Chạy câu lệnh SQL truyền vào và gán giá trị trả về lên biến $re
		if($p>0){
			$num=mysql_num_rows($re);//Hàm lấy ra tổng số dòng trả về trong 1 câu lệnh SQL
			$this->page=ceil($num/$p);//Làm tròn số (luôn làm tròn lên)
			//Nếu có biến n trên URL thì gán vào biến n, nếu ko có thì mặc định giá trị 1
			if(isset($_GET['n']))$n=$_GET['n']; else $n=1;
			if($n>$this->page) $n=$this->page;
			if($n<1)$n=1;
			$this->n=$n;
			//Xây dựng công thức tính thứ tự bản ghi sẽ lấy
			$thutu=($n-1)*$p;
			//Thay đổi câu lệnh SQL truyền vào: nối thêm lệnh LIMIT vào cho nó
			$sql.=" LIMIT $thutu , $p";
			//Sau khi có lệnh SQL mới thì cần phải chạy câu lệnh mới đó
			$re=mysql_query($sql);
		}
		$data=array();
		//Sử dụng vòng lặp để trả về mảng 2 chiều
		while($data[]=mysql_fetch_array($re));
		return $data;//Phương thức trả về mảng 2 chiều
	}
	//Phương thức viewpage: Hiển thị danh sách phân trang cho người dùng lựa chọn 
	//Đối số $link: đường dẫn chưa link phân trang cho danh sách dữ liệu
	public function viewpage($link)
	{
		if($this->page>1)
		{
			$link=$url.$link;
			echo '<a href="'.$link.'1">Đầu</a> ';
			//Vòng lặp hiển thị danh sách trang bắt đầu từ 1 cho đến hết
			$truoc=$this->n-1;
			if($truoc>0)echo '<a href="'.$link.$truoc.'">Sau</a> ';
			$begin=$this->n-4;
			if($begin<1)$begin=1;
			$end=$this->n+5;
			if($end>$this->page)$end=$this->page;
			for($i=$begin;$i<=$end;$i++)
			{
				//Hiển thị đường link phân trang cho người dùng click
				if($i==$this->n)$class='active';else $class='';
				echo '<a href="'.$link.$i.'" class="'.$class.'">'.$i.'</a> ';
			}
			$tiep=$this->n+1;
			if($tiep<=$this->page)echo '<a href="'.$link.$tiep.'">Tiếp</a> ';
			echo '<a href="'.$link.$this->page.'">Cuối</a> ';
		}
		elseif($this->page==0){
			echo "<h3 style='text-align:center;'>Dữ liệu đang cập nhật !</h3>";
		}		
	}
	//Phương thức "selectone": lấy 1 bản ghi
	public function selectone($sql)
	{
		$re=mysql_query($sql);//Chạy câu lệnh SQL truyền vào và gán giá trị trả về lên biến $re
		//Sử dụng vòng lặp để trả về mảng 1 chiều	
		$row = mysql_fetch_object($re);
		return $row;//Phương thức trả về mảng 1 chiều
	}
	//PT insert: thêm dữ liệu trong mảng truyền vào lưu vào bảng tương ứng trong CSDL
	public function insert($tbname,$data='')
	{
		//gan ten truong = strcot , gia tri = strvalue
		foreach($data as $key=>$item){
			$strcot.=$key.',';
			$item=str_replace("'",' &rsquo; ',$item);
			$strvalue.="'".$item."'".",";
			$dulieu[]=$item;
		}
		$stht=trim($strcot,',');//Hủy dấu phẩy ở đầu và cuối 1 chuỗi
	    $strvalue=trim($strvalue,',');
	    //$stradd="INSERT INTO $tbname ( $stht ) VALUES  ( $strvalue )";die;
		$stradd="INSERT INTO $tbname ( $stht ) VALUES  ( $strvalue )";
		mysql_query($stradd);	
		$id=mysql_insert_id();
		return $id;
			
	}
	//PT update: sửa  dữ liệu trong mảng truyền vào lưu vào bảng tương ứng trong CSDL
	public function update($tbname,$data='',$id)
	{	
		foreach($data as $key=>$item){
			$strcot.=$key.',';
			$item=str_replace("'",' &rsquo; ',$item);
			$strvalue.=$key."='".$item."',";
			$dulieu[]=$item;
		}	
	    $strvalue=trim($strvalue,','); //Hủy dấu phẩy ở cuối và cuối 1 chuỗi
	    $stradd="UPDATE  $tbname SET $strvalue WHERE id = $id";
		if(mysql_query($stradd)) return true;else return false;			
	}
	//Phương thức  xoá dữ liệu
	public function delete($tbname,$where,$id='')
	{
		if($id>0){//Xóa 1 dòng
			mysql_query("DELETE FROM $tbname WHERE $where='$id'");
		}elseif(isset($_POST['cbitem']) && count($_REQUEST['cbitem']>0)){
			$listid=trim(implode(',',$_REQUEST['cbitem']),',');
			mysql_query("DELETE FROM $tbname WHERE $where IN ($listid)");
		}elseif(isset($_REQUEST['btnDelAll'])) mysql_query("DELETE FROM $where");
		return true;
	}
	//Phương thức getall: PT đệ quy lấy tất cả id trong 1 cây danh mục
	public function getall($table,$parent=0,$data=array(),$call=0)
	{	
		$this->idall.=$parent.',';
		if($call==0){
			$data=$this->selectall("SELECT id,parentid FROM $table WHERE publish=1  ORDER BY parentid ASC, id DESC");
		}
		foreach($data as $key => $item)
		{			
			unset($data[$key]);
			if($item['parentid']==$parent){$this->getall($table,$item['id'],$data,1);}
		}
		if($call==0) {return $this->idall;}//Trả về giá trị	
	}
/*
-----------------------------------------------------
-----------------------------------------------------
					SEND MAIL GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/	
	//Phương thức gửi mail
	public function sendmail($email,$name,$tieude,$noidung,$email_author,$pass_author,$website_name)
	{
		require_once('class.phpmailer.php');//Nhúng thư viện
		$mail=new PHPMailer;//Khởi tạo đối tượng gửi mail
		$mail->IsSMTP();//Mail được gửi dưới giao thức SMTP
		$mail->Host='smtp.gmail.com';//Khai báo HOST trung gian gửi mail
		$mail->Port=465;//Cổng chạy dịch vụ gửi mail của HOST trên
		$mail->SMTPAuth=true;//Bật chế độ xác thực tài khoản trên HOST
		$mail->Username=$email_author;//USERNAME trên gmail
		$mail->Password=$pass_author;//Password của tài khoản trên
		$mail->SMTPSecure='ssl';//Chế độ bảo mật SSL cho email
		//Phần 2: cấu hình các thông tin nội dung gửi mail
		if(is_array($email))
		{
			$mail->AddAddress('toeicbuilding@gmail.com','Toeic Building');
			foreach ($email as $key => $item) {
				
				$mail->AddBCC($item['email'], ' Thành viên ');
			}

		}else $mail->AddAddress($email,$name);//Khai báo EMail của người nhận
		$mail->FromName="Tiếng anh Toeic Building";//Tên của người gửi Email
		$mail->AddReplyTo($email_author);//Khai báo EMail của người nhận thư trả lời
		$mail->IsHTML(true);//Cho phép nội dung có HTML
		$mail->CharSet='utf8';//Cho phép sử dụng unicode (tiếng việt)
		$mail->Subject=$tieude;//Tiêu đề Email
		$mail->Body=$noidung;//Nội dung EMail
		//$mail->Send();//Gọi Phương thức SEND để gửi email đi
		if (!$mail->send()) {
			return false;
		} else {
			return true;
		}	
	}
/*
-----------------------------------------------------
-----------------------------------------------------
					COMMON GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/	
	//Phương thức fullurl :  lấy ra URL hiện tại
	public function fullurl(){
		if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)=='index.php')
		{
			$ssl = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? true:false;
			$sp = strtolower($_SERVER['SERVER_PROTOCOL']);
			$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
			$port = $_SERVER['SERVER_PORT'];
			$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
			$host = (isset($use_forwarded_host) && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
			$host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;
			return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
		}
	}
	//Phương thức linktube :  lấy ra link YTB
	public function linktube($link)
	{
		$link=str_replace('https://www.youtube.com/watch?v=','',$link);
		$link=str_replace('http://www.youtube.com/watch?v=','',$link);
		$link=str_replace('https://youtu.be/','',$link);
		$link=str_replace('http://youtu.be/','',$link);
		$link=str_replace('http2://www.youtube.com/embed/','',$link);
		$link=str_replace('http://www.youtube.com/embed/','',$link);
		return $link;
	}
	//Phương thức cut_string :  giới hạn số kí tự chuỗi hiển thị 
	function cut_string($string='',$len=230) 
	{ 
		if($len > strlen($string)){$len=strlen($string);}; 
		$pos = strpos($string, ' ', $len); 
		if($pos){$string = substr($string,0,$pos);}else{$string = substr($string,0,$len);}     
		return $string.''; 
	} 
	//PT loại bỏ ký hiệu đặc biệt : tạo alias cho tiêu đề bài viết , sản phẩm
	public function makeTitle($strTitle)
	{
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
	//Phương thức total : Đếm số phần tử trong mảng
	public function total($array)
	{
		$count=count(array_filter($array));
		return $count;//trả về số bản ghi
	}
	// Phương thức getIP : Lấy IP hiện tại
	function getIP(){
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		return $ip;
	}	
/*
-----------------------------------------------------
-----------------------------------------------------
					SHOPPING CART GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/	
	//Phương thức shoppingcart: quản lý giỏ hàng: THêm, Sửa, Xóa các sản phẩm trong 1 giỏ hàng
	public function shoppingcart($id,$sl=0,$type=false)
	{
		//$id: Mã sản phẩm
		//$sl: Số lượng sản phẩm sẽ mua
		//$type: kiểu sửa sản phẩm: false cộng thêm số lượng, true: thay thế số lượng
		if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=array();//Nếu giỏ hàng ko tồn tại
		$tim=false;//Khỏi tạo biến lưu trạng thái tìm kiếm sản phẩm trong giỏ hàng
		//Vòng lặp để duyệt mảng giỏ hàng tìm id sản phẩm xem có trong giỏ hàng hay không
		foreach( $_SESSION['giohang'] as $tt=>$sp)
		{//Mỗi vòng lặp lấy đc 1 mảng chứa thông tin sản phẩm: ID,SL
			if($id==$sp[0]){//Nếu tìm thấy sản phẩm
				if($sl<=0 || !is_numeric($sl)){//Xóa sản phẩm khỏi giỏ hàng
					unset($_SESSION['giohang'][$tt]);//Xóa phần tử với thứ tự ($tt) lấy đc
				}elseif($sl>0){//Sửa số lượng sản phẩm trong giỏ hàng
					$sl=round($sl);//Hàm làm tròn
					if($type==false)
						$_SESSION['giohang'][$tt]=array($id,$sp[1]+$sl);//Cộng thêm số lượng
					else 
						$_SESSION['giohang'][$tt]=array($id,$sl);//THay thế số lượng cũ
				}
				$tim=true;//THay đổi trạng thái tìm kiếm 
				break;//THoát khỏi vòng lặp
			}
		}
		//Kết thúc vòng lặp trên mà $tim vẫn bằng false thì ko tìm thấy sản phẩm-> Xử lý thêm sản phẩm
		if($tim==false) $_SESSION['giohang'][]=array($id,$sl);//THêm sản phẩm
	}
/*
-----------------------------------------------------
-----------------------------------------------------
					 ALERT GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/
	//PT js_header: di chuyển trang 
	public function js_header($url){
		echo '<script type="text/javascript">window.location.href = "'.$url.'"</script>';
	}
	//PT js_reload: load lại trang
	public function js_reload(){
		echo '<script type="text/javascript">window.location.href=window.location.href;</script>';
	}
	//PT js_reload: Dưa ra thông báo và di chuyển trang
	public function js_redirect($alert, $url){
		die('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript">alert(\''.$alert.'\'); location.href = \''.$url.'\';</script>');
	}
	//Hàm session thông báo
	function thongbao($thongbao,$color='success') 
	{ 
		$_SESSION['thongbao']=$thongbao;
		$_SESSION['start'] = time();
		$_SESSION['color'] = $color;
	} 
	function alert($alert)
	{
		if(isset($_GET['success']))
		{
		?>
            <div class="alert thongbao alert-success alert-dismissible" role="alert" style="position:absolute;top:0px;right:0px;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Alert : </strong> <?php echo $alert; ?>
            </div>
            <script>
                $(document).ready(function(e) {
                    $('.thongbao').delay(5000).fadeOut('slow');
                });
            </script>
	<?php
			}
                
               
	}
/*
-----------------------------------------------------
-----------------------------------------------------
					CREATE CHAR GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/
	//Phương thức getdoanhsothang : lấy về tổng doanh thu trong 1 tháng thuộc 1 năm nào đó
	function getdoanhsothang($month,$year)	
	{
		$timestart=$year.'-'.$month.'-01';
		$monthnext=$month+1;
		if($monthnext==13){
			$monthnext=1;
			$year++;
		}
		$timeend=$year.'-'.$monthnext.'-01';
		$strlay="SELECT SUM(total) AS tong FROM tb_cart WHERE '$timestart' <= created AND created < '$timeend' AND status=1";
		$re=mysql_query($strlay);
		$row = mysql_fetch_object($re);
		return $row->tong;
	}
	// Phương thức drawcharmonth : vẽ biểu đồ
	function drawcharmonth($arrmonth)
	{
		 /*Nhúng thư viện */ 
		 include("class/pData.class.php"); 
		 include("class/pDraw.class.php"); 
		 include("class/pImage.class.php"); 
		 /* khởi tạo đối tượng và truyền giá trị để vẽ */ 
		 $MyData = new pData();   
		 $MyData->addPoints($arrmonth,"Doanh số"); 
		 $MyData->setAxisName(0,"Doanh số (Tỷ VNĐ)"); 
		 $MyData->addPoints(array("Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"),"Month"); 
		 $MyData->setAbscissa("Month"); 
		 /* Tạo hình ảnh */ 
		 $myPicture = new pImage(980,620,$MyData); 
		 /* Cài đặt phông chữ mặc định trong hình ảnh */  
		 $myPicture->setFontProperties(array("FontName"=>"../model/fonts/calibri.ttf","FontSize"=>12)); 
		 /* Set the graph area */  
		 $myPicture->setGraphArea(70,60,980,600); 
		 $myPicture->drawGradientArea(70,60,980,600,DIRECTION_HORIZONTAL,array("StartR"=>200,"StartG"=>200,"StartB"=>200,"EndR"=>240,"EndG"=>240,"EndB"=>240,"Alpha"=>30)); 
		 /* Vẽ các dòng */  
		 $scaleSettings = array("DrawXLines"=>FALSE,"Mode"=>SCALE_MODE_START0,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM); 
		 $myPicture->drawScale($scaleSettings);  
		 /* Turn on shadow computing */  
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
		 /* Draw the chart */  
		 $myPicture->drawBarChart(array("Rounded"=>TRUE,"Surrounding"=>30)); 
		 /* Render the picture (choose the best way) */ 
		 $myPicture->autoOutput("pictures/example.drawBarChart.poll.png"); 
	}	
/*
-----------------------------------------------------
-----------------------------------------------------
					UNKNOW GROUP FUNCTION 
-----------------------------------------------------	
-----------------------------------------------------
*/	
	//PT loadmenu: đa cấp gọi dữ liệu đệ quy từ bảng danh mục
	public function loadmenu($table,$parent=0,$data=array(),$link,$page='module',$id='home',$lang='vi')
	{
		if($parent==0){//Nếu parent=0
			$data=$this->selectall("SELECT * FROM $table WHERE publish=1 and lang='$lang'");
		}
		//Kiểm tra và lặp mảng data bên trên
		$count=count($data);//Lấy ra tổng số dữ liệu trong mảng data
		if($count>0){//Nếu có dữ liệu thì mới lặp
			$tim=false;
			foreach($data as $key=>$item)
			{
				if(is_array($item))
				{
					if($item['parentid']==$parent){
						if($tim==false){
							$tim=true;
							echo '<ul class="main">';
						}
						unset($data[$key]);//Xóa bớt 1 phần tử trong mảng
						if($page==$item['module'] && $id==$item['module_id']) {echo '<li class="main active">'; }
						else if($page==$item['module'] && $id==$item['parentid']) {echo '<li class="main active">'; }
						else if($page==$item['module_id']) {echo '<li class="main active">'; } 
						else echo '<li class="main">';
						
						if($item['module']=='module')
						{
							echo '<a title="'.$item['title'].'" class="main" href="'.$link.$item['module_id'].'.html'.'">'.$item['title'].'</a>';	
						}
						else if($item['module']=='news')
						{ 
							echo '<a title="'.$item['title'].'" class="main" href="'.$link.$this->maketitle($item['title']).'/66'.$item['module_id'].'.html'.'">'.$item['title'].'</a>';
						}
						else if($item['module']=='detail-news')
						{ 
							echo '<a title="'.$item['title'].'" class="main" href="'.$link.$this->maketitle($item['title']).'/88'.$item['module_id'].'.html'.'">'.$item['title'].'</a>';
						}
						$this->loadmenu($table,$item['id'],$data,$link);//Gọi đệ quy
						echo '</li>';					
					}
				}
			}		
			if($tim==true) echo '</ul>';
		}
	}
	//PT loadselect: đa cấp gọi dữ liệu đệ quy từ bảng tbdanhmuc
	function loadoption($parent=0,$label='',$danhsach='',$checked='')
	{
		foreach($danhsach as $tt=>$item)
		{
			if($parent==$item['parentid'] && is_array($item))
			{
				if($parent==0) $tieude=$item['title'];
				else $tieude=$label.' &raquo; '.$item['title'];
				echo "<option value='".$item["id"]."' " . (($item["id"] == $checked) ? 'selected' : '') . " >";
				echo $tieude;
				echo '</option>';	
				unset($danhsach[$tt]);		
				$this->loadoption($item['id'],$tieude,$danhsach,$checked);
			}
		}
	}
	//PT casetitle: đa cấp gọi dữ liệu đệ quy 
	function casetitle($id='',$parentid='',$title='',$table='tb_article_category')
	{
		if($parentid==0) echo '<li>'.$title.'</li>';
		else 
		{
			$sql="select title , id , parentid from $table where id=".$parentid;
			$_parent=$this->selectone($sql);
			$parentid=$_parent->parentid;
			if($parentid==0) echo '<li>'.$_parent->title.' </li><li> &raquo;</li> '.'<li>'.$title.'</li>'; 
			else
			{
				$sql2="select title , id , parentid from $table where id=".$parentid;
				$_parent2=$this->selectone($sql2);
				echo '<li>'.$_parent2->title.'</li><li> &raquo;</li> <li>'.$_parent->title.'</li><li> &raquo; </li>'.$title.'</li>';
				$parentid=$_parent->parentid2;	
				if($parentid!=0) echo 'Không được vượt danh mục cấp 3 ! ';
			}
		}
	}
	//hien thi menu de quy n cap
	function menudequy($parentid,$tabluivao)
	{
	 // global $link; 
	  //hien thi ra tat ca con cua idmenu truyen vao
	  $sql = "select * from tb_article_category where parentid=".$parentid;
	  $result = mysql_query($sql);
	  while($row = mysql_fetch_array($result))
	  {
		  //in ra ten menu
		  echo $tabluivao."<a href='?mod=prod&act=prodSelect&id=".$row["id"]."'>".$row["title"]."</a>";
		
		  echo "<br />";
		  //goi de quy den con cua menu nay luon
		   menudequy($row["id"],$tabluivao."&nbsp;&nbsp;");
	  }
	}
	
	
	
	
	//Phương thức kiểm tra ROLE
	public function ckrole($page='',$action='',$id='',$loginadmin)
	{
		if($loginadmin->groupid==1) return true;
		else{
			//Check quyen
			$now_module="select * from tb_module where url_name='".$page."' and parentid=0";
			$now_module_id=$this->selectone($now_module);
			$str_checkrole="select * from tb_module_user_group where user_group_id=".$loginadmin->groupid." and module_id=".$now_module_id->id;
			$re=mysql_query($str_checkrole);
			$row=mysql_num_rows($re);
			if($row>0)
			{
				if($action!='')
				{
					//Check quyen
					$now_action="select * from tb_module where action='".$action."' and url_name='".$page."' and parentid!=0 ";
					$now_action_id=$this->selectone($now_action);
					$str_checkrole_action="select * from tb_module_user_group where user_group_id=".$loginadmin->groupid." and module_id=".$now_action_id->id;
					$re_action=mysql_query($str_checkrole_action);
					$row_action=mysql_num_rows($re_action);
					if($row_action>0)
					{
						if($id!='')
						{
							//Check quyen
							if($page=='user' && $loginadmin->id==$id)  return true; else $this->js_header($url.'index.php?page=error_404');
							$now_code="select * from ".$now_action_id->in_table." where userid_created='".$loginadmin->id."' and id= '".$id."' ";
							$re_code=mysql_query($now_code);
							$row_code=mysql_num_rows($re_code);
							if($row_code >0 ) return true; else $this->js_header($url.'index.php?page=error_404');	
						}
						else return true;
					}
					else $this->js_header($url.'index.php?page=error_404');	
				}
				else return true;
			}
			else $this->js_header($url.'index.php?page=error_404');	
		}
	}
	function login_google()
	{
		require_once 'google_login_oauth/src/Google_Client.php';
		require_once 'google_login_oauth/src/contrib/Google_Oauth2Service.php';
		session_start();

		$client = new Google_Client();
		$client->setApplicationName("Google UserInfo PHP Starter Application");

		$oauth2 = new Google_Oauth2Service($client);

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['token'] = $client->getAccessToken();
		  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		  return;
		}

		if (isset($_SESSION['token'])) {
		 $client->setAccessToken($_SESSION['token']);
		}

		if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['token']);
		  $client->revokeToken();
		}

		if ($client->getAccessToken()) {
		  $user = $oauth2->userinfo->get();
		  $logingoogle = $user;
		  $_SESSION['token'] = $client->getAccessToken();
		  return $logingoogle;
		} else {
		  return $authUrl = $client->createAuthUrl();
		}
		
		
	}
	
	

	

	
	
}


