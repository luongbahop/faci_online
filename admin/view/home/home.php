<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $newuser; ?></div>
                        <div>Tài khoản mới đăng kí</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url; ?>index.php?page=user&new=true">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div><!--end-->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $newcontact; ?></div>
                        <div>Mới đăng ký học</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url; ?>index.php?page=contact&new=true">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div><!--end-->
	<div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $allunit; ?></div>
                        <div>Actual test</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url; ?>index.php?page=category-unit">
                <div class="panel-footer">
                    <span class="pull-left">Chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div><!--end-->
     
</div>
<!-- /.row -->
<div class="row">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="row ">
				<div style="text-align:center">KẾT QUẢ ACTUAL TEST</div>
			</div>
		</div>
		<?php 
		$list_point=$lib->selectall("SELECT * FROM tb_point order by id DESC",20); 
		$link='index.php?page=home&n=';
		?>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Tài khoản</th>
					<th>Đề thi</th>
					<th>LISTENING</th>
					<th>READING</th>
					<th>Tổng điểm</th>
					<th>Ngày thi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					//print_r($list_article); die;
					foreach($list_point as $key=>$item)
					{
						if(is_array($item))
						{
					
				?>
			   
				<tr <?php if(($key%2==0)) echo "class=''"; else echo "class='primary'";  ?>>
					<td><?php echo $item['id'] ?></td>
					<td style="max-width:340px;"> 
					<a href="<?php echo $url; ?>index.php?page=user&action=detail&id=<?php echo $item['userid_created'] ?>">
					<?php 
					$user=$lib->selectone("SELECT * FROM tb_user where id=".$item['userid_created']);
						echo $user->username; 		
					?>
					</a>
					</td>
					
					<td >
					
					<?php 
					$unit=$lib->selectone("SELECT * FROM tb_unit_category where id=".$item['catid']);
						echo $unit->title; 		
					?>
					
					</td>
					<td style="text-align:center">
					<?php 
						echo "<p>Số câu đúng : ".$item['kq1']." <span style='color:red'>( ".$item['point1']." point )</span></p>";	
				
					?>
					</td>
					 <td  class="status">
						<?php
							echo "<p>Số câu đúng : ".$item['kq2']." <span style='color:red'>( ".$item['point2']." point )</span></p>";	
						?>
					</td>
					 <td  class="status">
						<?php
							echo $item['total']." point";
						?>
					</td>
				   
					<td style="text-align:center"><?php
						if($item['created'] != '0000-00-00 00:00:00' && $item['created']!='') 
							echo date('H:i d/m/Y', strtotime($item['created']));
						else echo '-';
					 ?></td>
				</tr>
			   
				<?php
						}
				   } 
				?>
			   
			</tbody>
		</table>
		
	</div>
	<div class="pagination"><?php $lib->viewpage($link); ?></div>
</div>
