<?php $lgrt = $session->read('newsortingby');?>
<!-- Body Panel starts -->
<?php
echo $javascript->link('datetimepicker/jquery-1.4.2.min.js');
echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');
//echo $javascript->link('datetimepicker/i18n/ui.datepicker-de.js');
echo $javascript->link('datetimepicker/timepicker_plug/withouttime.js');
?>
<link rel="stylesheet" type="text/css" href="/js/datetimepicker/timepicker_plug/css/style.css">
<link rel="stylesheet" type="text/css" href="/js/datetimepicker/smothness/jquery_ui_datepicker.css">
<script type="text/javascript">
	/* <![CDATA[ */
		$(function() {
				  $('#startdateBP').datetime({
									  userLang : 'en',
									  americanMode: false, 
								});
 					$('#enddateBP').datetime({
									  userLang : 'en',
									  americanMode: false, 
								});
			});
	/* ]]> */	
	</script>

<?php echo $form->create("Company", array("action" => "editcommtask",'name' => 'editcommtask', 'id' => "editcommtask",'onsubmit'=>'return validatecommtask();')); ?>

			<?php echo $form->input("CommunicationTask.id", array('id' => 'id', 'type'=>'hidden'));?>
<div class="titlCont1"><div class="myclass">
<div align="center" id="toppanel" style="left:0;">
	 <?php  echo $this->renderElement('new_slider');  ?>


</div>
<span class="titlTxt">
Edit Communication Task
</span>
<div class="topTabs">
<ul>
<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='/<?php echo $lgrt;?>')"><span> Cancel</span></button></li>
</ul>
</div>
</div></div>


<div class="midPadd" id="edcmmtsk">
<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>


  
  		
<div  class="tblData" style="border:none;">
		<table cellspacing="5" cellpadding="0" align="center" width="800px">
		  <tbody>
		<?php if($session->check('Message.flash')){ ?>			
		    <tr>
		      <td colspan="2"><?php  $session->flash(); 
								echo $form->error('CommunicationTask.task_name', array('class' => 'errormsg'));
						?></td>
		    </tr>
		<?php }?>
  		  <tr>
		     <td align="right"><label class="boldlabel">Task Name <span class="red">*</span></label></td>
		     <td ><span class="intpSpan"><?php echo $form->input("CommunicationTask.task_name", array('id' => 'task_name', 'div' => false, 'label' => '','style' =>'width:200px;',"class"=>"inpt_txt_fld","maxlength" => "250"));?></span></td>
		    </tr>
		   <tr>
		     <td width="20%" align="right"> <label class="boldlabel">Select Email Template <span class="red">*</span></label></td>
		     <td width="70%"><span class="txtArea_top"><span class="txtArea_bot"><?php echo $form->select("CommunicationTask.email_template_id",$templatedropdown,$data['CommunicationTask']['email_template_id'],array('id' => 'email_template_id',"style"=>"background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width: 230px;"),array('0'=>'--Select--')); ?></span></span>&nbsp;&nbsp;<span class="btnLft">
        <input type="button"  class="btnRht" value="Add" name="Add" ONCLICK="javascript:(window.location='/companies/addmailtemplate')" /></span></td>
		    </tr>
			<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Note </label>&nbsp;</td>
		     <td >
				<span class="txtArea_top">
				<span class="txtArea_bot"><?php echo $form->input("CommunicationTask.notes", array('id' => 'notes', 'div' => false, 'label' => '','rows'=>'8','cols'=>'24','class' =>'noBg'));?></span></span></td>
		    </tr>
		    <tr>
		     <td   valign='top' align="right"><label class="boldlabel">RSVP required </label>&nbsp;</td>
		     <td ><?php echo $form->input('CommunicationTask.RSVP', array('type'=>'checkbox', 'label' => '')); ?></td>
		    </tr>
			<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Birthday </label>&nbsp;</td>
		     <td ><?php echo $form->input('CommunicationTask.birthday', array('type'=>'checkbox', 'label' => '')); ?></td>
		    </tr>
			<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Members </label>&nbsp;</td>
  
			<td >
			<div style="width:90px;float:left"><input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='S' >&nbsp;Supporters</div>
			<div style="width:70px;float:left"><input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='H' >&nbsp;Holders</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='B' >&nbsp;Both</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='N' checked>&nbsp;None</div></td>

<!--<td ><input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='S' >&nbsp;Supporters&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='H' >&nbsp;Holders&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='B' >&nbsp;Both&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][members_type]' id="members_type" value='0' checked>&nbsp;None&nbsp;&nbsp;&nbsp;</td>-->
		    </tr>

		<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Social Network Members </label>&nbsp;</td>
				<td>
			<div style="width:90px;float:left"><input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='F' >&nbsp;Facebook</div>
			<div style="width:70px;float:left"><input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='T' >&nbsp;Twitter</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='B' >&nbsp;Both</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='N' checked>&nbsp;None</div></td>

<!--<td ><input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='F' >&nbsp;Facebook&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='T' >&nbsp;Twitter&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='B' >&nbsp;Both&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][social_type]' id="social_type" value='0' checked>&nbsp;None&nbsp;&nbsp;&nbsp;</td>-->
		    </tr>

		<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Non-Network Members </label>&nbsp;</td>
		    
			 <td>
			<div style="width:90px;float:left"><input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='F' >&nbsp;Facebook</div>
			<div style="width:70px;float:left"><input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='T' >&nbsp;Twitter</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="end_after" value='B' >&nbsp;Both</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="end_after" value='N' checked>&nbsp;None</div></td>

<!--<td ><input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='F' >&nbsp;Facebook&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='T' >&nbsp;Twitter&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='B' >&nbsp;Both&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][nonnetwork_types]' id="nonnetwork_types" value='0' checked>&nbsp;None&nbsp;&nbsp;&nbsp;</td>-->
		    </tr>

<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Registered For Gifts </label>&nbsp;</td>
		     
			<td>
			<div style="width:90px;float:left"><input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='Y' >&nbsp;Yes</div>
			<div style="width:70px;float:left"><input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='N' >&nbsp;No</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='B' >&nbsp;Both</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='N' checked>&nbsp;None</div></td>

<!--
<td ><input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='Y' checked>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='N' >&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='B' >&nbsp;Both&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][reg_gift]' id="reg_gift" value='0' checked>&nbsp;None&nbsp;&nbsp;&nbsp;</td>-->
		    </tr>

<tr>
		     <td   valign='top' align="right"><label class="boldlabel">Subscribed To Newsletter </label>&nbsp;</td>
		     
			<td >
			<div style="width:90px;float:left"><input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='Y' >&nbsp;Yes</div>
			<div style="width:70px;float:left"><input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='N' >&nbsp;No</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='B' >&nbsp;Both</div>
			<div style="width:60px;float:left"><input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='B' checked>&nbsp;None</div></td>

		     <!--<td ><input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='Y' checked>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='N' >&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='B' >&nbsp;Both&nbsp;&nbsp;&nbsp;<input type='radio' name='data[CommunicationTask][sub_news]' id="sub_news" value='0' checked>&nbsp;None&nbsp;&nbsp;&nbsp;</td>-->
		    </tr>

			 <tr>
		     <td width="20%" align="right"> <label class="boldlabel">Relates to comment </label>&nbsp;</td>
		     <td width="70%"><span class="txtArea_top"><span class="txtArea_bot"><?php echo $form->select("CommunicationTask.comment_type_id",$commenttypedropdown,$data['CommunicationTask']['comment_type_id'],array('id' => 'comment_type_id',"style"=>"background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width: 230px;"),array('0'=>'--Select--')); ?></span></span>&nbsp;&nbsp;<span class="btnLft">
        <input type="button"  class="btnRht" value="Add" name="Add" ONCLICK="javascript:(window.location='/companies/addcommenttype')" /></span></td>
		    </tr>
			<tr>
		     <td width="20%" valign="top" align="right"> <label class="boldlabel">Recur Pattern <span class="red">*</span></label></td>
		     <td width="70%"><span class="txtArea_top"><span class="txtArea_bot"><?php echo $form->select("CommunicationTask.recur_pattern",array('D'=>'Daily','W'=>'Weekly','M'=>'Monthly'),0,array('id' => 'recur_pattern',"style"=>"background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width: 230px;",'onchange'=>'hidecheckboxes()'),false); ?></span></span><br/><br/>
			<div id="chkbox">
			<?php echo $form->input('CommunicationTask.monday', array('type'=>'checkbox','id'=>'monday', 'label' => 'Monday')); ?>
			<?php echo $form->input('CommunicationTask.tuesday', array('type'=>'checkbox','id'=>'tuesday', 'label' => 'Tuesday')); ?>
			<?php echo $form->input('CommunicationTask.wednesday', array('type'=>'checkbox','id'=>'wednesday', 'label' => 'Wednesday')); ?>
			<?php echo $form->input('CommunicationTask.thursday', array('type'=>'checkbox','id'=>'thursday', 'label' => 'Thursday')); ?>
			<?php echo $form->input('CommunicationTask.friday', array('type'=>'checkbox','id'=>'friday', 'label' => 'Friday')); ?>
			<?php echo $form->input('CommunicationTask.saturday', array('type'=>'checkbox','id'=>'saturday', 'label' => 'Saturday')); ?>
			<?php echo $form->input('CommunicationTask.sunday', array('type'=>'checkbox','id'=>'sunday', 'label' => 'Sunday')); ?>
			</div>
			</td>
		    </tr>
 		    <tr>
		     <td align="right"><label class="boldlabel">Start <span class="red">*</span></label></td>
		     <td><span class="intpSpan"><?php echo $form->text("CommunicationTask.startdate", array('id' => 'startdate', 'div' => false, 'label' => '',"class"=>"inpt_txt_fld","maxlength" => "200",'readonly'=>'readonly'));?>&nbsp; <input type="button" class="calendarcls" id="startdateBP"></span></td>
		    </tr>
 		    <tr>
		     <td valign="top" align="right"><label class="boldlabel">End <span class="red">*</span></label></td>
		     <td>  
			<input type='radio' name='data[CommunicationTask][end_after]' id="end_after" value='O' checked> After: <?php echo $form->select("CommunicationTask.occurrences",array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30'),0,array('id' => 'occurrences','style'=>'width:40px',"class"=>"",'label'=>'Occurrences'),false); ?> Occurrences

			  </td>
					 </tr>
					<tr>
					  <td>&nbsp;</td>
					  <td>
			<input type='radio' name='data[CommunicationTask][end_after]' id="end_after" value='E' ><span> By:</span> <span class="intpSpan"><?php echo $form->text("CommunicationTask.enddate", array('id' => 'enddate', 'div' => false, 'label' => '',"class"=>"inpt_txt_fld","maxlength" => "200",'readonly'=>'readonly','style'=>'vertical-align:baseline;'));?></span>&nbsp; <input type="button" class="calendarcls" id="enddateBP">
			
			</td>
		    </tr>
		    <tr><td colspan="2">&nbsp;</td></tr>
    		<tr>
    		<td>&nbsp;</td>
    		<td>
    			
    		 </td>
    		 </tr>	
		</tbody>
		</table>

  <div style="margin-bottom: 10px; text-align: left; padding: 0px 0px 10px 10px; color:black" class="top-bar">
              <?php  echo $this->renderElement('bottom_message');  ?>

            </div>
</div>
</div></div> </div>  
 
<!--inner-container ends here-->

  
<div class="clear"></div>
  <!-- Body Panel ends --> 


<?php echo $form->end();?>

<div class="clear"></div> 

<script type="text/javascript" language="JavaScript">
function hidecheckboxes(){

if(document.getElementById("recur_pattern").value=="D")
	document.getElementById("chkbox").style.display="block";	
else
	document.getElementById("chkbox").style.display="none";	

}

hidecheckboxes();
</script>
<script type="text/javascript">
	if(document.getElementById("flashMessage")==null)
		document.getElementById("edcmmtsk").style.paddingTop = '24px';
	else
	{
			document.getElementById("blck").style.paddingTop = '10px';
	}	
</script>