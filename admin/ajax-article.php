<?php
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php

require_once('connect.php');
require_once('controller/article.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_article))<1) echo '<p class="well">Không có bản ghi nào cả !</p>';
else 
{
?>
 <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Danh mục</th>
            <th>Người tạo</th>
			<th>Tin nổi bật</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_article); die;
            foreach($list_article as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php 
            if($n=='' || !isset($n)) $nn=1; else $nn=$n;
            echo $key= $key+1 + ($nn-1)*($_REQUEST['ipp']);
            
            ?></td>
            <td style="max-width:340px;"> 
			<a href="<?php echo $url; ?>index.php?page=article&action=detail&id=<?php echo $item['id'] ?>">
			<?php echo $item['title']; ?>
            </a>
            </td>
            
             <td ><?php 
                $sql_category="select * from tb_article_category where id=".$item["parentid"];
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
                    href="<?php echo $url; ?>index.php?page=article&id=<?php echo $item["id"] ?>&hot=<?php echo $item["hot"] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['hot']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
             <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=article&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
           
            <td class="action-f col-md-1" style="text-align:center;">
                <a onclick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=article&action=del&&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
				<a href="<?php echo $url; ?>index.php?page=article&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
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