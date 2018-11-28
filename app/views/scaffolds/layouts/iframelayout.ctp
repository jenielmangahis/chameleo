<?php 
//echo $meta_title;
$actionsArray = array(
		'login' => 'Login',
		'registeruser' => 'Register',
		'dashboard' => 'Dashboard',
		'comments' => 'Comments',
		'register_coin' => 'Coin Register',
		'view_registeredcoins' => 'View Coins',
		'update_profile' => 'Update Profile' ,
		'changeuserpassword' => 'Change Password',
		'index' => 'Home',
		'iframeforms' => 'iframeforms'
	);
	//pr($this->params["action"]);
if ($this->params["controller"] == 'companies' && $this->params["action"] != 'pages') {
	$meta_title = $actionsArray[$this->params["action"]];
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="description" content="< ?php if(!empty($meta_description)) echo $meta_description; ?>">
<meta http-equiv="keyword" content="< ?php if(!empty($meta_keyword))  echo $meta_keyword; ?>">
<meta http-equiv="title" content="< ?php if(!empty($meta_title))  echo $meta_title; ?>">
<link rel="canonical" href="< ?php if(!empty($dataprojects['Project']['canonicalurl'])) echo 'http://'.$dataprojects['Project']['canonicalurl']; ?>"/>
<meta name="geo.position" content="< ?php if(!empty($dataprojects['Project']['longitude']) && !empty($dataprojects['Project']['latitude'])) echo $dataprojects['Project']['longitude'].';'.$dataprojects['Project']['latitude']; ?>" />
<meta name="ICBM" content="< ?php if(!empty($dataprojects['Project']['longitude']) && !empty($dataprojects['Project']['latitude'])) echo $dataprojects['Project']['longitude'].','.$dataprojects['Project']['latitude']; ?>" /> -->

<title><?php echo $dataprojects['Project']['project_name'];?> :: <?php if(!empty($page_title))  echo $page_title; ?></title>
<?php $default_project_name="default";
	echo $html->css('/css/'.$default_project_name.'/styles');
	echo $html->css('/css/'.$default_project_name.'/facebox');
	// echo $javascript->link('/js/'.$project_name.'/DD_belatedPNG.js');
	echo $javascript->link('/js/'.$default_project_name.'/jquery.js');
    	echo $javascript->link('/js/user_validate.js');
  	echo $javascript->link('/js/'.$default_project_name.'/facebox.js');
echo $javascript->link('/js/jquery.dropdownPlain.js');
?>
<script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'1de6e26d-5291-498f-b1e6-92111f624d70'});</script>
<?php  if(!empty($dataprojects['Project']['favicon']))
			 echo $html->meta('icon',"img/".$dataprojects['Project']['project_name']."/uploads/".$dataprojects['Project']['favicon'], array('type' =>'icon')); 
		?>
<style type="text/css">
 html,body {background:none;}
.float_div_chat{
-moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
   
    list-style: none outside none;
    padding: 8px 1px;
    position: fixed;
    right: 0;
    top: 233px;
    width: 24px;
    z-index: 5;
}
</style>
<script type="text/javascript">
var currentController = '<?php echo $this->params["controller"];?>';
var currentAction = '<?php echo $this->params["action"];?>';
//console.log('C:' + currentController);
//console.log('A:' + currentAction);
</script>

</head>

<body>
<?php
$project_name = $dataprojects['Project']['project_name'];
?>
<!-- Container starts -->
<div class="">
  	<?php // echo $this->element("layout_header");?>  
	<div id="container1">
		<div style="margin-bottom:0px;">
 		
 		<!-- Middle body section starts -->
			<div class="">
  				<div class=""> <!-- Body Contents starts -->
					<div class="right">
						<!--<img src="<?php echo '/img/'.$project_name.'/body_box_rht_top.gif' ?>" alt="" />-->
						<?php echo $html->image('body_box_rht_top.gif');?>
					</div>
					<div class="left">
						<!--<img src="<?php echo '/img/'.$project_name.'/body_box_lft_top.gif' ?>" alt="" />-->
							<?php echo $html->image('body_box_lft_top.gif');?>
					</div>
					<div class="clear"></div>
					<div style="width: auto;padding-top: 10px;"> <!-- Left panel starts -->
					<!--<?php //echo $this->element("topmenubar");?>  -->
						<?php echo $content_for_layout ?>
					</div> <!-- Left panel ends -->
				<!-- code for chat button-->
				
						<div class="rhtBox"> <!-- Right panel starts -->
						<?php //echo $this->element("rightsidebar");?>
							<div id="botprob">
							<div class="right">
								<!--<img src="<?php echo '/img/'.$project_name.'/body_box_rht_bot.gif' ?>" alt="" />-->
								<?php echo $html->image('body_box_rht_bot.gif');?>
							</div>
							<div class="left">
								<!--<img src="<?php echo '/img/'.$project_name.'/body_box_lft_bot.gif' ?>" alt="" />-->
								<?php echo $html->image('body_box_lft_bot.gif');?>
							</div>
							
							<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
			</div>
		<div class="clear"></div>	
<!-- Footer starts -->
<?php //echo $this->element("bottommenubar");?>

</div>
<!-- Footer ends -->
<div class="clear"></div> 
			<div id="footerseperator" style="height: 3px;"></div>
			<div class="clear"></div> 
</div>
</div>


<!-- Container ends -->

</body>
</html>
