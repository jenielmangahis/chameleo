<script type="text/javascript">
	$(document).ready(function() {
		$('#prosMnu').removeClass("butBg");
		$('#prosMnu').addClass("butBgSelt");
	}); 
</script>
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
		var navigateUrl="";
		var addtype = $('#addtype').val();
		if(addtype=='Marchant'){
			 navigateUrl = "addmerchant";
		}else{
				 navigateUrl = "addprospectnonprofit";
		}
		
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
            document.getElementById("linkedit").href=baseUrl+"prospects/"+navigateUrl+"/"+id+"/<?php echo $cid;?>/<?php echo $addtype ?>/editbranch"; 
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
            if(op=="del"){
                if(confirm("You have selected "+count +" items to delete ?"))
                    if(confirm("Are you sure to delete the item ?"))
                    	window.location=baseUrl+"prospects/changestatus/"+id+"/Company/0/playerslist/delete/<?php echo $option;?>";
            }
        }else{
            alert('Please atleast one record should be select'); 
            return false;
        }
    }
</script>
<?php $pagination->setPaging($paging); ?> 
<!-- Body Panel starts -->
<div class="container">
         <div class="titlCont">
		  <div class="centerPage" >
            <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
            <?php echo $form->create("prospects", array("url" => "branchlist/$cid/$addtype",'name' => 'branchlist', 'id' => "branchlist")) ?>      
			<?php if(!empty($addtype)){
				echo $form->hidden("addtype", array('id' => 'addtype','value' =>"$addtype"));			
			}
		?>
            <script type='text/javascript'>
                function setprojectid(projectid){
                    document.getElementById('projectid').value= projectid;
                    document.adminhome.submit();
                }
            </script>
            <span class="titlTxt1"><?php echo $company_name;  ?>:&nbsp;</span>
            <span class="titlTxt"><?php //echo ucfirst($option); ?> Branch List</span>
            <div class="topTabs">
                <ul class="dropdown">
                    <li>
					<?php
							if($addtype == trim("Marchant")){
								$action = 'addmerchant';
							
							}
							if($addtype == trim("Nonprofit")){
										$action = 'addprospectnonprofit';							
							}
							e($html->link(
								$html->tag('span', 'New'),
								array('controller'=>'prospects','action'=>$action,'addbranch',$companyid,$addtype),
								array('escape' => false)
								)
							);
						?>
					</li>
                    <li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
                        <ul class="sub_menu">
                            <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');">Trash</a></li>
                            <li class="botCurv"></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" onclick="editholder();" id="linkedit"><span>Edit</span></a></li>
                    
                </ul>
            </div>
	         <?php    $this->loginarea="prospects";    $this->subtabsel='brancheslist';
                            echo $this->renderElement('prospect_inner_submenu');  ?>   
                            
        </div></div>


<div class="midCont" id="cmplisttab">
        <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
        <!-- top curv image starts -->
        <div>
            <span class="topLft_curv"></span>
			<span class="topRht_curv"></span>
            <div class="gryTop">
			<div class="new_filter">
               
                <script type='text/javascript'>
                    function setprojectid(projectid){
                        document.getElementById('projectid').value= projectid;
                        document.adminhome.submit();
                    }
                </script>
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));

                    ?> 
                </span>
				</div>
                </div>	
            <div class="clear"></div></div>
        <?php $i=1; ?>			
        <div class="tblData">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="trBg">
                    <th align="center" valign="middle" style='width:1%'>#</th>
                    <th align="center" valign="middle" style='width:2%;'><input type="checkbox" value="" name="checkall" id="checkall" /></th>
                    <th align="center" valign="middle" style='width:15%;'><span class="right"><?php echo $pagination->sortBy('company_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Location Type</th>
					<th align="center" valign="middle" style='width:20%'><span class="right"><?php echo $pagination->sortBy('address1',$html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Address1</th>					
                    <th align="center" valign="middle" style='width:20%'><span class="right"><?php echo $pagination->sortBy('address2', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Address2</th>
                    <th align="center" valign="middle" style='width:10%'><span class="right"><?php echo $pagination->sortBy('city', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>City</th>
                    <th align="center" valign="middle" style='width:12%'><span class="right"><?php echo $pagination->sortBy('state', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>State</th>
                    <th align="center" valign="middle" style='width:6%'><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>

                </tr>
                <?php if($companydata){ 
                        $i=1;
                        foreach($companydata as $eachrow){
						
                            $recid = $eachrow['Company']['id'];
                            $modelname = "Company";
                            $redirectionurl = "branchlist";
                            $company_type_id = $eachrow['CompanyType']['company_type_name'];
                            $company_name = $eachrow['Company']['company_name'];
                            if($company_name) $company_name = AppController::WordLimiter($company_name,15);
                            $email = $eachrow['Company']['email'];
							$address1 = $eachrow['Company']['address1'];
							$address2 = $eachrow['Company']['address2'];
                            if($email)	$email = AppController::WordLimiter($email,27);
                            $phone = $eachrow['Company']['phone'];
                            $website = $eachrow['Company']['website'];
                            if($website) $website = AppController::WordLimiter($website,30);
							$location_type = ($eachrow['Company']['location_type_id']=='0')?'HQ':'Branch';
							$hq_id = $eachrow['Company']['hq_id'];
						

							$categoryarray = AppController::getMerchantCategories($recid);
							//pr($categoryarray);
							$categories ='';
							foreach($categoryarray as $category){
								if($categories !='')
									$categories .= ', ' ;
								$categories .= $category['Category']['category_name'];
							}
							
							$ein = $eachrow['Company']['ein'];
							$city = $eachrow['Company']['city'];
							$state = AppController::getstatename($eachrow['Company']['state']);
				
                        ?>

                        <?php if($i%2 == 0) { ?>
                            <tr class='altrow'>	

                                <td align="center" class='newtblbrd'><span style="color:#4d4d4d;"><?php echo $i++;?></span></td>
                                <td align="center" class='newtblbrd'><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>
                                <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span', $location_type),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
							?>
							</td>
							<td align="left" valign="middle" class='newtblbrd'>
									
								<?php
									e($html->link(
									$html->tag('span', $address1),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
							</td>
							 <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									
									e($html->link(
									$html->tag('span', $address2),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
							?>
								</td>
                              
                                <td align="left" valign="middle" class='newtblbrd'>

									<?php
									e($html->link(
									$html->tag('span',  $city),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
								</td>
								  <td align="left" valign="middle" class='newtblbrd'>
									

									<?php
									e($html->link(
									$html->tag('span', $state),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
								</td>
								 <td align="center" valign="middle" class='newtblbrd'>
		<?php 
		if($eachrow['Company']['active_status']=='1'){
			e($html->link(
				$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$eachrow['Company']['company_name'])),
				array('controller'=>'prospects','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus',$cid,$addtype),
				array('escape' => false),
				'Are you sure you want to Deactivate Merchant ?',
                false
				)
			);
		} else {
			e($html->link(
				$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$eachrow['Company']['company_name'])),
				array('controller'=>'prospects','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus',$cid,$addtype),
				array('escape' => false),
				'Are you sure you want to Activate Merchant ?',
                false
				)
			);
		}			
		?>
		</td>
                            </tr>
                            <?php } else { ?>

                            <tr>	

                                <td align="center"><span style="color:#4d4d4d;"><?php echo $i++;?></span></td>
                                <td align="center"><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>
                                <td align="left" valign="middle">								
							<?php
									e($html->link(
									$html->tag('span', $location_type),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
							?>
									
								</td>
                                <td align="left" valign="middle">
									<?php
										e($html->link(
										$html->tag('span', $address1),
										array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
										array('escape' => false)
										)
									);
								?>


								</td>
                                <td align="left" valign="middle">
									<?php
									e($html->link(
									$html->tag('span', $address2),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
								</td>
                               
                                <td align="left" valign="middle">
									<?php
									e($html->link(
									$html->tag('span',  $city),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
								</td>
								 <td align="left" valign="middle">
									<?php
									e($html->link(
									$html->tag('span', $state),
									array('controller'=>'prospects','action'=>$action,$recid,$hq_id,$addtype,'editbranch'),
									array('escape' => false)
									)
								);
								?>
								</td>
								<td align="center" valign="middle" class='newtblbrd'>
		<?php 
		if($eachrow['Company']['active_status']=='1'){
			e($html->link(
				$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$eachrow['Company']['company_name'])),
				array('controller'=>'prospects','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus',$cid,$addtype),
				array('escape' => false),
				'Are you sure you want to Deactivate Merchant ?',
                false
				)
			);
		} else {
			e($html->link(
				$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$eachrow['Company']['company_name'])),
				array('controller'=>'prospects','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus',$cid,$addtype),
				array('escape' => false),
				'Are you sure you want to Activate Merchant ?',
                false
				)
			);
		}			
		?>
		</td>

                            </tr>


                            <?php } ?>	
                        <?php } }else{ ?>
                    <tr><td colspan="9" align="center">No Branch Found.</td></tr>
                    <?php } ?>
            </table> 
        </div>
        <div>
            <span class="botLft_curv"></span><span class="botRht_curv"></span>
            <div class="gryBot"><?php if($companydata) { echo $this->renderElement('newpagination'); } ?>
            </div>
            <div class="clear"></div>
        </div>
        <!--inner-container ends here-->

        <?php echo $form->end();?>

    </div>
 <div class="clear"></div>    
</div>   
<script type="text/javascript">
    if(document.getElementById("flashMessage")!=null){		
        document.getElementById("cmplisttab").className = "newmidCont";
    }	
</script>