<?php //print_r($project);?> 
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
    function editDonationLevel()
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
            document.getElementById("linkedit").href=baseUrlAdmin+"projectdonatelevels_add/"+id; 

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
                    window.location=baseUrlAdmin+"changestatus/"+id+"/DonationLevel/1/projectdonatelevels/cngstatus";
                }else{
                    window.location=baseUrlAdmin+"changestatus/"+id+"/DonationLevel/0/projectdonatelevels/cngstatus";
                }
            }
            if(op=="del"){
                if(confirm("You have selected "+count +" items to delete ?"))

                    if(confirm("Are You Sure to delete the item"))
                    window.location=baseUrlAdmin+"changestatus/"+id+"/DonationLevel/0/projectdonatelevels/delete";
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
       <div class="titlCont">
	     <div class="centerPage">
            <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
        
            <?php echo $form->create("Admins", array("action" => "projectdonatelevels",'name' => 'projectdonatelevels', 'id' => "projectdonatelevels")) ?>
            <script type='text/javascript'>
                function setprojectid(projectid){
                    document.getElementById('projectid').value= projectid;
                    document.adminhome.submit();
                }
            </script>

            <span class="titlTxt1"><?php echo $current_project_name;  ?>:&nbsp;</span>
            <span class="titlTxt">   Donator Levels  </span>
            
            <div class="topTabs">
                <ul class="dropdown">
                <li>

					<?php
				e($html->link(
					$html->tag('span', 'New'),
					array('controller'=>'admins','action'=>'projectdonatelevels_add'),
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
                <li><a href="javascript:void(0)" onclick="editDonationLevel();" id="linkedit"><span>Edit</span></a></li>
                </ul>
            </div>

       
            <?php    $this->loginarea="admins";    $this->subtabsel="projectdonatelevels";
                    echo $this->renderElement('donation_submenus');  ?>   
        </div></div>
<div class="midCont" id="newhldtab">
    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

    <!-- top curv image starts -->
    <div>
        <span class="topLft_curv"></span>
		<span class="topRht_curv"></span>
        <div class="gryTop">
            
            <script type='text/javascript'>
                function setprojectid(projectid){
                    document.getElementById('projectid').value= projectid;
                    document.adminhome.submit();
                }
            </script>
			<div class="new_filter">
            <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));
      ?> 
              
            </span>
            <span class="srchBg2">
                <input type="button" value="Reset" label="" onclick = "javascript:(window.location=baseUrlAdmin+'projectdonatelevels')" id="locaa">&nbsp;&nbsp;  
           </span></div>

        </div>
        <div class="clear"></div></div>
    <div class="tblData">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                

          <tr class="trBg">
        <th align="center" valign="middle" style="width:5%">#</th>
        <th align="center" valign="middle" style="width:3%"><input type="checkbox" id="checkall" name="checkall" value=""></th>
            <th align="center" valign="middle" style="width:25%"><span class="right"><?php echo $pagination->sortBy('level_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Donator Level</th>
            <th align="center" valign="middle" style="width:16%"><span class="right"><?php echo $pagination->sortBy('level_lowerrange', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Donation Range</th>
            <th align="center" valign="middle" style="width:40%"><span class="right"><?php echo $pagination->sortBy('level_note', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Notes</th>
            <th align="center" valign="middle" style="width:8%"><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>

      </tr>
       <?php if($donationlevellist){ $i=1;         
               foreach($donationlevellist as $eachrow){
                   
               $recid = $eachrow['DonationLevel']['id'];
               $modelname = "DonationLevel";
               $redirectionurl = "projectdonatelevels";
               $level_name=   $eachrow['DonationLevel']['level_name']; 
               $level_lowerrange =$eachrow['DonationLevel']['level_lowerrange'];  
               $level_upperrange =$eachrow['DonationLevel']['level_upperrange'];  
               if($level_lowerrange!='' && $level_upperrange!='' ){
                    $donation_range="$".$level_lowerrange." - $".$level_upperrange;
               }else{
                   $donation_range="NA";
                }
                
                $note =$eachrow['DonationLevel']['level_note'];
                
                  if($i%2 == 0 ){
                       $cls="altrow";        
                     } else{
                        $cls=""; 
                     }
                        
           ?>
            <tr class='<?php echo $cls; ?>'>    
             <td align="center" class='newtblbrd' valign="middle"><?php echo $i++ ?></td>
             <td align="center" class='newtblbrd' valign="middle"><input type="checkbox" value="<?php echo $recid; ?>" name="checkid[]" class="checkid"></td>
             <td align="left" class='newtblbrd' valign="middle">
			 <?php
				e($html->link(
					$html->tag('span', $level_name),
					array('controller'=>'admins','action'=>'projectdonatelevels_add',$recid),
					array('escape' => false)
					)
				);
			?>

			</td>
             <td align="center" class='newtblbrd' valign="middle">
			 
				
				 <?php
				e($html->link(
					$html->tag('span', $donation_range),
					array('controller'=>'admins','action'=>'projectdonatelevels_add',$recid),
					array('escape' => false)
					)
				);
			?>
			</td>
             <td align="left" class='newtblbrd' valign="middle">
				
					 <?php
				e($html->link(
					$html->tag('span', $note),
					array('controller'=>'admins','action'=>'projectdonatelevels_add',$recid),
					array('escape' => false)
					)
				);
			?>
			</td>
             <td align="center" valign="middle" class='newtblbrd'>
				
				<?php if($eachrow['DonationLevel']['active_status']=='1'){ 
					if(isset($eachrow['DonationLevel']['member_type'])){
						$data=$eachrow['DonationLevel']['member_type'];
					}
						else{
							$data='';
						
					}
						e($html->link(
								$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$data)),
								array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus'),
								array('escape' => false)
								)
							);
				}
				else{ 	
						e($html->link(
								$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$data)),
								array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus'),
								array('escape' => false)
								)
							);
				}
				?>
				
			</td>
        
        </tr>
    <?php  }
       }else{ ?>
    <tr><td colspan="6" align="center">No Donation levels Found.</td></tr>
    <?php } ?>
    </table>



    </div>
    <div>
    <span class="botLft_curv"></span>
	<span class="botRht_curv"></span>
    <div class="gryBot"><?php if($donationlevellist) { echo $this->renderElement('newpagination'); } ?>
    </div>
    <div class="clear"></div>

    </div>
<!--inner-container ends here-->




      </div>    
<script type="text/javascript">
    if(document.getElementById("flashMessage")!=null)
        {		
        document.getElementById("newhldtab").className = "newmidCont";
    }	
</script>
