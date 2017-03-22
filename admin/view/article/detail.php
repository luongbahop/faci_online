<div class="col-md-12 row" >
	
 	<div class="table-responsive col-md-6 pull-left">
        <table class="table table-hover">
           
                <tr>
                    <td>Tiêu đề</td>
                    <td><b><?php if($detail->title!='') echo $detail->title; else echo "Trống"; ?></b></td>
                </tr>
                 <tr>
                    <td>Danh mục</td>
                    <td>
                     <b><?php 
						$sql_group="select * from tb_article_category where id=".$detail->parentid;
						$group=$lib->selectone($sql_group);
						if($group->title=='') echo "Trống"; else echo $group->title;
						
					?></b>
                    </td>  
                </tr>
                 <tr>
                    <td>Tin mới</td>
                    <td><b><?php if($detail->hot!=''){ if($detail->hot==1) echo"Tin mới";else echo "Tin không mới";} else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Hẹn giờ</td>
                    <td><b><?php
						if($detail->timer!= '0000-00-00 00:00:00' && $detail->timer!='' )
						{
							$ngayhomnay = date("Y-m-d H:i:s"); // Năm/Tháng/Ngày
							$ngaysosanh = $detail->timer; // Năm/Tháng/Ngày
							if (strtotime($ngayhomnay) > strtotime($ngaysosanh)) {
							echo 'Đã xuất bản';
							}else{
							echo date('H:i d/m/Y', strtotime($detail->timer));
							} 
							
						}	
						else echo 'Đã xuất bản';
					 ?></b></td>  
                </tr>
                 <tr>
                    <td>Trạng thái</td>
                    <td><b><?php if($detail->publish!=''){ if($detail->publish==1) echo"Hoạt động";else echo "Khoá";} else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Lượt xem</td>
                    <td>
                     <b><?php if($detail->viewed!='') echo $detail->viewed; else echo "Trống"; ?></b>
                    </td>  
                </tr>
                
                 <tr>
                    <td>Đánh giá </td>
                    <td>
                    <b>Tốt</b>
                    </td>  
                </tr>
                <tr>
                    <td>Người viết bài</td>
                    <td>
                     <b><?php 
						$sql_usercreated="select * from tb_user where id=".$detail->userid_created;
						$usercreated=$lib->selectone($sql_usercreated);
						if($usercreated->username=='') echo "-"; else echo $usercreated->username;
						
					?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Ngày xuất bản</td>
                    <td>
                     <b><?php
						if($detail->created!= '0000-00-00 00:00:00' && $detail->created!='' ) 
							echo date('H:i d/m/Y', strtotime($detail->created));
						else echo 'Trống';
					 ?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Người chỉnh sửa bài viết</td>
                    <td>
                     <b><?php 
					 if($detail->userid_updated!='')
					 {
						$sql_userupdated="select * from tb_user where id=".$detail->userid_updated;
						$userupdated=$lib->selectone($sql_userupdated);
						if($userupdated->username=='') echo "-"; else echo $userupdated->username;
					 }else echo "Trống";
					?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Ngày chỉnh sửa</td>
                    <td>
                     <b><?php
						if($detail->updated!= '0000-00-00 00:00:00' && $detail->updated!='' ) 
							echo date('H:i d/m/Y', strtotime($detail->updated));
						else echo 'Trống';
					 ?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Thẻ Meta Title</td>
                    <td><b><?php if($detail->meta_title!='') echo $detail->meta_title; else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Thẻ Meta Keywords</td>
                    <td><b><?php if($detail->meta_keywords!='') echo $detail->meta_keywords; else echo "Trống"; ?></b></td>  
                </tr>
                <tr>
                    <td>Thẻ Meta Description</td>
                    <td><b><?php if($detail->meta_description!='') echo $detail->meta_description; else echo "Trống"; ?></b></td>  
                </tr>
                              
            
        </table>
    </div>
    <div class="table-responsive col-md-5 pull-right">
        <table class="table table-hover">
               
                <tr>
                    <td></td>
                    <td>
                     <b>
					 
					 <?php if($detail->image!='') echo "<img class='anhdaidien' src='".$detail->image."' width='250'" ;else echo "Chưa có ảnh đại diện"; ?></b>
                    </td>  
                </tr>
                <tr>
                	<td></td>
                    <td>
                	<a href="<?php echo $url; ?>index.php?page=article&action=edit&form=1&id=<?php echo $detail->id; ?>" class="btn btn-info">Chỉnh sửa</a>
                    </td>
                </tr>
                              
            
        </table>
    </div>
     <div class="table-responsive col-md-12 ">
        <table class="table table-hover">
               
                <tr>
                    <td>Trích dẫn</td>
                    <td>
					 <?php if($detail->description!='') echo $detail->description; else echo "Trống"; ?>
                    </td>  
                </tr>
                <tr>
                	<td>Nội dung</td>
                    <td>
                	<?php if($detail->content!='') echo $detail->content; else echo "Trống"; ?>
                    </td>
                </tr>
                              
            
        </table>
    </div>
    
   
