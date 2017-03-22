<?php
require_once('connect.php');
require_once('controller/user.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_user))<1) echo '<p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tài khoản</th>
            <th>Số bài viết</th>
            <th>E-mail</th>
            <th>Họ và tên</th>
            <th>Nhóm tài khoản</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($list_user as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php 
            if($n=='' || !isset($n)) $nn=1; else $nn=$n;
            echo $key= $key+1 + ($nn-1)*($_REQUEST['ipp']);
            
            ?></td>
            <td>
            <?php
				// kiểm tra trạng thái
				$online_s = $lib->selectall("select username,logined from tb_user where  logined > NOW()-60 and id=".$item['id']);
				if($lib->total($online_s)>0) echo '<i style="color:green;font-size:14px;" class="fa fa-circle"></i>'; else echo '<i style="color:#c0c0c0;font-size:14px;" class="fa fa-circle"></i>';
			?>
            <a href="<?php echo $url; ?>index.php?page=user&action=detail&id=<?php echo $item['id'] ?>"><?php echo $item['username'] ?></a></td>
            <td><?php $str_count="SELECT * FROM tb_article_item WHERE userid_created=".$item['id']; $_count=$lib->selectall($str_count); echo $lib->total($_count); ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['fullname'] ?></td>
             <td style="text-align:center"><?php 
                $sql_group="select * from tb_user_group where id=".$item["groupid"];
                $group=$lib->selectone($sql_group);
                if($group->title=='') echo "-"; else echo $group->title;
                
            ?></td>
            <td  class="status">
                <a 
                
                    href="<?php echo $url; ?>index.php?page=user&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td>
            <td class="action-f" style="text-align:center;">
                <a  onClick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=user&action=del&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>"> <i class="glyphicon glyphicon-remove"></i> </a> 
                <a href="<?php echo $url; ?>index.php?page=user&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>"> <i class="glyphicon glyphicon-pencil"></i> </a> 
            </td>
        </tr>
        <?php 
                }
           } 
        ?> 
    </tbody>
</table>
<div class="pagination"><?php $lib->viewpage($link.'&n='); ?></div>
<?php
}
?>