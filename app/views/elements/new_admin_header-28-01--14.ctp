<?php $base_url = Configure::read('App.base_url'); ?>
<div class="header">
<div class="classPage"> 
<ul class="logOut">
<?php if($session->read('sessionprojectid') =='' || $session->read('sessionprojectid') =='0'){  ?>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Logout'),
				array('controller'=>'admins','action'=>'logout'),
				array('class'=>'preV','escape' => false)
				)
	);
?>
</li>
<?php } else {

$previewurl= '';
	//$purl = $session->read('projectwebsite_name_admin');
	//echo $session->read('projectwebsite_name');
	//$psurl = $session->read('project_system_name');
	$psurl = $session->read('projectwebsite_name');
	
 if(!empty($psurl)){
     $pos = strpos($psurl,"http://");
     //$pos1 = strpos($purl,"http://");
     if ($pos === false) {
         $previewurl=$base_url.$psurl;
     }else{
         $previewurl=$psurl;
     }     
   }
  else{
    $previewurl=$psurl;
  } 
 //echo '********'.$previewurl;
  ?>
<li><a href="<?php echo $previewurl; ?>" target="_blank"><span>Preview</span></a></li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Logout'),
				array('controller'=>'admins','action'=>'logout'),
				array('class'=>'preV','escape' => false)
				)
	);
?>
</li>
<?php } ?>
</ul>
<ul class="mainMeNu" >
<?php if($session->read('sessionprojectid') =='' || $session->read('sessionprojectid') =='0'){  ?>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Home'),
				array('controller'=>'admins','action'=>'index'),
				array('class'=>'butBg','id'=>'hoMe','escape' => false)
				)
	);
?>
</li>

<li>
<?php
	e($html->link(
				$html->tag('span', 'Projects'),
				array('controller'=>'admins','action'=>'projectlist'),
				array('class'=>'butBg','id'=>'projMng','escape' => false)
				)
	);
?>
</li>


<li>
<?php
	e($html->link(
				$html->tag('span', 'Owners'),
				array('controller'=>'admins','action'=>'ownerlist'),
				array('class'=>'butBg','id'=>'sponMng','escape' => false)
				)
	);
?>
</li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Types'),
				array('controller'=>'admins','action'=>'projecttype'),
				array('class'=>'butBg','id'=>'type','escape' => false)
				)
	);
?>
</li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Companies'),
				array('controller'=>'contacts','action'=>'sa_companylist'),
				array('class'=>'butBg','id'=>'compAnies','escape' => false)
				)
	);
?>
</li>

<li>
<?php
	e($html->link(
				$html->tag('span', 'Contacts'),
				array('controller'=>'contacts','action'=>'sa_contactlist'),
				array('class'=>'butBg','id'=>'coNtact','escape' => false)
				)
	);
?>
</li>

<li> <?php
	e($html->link(
				$html->tag('span', 'Orders'),
				array('controller'=>'admins','action'=>'coinset_orders'),
				array('class'=>'butBg','id'=>'orDer','escape' => false)
				)
	);
?> </li>

<li>
<?php
	e($html->link(
				$html->tag('span', 'Emails'),
				array('controller'=>'mailtasks','action'=>'supermailtemplatelist'),
				array('class'=>'butBg','id'=>'EmailMnu','escape' => false)
				)
	);
?>
</li>

<li>
<?php
	e($html->link(
				$html->tag('span', 'Setup'),
				array('controller'=>'setups','action'=>'border_footer_list'),
				array('class'=>'butBg','id'=>'conFiugure','escape' => false)
				)
	);
?>
</li>     
<?php }else {  ?>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Home'),
				array('controller'=>'admins','action'=>'index'),
				array('class'=>'butBg','id'=>'hoMe','escape' => false)
				)
	);
?>
</li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Dashboard'),
				array('controller'=>'admins','action'=>'projectdashboard'),
				array('class'=>'butBg','id'=>'dashbd','escape' => false)
				)
	);
?>

</li>


<li>
<?php
	e($html->link(
				$html->tag('span', 'Members'),
				array('controller'=>'admins','action'=>'memberlist'),
				array('class'=>'butBg','id'=>'memBrs','escape' => false)
				)
	);
?>
</li>  
<li>
<?php
/*	e($html->link(
				$html->tag('span', 'Contacts'),
				array('controller'=>'contacts','action'=>'projectcompanylist'),
				array('class'=>'butBg','id'=>'contMnu','escape' => false)
				)
	); */
?>
</li>  
<li>
<?php
	e($html->link(
				$html->tag('span', 'Players'),
				array('controller'=>'players','action'=>'playerslist','company'),
				array('class'=>'butBg','id'=>'playMnu','escape' => false)
				)
	);
?>
</li>
 
 <li>
<?php
	e($html->link(
				$html->tag('span', 'Prospect'),
				array('controller'=>'prospects','action'=>'projectmerchant'),
				array('class'=>'butBg','id'=>'prosMnu','escape' => false)
				)
	);
?>
</li>
 <li>
<?php
	e($html->link(
				$html->tag('span', 'Offers'),
				array('controller'=>'offers','action'=>'offerlist'),
				array('class'=>'butBg','id'=>'OfferMnu','escape' => false)
				)
	);
?>
</li>
 
 
<li>
<?php
	e($html->link(
				$html->tag('span', 'Donations'),
				array('controller'=>'admins','action'=>'coming_soon','donationlist'),
				array('class'=>'butBg','id'=>'donateMnu','escape' => false)
				)
	);
?>
</li> 
<li>
<?php
	e($html->link(
				$html->tag('span', 'Events'),
				array('controller'=>'admins','action'=>'eventlist'),
				array('class'=>'butBg','id'=>'EventLst','escape' => false)
				)
	);
?>
</li>  
<li>
<?php
	e($html->link(
				$html->tag('span', 'Email'),
				array('controller'=>'admins','action'=>'sendtempmail'),
				array('class'=>'butBg','id'=>'EmailMmu','escape' => false)
				)
	);
?>
</li>  
<li>
<?php
	e($html->link(
				$html->tag('span', 'Comments'),
				array('controller'=>'admins','action'=>'messagelist'),
				array('class'=>'butBg','id'=>'CommMnu','escape' => false)
				)
	);
?>
</li> 
<li>
<?php
	e($html->link(
				$html->tag('span', 'Forms'),
				array('controller'=>'admins','action'=>'inquirylist','new'),
				array('class'=>'butBg','id'=>'FormtLst','escape' => false)
				)
	);
?>
</li>  
<li>
<?php
	e($html->link(
				$html->tag('span', 'Project'),
				array('controller'=>'admins','action'=>'editprojectdtl'),
				array('class'=>'butBg','id'=>'projeCt','escape' => false)
				)
	);
?>
</li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Website'),
				array('controller'=>'admins','action'=>'contentlist'),
				array('class'=>'butBg','id'=>'weB','escape' => false)
				)
	);
?>
</li>
<li>
<?php
	e($html->link(
				$html->tag('span', 'Setup'),
				array('controller'=>'admins','action'=>'settings'),
				array('class'=>'butBg','id'=>'ConFigs','escape' => false)
				)
	);
?>
</li> 
<!--<li><a class="butBg" id="coiNs" href="/admins/registercoinlist"><span>Coins</span></a></li>-->
</ul>
 <?php  } ?>
</div></div>
