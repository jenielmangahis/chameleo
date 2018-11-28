<!DOCTYPE html> 
<html lang='en-us' class='no-js'>
<head>
	<meta charset=utf-8>
	<meta name=robots content='noydir, noodp, noarchive'>
    <title><?php echo SITENAME.' :: '.$title_for_layout;?></title>
    <?php 
        echo $this->element("common_libs");

        $project_name_default='default';
        echo $html->css('/css/'.$project_name_default.'/chat');

        // fullcalendar  css & js 
        $pageactname=end(explode("/",$_SERVER["REQUEST_URI"]));
    ?>
</head>
<body <?php if($pageactname=="addcommtask"){ ?>onload="init();" <?php } ?> >
    <!-- header -->
    <?php echo $this->renderElement('new_admin_header'); ?>
    
    <!-- menu -->
    <?php echo $this->element("menuhil");?> 
    
    <!-- content -->
    <?php echo $content_for_layout ?>
    
    <!-- footer -->
    <?php echo $this->renderElement('new_admin_footer'); ?>
</body>
</html>
