<?php
require_once('connect.php');
require_once('controller/menu.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_menu))<1) echo ' <p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Người tạo</th>
            <th>Người sửa</th>
            
           
          
            <th>Trạng thái</th>
            <th>Xử lý</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_menu); die;
            foreach($list_menu as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php echo $item['0'] ?></td>
            <td><?php $lib->casetitle($item['id'],$item['parentid'],$item['title'],'tb_menu'); ?></td>
             <td style="text-align:center"><?php 
                $sql_usercreated="select * from tb_user where id=".$item["userid_created"];
                $usercreated=$lib->selectone($sql_usercreated);
                if($usercreated->username=='') echo "-"; else echo $usercreated->username;
				echo '<br/>';
				if($item['created'] != '0000-00-00 00:00:00' && $item['created']!='') 
                    echo date('H:i d/m/Y', strtotime($item['created']));
                else echo '-';
                
            ?></td>
            <td style="text-align:center"><?php 
                $sql_userupdate="select * from tb_user where id=".$item["userid_updated"];
                $userupdate=$lib->selectone($sql_userupdate);
                if($userupdate->username=='') echo "-"; else echo $userupdate->username;
				echo '<br/>';
				 if($item['updated'] != '0000-00-00 00:00:00' && $item['updated']!='') 
                    echo date('H:i d/m/Y', strtotime($item['updated']));
                else echo '-';
                
            ?></td>
           
           
         
           <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=menu&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&n=<?php  echo $n;?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
           
            <td class="action-f col-md-1" style="text-align:center;">
                <a 
                    href="<?php echo $url; ?>index.php?page=menu&action=del&id=<?php echo $item['id'] ?>"
                    onClick="return confirm('Bạn có chắc muốn xoá không ?')"
                    >
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
                
                <a href="<?php echo $url; ?>index.php?page=menu&action=edit&form=1&id=<?php echo $item['id'] ?>">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
                
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