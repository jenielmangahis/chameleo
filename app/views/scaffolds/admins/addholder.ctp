<?php 
		$lgrt = $session->read('newsortingby'); 
		echo $javascript->link('datetimepicker/jquery-1.4.2.min.js');
		echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');
		//echo $javascript->link('datetimepicker/i18n/ui.datepicker-de.js');
		//echo $javascript->link('datetimepicker/timepicker_plug/withouttime.js');
		echo $html->css('/css/jquery_ui_datepicker');
		echo $html->css('timepicker_plug/css/style');
?>	
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"> 
</script>

<style type="text/css">
	.ui-datepicker-trigger{position:absolute;background:none;margin-left:5px;}
</style>

<!--container starts here-->

<?php 
		//,"onsubmit"=>"return validateholder('add');"
		echo $form->create("Admin", array("action" => "addholder",'type' => 'file','enctype'=>'multipart/form-data','name' => 'addholder','onsubmit'=>"return validateholders();", 'id' => "addholder"))?>

<div class="titlCont1"><div style="width:960px; margin:0 auto;">
<div align="center" id="toppanel" >
	 <?php  echo $this->renderElement('new_slider');  ?>


</div>
<?php  echo $this->renderElement('project_name');  ?>  
<span class="titlTxt"><?php e($titlTxtHeading); ?></span>

<div class="topTabs">
<ul>
<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $lgrt;?>')"><span> Cancel</span></button></li>
</ul>
</div>

</div>

</div><!--rightpanel ends here-->

                            <!--inner-container starts here--><div  style="width:960px; margin:0 auto">

<div class="">

<div class="">
	
		<div class="top-bar" style="border-left:0px;">
	
	
		</div>
		
		<!-- ADD Sub Admin FORM BOF -->
                  
                     <!-- ADD FIELD BOF -->
		
<script type="text/javascript">


	/* <![CDATA[ */
	var dateobj = new Date();
	var currDate  = dateobj.getFullYear();
	$(function() {
		$('#birthday').datepicker({
			showOn: "button",
			buttonImage: baseUrl+"img/calendar_new.png",
			dateFormat: 'mm-dd-yy',
			changeMonth: true,
			changeYear:true,
			yearRange: '1890:'+ currDate
		});
	});
	/* ]]> */

	
		
	</script>
</div>
<div id="hld">	
	 <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
		<table cellspacing="5" cellpadding="0" align="center" >
  <tbody>
 <?php if($session->check('Message.flash')){ ?>
  <tr>
      <td colspan="5"><?php $session->flash();  
//echo $form->error('Holder.email', array('class' => 'errormsg')); 
//echo $form->error('User.password', array('class' => 'errormsg'));
//echo $form->error('Holder.screenname', array('class' => 'errormsg'));
//echo $form->error('Holder.firstname', array('class' => 'errormsg'));
//echo $form->error('Holder.lastnameshow', array('class' => 'errormsg'));
 //echo $form->error('Holder.country', array('class' => 'errormsg')); 
//echo $form->error('Holder.zipcode', array('class' => 'errormsg'));
?></td>
    </tr>
	<?php }?>    
      <tr>
      <td width="25%" align="right"><label class="boldlabel">Email <span style="color:red">*</span></label></td>
      <td width="20%"><span class="intpSpan">
        <?php echo $form->input("Holder.email", array('id' => 'email', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
      <td width="20%"><?php echo $form->error('Holder.email', array('class' => 'errormsg')); ?></td>
      <td width="20%">&nbsp;</td>
      <td width="20%">&nbsp;</td>
    </tr>
    
    
    
    <tr>
      <td  align="right"><label class="boldlabel">Password <span style="color:red">*</span></label></td>
      <td><span class="intpSpan">
          <?php echo $form->password("User.password", array('id' => 'password', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
       <td><?php echo $form->error('User.password', array('class' => 'errormsg'));?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td   align="right"><label class="boldlabel">Screen Name <span style="color:red">*</span></label></td>
     
      <td ><span class="intpSpan">
          <?php echo $form->input("Holder.screenname", array('id' => 'screenname', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
   
      <td><?php echo $form->error('Holder.screenname', array('class' => 'errormsg'));?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><label class="boldlabel" >First Name (Private) <span style="color:red">*</span></label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.firstname", array('id' => 'firstname', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
       <td><?php echo $form->error('Holder.firstname', array('class' => 'errormsg'));?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Last Name <span style="color:red">*</span></label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.lastnameshow", array('id' => 'lastnameshow', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
      <td><?php echo $form->error('Holder.lastnameshow', array('class' => 'errormsg')); ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Address1 </label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.address1", array('id' => 'address1', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    
    <tr>
      <td  align="right"><label class="boldlabel">Address2 </label></td>
      <td><span class="intpSpan">
           <?php echo $form->input("Holder.address2", array('id' => 'address2', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?> </span></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
   
    
    <tr>
      <td  align="right"><label class="boldlabel">Country <span style="color:red">*</span></label></td>
           <td><span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
           <?php echo $form->select("Holder.country",$countrydropdown,$selectedcountry,array('id' => 'country',"class"=>"multilist",'onchange'=>'return findgetstates(this.value,"Holder")'),array('254'=>'United States')); ?></span></span></span></td>
           <td><?php echo $form->error('Holder.country', array('class' => 'errormsg')); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>    
    
     <tr>
      <td  align="right"><label class="boldlabel">State </label></td>
          <td><span id="statediv"><span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
          <?php echo $form->select("Holder.state",$statedropdown,$selectedstate,array('id' => 'state','style'=>'background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width:230px;'),"---Select---"); ?></span> </span></span></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">City </label></td>
      <td><span class="intpSpan">
           <?php echo $form->input("Holder.city",array('id' => 'city', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150")); ?> </span></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
     <tr>
      <td  align="right"><label class="boldlabel">Zip/Postal Code <span style="color:red">*</span></label></td>
      <td><span class="intpSpan">
           <?php echo $form->input("Holder.zipcode", array('id' => 'zipcode', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "10"));?> </span></td>
      <td><?php echo $form->error('Holder.zipcode', array('class' => 'errormsg'));?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
      <tr>
      <td  align="right"><label class="boldlabel">Phone </label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.phone", array('id' => 'phone', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "10"));?> </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    
      <tr>
      <td  align="right"><label class="boldlabel">Birthday </label></td>
      <td><span class="intpSpan">
          <?php echo $form->text("Holder.birthday", array('id' => 'birthday', 'div' => false, 'label' => '',"class" => "inpt_txt_fld",'readonly'=>'readonly'));?> </span> </td>
      <td><!--<input type="button" class="calendarcls" id="birthdayBP"> --></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
      <tr>
      <td  align="right"> <label class="boldlabel">Facebook </label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.facebook", array('id' => 'facebook', 'div' => false, 'label' => '',"class" => "inpt_txt_fld"));?> </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
      <tr>
      <td  align="right"><label class="boldlabel">Twitter </label></td>
      <td><span class="intpSpan">
          <?php echo $form->input("Holder.twitter", array('id' => 'twitter', 'div' => false, 'label' => '',"class" => "inpt_txt_fld"));?> </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Show Last name </label></td>
      <td>
          <?php echo $form->input('Holder.shownamelast', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Show Address1 </label></td>
      <td>
          <?php echo $form->input('Holder.showaddress1', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Show Address2 </label></td>
      <td>
          <?php echo $form->input('Holder.showaddress2', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Show City </label></td>
      <td>
          <?php echo $form->input('Holder.showcity', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td  align="right"><label class="boldlabel">Eligible to win gifts and prizes </label></td>
      <td>
          <?php echo $form->input('Holder.eligible_for_gift', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
   
    
     <!--<tr>
      <td ><?php //echo $form->input('Holder.shownamelast', array('type'=>'checkbox', 'label' => '','div'=>false)); ?><label class="boldlabel"> Show Last name</label></td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
     <tr>
      <td > <?php //echo $form->input('Holder.showaddress1', array('type'=>'checkbox', 'label' => '','div'=>false)); ?><label class="boldlabel"> Show Address1</label></td>
      <td colspan="2"><?php //echo $form->input('Holder.showaddress2', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> <label class="boldlabel">Show Address2</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php //echo $form->input('Holder.showcity', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> <label class="boldlabel">Show City</label></td>
      
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    
     <tr>
      <td colspan='5'><?php //echo $form->input('Holder.eligible_for_gift', array('type'=>'checkbox', 'label' => '','div'=>false)); ?> <label class="boldlabel">Eligible to win gifts and prizes</label></td>
     
    </tr>-->


    <tr><td colspan='5' style="border-left: 0px none; text-align: left; padding-top: 20px; " class="top-bar">
   		

         <?php  echo $this->renderElement('bottom_message');  ?>
          
   </td></tr>
    
  </tbody>
</table>
					
					<!-- ADD Sub Admin  FORM EOF -->

			</div></div><div></div><div></div></div>


 
<!--inner-container ends here-->

<?php echo $form->end();?>

  
<div class="clear"></div>

<script language='javascript'>
//getstates('254',"Holder");
</script>
<script language='javascript'>
<?php if((!$this->data['eligible_for_gift']['id'])) { ?>
findgetstates('254',"Holder"); <?php } ?>
</script>
<script type="text/javascript">
	if(document.getElementById("flashMessage")==null)
		document.getElementById("hld").style.paddingTop = '24px';
	else
	{
			document.getElementById("blck").style.paddingTop = '10px';
	}	
</script>