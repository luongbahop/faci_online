<?php
session_start();
require_once('connect.php');
require_once('controller/test.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_test))<1) echo '<p class="well">Không có bản ghi nào cả !</p>';
else 
{
?>
 <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Câu</th>
            <th>Câu hỏi</th>
            <th>Danh mục</th>
            <th>Người tạo</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_test); die;
            foreach($list_test as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php echo $item['position'] ?></td>
            <td style="max-width:300px;min-height:150px;overflow:scroll"> 			
			<?php echo $item['question']; ?>
            </td>
            
             <td ><?php 
                $sql_category="select * from tb_test_category where id=".$item["parentid"];
                $category=$lib->selectone($sql_category);
                if($category->title=='') echo "-"; else echo $category->title;
                
            ?></td>
            <td style="text-align:center"><?php 
				echo '<b>';
                $sql_usercreated="select * from tb_user where id=".$item["userid_created"];
                $usercreated=$lib->selectone($sql_usercreated);
                if($usercreated->username=='') echo "-"; else echo $usercreated->username;
				echo '</b><br/>';
				if($item['created'] != '0000-00-00 00:00:00') 
                    echo date('H:i d/m/Y', strtotime($item['created']));
                else echo '-';
                
            ?></td>
			
             <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=test&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&cat=<?php echo $cat; ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
           
            <td class="action-f col-md-1" style="text-align:center;">
                <a onclick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=test&action=del&id=<?php echo $item['id'] ?>&cat=<?php echo $cat; ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
				<a href="<?php echo $url; ?>index.php?page=test&action=edit&form=1&id=<?php echo $item['id'] ?>&cat=<?php echo $cat; ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
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