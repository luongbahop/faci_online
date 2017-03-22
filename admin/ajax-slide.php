<?php
require_once('connect.php');
require_once('controller/slide.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_slide))<1) echo ' <p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
 <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
			<th>Danh mục</th>
            <th>Ảnh</th>
            <th>Người tạo</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_slide); die;
            foreach($list_slide as $key=>$item)
            {
                if(is_array($item))
                {
        ?>
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php 
            if($n=='' || !isset($n)) $nn=1; else $nn=$n;
            echo $key= $key+1 + ($nn-1)*($_REQUEST['ipp']);
            
            ?></td>
            <td ><?php echo $item['title']; ?></td>
			<td ><?php 
                $sql_category="select * from tb_slide_group where id=".$item["parentid"];
                $category=$lib->selectone($sql_category);
                if($category->title=='') echo "-"; else echo $category->title;
                
            ?></td>
            <td><?php if($item['image']!='') {?><img width="240" src="<?php echo $item['image'];?>"> </td><?php }else echo "<p style='color:red;text-align:center;'>Chưa có ảnh</p> ";  ?></td>
            <td style="text-align:center"><?php 
                $sql_usercreated="select * from tb_user where id=".$item["userid_created"];
                $usercreated=$lib->selectone($sql_usercreated);
                if($usercreated->username=='') echo "-"; else echo $usercreated->username;
                echo '<br/>';
				if($item['created'] != '0000-00-00 00:00:00' && $item['created']!='') 
                    echo date('H:i d/m/Y', strtotime($item['created']));
                else echo '-';
            ?></td>
           <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=slide&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
           
            <td class="action-f col-md-1" style="text-align:center;">
            	<a  onClick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=slide&action=del&id=<?php echo $item['id'] ?>"> <i class="glyphicon glyphicon-remove"></i> </a> 
                <a href="<?php echo $url; ?>index.php?page=slide&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>"><i class="glyphicon glyphicon-pencil"></i></a>
                
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