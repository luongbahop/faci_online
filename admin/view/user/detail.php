<div class="col-md-12 row" >
	
 	<div class="table-responsive col-md-6 pull-left">
        <table class="table table-hover">
           
                <tr>
                    <td>Tài khoản</td>
                    <td><b><?php if($detail->username!='') echo $detail->username; else echo "Trống"; ?></b></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><b><?php if($detail->email!='') echo $detail->email; else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Nhóm tài khoản</td>
                    <td>
                     <b><?php 
						$sql_group="select * from tb_user_group where id=".$detail->groupid;
						$group=$lib->selectone($sql_group);
						if($group->title=='') echo "Trống"; else echo $group->title;
						
					?></b>
                    </td>  
                </tr>
                 <tr>
                    <td>Họ và tên</td>
                    <td><b><?php if($detail->fullname!='') echo $detail->fullname; else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Giới tính</td>
                    <td><b><?php if($detail->sex!=''){ if($detail->sex==1) echo"Nam";else echo "Nữ";} else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Sinh nhật</td>
                    <td><b><?php
						if($detail->birthday!= '0000-00-00 00:00:00' && $detail->birthday!='' ) 
							echo date('d/m/Y', strtotime($detail->birthday));
						else echo 'Trống';
					 ?></b></td>  
                </tr>
                 <tr>
                    <td>Trạng thái</td>
                    <td><b><?php if($detail->publish!=''){ if($detail->publish==1) echo"Hoạt động";else echo "Khoá";} else echo "Trống"; ?></b></td>  
                </tr>
                 <tr>
                    <td>Số điện thoại</td>
                    <td>
                     <b><?php if($detail->phone!='') echo $detail->phone; else echo "Trống"; ?></b>
                    </td>  
                </tr>
                
                 <tr>
                    <td>Địa chỉ</td>
                    <td>
                    <b><?php if($detail->address!='') echo $detail->address; else echo "Trống"; ?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Ngày đăng kí</td>
                    <td>
                     <b><?php
						if($detail->created!= '0000-00-00 00:00:00' && $detail->created!='' ) 
							echo date('H:i d/m/Y', strtotime($detail->created));
						else echo 'Trống';
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
                    <td>IP đăng nhập</td>
                    <td>
                    <b><?php if($detail->ip_logging!='') echo $detail->ip_logging; else echo "Trống"; ?></b>
                    </td>  
                </tr>
                <tr>
                    <td>Trình duyệt truy cập</td>
                    <td>
                    <b><?php if($detail->agent!='') echo $detail->agent; else echo "Trống"; ?></b>
                    </td>  
                </tr>
				<tr>
                    <td>Lần cuối đăng nhập</td>
                    <td>
                    <b><?php  if($detail->logined !='0000-00-00 00:00:00' && $detail->logined !='')  echo gmdate('d-m-Y H:i A ', strtotime($detail->logined)); else echo '-'; ?></b>
                    </td>  
                </tr>
                              
            
        </table>
    </div>
    <div class="table-responsive col-md-5 pull-right">
        <table class="table table-hover">
               
                <tr>
                    <td></td>
                    <td>
                     <b>
					 
					 <?php if($detail->avatar!='') echo "<img class='anhdaidien' src='".$detail->avatar."' width='250'" ;else echo "Chưa có ảnh đại diện"; ?></b>
                    </td>  
                </tr>
                <tr>
                	<td></td>
                    <td>
                	<a href="<?php echo $url; ?>index.php?page=user&action=edit&form=1&id=<?php echo $detail->id; ?>&redirect=<?php echo base64_encode($lib->fullurl());?>" class="btn btn-info">Chỉnh sửa</a>
                    </td>
                </tr>
                              
            
        </table>
    </div>
    
   
