<script type="text/javascript">
$(document).ready(function() {
$('#compAnies').removeClass("butBg");
$('#compAnies').addClass("butBgSelt");
}); 
</script>
<?php
$base_url = Configure::read('App.base_url');
$resetUrl = $base_url.'contacts/sa_companylist';
?>
<!--container starts here-->
<?php $pagination->setPaging($paging); ?>

<style>
    div.centerPage, #rmh {min-width:960px !important; max-width:1600px !important;width:90% !important;} /* change later at newadmintemplate.css line 1286 */
    .header {padding: 0;} /* change later at newadmintemplate.css line 54 */
</style>

<div class="titlCont"><div id=rmh class="centerPage"> 
        <?php echo $form->create("contacts", array("action" => "sa_companylist",'name' => 'companylist1', 'id' => "companylist1"))?>
        <div align="center" id="toppanel" >
        <?php  echo $this->renderElement('new_slider');  ?>
</div>
<span class="titlTxt">Company List  </span>
<div class="topTabs" style="margin-left: -40px;">
        <ul class="dropdown">
                <li class="">
				<?php
						e($html->link(
						$html->tag('span', 'New'),
						array('controller'=>'contacts','action'=>'sa_addcompany'),
						array('escape' => false)
						)
					  );
					?>
				</li>
                <li><a class="tab2" href="javascript:void(0)"><span>Actions</span></a>
                <ul class="sub_menu">
                  
                        <li><a onclick="return activatecompanycontents('asd','del');" href="javascript:void(0)">Trash</a></li>

                        <li class="botCurv"></li>
                </ul></li>
                <li><a id="linkedit" onclick="editholder();" href="javascript:void(0)"><span>Edit</span></a></li>
        </ul>
        </div>
		<div class="clear"></div>
		 <?php    //$this->loginarea="links";    $this->subtabsel="activelinklist";
             echo $this->renderElement('contact_sub');  ?>  
</div></div>

<!-- rolland 8-6-2012 -->
<div class="new_midCont" id="newcmptab">

	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

    <div>
        <!-- book ends -->
        <span class="topLft_curv"></span>
        <span class="new_topRht_curv"></span>
        
        <div class="new_gryTop">
            <?php echo $form->create("contacts", array("action" => "sa_companylist",'name' => 'companylist1', 'id' => "companylist1")) ?>
            <script type='text/javascript'>function setprojectid(projectid){document.getElementById('projectid').value= projectid;document.adminhome.submit();}</script>   
            <div class="new_filter">
                <span class="new_spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));?></span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $resetUrl ?>')" id="locaa"></span>
            </div>
            <div style="float:left"><?php if(!isset($selectedprojectid)) $selectedprojectid="";echo $form->hidden("contacts.projectid", array('id' => 'projectid','value'=>"$selectedprojectid"));?></div> 
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>
    </div>
<! -- rolland 8-6-2012 -->

<div class="tblData">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr class="trBg"> 
      <th align="center" valign="middle" style="width:1%;">#</th>
      <th align="center" valign="middle" style="width:2%"><input type="checkbox" id="checkall" name="checkall" value=""></th>
      <th align="center" valign="middle" style="width:20%;"><span class="right"><?php echo $pagination->sortBy('company_type_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Company Type</th>
      <th align="center" valign="middle" style="width:21%"><span class="right"><?php echo $pagination->sortBy('company_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Company Name</th>
      <th align="center" valign="middle" style="width:17%"><span class="right"><?php echo $pagination->sortBy('email', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Email</th>
      <th align="center" valign="middle" style="width:17%"><span class="right"><?php echo $pagination->sortBy('phone', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Phone</th>
      <th align="center" valign="middle" style="width:17%"><span class="right"><?php echo $pagination->sortBy('website',$html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Website</th>

      </tr>
   	<?php if($companydata){ 
			$i=1;
			// Start of Record no, custmization
   			$pagerL = Configure::read('Pagging.limit');	 
			if(isset($this->params['url']['page']) && $this->params['url']['page'] > 1 ) {
			$i= $i+($pagerL*($this->params['url']['page']-1));
			}
			// End
			
   			foreach($companydata as $eachrow){
   			$recid = $eachrow['Company']['id'];
   			$modelname = "Company";
   			$redirectionurl = "sa_companylist";
   			$company_type_id = $eachrow['CompanyType']['company_type_name'];
   			$company_name = $eachrow['Company']['company_name'];
			if($company_name) $company_name = AppController::WordLimiter($company_name,25);
   			$email = $eachrow['Company']['email'];
			if($email) $email = AppController::WordLimiter($email,35);
   			$phone = $eachrow['Company']['phone'];
   			$website = $eachrow['Company']['website'];
			if($website) $website = AppController::WordLimiter($website,38);
   		?>

	<?php if($i%2 == 0) { ?>
        <tr class='altrow'>    <td align="center" class='newtblbrd' valign="middle"><span style="color:#4d4d4d;"><?php echo $i++ ?></span></td>
		<td align="center" valign="middle" class='newtblbrd'><input type="checkbox" value="<?php echo $recid; ?>" name="checkid[]" class="checkid"></td>
		<td align="left" valign="middle" class='newtblbrd'>
			
			<?php
				e($html->link(
					$html->tag('span', $company_type_id),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		
		</td>
		<td align="left" valign="middle" class='newtblbrd'>
			
			<?php
				e($html->link(
					$html->tag('span', $company_name),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		
		</td>
		<td align="left" valign="middle" class='newtblbrd'>
			
			<?php
				e($html->link(
					$html->tag('span', $email?$email:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		

		</td>

		<td align="left" valign="middle" class='newtblbrd'>
			<?php
				e($html->link(
					$html->tag('span', $phone?$phone:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		
		</td>
		<td align="left" valign="middle" class='newtblbrd'>
			
			<?php
				e($html->link(
					$html->tag('span', $website?$website:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		
		</td>
	
		</tr>

	<?php } else { ?>

		<tr><td align="center" valign="middle"><span style="color:#4d4d4d;"><?php echo $i++ ?></span></td><td align="center" valign="middle"><input type="checkbox" value="<?php echo $recid; ?>" name="checkid[]" class="checkid"></td>
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $company_type_id),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>	
		</td>
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $company_name),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>		
		</td>
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $email?$email:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>	
		</td>
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $phone?$phone:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>	
		</td>
		<td align="left" valign="middle">
				<?php
				e($html->link(
					$html->tag('span', $website?$website:'N/A'),
					array('controller'=>'contacts','action'=>'sa_addcompany',$recid),
					array('escape' => false)
					)
				);
				?>	
		</td>
	
		</tr>

	<?php } ?>	
	<?php } }else{ ?>
	<tr><td colspan="6" align="center">No Company Found.</td></tr>
	<?php } ?>
</table>
        
</div><!--inner-container ends here-->

    <div>
        <span class="botLft_curv"></span><span class="new_botRht_curv"></span>
        <div class="new_gryBot">
                    
        <?php if($companydata) { echo $this->renderElement('rmh_newpagination'); } ?>
    </div>
    <div class="clear"></div>
</div>
    <div class="clear"></div>
</div>
                    
</table>

</div>
</div><!--inner-container ends here-->
<div class="clear"></div>
</div>   

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
                document.getElementById("linkedit").href=baseUrl+"contacts/sa_addcompany/"+id; 
                
                }
        } 

</script>  


<!--container ends here-->
<script type="text/javascript">
	if(document.getElementById("flashMessage")!=null)
	{		
	document.getElementById("newcmptab").className = "newmidCont";
	}	
</script>