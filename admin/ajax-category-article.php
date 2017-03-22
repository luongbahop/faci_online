<?php
require_once('connect.php');
require_once('controller/category-article.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_category))<1) echo '<p class="well">Không có bản ghi nào cả !</p>';
else{
?>
  <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Số bài viết</th>
            <th>Người tạo</th>                  
            <th>Trạng thái</th>
            <th>Cập nhật</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($list_category as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php echo $item['0'] ?></td>
            <td class="col-md-3"><?php $lib->casetitle($item['id'],$item['parentid'],$item['title']); ?></td>
            
            <td><?php
				$_allid=trim($lib->getall('tb_article_category',$item["id"],'',0),',');
				$lib->idall='';
                $sql_number="select * from tb_article_item where parentid in ($_allid)";
                $number=$lib->selectall($sql_number);
                echo $count=count(array_filter($number));
             ?></td>
            
            <td style='text-align:center'><?php 
				echo'<b>';
                $sql_usercreated="select * from tb_user where id=".$item["userid_created"];
                $usercreated=$lib->selectone($sql_usercreated);
                if($usercreated->username=='') echo "-"; else echo $usercreated->username;
				echo '</b><br/>';
                if($item['created'] != '0000-00-00 00:00:00' && $item['created']!='') 
                    echo date('H:i d/m/Y', strtotime($item['created']));
                else echo '-';
            ?></td>
           
            <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=category-article&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&n=<?php echo $n; ?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
             
           
            <td class="action-f col-md-1" style="text-align:center;">
            	<a  onClick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=category-article&action=del&id=<?php echo $item['id'] ?>"> <i class="glyphicon glyphicon-remove"></i> </a> 
                <a href="<?php echo $url; ?>index.php?page=category-article&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
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