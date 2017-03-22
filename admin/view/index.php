<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">
	<meta name="description" content="<?php if(isset($description)) echo $description; ?>">
	<meta name="viewport" content="width=device-width" />
	<title><?php if(isset($title)) echo $title; ?></title>
	<link href="<?php echo $url_dir ?>images/admin.png" rel="icon">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $url_dir ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $url_dir ?>css/sb-admin.css" rel="stylesheet">
    <!-- Datetime -->
	<link rel="stylesheet" type="text/css" href="<?php echo $url_dir ?>plugins/datetimepicker/jquery.datetimepicker.css">
    <link  href="<?php echo $url_dir ?>plugins/validate/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="<?php echo $url_dir ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo $url_dir ?>plugins/validate/jquery-1.7.2.min.js"></script>
    <script src="<?php echo $url_dir ?>js/jquery.price_format.1.8.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
            <?php include('topmenu.php'); ?>
            <?php include('leftmenu.php'); ?>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid" style="position:relative;">
                <?php include('widget/breabcrumb.php');  ?>
				<?php include('widget/alert.php');  ?>
                <?php include($file);  ?>
               <section style="clear:both"></section>
               <h5 class="alert alert-danger well">CopyRight @ <?php echo gmdate('Y', time() + 7*3600);?> , Hệ thống được thiết kế & phát triển bởi  <a target="_blank" href="http://hocthietkeweb.net.vn/">VIETPRO Education</a> </h5>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	<?php include('widget/javascript.php');  ?>	
</body>
</html>

