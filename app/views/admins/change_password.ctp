<?php
$base_url_Admin = Configure::read('App.base_url_Admin');
$backUrl = $base_url_Admin;
?>

<?php echo  $form->create('Admins',array('action'=>'/admins/change_password','id'=>'','url'=>$this->here,'onsubmit' => 'return validatechangepass();'));?>
<div class="container">
<div class="titlCont"><div class="myclass">
<div align="center" class="slider" id="toppanel">
	 <?php  echo $this->renderElement('new_slider');  ?>

</div>
 <?php  //echo $this->renderElement('project_name');  ?>
 <span class="titlTxt1"><?php echo $project_name;  ?>:&nbsp;</span>  
<span class="titlTxt">
Change Password
</span>
<div class="topTabs">
<ul>
<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $backUrl ?>projectdashboard')"><span> Cancel</span></button></li>
</ul>
</div>

<!-- 
<div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
     <div style="height: 30px; clear:both;">
     <div id="tab-container-1">
         <ul id="tab-container-1-nav" class="topTabs2">
        <li><a href="/admins/settingthemes" ><span>Themes</span></a></li>
            <li><a href="/admins/settings" ><span>Settings</span></a></li>
            <li><a href="/admins/loginterms"><span>Terms &amp; Privacy</span></a></li>
            < ?php if($project['Project']['url']!="" || $project['Project']['url']!=null ) {?> <li><a href="/admins/iframes"><span>iFrames</span></a></li>  < ?php } ?>
            <li><a href="/admins/projectcontrols" ><span>Controls</span></a></li> 
            <li><a href="/admins/change_password" class="tabSelt"><span>Change Password</span></a></li>
            </ul>
</div> </div>
<div class="clear"></div>    -->

 <?php    $this->loginarea="admins";    $this->subtabsel="change_password";
                    echo $this->renderElement('setup_submenus');  ?> 
</div>
</div>

 <!-- Body Panel starts -->
  <div class="navigation">
  <div class="boxBg">
  <!--<p class="boxTop"><?php echo $html->image('/img/'.$project_name.'/rhtBox_top.gif', array('class'=>'right'));?> </p>-->
  <div class="boxBor">
  <div class="boxPad">
  <?php //echo $this->element("leftmenubar");?>  


  <!--  <p>&nbsp;</p>-->
  </div>
  </div><!--<p class="boxBot1">
 <?php echo $html->image('/img/'.$project_name.'/rhtBox_bot.gif', array('class'=>'right'));?></p>
  -->
  </div>
  </div>
  <div id="chpd">
  <div class="boxBg1">
  <!--<p class="boxTop1"><?php echo $html->image('/img/'.$project_name.'/rhtBox_top.gif', array('class'=>'right'));?></p>-->
  <div class="boxBor1">
  <div class="boxPad">
  <div class="">
		 
<!--<div style="border-left: 0px none; text-align: right; padding-top: 5px; color: rgb(255, 255, 255);" class="top-bar">
    
   </div>
<div class="top-bar" style="border-left: 0px none; text-align: right; padding-top: 5px; color: rgb(255, 255, 255);">
    
   </div>-->

<div style="width: 960px; height:300px; margin: 0pt auto; align:left;">    
	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

<div class="clear"></div>


<div style="height:300px;">
<table>



<tr>
<td align="right"><label class='boldlabel'>Old Password&nbsp;<span style="color: red;">*</span></label></td><td><span class="intpSpan"><?php echo $form->input('oldpassword',array('label'=>'',"class" => "inpt_txt_fld",'div'=>false,'type'=>"password", 'id'=>"oldpassword",'size'=>'40','value'=>'',  )) ?></span></td></tr></div>
<div class="clear">&nbsp;</div>
<tr><td align="right"><label class='boldlabel'>New Password&nbsp;<span style="color: red;">*</span></label></td><td> <span class="intpSpan"><?php echo $form->input('password',array('label'=>'','div'=>false,'type'=>"password", 'id'=>"password",'size'=>'40','value'=>'', "class" => "inpt_txt_fld" )) ?></span></td></tr></div>
<div class="clear">&nbsp;</div>
<tr><td align="right"><label class='boldlabel'>Confirm Password&nbsp;<span style="color: red;">*</span></label></td><td> <span class="intpSpan"><?php echo $form->input('confirm_password',array('label'=>'','div'=>false,'type'=>"password", 'id'=>"confirm_password",'size'=>'40','value'=>'', "class" => "inpt_txt_fld" )) ?></span></td></tr>
<tr><td>&nbsp;</td></tr>

 <tr><td colspan='5' style="border-left: 0px none; text-align: center; padding-top: 5px; " class="top-bar">OR<br /><br />
   </td></tr>

<tr><td align="right"><label class='boldlabel'>Reset Password&nbsp;<span style="color: red;">*</span></label></td><td> <?php echo $form->input('reset_password',array('label'=>'','div'=>false,'type'=>"checkbox", 'id'=>"reset_password")) ?> &nbsp; You will receive New Password by email.</td></tr>
<tr><td>&nbsp;</td></tr>

 <tr><td colspan='5' style="border-left: 0px none; text-align: left; padding-top: 5px; " class="top-bar">
   </td></tr>
</div>
<div class="clear">&nbsp;</div>

<div><!--<lable style="width:150px; margin-right:5px;display:inline-block;">&nbsp;</lable> -->
<!--<tr><td></td><td><button type="submit" value="Submit" class="button"><span>Submit</span></button></td></tr> -->
<?php 
//echo $form->submit('Submit', array('div'=>false,"class"=>"btn"));?> 
</div>
	
  </div>
</table>
  </div><b> <span style="color: red;">*</span>  Required item </b>
  </div>
  </div>
  </div><!--<p class="boxBot1"><?php //echo $html->image('/img/'.$project_name.'/rhtBox_bot.gif', array('class'=>'right'));?>
</p>-->
  
  </div>
  </div><?php echo $form->end();?>    

<br/><br/>
<div >
	
	</div>
  <div class="clear"></div>
  <!-- Body Panel ends --> 

<script type="text/javascript">
	if(document.getElementById("flashMessage")==null)
		document.getElementById("chpd").style.paddingTop = '24px';
	else
	{
			document.getElementById("blck").style.paddingTop = '10px';
	}	
</script>