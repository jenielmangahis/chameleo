<?php
$base_url_admin = Configure::read('App.base_url_admin');
$resetUrl = $base_url_admin.'nonmemberslist';
$downloadUrl = $base_url_admin.'downloadholder';
?>
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



    function editholder()
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
            document.getElementById("linkedit").href=baseUrlAdmin+"editholder/"+id; 

        }
    } 


    function activatecontents(act,op)
    {   
        var id="";
        var count=0;
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
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Holder/1/nonmemberslist/cngstatus";
                }else{
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Holder/0/nonmemberslist/cngstatus";
                }
            }
            if(op=="del"){
                if(confirm("You have selected "+count +" items to delete ?"))

                    if(confirm("Are You Sure to delete the item"))
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Holder/0/nonmemberslist/delete";
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
<div class="titlCont"><div class="centerPage">

        <div align="center" id="toppanel" >
            <?php  echo $this->renderElement('new_slider');  ?>

        </div>


        <?php  echo $this->renderElement('project_name');  ?>

        <span class="titlTxt">
            Non-Members
        </span>


        <div class="topTabs">
            <ul class="dropdown">
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'New'),
								array('controller'=>'admins','action'=>'addnonmember'),
								array('escape' => false)
								)
					);
				?>
				</li>
                <li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
                    <ul class="sub_menu">
                        <li><a href="javascript:void(0)" onclick="return activatecontents('active','change');">Publish</a></li>
                        <li><a href="javascript:void(0)" onclick="return activatecontents('deactive','change');">Unpublish</a></li>
                        <!--li><a href="javascript:void(0)">Copy</a></li-->
                        <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');">Trash</a></li>
                        <li class="botCurv"></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)" onclick="editholder();" id="linkedit"><span>Edit</span></a></li>
            </ul>
        </div>

        <?php    $this->loginarea="admins";    $this->subtabsel="nonmemberslist";
            echo $this->renderElement('memberlist_submenus');  ?>  
    </div></div>




<div class="midCont">



    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

    <!-- top curv image starts -->
    <div>
        <span class="topLft_curv"></span>
		<span class="topRht_curv"></span>
        <div class="gryTop">
		
            <?php echo $form->create("admins", array("action" => "nonmemberslist",'type' => 'file','enctype'=>'multipart/form-data','name' => 'contentlist', 'id' => "contentlist"))?>
<div class="new_filter">
            <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));
                    if(isset($this->data['Admin']['searchkey']) && $this->data['Admin']['searchkey'] !=""){
                        echo $form->submit("Reset", array('id' => 'searchkey', 'div' => false, 'label' => '','onclick'=>'document.getElementById("searchkey").value=""'));
                    }
                ?> 

            </span>
            <span class="srchBg2">
                <input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $resetUrl ?>')" id="locaa">&nbsp;&nbsp;  

            </span>
			</div>
			<?php /* ?>
			<span class="srchBg2"><input type="button" value="Csv file download" label="" onclick="javascript:(window.location='<?php echo $downloadUrl ?>')" > </span>
			<?php */ ?>

        </div>
        <div class="clear"></div></div>
    <div class="tblData">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr class="trBg">
                <th align="center" valign="middle" style="width:1%">#</th>
                <th align="center" valign="middle" style="width:2%"><input type="checkbox" value="" name="checkall" id="checkall" /></th>
                <th align="center" valign="middle" style="width:20%"><span class="right"><?php echo $pagination->sortBy('created', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Email Address</th>
                <th align="center" valign="middle" style="width:20%"><span class="right"><?php echo $pagination->sortBy('lastnameshow', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Last Name</th>
				<th align="center" valign="middle" style="width:20%"><span class="right"><?php echo $pagination->sortBy('firstname', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>First Name</th>
               <th align="center" valign="middle" style="width:15%"><span class="right"><?php echo $pagination->sortBy('created', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Upload Date</th>
               <!-- <th align="center" valign="middle" style="width:10%">&nbsp;</th>-->
                <th align="center" valign="middle" style="width:12%"><span class="right"><?php echo $pagination->sortBy('active_status ', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>
            </tr>
            <?php $i=1;?>
            <?php if($holderlist){
                    $alt=0;
                    $created="";
                    foreach($holderlist as $eachrow){

                        $alt++;
                        $recid = $eachrow['Holder']['id'];
                        $userid = $eachrow['Holder']['user_id'];
                        $modelname = "Holder";
                        $othermodelname = "User";
                        $redirectionurl = "nonmemberslist";
                        $screenname=$eachrow['Holder']['screenname'];
                        $firstname = $eachrow['Holder']['firstname'];
                        if($firstname) $firstname = AppController::WordLimiter($firstname,25);
                        $lastnameshow = $eachrow['Holder']['lastnameshow'];
                        if($lastnameshow) $lastnameshow = AppController::WordLimiter($lastnameshow,25);
                        $email = $eachrow['Holder']['email'];
                        if($email) $email = AppController::WordLimiter($email,30);
                        $created = $eachrow['Holder']['created'];
                        if($eachrow['Holder']['created'] !='0000-00-00'){
                            $created = AppController::usdateformat($eachrow['Holder']['created']);
                        }
                        $membertype=$eachrow['MemberType']['member_type']; 

                        if($membertype=="Holder")   {
                            $editmemnerpage="editholder/".$recid;
                        }else if($membertype=="Non Holder")   { 
                                $editmemnerpage="editnonholder/".$recid;      
                            }else{
                                $editmemnerpage="#";
                        }
                        $donationlevel=$eachrow['DonationLevel']['level_name'];    
                        $points=$eachrow[0]['totalpoints'];     
                        if($i%2 == 0 ){
                            $cls="altrow";        
                        } else{
                            $cls=""; 
                        }
                    ?>
                    <tr class='<?php echo $cls; ?>'>    
                        <td align="center" class='newtblbrd'><span style='color:#4d4d4d;'><?php echo $i++;?></span></td>
                        <td align="center" class='newtblbrd'><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>
                        <td align="center" valign="middle" class='newtblbrd'><span style='color:#4d4d4d;'><?php echo $email; ?></span></td>
                        <td align="left" valign="middle" class='newtblbrd'>
							<?php
									e($html->link(
									$html->tag('span', ($lastnameshow)?$lastnameshow:'N/A'),
									array('controller'=>'admins','action'=>$editmemnerpage),
									array('escape' => false)
									)
								);
							?>
						</td>
						<td align="left" valign="middle" class='newtblbrd'>
							
							<?php
								e($html->link(
									$html->tag('span', ($firstname)?$firstname:'N/A'),
									array('controller'=>'admins','action'=>$editmemnerpage),
									array('escape' => false)
									)
								);
							?>
						</td>
						<td align="center" valign="middle" class='newtblbrd'><span style='color:#4d4d4d;'><?php echo $created?$created:"N/A"; ?></span></td>
                       <!-- <td align="center" valign="middle" class='newtblbrd'>&nbsp;</td>-->
                        <td align="center" valign="middle" class='newtblbrd'>
						<?php 
						if($eachrow['Holder']['active_status']=='1'){
							e($html->link(
									$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$firstname)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus',$othermodelname,$userid),
									array('escape' => false)
									)
								);
							}
							else{
								e($html->link(
									$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$firstname)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,$othermodelname,$userid),
									array('escape' => false)
									)
								);
							}	
						?>
						</td>
                    </tr>
                    <?php } }else{ ?>
                <tr><td colspan="8" align="center">No Non Members Found.</td></tr>
                <?php  } ?>

        </table>

    </div>
    
     <!-- bot curv image starts -->
        <div>
            <span class="botLft_curv"></span><span class="botRht_curv"></span>
            <div class="gryBot"><?php if($holderlist) { echo $this->renderElement('newpagination'); } ?>
            </div>
            <div class="clear"></div>
        </div>
        <!-- bot curv image ends -->
   
<!--inner-container ends here-->


  
  </div>
  <?php echo $form->end();?>       
   </div>

<div class="clear"></div>