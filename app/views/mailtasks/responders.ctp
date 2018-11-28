<script type="text/javascript">
$(document).ready(function() {
$('#EmailMnu').removeClass("butBg");
$('#EmailMnu').addClass("butBgSelt");
}); 
</script>
<?php 
$lgrt = $session->read('newsortingby');
	$base_url = Configure::read('App.base_url');
	$backUrl = $base_url.'mailtasks/responderslist/'.$respondertype;
?>
<?php 
   echo $javascript->link('ckeditor/ckeditor'); 
?>

<!-- Body Panel starts -->
<div class="titlCont1"  style="height: 90px;">

	<div class="myclass">
        <div align="center" class="slider" id="toppanel">
            <?php  echo $this->renderElement('new_slider');  ?>
        </div>
      	
        <?php 
        $action = (isset($templateid))? "/".$respondertype."/edit/".$templateid : "/".$respondertype."/add";
        $vaction = ($templateid)?'edit':'add';
        echo $form->create("mailtasks", array("action" => "responders".$action,'name' => 'responders', 'id' => "responders","onsubmit" =>"return validate_responder('$vaction');"));
 ?>
   				<?php echo $form->hidden("EmailTemplate.responder_type", array('id' => 'respnder_type', 'value'=>$respondertype));  ?>
        
            <?php if(isset($respondertype) && $respondertype =='event' ){ 
           
            if($this->data['EmailTemplate']['is_event_temp']==1)
                $rsvp="Checked='yes'";
            else 	
            	$rsvp="";
            if($this->data['EmailTemplate']['is_event_temp']==2)
                $waitlist="Checked='yes'";
            else
            	$waitlist="";
            if($this->data['EmailTemplate']['is_event_temp']==3)
                $invite="Checked='yes'";
            else
            	$invite="";
             }
             ?>
          <span class="titlTxt">  Responder <?php echo ucfirst($vaction); ?> </span>
        <div class="topTabs">
            <ul>
                <li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
                <li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
                <li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $backUrl;?>')"><span> Cancel</span></button></li>
            </ul>
        </div>
 <div class="clear"></div>
       
           <?php   
				switch($respondertype){
				case 'event':
					$this->responders_event="tabSelt";
					break;
				case 'player':
					$this->responders_player="tabSelt";
					break;
				case 'offer':
					$this->responders_offer="tabSelt";
					break;
				case 'prospect':
					$this->responders_prospect="tabSelt";
					break;
				default:
					$this->responders_member="tabSelt";
           			}
           			 
           		
             echo $this->renderElement('superemail_submenu');  ?>  
       
    </div>
     </div>
     
<div class="midPadd">
    <div class="boxBor1">

        <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
        <div class="clear"></div>
    </div>
    <br/>
    <div class="boxBor1">
        <table cellspacing="10" cellpadding="0" align="center" width="100%">   
            <tbody>
                <tr>
                    <td width="60%">
                        <table cellspacing="10" cellpadding="0" align="center" width="100%">
                            <tbody>
                            
                             <?php if($respondertype =="event"){ ?>
                                    <tr>
                                    	<td width="25%" align="right"><label class="boldlabel">Template Type <span class="red">*</span></label></td>
                                        <td width="75%">
	                                        <input type="radio" name="data[EmailTemplate][is_event_temp]" id="is_event_temp_1" value="1" <?php echo $rsvp; ?> > &nbsp;RSVP&nbsp;
	                                        <input type="radio" name="data[EmailTemplate][is_event_temp]" id="is_event_temp_2" value="2" <?php echo $waitlist; ?> > &nbsp;Waitlist&nbsp;
	                                        <input type="radio" name="data[EmailTemplate][is_event_temp]" id="is_event_temp_3" value="3" <?php echo $invite; ?> > &nbsp;Invite&nbsp;
                                        </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php if($isreadonly=='1'){ ?>
                                    <tr>
                                        <td width="25%" align="right" style="vertical-align: top;"><label class="boldlabel">Template Name <span class="red">*</span></label></td>
                                        <td width="75%"><span class="intpSpan"><?php echo $form->input("EmailTemplate.email_template_name", array('id' => 'email_template_name', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250",'value'=>$this->data['EmailTemplate']['email_template_name']));?></span></td>
                                    </tr>
                                <?php }else{ ?>    
                                    <tr>
                                        <td width="25%" align="right" style="vertical-align: middle;"><label class="boldlabel">Template Name </label>&nbsp;</td>
                                        <td width="75%"><?php echo $form->input("EmailTemplate.email_template_name.", array('id' => 'email_template_name', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250",'readonly'=>true));?></td>
                                    </tr>
                                <?php } ?>
                                    
                                    
                              <?php if($respondertype !='member' && $respondertype !='offer' && $respondertype !='event' ){?>
                                    <tr>
                                    <td width="25%" align="right" style="vertical-align: middle;"><label class="boldlabel">Relationship Type </label>&nbsp;</td>
                                    <td width="75%" >
				<span class="txtArea_top" id="spancat">
					<span class="txtArea_bot">
						<span id="compdiv">				
							<?php 
				
							echo $form->select("EmailTemplate.relationship_type", $common->getRelationshipTypeForResponder(0,'drp'), $relationshiptype, array('id' => 'relationship_type','class'=>'multilist'),"---Select---");?>
			    </span>
					</span>
						</span>
			
				
			</td>
                                    </tr> 
                			 <?php }else{
                			 		 switch($respondertype){
										case 'offer':
											$value= 8;
											break;
									  	case 'event':
											$value= 9;
											break;
									  	default :
									  		$value= 3;
									  		break;
									 }
                            		 $form->hidden("EmailTemplate.relationship_type", array('id' => 'relationship_type', 'value'=>$value));
                            		
                            		
                              }?>
                                    
                                <tr>
                                    <td  align="right" ><label class="boldlabel">Subject <span class="red">*</span></label></td>
                                    <td  ><?php echo $form->hidden("EmailTemplate.id", array('id' => 'templateid'));    ?>
                                        <span class="intpSpan">
                                        <?php if($templateid){?>
                                        	<?php echo $form->input("EmailTemplate.subject", array('id' => 'subject', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250" ));?>
                                        <?php }else { ?>
                                        	<?php echo $form->input("EmailTemplate.subject", array('id' => 'subject', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250", "value"=>"[[PROJECT_NAME]]" ));?>
                                        <?php } ?>   
                                        </span>
                                    </td>    
                                </tr>
                                
                                <tr>
                                    <td  align="right"><label class="boldlabel">Sender <span class="red">*</span></label></td>
                                    <td ><span class="intpSpan">
                                    	<?php if($templateid){?>
                                    		<?php echo $form->input("EmailTemplate.sender", array('id' => 'sender', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250" ));?>
                                    	<?php } else { ?>
                                    		<?php echo $form->input("EmailTemplate.sender", array('id' => 'sender', 'div' => false, 'label' => '','style' =>'width:400px;',"class" => "inpt_txt_fld","maxlength" => "250", "value"=>"info@[[Project Website Address]]" ));?>
                                            <?php } ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                    <td width="40%">
                        <table cellspacing="10" cellpadding="0" align="center" width="100%">
                            <tbody>
							
							 <tr>
                                    <td align="left" >
                                        <label class="boldlabel">Override All Projects</label>
                                    </td>
                                                                <td align="left" >
                                        <input type="checkbox"  class="checkid" name="data[EmailTemplate][override_all]" value="1" <?php if($override_all) { echo "checked='checked'"; } ?> >
                                    </td>
                                </tr>
                            	
                            	 
                            	
                                <tr>
                                    <td align="left" style="vertical-align: middle;">
                                        <label class="boldlabel">CC Email To</label>
                                    </td>
                               <td>                            
                                        <span class="txtArea_top">
                                            <span class="newtxtArea_bot">
                                                <?php echo $form->input("EmailTemplate.send_cc_email_to", array('id' => 'send_cc_email_to', 'div' => false, 'label' => '','rows'=>'3','cols'=>'65','style' =>'width:230px;',"class" => "noBg"));?>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td width="100%" style="vertical-align: top;" colspan="2"><!--<label class="boldlabel">Content: </label></td><td>-->        
                        <?php   flush();
                            echo $form->textarea('EmailTemplate.content', array('id'=>'content','class'=>'ckeditor'));
                        ?>
                    </td>
                </tr>       

                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td >&nbsp;</td>
                    <td >
                        <!--     <button type="submit" id="Submit" class="button"><span>  Save</span>  </button>&nbsp;
                        <button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='/admins/mailtemplatelist')"><span> Cancel</span></button>-->
                    </td>
                </tr>  
            </tbody>
        </table>

        <?php echo $form->end();?>
        <div style="margin-bottom: 10px ; text-align: left; color:black" class="top-bar">
        <?php  echo $this->renderElement('bottom_message');  ?>   </div>

    </div></div> </div>
 
<!--inner-container ends here-->

  
<div class="clear"></div>
  <!-- Body Panel ends -->
        <?php echo $form->end();?>

<div class="clear"></div> 



