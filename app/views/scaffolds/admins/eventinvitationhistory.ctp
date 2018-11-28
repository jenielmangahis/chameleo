<?php $pagination->setPaging($paging);
echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');    
$base_url_admin = Configure::read('App.base_url_admin');
$base_url = Configure::read('App.base_url');
 ?>  
 <?php
    $arr = explode("/",$_SERVER['REQUEST_URI']); 
    
    if($arr[4]=="pastevent")
        $hide_menu=1;
    else
        $hide_menu=0;
        
    $receventid=$arr[3];
?>
 
 <link rel="stylesheet" type="text/css" href="/js/datetimepicker/smothness/jquery_ui_datepicker.css">             
 <!-- Body Panel starts -->
<script type="text/javascript">
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



 function editcontent()
        {       
        var counter=0;
        var id="";
        $('.checkid').each(function(){          
                var check = $(this).attr('checked')?1:0;
                if(check ==1)
                {                       
                        id=$(this).val();
                        counter=counter +1;
                }
        });     
        
        if(counter!=1)
        {
                alert("please select only one row  to edit");
                return false;
                }else{  
                document.getElementById("linkedit").href=baseUrlAdmin+"editcommtask/"+id;                
               }
        } 


function activatecontents(act,op)
{   
    var id="";
        var count=0;
    var receventid=$("#receventid").val();
    
    $('.checkid').each(function(){       
        var check = $(this).attr('checked')?1:0;
        if(check ==1)
        {           
            if(id==""){
                id=$(this).val();
               
                ++count;
                }
                else
                {
                id=id + "*" + $(this).val();
                ++count;
                }
        }
   });
                        if(id !=""){
                                        if(op=="change"){       
                                                if(act=="active"){
                                                        window.location=baseUrlAdmin+"changestatus/"+id+"/EventInvitation/1/eventinvitationhistory/cngstatus/0/"+receventid;
                                                        }else{
                                                        window.location=baseUrlAdmin+"changestatus/"+id+"/EventInvitation/0/eventinvitationhistory/cngstatus/0/"+receventid;
                                                        }
                                        }
                                        if(op=="del"){
            if(confirm("You have selected "+count +" items to delete ?"))

			if(confirm("Are you sure to delete the item ?"))
                                        window.location=baseUrlAdmin+"changestatus/"+id+"/EventInvitation/0/eventinvitationhistory/delete/0/"+receventid;
                                        }
                        }else{
                                alert('Please atleast one record should be select'); 
                                return false;
                        }
                }
</script>



<!--container starts here-->
<?php $pagination->setPaging($paging); ?>
<div class="container">
<div class="titlCont"><div class="myclass">
<div align="center" class="slider" id="toppanel">
         <?php  echo $this->renderElement('new_slider');  ?>

</div>
   <?php echo $form->create("Admins", array("action" => "commtaskhistorylist",'name' => 'commtaskhistorylist', 'id' => "commtaskhistorylist")) ?>
                <script type='text/javascript'>
                        function setprojectid(projectid){
                                        document.getElementById('projectid').value= projectid;
                                        document.adminhome.submit();
                                }
                </script>
 <?php  echo $this->renderElement('project_name');  ?>
  <input type="hidden" id="receventid" name="receventid" value="<?php echo $receventid;?>">                                    </th>   
<span class="titlTxt">Invites History </span>

<div class="topTabs">
<ul class="dropdown">
<li>
	
	<?php
		e($html->link(
			$html->tag('span', 'Cancel'),
			array('controller'=>'admins','action'=>'eventlist'),
			array('escape' => false,'id' =>'linkedit')
			)
		);
	?>
</li>  
</ul>
</div>

<div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
<div style="height: 30px; clear: both; padding-left: 40px;">
<ul class="topTabs2" style="margin-left: -40px;">
 <li>
	<?php
		e($html->link(
			$html->tag('span', 'RSVP'),
			array('controller'=>'admins','action'=>'rsvp',$rec_event_id,($hide_menu)?'pastevent':''),
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
									array('controller'=>'admins','action'=>'waitlist',$rec_event_id,($hide_menu)?'pastevent':''),
									array('escape' => false)
									)
								);
						?>
					</li>
                  <?php
                   }
                   ?>
                   <?php
                   if($hide_menu==0)
                   {
                   ?>
                   <li>
						
						<?php
								e($html->link(
									$html->tag('span', 'Send Invite'),
									array('controller'=>'admins','action'=>'send_invite'),
									array('escape' => false)
									)
								);
						?>
					</li>
                   <li>
						
						<?php
								e($html->link(
									$html->tag('span', 'Event Task'),
									array('controller'=>'admins','action'=>'eventtasklist',$rec_event_id,),
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
									$html->tag('span', 'Invites'),
									array('controller'=>'admins','action'=>'eventinvitationhistory',$rec_event_id,($hide_menu)?'pastevent':''),
									array('escape' => false,'class'=>'tabSelt')
									)
								);
						?>
					</li>
                   <?php
                   if($hide_menu==0)
                   {
                   ?>
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
                   <?php
                   }
                    ?>
</ul>
</div>
<div class="clear"></div>

</div>
</div>
<div class="midCont" id="newcmmtasktab">
<?php if($session->check('Message.flash')){ ?> 
<div id="blck"> 
        <div class="msgBoxTopLft"><div class="msgBoxTopRht"><div class="msgBoxTopBg"></div></div></div>
	        <div class="msgBoxBg">
		        <div class=""><a href="#." onclick="hideDiv();"><img src="/img/close.png" alt="" style="margin-left: 945px;
    position: absolute;
    z-index: 11;" /></a>
			        <?php  $session->flash();    ?> 
		        </div>
	                <div class="msgBoxBotLft"><div class="msgBoxBotRht"><div class="msgBoxBotBg"></div></div></div>
		</div>
</div>
                                            <?php } ?>

                            <!-- top curv image starts -->
                            <div>
                            <span class="topLft_curv"></span>
                
                <div class="gryTop">
               
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200",'value'=>(isset($key))?$key:''));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => '','class'=>'btn'));
                        ?> 
                </span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='/admins/eventinvitationhistory')" id="locaa"></span>
                
                        </div> <span class="topRht_curv"></span>
                        <div class="clear"></div></div>

                        <?php $i=1; ?>  
                        <div class="tblData">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="trBg">
        <th align="center" style="width:2%;">#</th>
        <th align="center" style="width:3%;"><input type="checkbox" value="" name="checkall" id="checkall" /> <input type="hidden" id="current_domain" name="current_domain" value="<?php echo $current_domain;?>">                                    </th>   
        <th align="center" valign="middle" style="width:18%;"><span class="right"><?php echo $pagination->sortBy('task_execution_date', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Last Name</th>         
        <th align="center" valign="middle" style="width:18%;"><span class="right"><?php echo $pagination->sortBy('task_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>First Name</th>      
        <th align="center" valign="middle" style="width:18%;"><span class="right"><?php echo $pagination->sortBy('email_template_id', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Member Type</th>      
        <th align="center" valign="middle" style="width:15%;"><span class="right"><?php echo $pagination->sortBy('recur_pattern', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Donator Level</th>      
        <th align="center" valign="middle"style="width:15%;"><span class="right"><?php echo $pagination->sortBy('task_execution_count', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Invite Date</th>      
        <th align="center" valign="middle" style="width:50px;"><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th> 

        </tr>
        <?php
                if($taskdata){
                     $alt=0;
                        foreach($taskdata as $eachrow){
                            
                            if($alt%2==0)
                                $class="style='background-color:#FFF;'";
                            else
                                $class="style='background-color:#f8f8f8;'";

                        $alt++;
                        
                        $recid = $eachrow['EventInvitation']['id'];
                        $taskid = $eachrow['EventInvitation']['task_id'];
                        $projectid = $eachrow['EventInvitation']['project_id'];
                        $modelname = "EventInvitation";
                        $redirectionurl = "eventinvitationhistory";
                        //$company_task_id = $eachrow['CommunicationTaskHistory']['id'];
                        //$task_name= $eachrow['CommunicationTaskHistory']['task_name'];
                        //$task_email_tempname= $eachrow['EmailTemplate']['email_template_name'];
                        
                        $holder_id = $eachrow['EventInvitation']['invite_to_holder_id'];
                        
                        $holder_name=AppController::getholdernamebyid($holder_id);
                        
                        App::import("Model", "Holder");
                        $this->Holder =  & new Holder();   
                        
                        $condition= "Holder.id = '".$holder_id."'";
                        $holder_data = $this->Holder->find('first',array("conditions"=>$condition));
                        
                        $first_name=$holder_data['Holder']['firstname'];
                        $last_name=$holder_data['Holder']['lastnameshow'];
                        
                        $invite_date=$eachrow['EventInvitation']['created'];                        
                        /*
                        if($holder_id!="")
                        {
                        
                            {
                              $condition1 = "Holder.project_id = '".$eachrow['EventInvitation']['project_id']."' AND Holder.delete_status='0' and Holder.id='".$holder_id."' and  Holder.id In(select holder_id from coins_holders where project_id=".$eachrow['EventInvitation']['project_id']." and active_status='1' and delete_status='0')";   
                              //$member_type="Coin Holder";
                            }
                          
                            {                                                  
                                $condition2 = "Holder.project_id = '".$eachrow['EventInvitation']['project_id']."' AND Holder.delete_status='0' and Holder.id='".$holder_id."' and Holder.id NOT In(select holder_id from coins_holders where project_id=".$eachrow['EventInvitation']['project_id']." and active_status='1' and delete_status='0')";       
                                //$member_type="Non Coin Holder";
                            }
                            
                            {                                               
                                $condition3 = "Holder.project_id = '".$eachrow['EventInvitation']['project_id']."' AND Holder.delete_status='0' AND Holder.active_status='0' and Holder.id='".$holder_id."'";  
                               //$member_type="Non Member";                               
                            }
                                                      
                            $coin_holder= $this->Holder->find('first',array("conditions"=>$condition1));
                                                                                   
                            if(!empty($coin_holder))
                                $member_type="Coin Holder";
                            else
                            if(empty($coin_holder))
                            {
                                $non_coin_holder = $this->Holder->find('first',array("conditions"=>$condition2));
                                if(!empty($non_coin_holder))
                                    $member_type="Non Coin Holder";
                            }
                            else
                            {
                                $non_member = $this->Holder->find('first',array("conditions"=>$condition3));
                                if(!empty($non_member))
                                    $member_type="Non Member";
                            }            
                            
                             
                        }
                        */
                        
                        $member_type=$eachrow['MemberType']['member_type'];
                        $donator_level=$eachrow['DonationLevel']['level_name'];

                ?>

 <tr <?php echo $class;?>>       
                <td align="center" class='newtblbrd'><span style="color:#4d4d4d;"><?php echo $i++;?></span></td>
                <td align="center" class='newtblbrd'><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></a></span></td>
                <td align="left" valign="middle" class='newtblbrd'>
					<!--<a><span><?php echo $last_name?$last_name:'N/A'; ?></span></a>-->
					<?php
						e($html->link(
							$html->tag('span', $last_name?$last_name:"N/A"),
							array('escape' => false)
							)
						);
						?>
				</td>   
                <td align="left" valign="middle" class='newtblbrd'>
				<!--	<a><span><?php echo $first_name?$first_name:'N/A'; ?></span></a>-->
					<?php
						e($html->link(
							$html->tag('span', $first_name?$last_name:"N/A"),
							array('escape' => false)
							)
						);
						?>

				</td>              
                <td align="left" valign="middle" class='newtblbrd'>
					<!--<a><span><?php echo $member_type?$member_type:'N/A';  ?></span></a>-->
					<?php
						e($html->link(
							$html->tag('span', $member_type?$member_type:"N/A"),
							array('escape' => false)
							)
						);
						?>

				</td>  
                <td align="center" valign="middle" class='newtblbrd'>
				<!--	<a><span><?php echo $donator_level?$donator_level:'N/A';  ?></span></a>-->
						<?php
						e($html->link(
							$html->tag('span', $donator_level?$donator_level:"N/A"),
							array('escape' => false)
							)
						);
						?>

				</td>
                <td align="center" valign="middle" align="center" class='newtblbrd'>
					<a><span><?php echo $invite_date; ?></a></span>
					<?php
						e($html->link(
							$html->tag('span', $invite_date),
							array('escape' => false)
							)
						);
						?>

				</td>              
                 <td align="center" valign="middle" class='newtblbrd'><a><span><?php if($eachrow['EventInvitation']['active_status']=='1'){
					e($html->link(
									$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$coinsetname)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus','0',$coinsetname),
									array('escape' => false)
									)
								);
							} else {
								e($html->link(
									$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$coinsetname)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus','0',$coinsetname),
									array('escape' => false)
									)
								);
							}		
					?>
					</td>       
                </tr>
			<?php  

         } } else{ ?>
        <tr><td colspan="9" align="center">No Invite History Found.</td></tr>
        <?php } ?>
        </table>
        
           

  </div>

      <div>
      <span class="botLft_curv"></span>
      
      <div class="gryBot"><?php if($taskdata) { echo $this->renderElement('newpagination'); } ?>
      </div>
      <!--inner-container ends here-->
        

      <span class="botRht_curv"></span>
      
       <div id="taskhistoryreport" title="Task History Report">
                <p>This is a list of all sent members or contacts of selected Task History.</p>
            </div>
            
      <div class="clear"></div>
      </div>
      <?php echo $form->end();?>




<div class="clear"></div>
    </div>
    
         <div class="clear"></div>
</div>      
  <script type="text/javascript">
    // increase the default animation speed to exaggerate the effect
    $.fx.speeds._default = 1000;
    $(function() {
        $( "#taskhistoryreport" ).dialog({
            autoOpen: false,
            modal: true,
            width: 560,
            show: "blind",
            hide: "blind"
        });

       $( ".showSentHistory" ).click(function() {  // runTaskReport();
            var current_domain=$("#current_domain").val(); 
            var history= $(this).attr('id').split('_');
          //  alert(history);
            var history_id=history[1];
            var task_id=history[2];
           
            $.ajax({
                            type: "GET",  
                            url: 'http://'+current_domain+'/admins/commtask_get_history_sentitem_list_by_ajax/'+history_id+'/'+task_id,
                            cache: false,
                            success: function(result){    
                                      $("#taskhistoryreport").html(result); 
                                      $( "#taskhistoryreport" ).dialog( "open" );
                                      return false; 
                            }
              });
           
          
        });
    });

    
	if(document.getElementById("flashMessage")!=null)
	{		
	document.getElementById("newcmmtasktab").className = "newmidCont";
	}	
</script>
