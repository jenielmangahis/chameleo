<script type="text/javascript">
$(document).ready(function() {
$('#conFiugure').removeClass("butBg");
$('#conFiugure').addClass("butBgSelt");
}); 
</script>
<?php 
$base_url_admin = Configure::read('App.base_url_admin');
$base_url = Configure::read('App.base_url');
$backUrl = $base_url_admin.'mail_task_list';
?>
<?php
echo $javascript->link('datetimepicker/jquery-1.4.2.min.js');
echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');
//echo $javascript->link('datetimepicker/i18n/ui.datepicker-de.js');
echo $javascript->link('datetimepicker/timepicker_plug/withouttime.js');  
echo $html->css('/css/jquery_ui_datepicker');
echo $html->css('timepicker_plug/css/style');
?>
<!--<link rel="stylesheet" type="text/css" href="/js/datetimepicker/timepicker_plug/css/style.css">-->
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
                        
                      
     var dateobj = new Date();
   
        $(function() {
                    
                    $('#member_agefrom').datepicker({
                    showOn: "button",
                    buttonImage: baseUrl+"/img/calendar_new.png",
                    dateFormat: 'mm-dd-yy',
                    changeMonth: true,
                    changeYear:true
                   // yearRange: currDate+':'+rangeDate 
                });
                
                $('#member_ageto').datepicker({
                    showOn: "button",
                    buttonImage: baseUrl+"/img/calendar_new.png",
                    dateFormat: 'mm-dd-yy',
                    changeMonth: true,
                    changeYear:true
                   //  yearRange: currDate+':'+rangeDate 
                });
               
               
                 $('#task_startdate').datepicker({
                    showOn: "button",
                    buttonImage: baseUrl+"/img/calendar_new.png",
                    dateFormat: 'mm-dd-yy',
                    changeMonth: true,
                    changeYear:true
                   // yearRange: currDate+':'+rangeDate 
                });
                
                $('#task_end_by_date').datepicker({
                    showOn: "button",
                    buttonImage: baseUrl+"/img/calendar_new.png",
                    dateFormat: 'mm-dd-yy',
                    changeMonth: true,
                    changeYear:true
                   //  yearRange: currDate+':'+rangeDate 
                });
               
          });
      /* ]]> */
      
        </script>
<div class="container"> 	
<div class="titlCont">
<div class="myclass">
<?php echo $form->create("Admins", array("action" => "mail_footer",'name' => 'mail_footer', 'id' => "mail_footer", 'class' => 'adduser'))?>
       <div align="center" id="toppanel" >
         <?php  echo $this->renderElement('new_slider');  ?>
</div>

		<span class="titlTxt">Mail Tasks </span>
        <div class="topTabs">
                <ul class="dropdown">
                             <li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
                              <li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
                              <li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $backUrl ?>')"><span> Cancel</span></button></li>
                    
                </ul>
        </div> 
		<div class="clear"></div>
        
         <?php $this->mail_tasks="tabSelt"; echo $this->renderElement('super_admin_config_types'); ?>   
</div></div>

<div class="midPadd" id="sndmail">
    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>          
    
       

  <!--<table id="loading"  width="100%" style="height: 100%;"><tr style="height: 540px;" ><td align="center"><img src="/img/ajax-pageloader.gif" alt="Imagecoins:pageloader" /></td></tr></table> -->
    <div id="addcomm" class="">  
            <!-- START:  Task Setup Design as per Requirement --> 
        <table cellspacing="5" cellpadding="0" align="left" width="100%">
            <tbody>               
                <tr>
                    <td width="55%" valign="top">     
                        <table cellspacing="5" cellpadding="0" align="left" width="100%">
                        <tbody> 
                                <tr>
                                    <td align="right">     <input type="hidden" id="current_domain" name="current_domain" value="">                                    
                                           <label class="boldlabel">Task Name <span style="color: red;">*</span></label>
    
                                    </td>
                                    <td>
                                    <span class="intpSpan"><?php echo $form->input("CommunicationTask.task_name", array('id' => 'task_name', 'div' => false, 'label' => '','style' =>'width:200px;',"class"=>"inpt_txt_fld","maxlength" => "250"));?></span>
                                    </td>
                                </tr>
                               
                               
                                 
                                <tr>
                                    <td  align="right"> 
                                        
                                            <label class="boldlabel">Select Template <span style="color: red;">*</span></label>
                                    </td>
                                    <td>
                                          <span class="txtArea_top">
                                          <span class="txtArea_bot">
                                            <?php 
											$templatedropdown = array();
											echo $form->select("CommunicationTask.email_template_id",$templatedropdown,$sel_email_temp,array('id' => 'email_template_id','class'=>'multilist','onchange'=>'getEmailTemplate(this.value)'),array('0'=>'--Select--')); ?>
                                          </span>
                                          </span>
                                          <span class="btnLft"><input type="button"  class="btnRht" value="Add" name="Add" onclick="addEmailTempforTask();" /></span>
                                   </td>
                                </tr>

                                <tr>
                                    <td align="right">                                        
                                           <label class="boldlabel">Subject <span style="color: red;">*</span></label>
    
                                    </td>
                                    <td>
                                    <span class="intpSpan" style="vertical-align: top"> 
                                            <?php echo $form->input("CommunicationTask.email_subject", array('id' => 'email_subject', 'div' => false, 'label' => '','style' =>'width:231px;',"class" => "inpt_txt_fld","maxlength" => "250"));?>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right"> <label class="boldlabel">Email from <span style="color: red;">*</span></label>  </td>
                                    <td><span class="intpSpan" style="vertical-align: top">
                                            <?php echo $form->input("CommunicationTask.email_from", array('id' => 'email_from', 'div' => false, 'label' => '','style' =>'width:231px;',"class" => "inpt_txt_fld",'value'=>$fromemail));?>
                                    </span></td>
                                </tr>
                                
                                <tr>
                                    <td width="174px" align="right"> <label class="boldlabel">Subscription Type</label>  </td>
                                    <td>
                                          <span class="txtArea_top">
                                          <span class="txtArea_bot">
                                            <?php echo $form->select("CommunicationTask.subscription_type",$subscription_types,$sel_subscription_types,array('id' => 'subscription_type',"class"=>"multilist"),array(''=>'--Select--')); ?>
                                          </span>
                                          </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Member Type</label>
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php 
                                                    echo $form->select("CommunicationTask.member_type",$member_types,$sel_member_types, array('id' => 'member_type', 'div' => false, 'label' => '','style' =>'background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width:230px;',"class" =>"","maxlength" => "250"),"---Select---");
                                                ?>
                                            </span>
                                        </span>
                                        
                                    </td>
                                </tr>
                                
                                  <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Donation Level</label>
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php 
                                                    echo $form->select("CommunicationTask.donation_level",$donation_levels,$sel_donation_levels, array('id' => 'donation_level', 'div' => false, 'label' => '','style' =>'background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width:230px;',"class" =>"","maxlength" => "250"),"---Select---");
                                                ?>
                                            </span>
                                        </span>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right"> <label class="boldlabel">Gender</label>  </td>
                                    <td>
									<?php 
									$gen_options = array('male'=>'Male','female'=>'Female','both'=>'Both','not_disclosed'=>'Not Disclosed');
									echo $form->radio("CommunicationTask.member_gender", $gen_options, array('default'=>'Direct','id'=>'relation_type', 'legend'=>false,'style'=>'margin-right:5px;margin-left:10px;','class'=>'change_rel_type'));
									?>   		
									</td>
                                </tr>
                                
                                  <tr>
                                    <td align="right"> <label class="boldlabel">Age Range</label> </td>
                                    <td>
                                    <?php
                                    $agefrom="00-00-0000";
                                     if(isset($this->data['CommunicationTask']['member_agefrom']) && $this->data['CommunicationTask']['member_agefrom']!='0000-00-00'){ 
                                         $agefrom= date('m-d-Y', strtotime($this->data['CommunicationTask']['member_agefrom']));
                                     } 
                                     $ageto="00-00-0000"; 
                                     if(isset($this->data['CommunicationTask']['member_ageto'])  && $this->data['CommunicationTask']['member_ageto']!='0000-00-00'){ 
                                         $ageto= date('m-d-Y', strtotime($this->data['CommunicationTask']['member_ageto'])); 
                                     } ?>
                                    <span class="intpSpan middle">
										<?php echo $form->text("CommunicationTask.member_agefrom", array('id' => 'member_agefrom', 'value'=>$agefrom, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:75px","maxlength" => "200",'readonly'=>'readonly'));?>
									</span>&nbsp; to  &nbsp;
                                    <span class="intpSpan middle"><?php echo $form->text("CommunicationTask.member_ageto", array('id' => 'member_ageto', 'value'=>$ageto, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:75px","maxlength" => "200",'readonly'=>'readonly'));?></span>
                                    </td>
                                </tr>
                                
                                   <tr>
                                     <td align="right"> <label class="boldlabel">Birthday</label></td>
                                     <td ><?php 
                                     if($this->data['CommunicationTask']['member_birthday']=='1'){
                                         $chked="checked";
                                     }else{
                                          $chked="";
                                     }
                                     echo $form->input('CommunicationTask.member_birthday', array('id'=>'member_birthday','type'=>'checkbox', 'label' => '', 'checked' => $chked)); ?></td>
                                    </tr>
                                    
                                      <tr>
                                     <td align="right"> <label class="boldlabel">Anniversary</label></td>
                                     <td >
                                     <div style="width:90px;float:left">
                                     <input type="checkbox"  name='data[CommunicationTask][member_anniversary_monthly]' id="member_anniversary_monthly" value='1' 
                                     <?php if($this->data['CommunicationTask']['member_anniversary_monthly']=='1'){  echo ' checked="checked" ';}else{ echo ' ';}?> >&nbsp;1 month
                                     </div>
                                     <div style="width:70px;float:left">
                                     <input type='checkbox' name='data[CommunicationTask][member_anniversary_annual]' id="member_anniversary_annual" value='1' 
                                     <?php if($this->data['CommunicationTask']['member_anniversary_annual']=='1'){  echo ' checked="checked" ';}else{ echo ' ';}?>>&nbsp;Annual
                                     </div>
                                     </td>
                                    </tr>

                                      <tr>
                                    <td align="right" valign="top">
                                        <label class="boldlabel">Days Since</label>
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php 
                                                    echo $form->select("CommunicationTask.member_days_since",$days_since,$sel_days_since, array('id' => 'member_days_since', 'div' => false, 'label' => '','style' =>'background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width:230px;',"class" =>"","maxlength" => "250"),"---Select---");
                                                ?>
                                            </span>
                                        </span>
                                     <div id="div_days_ago">
                                        <label class="boldlabel">Days Ago :</label>    &nbsp;&nbsp; <span class="intpSpan" style="vertical-align: top"> 
                                            <?php echo $form->input("CommunicationTask.member_noof_days_since", array('id' => 'member_noof_days_since', 'div' => false, 'label' => '','style' =>'width:125px;',"class" => "inpt_txt_fld","maxlength" => "250"));?>
                                        </span>
                                     </div>   
                                    </td>
                                </tr>
                                

                                
                                  <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Country</label>
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                        <span class="newtxtArea_bot">
                                        <?php echo $form->select("CommunicationTask.member_country",$countrydropdown,$sel_country,array('id' => 'country','class'=>'multilist','onchange'=>'return getstateoptions(this.value,"Company")')); ?>
                                    </span>
                                    </span>  
                                    </td>
                                </tr>
                                  <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Select State</label>
                                    </td>
                                    <td>
                                     <span class="txtArea_top">
                                        <span class="txtArea_bot">
                                          <span id="statediv"> 
                                    <?php echo $form->select("CommunicationTask.member_state",$statedropdown,$sel_state,array('id' => 'state','class'=>'multilist'),"---Select---"); ?></span>
                                    </span>
                                    </span>  
                                    </td>
                                </tr>
                                
                                  <tr>
                                    <td colspan="2" >
                                    <div id="zip_postal" style="display: block;">
                                    <table width="100%">
                                        <tbody>
                                                <tr>
                                                <td width="174px" align="right" >
                                                    <label class="boldlabel">Zip/Postal Code Range</label>
                                                </td>
                                                <td>
                                                <?php
												$sdate = '';
												?>
												<span class="intpSpan middle"><?php echo $form->text("CommunicationTask.member_zipcode_from", array('id' => 'member_zipcode_from', 'value'=>$sdate, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:125px","maxlength" => "200"));?></span>&nbsp; to  &nbsp;
                                                <span class="intpSpan middle"><?php echo $form->text("CommunicationTask.member_zipcode_to", array('id' => 'member_zipcode_to', 'value'=>$sdate, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:125px","maxlength" => "200"));?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    </td>
                                </tr>
                                
                                  <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Event</label>
                                    </td>
                                    <td>
                                     <span class="txtArea_top">
                                        <span class="txtArea_bot">
                                          <span id="statediv"> 
                                    <?php echo $form->select("CommunicationTask.event_id",$eventdropdown,$sel_event,array('id' => 'event_id','class'=>'multilist'),"---Select---"); ?></span>
                                    </span>
                                    </span>  
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td align="right" >
                                        <label class="boldlabel">RSVP Type</label>
                                    </td>
                                    <td>
                                     <span class="txtArea_top">
                                        <span class="txtArea_bot">
                                          <span id="statediv"> 
                                    <?php echo $form->select("CommunicationTask.event_rsvp_type",$event_rsvp,$sel_event_rsvp,array('id' => 'event_rsvp_type','class'=>'multilist'),"---Select---"); ?></span>
                                    </span>
                                    </span>  
                                    </td>
                                </tr>
                                
                                <tr> 
                                <td align="right" >     
                                        <label class="boldlabel">Relates to comment</label></td>
                                <td>
                                <span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
                                        <?php 
										$commenttypedropdown = array();
										echo $form->select("CommunicationTask.relatesto_commenttype_id",$commenttypedropdown,$sel_comment_typeid,array('id' => 'relatesto_commenttype_id',"class"=>"multilist"),array(''=>'--Select--')); ?></span></span></span>&nbsp;&nbsp;
                                        <span class="btnLft"><input type="button"  class="btnRht" value="Add" name="Add" onclick="addCommentTypeforTask();" /></span> 
                                        <!-- <input type="button"  class="btnRht" value="Add" name="Add" ONCLICK=" javascript:(window.location='/admins/addcommenttype')" /></span>-->
                                        </td>
                                </tr>
                                
                                  <tr> 
                                <td align="right" >     
                                        <label class="boldlabel">Social Network Members</label></td>
                                <td>
                                <span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
                                        <?php echo $form->select("CommunicationTask.social_network_members",$social_networks,$sel_social_networks,array('id' => 'social_network_members',"class"=>"multilist"),array(''=>'--Select--')); ?></span></span></span>
                                      </td>
                                </tr>
                                
                                  <tr> 
                                <td align="right" >     
                                        <label class="boldlabel">Non-Network Members</label>&nbsp;</td>
                                <td>
                                <span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
                                        <?php echo $form->select("CommunicationTask.non_network_members",$social_networks,$sel_non_networks,array('id' => 'non_network_members',"class"=>"multilist"),array(''=>'--Select--')); ?></span></span></span>&nbsp;&nbsp;
                                        </td>
                                </tr>
                                
                                  <tr>
                                    <td align="right" >
                                        <label class="boldlabel">Points Range</label>
                                    </td>
                                     <td>
                                    <span class="intpSpan middle"><?php echo $form->text("CommunicationTask.member_points_rangefrom", array('id' => 'member_points_rangefrom', 'value'=>$sdate, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:100px","maxlength" => "200"));?></span>&nbsp; to  &nbsp;
                                    <span class="intpSpan middle"><?php echo $form->text("CommunicationTask.member_points_rangeto", array('id' => 'member_points_rangeto', 'value'=>$sdate, 'div' => false, 'label' => '',"class" => "inpt_txt_fld","style" => "width:100px","maxlength" => "200"));?></span>
                                    </td>
                                </tr>
                                
                                 <tr>
                                    <td align="right">
                                        <label class="boldlabel">Company Type</label>
                                    </td>
                                    <td>
                                    <input type="hidden" name="is_memberdisabled" id="is_memberdisabled" value="<?php echo $is_memebrdisabled;?>">
                                    <input type="hidden" name="is_contactdisabled" id="is_contactdisabled" value="<?php echo $is_contactdisabled;?>">
                                        <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php echo $form->select("CommunicationTask.company_type",$companytypedropdown,$sel_companytypeid,array('id' => 'companytypeid','class'=>'multilist'),"---Select---"); ?>
                                                </span>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right"> 
                                        <label class="boldlabel">Contact Type</label>
                                    </td>
                                    <td>
                                        <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php echo $form->select("CommunicationTask.contact_type",$contacttypedropdown,$sel_contactypeid,array('id' => 'contactypeid','class'=>'multilist'),"---Select---"); ?>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                    
                            </tbody>
                         </table>  
                    </td>
                    <td width="45%" valign="top">
                        <table cellspacing="10" cellpadding="0" align="center" width="100%">
                                                        <tbody>
                                <tr>
                                    <td align="right" width="140px">   <label class="boldlabel">Status</label>  </td>
                                    <td>
                                    <?php 
									$eachrow['CommunicationTask']['active_status'] = 0;
									$recid = 1;
									$modelname = '';
									$redirectionurl = '';
									$project_name = '';
									if($eachrow['CommunicationTask']['active_status']=='0'){ 
										e($html->link(
										$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate ')),
										array('controller'=>'companies','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus'),
										array('escape' => false)
										)
									);
								}else{
									e($html->link(
										$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate ')),
										array('controller'=>'companies','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus'),
										array('escape' => false)
										)
									);
								}
									?>
                                   
                                    
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right" width="140px">
                                        <label class="boldlabel">Recur Pattern</label>
                                    </td>
                                    <td>
                                          <span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="countrydiv">
                                        <?php echo $form->select("CommunicationTask.recur_pattern",$recur_pattern,$sel_recur_pattern,array('id' => 'recur_pattern',"class"=>"multilist"),false); ?></span></span></span>
                                     </td>
                                </tr>
                                
                                <tr>
                                      <td colspan="2">
                                      <div id="daily_recur_pattern" style="display: none;">   
                                          <table>
                                          <tbody>
                                                <tr>
                                                  <td align="right" width="150px"> &nbsp;   </td>
                                                    <td>   <?php if($this->data['CommunicationTask']['daily_every_noof_days']!=""){  $daily_every_noof_days=$this->data['CommunicationTask']['daily_every_noof_days'];}else{ $daily_every_noof_days=1;}?>
                                                        <div><input type="radio" name='data[CommunicationTask][daily_pattern]' checked="checked" id="everyday" value='everyday' <?php if($this->data['CommunicationTask']['daily_pattern']=='everyday'){  echo ' checked="checked" ';}else{ echo ' ';}?> >&nbsp;Every 
                                                        <?php echo $form->text("CommunicationTask.daily_every_noof_days", array('id' => 'daily_every_noof_days', 'div' => false, 'label' => '','value' => $daily_every_noof_days,"style" => "width:50px; border: 1px solid #000;","maxlength" => "200"));?></span> Day(s) </div>
                                                        <br/><div><input type='radio' name='data[CommunicationTask][daily_pattern]' id="everyweek" value='everyweek' <?php if($this->data['CommunicationTask']['daily_pattern']=='everyweek'){  echo ' checked="checked" ';}else{ echo ' ';}?> >&nbsp;Every Weekday</div>
                                                   </td>
                                                </tr>
                                          </tbody></table> 
                                      </div>       
                                      
                                        <div id="weekly_recur_pattern" style="display: none;"> 
                                          <table>
                                          <tbody>
                                                   <tr>
                                                  <td align="right" width="150px"> &nbsp;   </td>
                                                    <td>   <?php if($this->data['CommunicationTask']['weekly_every_noof_weeks']!=""){  $weekly_every_noof_weeks=$this->data['CommunicationTask']['weekly_every_noof_weeks'];}else{ $weekly_every_noof_weeks=1;}?>
                                                         Recur every <?php echo $form->text("CommunicationTask.weekly_every_noof_weeks", array('id' => 'weekly_every_noof_weeks', 'div' => false, 'label' => '', 'value' => $weekly_every_noof_weeks, "style" => "width:50px; border: 1px solid #000;","maxlength" => "200"));?> week(s) on:
                                                        <?php echo $form->input('CommunicationTask.weekly_monday', array('type'=>'checkbox','id'=>'weekly_monday', 'label' => ' Monday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_tuesday', array('type'=>'checkbox','id'=>'weekly_tuesday', 'label' => ' Tuesday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_wednesday', array('type'=>'checkbox','id'=>'weekly_wednesday', 'label' => ' Wednesday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_thursday', array('type'=>'checkbox','id'=>'weekly_thursday', 'label' => ' Thursday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_friday', array('type'=>'checkbox','id'=>'weekly_friday', 'label' => ' Friday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_saturday', array('type'=>'checkbox','id'=>'weekly_saturday', 'label' => ' Saturday')); ?>
                                                        <?php echo $form->input('CommunicationTask.weekly_sunday', array('type'=>'checkbox','id'=>'weekly_sunday', 'label' => ' Sunday')); ?>
                                                    
                                                 </td>
                                            </tr>
                                          </tbody></table> 
                                      </div>       
                                      
                                        <div id="monthly_recur_pattern" style="display: none;">  
                                          <table>
                                          <tbody>
                                                   <tr>
                                                  <td align="right" width="150px"> &nbsp;   </td>
                                                    <td>
                                                        <div><input type="radio" name='data[CommunicationTask][monthly_pattern]' checked="checked" id="dayofeverymonth" value='dayofeverymonth' <?php if($this->data['CommunicationTask']['monthly_pattern']=='dayofeverymonth'){  echo ' checked="checked" ';}else{ echo ' ';}?> >&nbsp;Day 
                                                         <?php 
                                                         if($this->data['CommunicationTask']['monthly_onof_day']!=""){  $monthly_onof_day=$this->data['CommunicationTask']['monthly_onof_day'];}else{ $monthly_onof_day=date('d');}
                                                         if($this->data['CommunicationTask']['monthly_every_noof_months']!=""){  $monthly_every_noof_months=$this->data['CommunicationTask']['monthly_every_noof_months'];}else{ $monthly_every_noof_months=1;}
                                                         ?>
                                                        <?php echo $form->text("CommunicationTask.monthly_onof_day", array('id' => 'monthly_onof_day', 'div' => false, 'label' => '','value' => $monthly_onof_day,"style" => "width:35px; border: 1px solid #000;","maxlength" => "200"));?> of every 
                                                        <?php echo $form->text("CommunicationTask.monthly_every_noof_months", array('id' => 'monthly_every_noof_months', 'div' => false, 'label' => '','value' => $monthly_every_noof_months,"style" => "width:35px; border: 1px solid #000;","maxlength" => "200"));?> month(s) </div>
                                                        <br/>
                                                        <div><input type='radio' name='data[CommunicationTask][monthly_pattern]' id="weekdayofeverymonth" value='weekdayofeverymonth' <?php if($this->data['CommunicationTask']['monthly_pattern']=='weekdayofeverymonth'){  echo ' checked="checked" ';}else{ echo ' ';}?>>&nbsp; The &nbsp;
                 
                                                         <select style="border: 1px solid black;" name="data[CommunicationTask][monthly_weeknumber]">
                                                           <option value="first"  <?php if($this->data['CommunicationTask']['monthly_weeknumber']=='first'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >first</option>
                                                             <option value="second" <?php if($this->data['CommunicationTask']['monthly_weeknumber']=='second'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >second</option>
                                                             <option value="third" <?php if($this->data['CommunicationTask']['monthly_weeknumber']=='third'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >third</option>
                                                             <option value="fourth" <?php if($this->data['CommunicationTask']['monthly_weeknumber']=='fourth'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >fourth</option>
                                                             <option value="last" <?php if($this->data['CommunicationTask']['monthly_weeknumber']=='last'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >last</option>
                                                         </select>
                 
                                                         <select style="border: 1px solid black;" name="data[CommunicationTask][monthly_weekday]">
                                                                    <option value="Monday"  <?php if($this->data['CommunicationTask']['monthly_weekday']=='Monday'){  echo 'selected="selected"  ';}else{ echo ' ';}?> >Monday</option>
                                                                     <option value="Tuesday"  <?php if($this->data['CommunicationTask']['monthly_weekday']=='Tuesday'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >Tuesday</option>
                                                                     <option value="Wednesday" <?php if($this->data['CommunicationTask']['monthly_weekday']=='Wednesday'){  echo ' selected="selected"  ';}else{ echo ' ';}?>  >Wednesday</option>
                                                                     <option value="Thursday" <?php if($this->data['CommunicationTask']['monthly_weekday']=='Thursday'){  echo ' selected="selected"  ';}else{ echo ' ';}?>  >Thursday</option>
                                                                     <option value="Friday" <?php if($this->data['CommunicationTask']['monthly_weekday']=='Friday'){  echo ' selected="selected"  ';}else{ echo ' ';}?>  >Friday</option>
                                                                     <option value="Saturday" <?php if($this->data['CommunicationTask']['monthly_weekday']=='Saturday'){  echo ' selected="selected"  ';}else{ echo ' ';}?>  >Saturday</option>
                                                                     <option value="Sunday" <?php if($this->data['CommunicationTask']['monthly_weekday']=='Sunday'){  echo 'selected="selected"  ';}else{ echo ' ';}?>  >Sunday</option>
                                                         </select> <br/><br/>&nbsp; &nbsp;
                                                         of every &nbsp;<?php 
                                                          if($this->data['CommunicationTask']['monthly_weekof_noof_months']!=""){  $monthly_weekof_noof_months=$this->data['CommunicationTask']['monthly_weekof_noof_months'];}else{ $monthly_weekof_noof_months=1;}
                                                         echo $form->input("CommunicationTask.monthly_weekof_noof_months", array('id' => 'monthly_weekof_noof_months','div' => false, 'label' => '','value' => $monthly_weekof_noof_months,'style'=>'border: 1px solid black;width:30px;'));?>&nbsp;Month(s)
                                                         </div>
                                                    
                                                 </td>
                                            </tr>
                                          </tbody></table> 
                                      </div>       
                                      
                                        <div id="yearly_recur_pattern" style="display: none;">  
                                          <table>
                                          <tbody>
                                                   <tr>
                                                  <td align="right" width="150px"> &nbsp;   </td>
                                                    <td>
                                                              <?php if($this->data['CommunicationTask']['yearly_everymonth_date']!=""){  $yearly_everymonth_date=$this->data['CommunicationTask']['yearly_everymonth_date'];}else{ $yearly_everymonth_date=date('d');}?>
                                                             <input type="radio" value="everynoofmonths" id="everynoofmonths" checked="checked"  name="data[CommunicationTask][yearly_pattern]" <?php if($this->data['CommunicationTask']['yearly_pattern']=='everynoofmonths'){  echo ' checked="checked" ';}else{ echo ' ';}?> > Every &nbsp;
                                                                <select id="yearly_everymonth" name="data[CommunicationTask][yearly_everymonth]"  style="border: 1px solid black;">
                                                                 <option value="January" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='January'){  echo ' selected="selected"  ';}else{ echo ' ';}?> >January</option>
                                                                 <option value="February" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='February'){  echo ' selected="selected"  ';}else{ echo ' ';}?>>February</option>
                                                                 <option value="March" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='March'){  echo ' selected="selected"  ';}else{ echo ' ';}?>>March</option>
                                                                 <option value="April" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='April'){  echo ' selected="selected"  ';}else{ echo ' ';}?>>April</option>
                                                                 <option value="May" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='May'){  echo ' selected="selected"  ';}else{ echo ' ';}?>>May</option>
                                                                 <option value="June" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='June'){  echo ' selected="selected" ';}else{ echo ' ';}?>>June</option>
                                                                 <option value="July" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='July'){  echo ' selected="selected" ';}else{ echo ' ';}?>>July</option>
                                                                 <option value="August" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='August'){  echo ' selected="selected" ';}else{ echo ' ';}?>>August</option>
                                                                 <option value="September" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='September'){  echo ' selected="selected" ';}else{ echo ' ';}?>>September</option>
                                                                 <option value="October" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='October'){  echo ' selected="selected" ';}else{ echo ' ';}?>>October</option>
                                                                 <option value="November" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='November'){  echo ' selected="selected" ';}else{ echo ' ';}?>>November</option>
                                                                 <option value="December" <?php if($this->data['CommunicationTask']['yearly_everymonth']=='December'){  echo ' selected="selected" ';}else{ echo ' ';}?>>December</option>                                                                   
                                                                 </select>
                                                                &nbsp;<?php echo $form->input("CommunicationTask.yearly_everymonth_date", array('id' => 'yearly_everymonth_date','div' => false, 'label' => '', 'value' => $yearly_everymonth_date,'style'=>'border: 1px solid black;width:30px;'));?><br /><br />
                                                                 
                                                                 <input type="radio" value="theweekofmonths" id="theweekofmonths"  name="data[CommunicationTask][yearly_pattern]" <?php if($this->data['CommunicationTask']['yearly_pattern']=='theweekofmonths'){  echo ' checked="checked" ';}else{ echo ' ';}?>> The &nbsp;
                                                                 
                                                                 <select id="yearly_weeknumber" name="data[CommunicationTask][yearly_weeknumber]"style="border: 1px solid black;">
                                                                 <option value="first"  <?php if($this->data['CommunicationTask']['yearly_weeknumber']=='first'){  echo ' selected="selected" ';}else{ echo ' ';}?> >first</option>
                                                                 <option value="second" <?php if($this->data['CommunicationTask']['yearly_weeknumber']=='second'){  echo ' selected="selected" ';}else{ echo ' ';}?> >second</option>
                                                                 <option value="third" <?php if($this->data['CommunicationTask']['yearly_weeknumber']=='third'){  echo ' selected="selected" ';}else{ echo ' ';}?> >third</option>
                                                                 <option value="fourth" <?php if($this->data['CommunicationTask']['yearly_weeknumber']=='fourth'){  echo ' selected="selected" ';}else{ echo ' ';}?> >fourth</option>
                                                                 <option value="last" <?php if($this->data['CommunicationTask']['yearly_weeknumber']=='last'){  echo ' selected="selected" ';}else{ echo ' ';}?> >last</option>
                                                                 </select>
                                                                 
                                                                 <select id="yearly_weekday" name="data[CommunicationTask][yearly_weekday]" style="border: 1px solid black;">
                                                                     <option value="Monday"  <?php if($this->data['CommunicationTask']['yearly_weekday']=='Monday'){  echo ' selected="selected" ';}else{ echo ' ';}?> >Monday</option>
                                                                     <option value="Tuesday"  <?php if($this->data['CommunicationTask']['yearly_weekday']=='Tuesday'){  echo ' selected="selected" ';}else{ echo ' ';}?> >Tuesday</option>
                                                                     <option value="Wednesday" <?php if($this->data['CommunicationTask']['yearly_weekday']=='Wednesday'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >Wednesday</option>
                                                                     <option value="Thursday" <?php if($this->data['CommunicationTask']['yearly_weekday']=='Thursday'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >Thursday</option>
                                                                     <option value="Friday" <?php if($this->data['CommunicationTask']['yearly_weekday']=='Friday'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >Friday</option>
                                                                     <option value="Saturday" <?php if($this->data['CommunicationTask']['yearly_weekday']=='Saturday'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >Saturday</option>
                                                                     <option value="Sunday" <?php if($this->data['CommunicationTask']['yearly_weekday']=='Sunday'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >Sunday</option>
                                                                 </select>
                                                                 <br /><br />
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;of 
                                                                 <select id="yearly_weekof_month" name="data[CommunicationTask][yearly_weekof_month]" style="border: 1px solid black;">
                                                                 <option value="January"   <?php if($this->data['CommunicationTask']['yearly_weekof_month']=="January"){  echo ' selected="selected" ';}else{ echo ' ';}?> >January</option>
                                                                 <option value="February"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=="February"){  echo ' selected="selected" ';}else{ echo ' ';}?> >February</option>
                                                                 <option value="March"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=="March"){  echo ' selected="selected" ';}else{ echo ' ';}?> >March</option>
                                                                 <option value="April"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='April'){  echo ' selected="selected" ';}else{ echo ' ';}?> >April</option>
                                                                 <option value="May"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='May'){  echo 'selected="selected" ';}else{ echo ' ';}?> >May</option>
                                                                 <option value="June"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='June'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >June</option>
                                                                 <option value="July" <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='July'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >July</option>
                                                                 <option value="August" <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='August'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >August</option>
                                                                 <option value="September"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='September'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >September</option>
                                                                 <option value="October" <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='October'){  echo ' selected="selected" ';}else{ echo ' ';}?>  >October</option>
                                                                 <option value="November"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='November'){  echo ' selected="selected" ';}else{ echo ' ';}?> >November</option>
                                                                 <option value="December"  <?php if($this->data['CommunicationTask']['yearly_weekof_month']=='December'){  echo ' selected="selected" ';}else{ echo ' ';}?> >December</option>                                                                   
                                                                 </select>
                                                    
                                                 </td>
                                            </tr>
                                          </tbody></table> 
                                      </div>       
                                      
                                     </td>
                                </tr>
                                
                                 <tr>
                                      <td align="right" width="140px"> <label class="boldlabel">Start <span class="red">*</span></label></td>
                                        <td>
                                          <span class="intpSpan"><?php
                                                    if($this->data['CommunicationTask']['task_startdate']!=""){
                                                            $task_startdate= $this->data['CommunicationTask']['task_startdate'];
                                                    }else{
                                                           $task_startdate= date('m-d-Y');
                                                    }
                                           echo $form->text("CommunicationTask.task_startdate", array('id' => 'task_startdate', 'div' => false, 'label' => '',"class"=>"inpt_txt_fld","maxlength" => "200","style" => "width:200px", 'value'=>$task_startdate,'readonly'=>'readonly'));?></span>
                                     </td>
                                </tr>
                                
                                   <tr>
                                       <td align="right" width="140px"> <label class="boldlabel">End <span class="red">*</span></label> </td>
                                        <td>
                                        <?php if($this->data['CommunicationTask']['task_end_after_occurrences']!=""){
                                            $taskEndafterOccrrences=$this->data['CommunicationTask']['task_end_after_occurrences'];
                                        }else{
                                              $taskEndafterOccrrences=1;
                                        }?>
                                          <input type='radio' name='data[CommunicationTask][task_end]' checked="checked" id="after_accurrences" value='after_accurrences' <?php if($this->data['CommunicationTask']['task_end']=='after_accurrences'){  echo ' checked="checked" ';}else{ echo ' ';}?> > After: <?php echo $form->select("CommunicationTask.task_end_after_occurrences",array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30'),$taskEndafterOccrrences,array('id' => 'task_end_after_occurrences','style'=>'width:40px',"class"=>"",'label'=>'Occurrences'),false); ?> Occurrences<br/><br/>
                                          <input type='radio' name='data[CommunicationTask][task_end]' id="by_date" value='by_date' <?php if($this->data['CommunicationTask']['task_end']=='by_date'){  echo ' checked="checked" ';}else{ echo ' ';}?>> By: <span class="intpSpan"><?php echo $form->text("CommunicationTask.task_end_by_date", array('id' => 'task_end_by_date', 'div' => false, 'label' => '',"class"=>"inpt_txt_fld","maxlength" => "200","style" => "width:160px",'readonly'=>'readonly'));?></span>
                                        </td>
                                </tr>
                                  <tr>
                                       <td align="right" width="140px"> <label class="boldlabel">Note</label></td>
                                        <td>
                                             <span class="txtArea_top">
                                <span class="txtArea_bot"><?php echo $form->input("CommunicationTask.task_note", array('id' => 'task_note', 'div' => false, 'label' => '','rows'=>'8','cols'=>'26','class' =>'noBg'));?></span></span>
                                     </td>
                                </tr>
                                  <tr>   <td align="right" colspan="2"> &nbsp;</td></tr>
                                  <tr>   <td align="right" colspan="2"> &nbsp;</td></tr>
                              
                                  <tr>
                                  <td align="right" width="140px"> &nbsp; </td>
                                  <td>               
                                   <span class="btnLft">   <button name="runreport" id="runreport" class="btnRht" value="RunReport" type="button"  >Run Report</button>  </span>
                                    </td>
                                </tr>
                                
                                 
                               
                                </tbody>
                        </table>      
                    </td>
                </tr>
             </tbody>
        </table> 
           <!-- END : Task Setup Design -->  
     
    </div>
	<div class="clear"></div>


</div>

<div class="clear"></div>

</div>

<!--inner-container ends here-->


<!--container ends here-->




