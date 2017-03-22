<?php
require_once('connect.php');
require_once('controller/contact.php');
require_once('ajax-javascript.php');
if(count(array_filter($list_contact))<1) echo ' <p class="well">Không có bản ghi nào cả !</p>';
else
{
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Người gửi</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Khoá học</th>
			<th>Cơ sở</th>
			<th>Ngày sinh</th>
            <th>Ngày gửi</th>
            <th>Đã xem</th>
			<th>Cập nhật</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            //print_r($list_contact); die;
            foreach($list_contact as $key=>$item)
            {
                if(is_array($item))
                {
            
        ?>
       
        <tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
            <td><?php echo $item['0'] ?></td>
            <td><?php echo $item['fullname']; ?></td>
            <td><?php echo $item['phone']; ?></td>
            <td >
                <?php echo $item['email']; ?>
            </td>
            <td><?php echo $item['class']; ?></td>
			<td><?php echo $item['place']; ?></td>
			<td><?php echo $item['birthday']; ?></td>
            <td style="text-align:center"><?php
				if($item['created'] != '0000-00-00 00:00:00') 
                    echo date('H:i d/m/Y', strtotime($item['created']));
                else echo '-';
             ?></td>
           <td  class="status">
                <a 
                    href="<?php echo $url; ?>index.php?page=contact&id=<?php echo $item["id"] ?>&status=<?php echo $item["publish"] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                  <?php 
                   if($item['publish']=='0') echo "<i class='glyphicon glyphicon-lock'></i>"; else echo "<i class='glyphicon glyphicon-ok'></i>";
                   ?>
                </a>
            </td> 
			<td class="action-f col-md-1" style="text-align:center;">
				 <a onclick="return confirm('Bạn có chắc muốn xoá không ?')" href="<?php echo $url; ?>index.php?page=contact&action=del&&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
				<a href="<?php echo $url; ?>index.php?page=contact&action=edit&form=1&id=<?php echo $item['id'] ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
			</td>
        </tr>
       
        <?php
                }
           }if(count(array_filter($list_contact))<1) echo 'Không có bản ghi nào cả !';
        ?>
       
    </tbody>
</table>
<div class="pagination"><?php $lib->viewpage($link); ?></div>
<?php }?>