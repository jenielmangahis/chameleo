<?php 
    //echo "<pre>";print_r($dt);
    $emailval=$dt[0]['Project']['fromemail'];
    echo $javascript->link('ckeditor/ckeditor'); 
	$base_url = Configure::read('App.base_url');
	$base_url_admin = Configure::read('App.base_url_admin');
?>

<script language="javascript">

</script>

 <div class="container">  
<div class="titlCont"><div style="width:960px; margin:0 auto;">
            <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
            <?php echo $form->create("Admins", array("action" => "send_invite",'name' => 'send_invite', 'id' => "send_invite")); ?>
     
            <?php  echo $this->renderElement('project_name');  ?>
            <span class="titlTxt"> Send Mail </span>
            
            <div class="topTabs">
                <ul class="dropdown">
                             <li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Send</span></button></li>
                              <li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
                              <li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $base_url_admin ?>eventlist')"><span> Cancel</span></button></li>
                    
                </ul>
            </div>

            <div class="clear"><img src="<?php echo $base_url ?>img/spacer.gif" width="1" height="12px;" /></div>
            <div style="height: 30px; clear:both;">
                <div id="tab-container-1">
                    <ul class="topTabs2">
                <!--<li><a href="/admins/eventcreate/<?php // echo $event_id; ?>"><span>Edit Event</span></a></li>-->
                  <li>
						<?php
								e($html->link(
									$html->tag('span', 'RSVP'),
									array('controller'=>'admins','action'=>'rsvp',$rec_event_id),
									array('escape' => false)
									)
								);
						?>
				</li>
                  <?php
						if($waiting_list==1)  
                   {
                    ?>
                  <li>
						<?php
								e($html->link(
									$html->tag('span', 'Wait List'),
									array('controller'=>'admins','action'=>'waitlist',$rec_event_id),
									array('escape' => false)
									)
								);
						?>

				</li>
                  <?php
                   }
                   ?>
                   <li>
						<?php
								e($html->link(
									$html->tag('span', 'Send Invite'),
									array('controller'=>'admins','action'=>'send_invite'),
									array('escape' => false,'class'=>'tabSelt')
									)
								);
						?>

					</li>
                   <li>
						<?php
								e($html->link(
									$html->tag('span', 'Event Task'),
									array('controller'=>'admins','action'=>'eventtasklist',$rec_event_id),
									array('escape' => false)
									)
								);
						?>

					</li>
                   <li>
						<?php
								e($html->link(
									$html->tag('span', 'Invites'),
									array('controller'=>'admins','action'=>'eventinvitationhistory',$rec_event_id),
									array('escape' => false)
									)
								);
						?>

					</li>
                   <li>
						<?php
								e($html->link(
									$html->tag('span', 'Donations'),
									array('controller'=>'admins','action'=>'event_donations',$this->data['RecurringEvent']['id']),
									array('escape' => false)
									)
								);
						?>

					</li>
                   <li>
						<?php
								e($html->link(
									$html->tag('span', 'Volunteers'),
									array('controller'=>'admins','action'=>'event_volunteers',$this->data['RecurringEvent']['id']),
									array('escape' => false)
									)
								);
						?>
				</li>
            </ul>
                </div>
            </div>  
            <div class="clear"></div>

        </div></div>



<div class="midPadd" id="sndmail">
    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>          
        <div class="top-bar" style="border-left:0px;">
        
        </div>		 
  
                
<div class="" style="border:none;">  
            <!-- START: New Design for send mail as per Requirement --> 
            <table cellspacing="5" cellpadding="0" align="left" width="100%">
            <tbody>
                <tr>
                    <td width="50%" valign="top">     
                        <table cellspacing="5" cellpadding="0" align="left" width="100%">
                            <tbody>
                                <tr>
                                    <td width="140px" align="right">  <input type="hidden" id="current_domain" name="current_domain" value="<?php echo $current_domain;?>">
                                        
                                            <label class="boldlabel">Select Template </label>

                                         
                                    </td>
                                    <td><span class="txtArea_top">
                                         <span class="txtArea_bot">
                                         <?php echo $form->select("EmailTemplate.id",$templatedropdown,null,array('id' => 'templateid','class'=>'multilist','onchange'=>'showselecttemplate(this.value)'),"---Select---"); ?>
                                         <?php echo $form->error('EmailTemplate.id', array('class' => 'errormsg')); ?> 
                                         </span>     </span></td>
                                </tr>

                                <tr>
                                    <td align="right">                                        
                                           <label class="boldlabel">Subject <span style="color: red;">*</span></label>
    
                                    </td>
                                    <td>
                                    <span class="intpSpan" style="vertical-align: top"> 
                                            <?php echo $form->input("EmailTemplate.subject", array('id' => 'subject', 'div' => false, 'label' => '','style' =>'width:231px;',"class" => "inpt_txt_fld","maxlength" => "250"));?>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">
                                       
                                            <label class="boldlabel">Email from <span style="color: red;">*</span></label>

                                    </td>
                                    <td>
                                    <span class="intpSpan" style="vertical-align: top">
                                            <?php echo $form->input("EmailTemplate.fromid", array('id' => 'fromid', 'div' => false, 'label' => '','style' =>'width:231px;',"class" => "inpt_txt_fld",'value'=>$emailval));?>
                                        </span>
                                    </td>
                                </tr>
                                
                                 <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                 <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                 <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr>
                                    <td align="right">
                                       
                                            <label class="boldlabel">Email To <span style="color: red;">*</span></label>                              
                                        
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                            <span class="newtxtArea_bot">
                                                <?php echo $form->input("EmailTemplate.toid", array('id' => 'toid', 'div' => false, 'label' => '','rows'=>'7','cols'=>'65','style' =>'width:230px;',"class" => "noBg",'value'=>$toid));?>
                                            </span>
                                        </span>
                                    </td>
                                </tr>



                            </tbody>
                        </table>  
                    </td>

                    <td width="50%" valign="top">
                        <table cellspacing="10" cellpadding="0" align="center" width="100%">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <label class="boldlabel">Project Emails</label>
                                        <p>This is the list of Members & Company contacts</p>                   
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right" width="140px">
                                        <label class="boldlabel">Member Type</label>
                                    </td>
                                    <td>
                                    <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php 
                                                    echo $form->select("EmailTemplate.member_type",$member_type,'0', array('id' => 'member_type', 'div' => false, 'label' => '','style' =>'background: none repeat scroll 0% 0% transparent; margin-bottom: 6px; width:230px;',"class" =>"","maxlength" => "250"),"---Select---");
                                                    
                       
                                                //echo $form->select("MemberType.id",$projectypedropdown,$currentprojectid,array('id' => 'membertype','class'=>'multilist'),"---Select---"); ?>
                                            </span>
                                        </span>
                                        <?php 
                                        if($companytypedropdown || $contacttypedropdown){
                                            echo $form->hidden("iscompandcontact", array('id' => 'iscompandcontact', 'div' => false, 'label' => '','value'=>'yes'));            
                                        }else{
                                             echo $form->hidden("iscompandcontact", array('id' => 'iscompandcontact', 'div' => false, 'label' => '','value'=>'no'));             
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">
                                        <label class="boldlabel">Company Type</label>
                                    </td>
                                    <td>
                                        <span class="txtArea_top">
                                            <span class="txtArea_bot">
                                                <?php echo $form->select("EmailTemplate.company_type",$companytypedropdown,null,array('id' => 'companytypeid','class'=>'multilist'),"---Select---"); ?>
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
                                                <?php echo $form->select("EmailTemplate.contact_type",$contacttypedropdown,null,array('id' => 'contactypeid','class'=>'multilist'),"---Select---"); ?>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td colspan="2">
                                        <p ><label class="boldlabel">1. Select person you want to send email to</label></p>
                                        <div id="contactemails" style=" background: none repeat scroll 0 0 #EBEBEB;  border: 1px solid #D3D3D3; display: block; font-size: 10px; height: 175px; overflow: auto; width: 100%;" > 
                                        <!-- Contact Email list comes here --->
                                        </div>
                                        <?php  $allemails = $this->requestAction("/admins/getallcontactbyprojectid/$projectid");    ?> 
                                        <br />
                                        <!-- <p ><i>Hint: Use the Ctrt or Shift keys to select multiple names</i> </p> -->
                                        <p><label class="boldlabel">2. Click button below to add selected names to recipients</label></p>                    
                                        <span><br />
                                            <button type="button"  id="addrecipients" class="button"><span>Add Recipients</span> </button>            
                                        </span>

                                    </td>
                                </tr>

                            </tbody>
                        </table>      
                    </td>
                </tr>

                <tr>
                    <td valign="top" colspan="2"> <?php   echo $form->textarea('EmailTemplate.content', array('id'=>'content','class'=>'ckeditor'));      ?> </td>
                </tr>       
                <tr>
                <td colspan="2"><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Send</span></button></td>
                </tr> 
                        
               <tr><td colspan="2"><div class="top-bar" style="text-align: left; padding-top: 5px; ">
                                        <?php  echo $this->renderElement('bottom_message');  ?>

                            </div></td></tr>
            </tbody>
        </table> 
           <!-- END : New Design for send mail as per Requirement -->  
                



    </div>
    <div class="clear"></div>


</div>
<?php echo $form->end();?>

 <div class="clear"></div>  

</div><!--inner-container ends here-->
                                          

<script type="text/javascript">

        
    if(document.getElementById("flashMessage")==null)
        document.getElementById("sndmail").style.paddingTop = '24px';
    else
        {
        document.getElementById("blck").style.paddingTop = '10px';
    }	


    $(document).ready(function() { 
        
        loadMemberEmails();  
        
         $("#member_type").change(function(){
            
            loadMemberEmails();  
        });

        $("#companytypeid").change(function(){
            
            loadContactEmails();  
        });

        $("#contactypeid").change(function(){
            loadContactEmails();  
        });

        $("#addrecipients").click(function(){
            addrecipients();  
        });
        
        function loadMemberEmails()
        {
        
            var current_domain=$("#current_domain").val();
            var member_type=$("#member_type").val();
            var companytypeid=$("#companytypeid").val();
            var contactypeid=$("#contactypeid").val();
            var iscompandcontact=$("#iscompandcontact").val();
              
            if(member_type!="" ){
                $("#companytypeid").val("");
                $("#companytypeid").attr("disabled","disabled");
                $("#contactypeid").val("");
                $("#contactypeid").attr("disabled","disabled");
                
                var current_domain=$("#current_domain").val();
                  $.ajax({
                                url: 'http://'+current_domain+'/admins/get_members_details_by_ajax/'+member_type,
                                cache: false,
                                success: function(html){ 
                                        $('#contactemails').hide();
                                        $('#contactemails').html(html);
                                        $('#contactemails').fadeIn(1000);   
                                         loadCheckFunction(); 
                                }
                   });
                 

            }else{
                if(iscompandcontact=="no"){
                   //   $("#member_type").val("all");   
                }else{
                    $("#companytypeid").val("");
                    $("#companytypeid").removeAttr('disabled');
                    $("#contactypeid").val("");
                    $("#contactypeid").removeAttr('disabled');
                    $("#member_type").val("");
                    $("#member_type").attr("disabled","disabled"); 
                }
               
            }
           
        
        }

        function loadContactEmails(){
            // var country_data = $(this).val();
            var current_domain=$("#current_domain").val();
            var member_type=$("#member_type").val();
            var companytypeid=$("#companytypeid").val();
            var contactypeid=$("#contactypeid").val();
            if(companytypeid!="" || contactypeid!=""){
                $("#member_type").val("");
                $("#member_type").attr("disabled","disabled");
                var companytypeid=parseInt($("#companytypeid").val()); 
                if(isNaN(companytypeid)) { companytypeid=0;}    
                var contactypeid=parseInt($("#contactypeid").val()); 
                if(isNaN(contactypeid)) { contactypeid=0;}    

              //  alert(" P id"+" comp id "+companytypeid+" contact id "+contactypeid);
                //   var commnet_offset= parseInt($("#comment_offset").val());
                $('#contactemails').hide();
                  $.ajax({
                                url: 'http://'+current_domain+'/admins/get_company_contacts_by_ajax/'+companytypeid+'/'+contactypeid,
                                cache: false,
                                success: function(html){
                                        $('#contactemails').html(html);
                                          $('#contactemails').fadeIn(1000); 
                                          loadCheckFunction();  
                                         
                                }
                   });
                 
                
           }else{
                $("#companytypeid").val("");
                $("#companytypeid").attr("disabled","disabled"); 
                $("#contactypeid").val("");
                $("#contactypeid").attr("disabled","disabled"); 
                $("#member_type").val("");
                $("#member_type").removeAttr('disabled');
           }
           
        } 

        
        
        function loadCheckFunction(){  
            $("#checkall").click(function(){
                if( $('#checkall').is(':checked')==true){
                    $('.checkid').attr('checked','checked');
                }else{
                    $('.checkid').removeAttr('checked','checked');    
                }
            });
        }




        $(document).ready(function()
        {
            $('#checkall').bind('change',function(){
                var check = $(this).attr('checked')?1:0;
                if(check ==1)
                    {
                    $('.checkid').each(function()
                    {
                        $(this).attr('checked',true);

                    });


                }else{

                    $('.checkid').each(function()
                    {
                        $(this).attr('checked',false);

                    });
                }        

            })

        });
        
        $(document).ready(function()
        {   
            $('.checkid').bind('change',function()
            {   
                //event.stopPropagation();
                var i=0;
                var j=0;
                $('.checkid').each(function(){
                    i++;
                    var check = $(this).attr('checked')?1:0;
                    if(check ==1)
                        {            
                        j++;
                    }


                });

                if(i==j)
                    $('#checkall').attr('checked',true);
                else
                    $('#checkall').attr('checked',false);
            });
        });


        function addrecipients()
        {    
            var counter=0;
            var existlist = document.getElementById('toid').value;
            var existlistarr = existlist.split(",");
            var str ='';
            var chk = '';

            var id="";
            $('.checkid').each(function(){        
                var check = $(this).attr('checked')?1:0;
              if(check ==1)
                    {      
                    
                     var title = $(this).attr("id");
                     //alert(title);
                     $('#send_invite').append(
                     $('<input/>')
                    .attr('type', 'hidden')
                    .attr('name', 'data[id_list][]')
                    .val(title)
                    );

                          
                    chk = ''; 
                    id=$(this).val(); 

                    for(j=0;j<existlistarr.length;j++){

                        if(existlistarr[j]==id){
                            chk ='set'; 
                            break;
                        }
                    }

                    if(chk==''){
                        str += id+',';    
                    }
                    counter=counter +1;
                }
            });    

            if(counter==0)
                {
                alert("Please select at least one recipient");
                return false;
            }else{    
                str = trim(str,",");
                document.getElementById('toid').value = trim(trim(document.getElementById('toid').value,',')+","+str,","); 

            }
        } 



    }); 
</script>
