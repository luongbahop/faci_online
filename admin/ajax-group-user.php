<?php
session_start();
require_once('connect.php');
require_once('controller/group-user.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_group))<1) echo ' <p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
 <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề (Phân quyền)</th>
            <th>Số thành viên</th>
            <th>Đăng nhập QT</th>
            <th>Người tạo</th>
            <th>Người sửa</th>
            <th>Trạng thái</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_group); die;
            foreach($list_group as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php echo $item['0'] ?></td>
            <td><a title="Phân quyền cho nhóm tài khoản được đăng nhập trang quản trị" href="<?php echo $url; ?>index.php?page=role"><?php echo $item['title'];?></a></td>
            <td style="text-align:center"><?php
                $sql_member="select * from tb_user where groupid=".$item["id"];
                $member=$lib->selectall($sql_member);
                echo count(array_filter($member));
             ?></td>
            <td><?php
               if($item['allow']==1) echo "Được phép";
               if($item['allow']==0) echo "Không được phép";
             ?></td>
            
             <td style="text-align:center"><?php 
			 echo '<b>';
             if($item["userid_created"]!='')
             {
                $sql_usercreated="select * from tb_user where id=".$item["userid_created"];
                $usercreated=$lib->selectone($sql_usercreated);
                if($usercreated->username=='') echo "-"; else echo $usercreated->username;
             }
            else echo '-';
			echo '</b><br/>';
			if($item['created'] != '0000-00-00 00:00:00' && $item['created']!='') 
				echo date('H:i d/m/Y', strtotime($item['created']));
			else echo '-';
                
            ?></td>
            <td style="text-align:center"><?php 
			echo '<b>';
            if($item["userid_updated"]!='')
            {
                $sql_userupdate="select * from tb_user where id=".$item["userid_updated"];
                $userupdate=$lib->selectone($sql_userupdate);
                if($userupdate->username=='') echo "-"; else echo $userupdate->username;
            }
            else echo '-';
			echo '</b><br/>';
			if($item['updated'] != '0000-00-00 00:00:00' && $item['updated']!='') 
				echo date('H:i d/m/Y', strtotime($item['updated']));
			else echo '-';
                
            ?></td>
         
             <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=group-user&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
            <td class="action-f col-md-1" style="text-align:center;">
                <a  href="<?php echo $url; ?>index.php?page=group-user&action=del&id=<?php echo $item['id'] ?>" onClick="return confirm('Bạn có chắc muốn xoá không ?')" ><i class="glyphicon glyphicon-remove"></i></a>
                
                <a href="<?php echo $url; ?>index.php?page=group-user&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>"> <i class="glyphicon glyphicon-pencil"></i></a>
                
            </td>
        </tr>
       
        <?php
                }
           }
        ?>
       
    </tbody>
</table>
<div class="pagination"><?php $lib->viewpage($link); ?></div>
<?php } ?>