<?php  require('controller/leftmenu.php') ?>
 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse"  >
                <ul class="nav navbar-nav side-nav"  id="leftmenu">
                <?php
			
				
				foreach($module as $vl)
				{
					if(is_array($vl))
					{
					?>	
                    <li <?php if($vl['url_name']==$_GET['page']) echo "class='boido'"; ?> >
                        <a href="<?php echo $url; ?>index.php?page=<?php echo $vl['url_name']; ?>">
                            <?php echo $vl['icon']; ?>  
                            <?php echo $vl['title']; ?>  
                            <?php  if($loginadmin->groupid==1){?>
                            <label style="padding-left:3px;"> 
                            <?php
								$col=$lib->selectall("SHOW COLUMNS FROM ".$vl['in_table']);
								foreach($col as $item)
								{
									if($item['Field']=='lang'){
										if($vl['in_table']!='' && $_SESSION['lang']=='en') echo '('.count(array_filter($lib->selectall("SELECT * FROM ".$vl['in_table']." where lang ='en'"))).')';else echo '';
										if($vl['in_table']!='' && $_SESSION['lang']!='en') echo '('.count(array_filter($lib->selectall("SELECT * FROM ".$vl['in_table']." where lang ='vi'"))).')';else echo '';
									}
									
									
								}
								if($vl['in_table']=='tb_user') echo '('.count(array_filter($lib->selectall("SELECT * FROM tb_user"))).')';else echo '';
								if($vl['in_table']=='tb_contact') echo '('.count(array_filter($lib->selectall("SELECT * FROM tb_contact"))).')';else echo '';
								if($vl['in_table']=='tb_user_group') echo '('.count(array_filter($lib->selectall("SELECT * FROM tb_user_group"))).')';else echo '';
									
								
							 ?>
                             </label>
                             <?php }?>
                        </a>
                    </li>
                    <?php	
					}
				}
				?>  
                 <li>
                    <a style="color:#428bca;" target="_blank" href="../"><i class="glyphicon glyphicon-share"></i> Trang ngoài</a>
                 </li>   
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->