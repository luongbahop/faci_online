<?php
require_once('connect.php');
require_once('controller/module.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_module))<1) echo ' <p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
 <table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>Tiêu đề</th>
        <th>Tên Url</th>
        <th>Menu</th>
        <th>Icon</th>
        <th>Thứ tự</th>
        <th>Xử lý</th>
        
    </tr>
</thead>
<tbody>
    <?php
        //print_r($list_group); die;
        foreach($list_module as $key=>$item)
        {
            if(is_array($item))
            {
        
    ?>
   
    <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
        <td><?php echo $item['0'] ?></td>
        <td><?php echo $item['title'];?></td>
        <td><?php echo $item['url_name'];?></td>
        <td><?php echo $item['in_menu'];?></td>
        <td><?php echo $item['icon'];?></td>
        <td><?php echo $item['position'];?></td>
        
        <td class="action-f col-md-1" style="text-align:center;">
            <a 
                href="<?php echo $url; ?>index.php?page=module&action=del&id=<?php echo $item['id'] ?>"
                onClick="return confirm('Bạn có chắc muốn xoá không ?')"
                >
                <i class="glyphicon glyphicon-remove"></i>
            </a>
            
            <a href="<?php echo $url; ?>index.php?page=module&action=edit&form=1&id=<?php echo $item['id'] ?>">
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