<?php  require('controller/topmenu.php') ?>
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="." style="margin:0px 20px;padding:0"> 
    <img src="<?php echo $url_dir; ?>images/admin.jpg" height="50px">
    
    </a>
    
</div>
<!-- Top Menu Items
<ul class="nav navbar-left top-nav">
    <li class="dropdown" >
        <a href="#" class="dropdown-toggle beo" data-toggle="dropdown"><i style="color:#f00;" class="glyphicon glyphicon-fullscreen"></i> </a>
        
    </li>
    <li class="dropdown" >
        <a href="#" class="dropdown-toggle hop" data-toggle="dropdown"><i style="color:#f00;" class="
glyphicon glyphicon-remove" ></i></a>
        
    </li>
   
</ul> -->
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav" >
	 <!-- <li>
         <a   <?php if($_SESSION['lang']!='en') {?>  class="label label-primary" style="color:#FFF" <?php } ?>  title="Việt nam  " href="<?php echo $url.'index.php?lang=vi'; ?>&redirect=<?php echo base64_encode($lib->fullurl());?>">Tiếng việt </a>        
    </li>
     <li>
         <a <?php if($_SESSION['lang']=='en') {?>  class="label label-primary" style="color:#FFF" <?php } ?>  title="English " href="<?php echo $url.'index.php?lang=en';?>&redirect=<?php echo base64_encode($lib->fullurl());?>">Tiếng anh</a>        
    </li>-->
    <li class="dropdown">
       <a  title="Top menu" href="#" class="dropdown-toggle" data-toggle="dropdown"><span style="margin-left:5px;" class="label label-primary">Quản lý uploads</span> <b class="caret"></b></a>
		<ul class="dropdown-menu alert-dropdown">
            <li>
				 <a title="Quản lý ảnh " href="#" onclick="browseKCFinder('', 'image');return false;" class="dropdown-toggle" data-toggle="dropdown">Hình ảnh </a>        
            </li>
			 <li>
				 <a title="Quản lý file " href="#" onclick="browseKCFinder('', 'file');return false;" class="dropdown-toggle" data-toggle="dropdown">File </a>        
            </li>
			 <li>
				 <a title="Quản lý media " href="#" onclick="browseKCFinder('', 'media');return false;" class="dropdown-toggle" data-toggle="dropdown">Media</a>        
            </li>
        </ul>
    </li>
   
    <?php if(count(array_filter($top_module))>0){ ?>
    <li class="dropdown">
        <a  title="Top menu" href="#" class="dropdown-toggle" data-toggle="dropdown"><span style="margin-left:5px;" class="label label-danger">Menu</span> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
        	<?php
				foreach($top_module as $k)
				{
					if(is_array($k))
					{
					?>	
                    <li >
                        <a href="<?php echo $url; ?>index.php?page=<?php echo $k['url_name']; ?>">
                          <?php echo $k['icon']; ?>    <span style="margin-left:8px;"><?php echo $k['title']; ?></span>
                          <?php
						  if($k['in_table']!=''){
							if($k['in_table']=='tb_menu' && $_SESSION['lang']=='en') echo ' ('.count(array_filter($lib->selectall("SELECT * FROM tb_menu where lang='en'"))).')'; else if($k['in_table']=='tb_menu' && $_SESSION['lang']!='en') echo ' ('.count(array_filter($lib->selectall("SELECT * FROM tb_menu where lang='vi'"))).')';
							if( $k['in_table']=='tb_module') echo ' ('.count(array_filter($lib->selectall("SELECT * FROM ".$k['in_table']))).')'; else echo '';
						  }
							
						  ?>
                        </a>
                        
                    </li>
                    <?php	
					}
				}
				
				?>   
        
        
        
          
        </ul>
    </li>
    <?php } ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
             <span class="label label-info"><?php  if(isset($loginadmin)) echo $loginadmin->username; ?></span>
             <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?php echo $url; ?>index.php?page=user&action=detail&id=<?php  if(isset($loginadmin)) echo $loginadmin->id; ?>">
                <i class="fa fa-fw fa-user"></i> Thông tin
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Tin nhắn</a>
            </li>
            
            <li class="divider"></li>
            <li>
                <a href="<?php echo $url ?>index.php?page=logout"><i class="fa fa-fw fa-power-off"></i> Thoát</a>
            </li>
        </ul>
    </li>
</ul>