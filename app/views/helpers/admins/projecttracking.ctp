<?php
//print_r($this->data);
$daterec=$this->data['Project']['dateartrecieved'];
$dateapp=$this->data['Project']['datearttochipco'];
$dateart=$this->data['Project']['dateartproofsponsor']; 	
$datepro=$this->data['Project']['dateartapproval'];
$daterec = AppController::usdateformat($daterec,1);
$dateart = AppController::usdateformat($dateart,1);
$datepro = AppController::usdateformat($datepro,1);
$dateapp = AppController::usdateformat($dateapp,1);
?>
<?php
   echo $javascript->link('datetimepicker/jquery-1.4.2.min.js');
    echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');
      //echo $javascript->link('datetimepicker/i18n/ui.datepicker-de.js');
    echo $javascript->link('datetimepicker/timepicker_plug/jquery.timepicker.js');
	
//echo $selectedtab;
?>
	<link rel="stylesheet" type="text/css" href="/js/datetimepicker/timepicker_plug/css/style.css">
	<link rel="stylesheet" type="text/css" href="/js/datetimepicker/smothness/jquery_ui_datepicker.css">

<script type="text/javascript">	


		/* <![CDATA[ */
			$(function() {
				$('#dateartrecievedBP').datetime({
					userLang : 'en',
					americanMode: false, 
								});	
				$('#dateartapprovalBP').datetime({
					userLang : 'en',
					americanMode: false, 
				});	
				$('#datearttochipcoBP').datetime({
					userLang : 'en',
					americanMode: false, 
				});	
				$('#dateartproofsponsorBP').datetime({
					userLang : 'en',
					americanMode: false, 
				});					
			});
			/* ]]> */
					

	</script>
 
  <div class="titlCont"><div style="width:960px; margin:0 auto;">

<div align="center" id="toppanel" >
	<div id="panel">
			<div class="content clearfix">
			<H1> Help</h1>
				<p class="grey"><?php echo $hlpdata[0]['HelpContent']['content']; ?></p>
	</div>
			
	</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li id="toggle">
            <a id="open" class="open" href="#."><span>Click Here to Open Help Box</span></a>

				<a id="close" style="display: none;" class="close" href="#"><span>Click Here to Close Help Box</span></a>		
			</li>
		</ul> 
	</div>



</div>



<span class="titlTxt">
Tracking
</span>
	<?php echo $form->create("Admin", array("action" => "projecttracking",'type' => 'file','enctype'=>'multipart/form-data','name' => 'projecttracking', 'id' => "projecttracking"))?>
<div class="topTabs">
<ul>
<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='/admins/editprojectdtl')"><span> Cancel</span></button></li>
</ul>
</div>





<div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
<div style="height: 30px; clear:both;">

<div id="tab-container-1">
	<ul id="tab-container-1-nav" class="topTabs2">
		<?php if(isset($project['Project']['sponsor_id']) && $project['Project']['sponsor_id'] > 0) {?>
        	<li><a href="/admins/editprojectdtl"><span>Details</span></a></li>
        	<li><a href="/admins/projectimages"><span>Images</span></a></li>
		<li><a href="/admins/projecttracking" class="tabSelt"><span>Tracking</span></a></li>
		<li><a href="/admins/projectcontrols"><span>Controls</span></a></li>
		<?php } ?>
		<li><a href="/admins/projectsponsor"><span>Sponsor</span></a></li>
		<?php if(isset($project['Project']['sponsor_id']) && $project['Project']['sponsor_id'] > 0) {?>
		<li><a href="/admins/projectuser"><span>User</span></a></li>
		<li><a href="/admins/coinsetlist"><span>Coinsets</span></a></li>
		<li><a href="/admins/companylist"><span>Companies</span></a></li>
		<li><a href="/admins/contactlist"><span>Contacts</span></a></li>
		<li><a href="/admins/getstart"><span>Get Started</span></a></li>      
		<?php } ?>
    </ul>
</div>   
    
    
    <div class='newtab' id="Tracking" style="padding-top: 58px;">

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
</div> <?php } ?>
    <div style="width:668px;min-height: 360px;" class="left">	 
    
    
    <table cellspacing="10" cellpadding="0" align="center" width="633px">
							<tbody>
							 <?php if($session->check('Message.flash')){ ?> 
							<tr><td colspan="5" align="center">
									<?php $session->flash(); ?> 
							</td>
							</tr>
							<tr><td colspan="5" align="center">&nbsp;</td></tr>
							<?php } ?>

							<tr>
							<td><label class="boldlabel" style='font-size:10px;'>Artwork Received:</label></td>
							<td><span class="intpSpan">
							<?php echo $form->text("Project.dateartrecieved", array('value'=>$daterec,'id' => 'dateartrecieved', 'div' => false, 'label' => '',"class" => "inpt_txt_fld",'style'=>'width:133px','readonly'=>'readonly'));?></span>  &nbsp; <input type="button" class="calendarcls" id="dateartrecievedBP"></td>
							<td></td>
							<td><label class="boldlabel" style='font-size:10px;'>Artwork Approval:</label></td>
							<td><span class="intpSpan"><?php echo $form->text("Project.dateartapproval", array('value'=>$datepro,'id' => 'dateartapproval', 'div' => false, 'label' => '',"class" => "inpt_txt_fld",'style'=>'width:133px','readonly'=>'readonly'));?> </span> &nbsp; <input type="button" class="calendarcls" id="dateartapprovalBP"></td>
							</tr>
							<tr>
							<td><label class="boldlabel" style='font-size:10px;'>Artwork to Chipco:</label></td>
							<td><span class="intpSpan"><?php echo $form->text("Project.datearttochipco", array('value'=>$dateapp,'id' => 'datearttochipco', 'div' => false, 'label' => '',"class" => "inpt_txt_fld",'style'=>'width:133px','readonly'=>'readonly'));?></span>  &nbsp; <input type="button" class="calendarcls" id="datearttochipcoBP"></td>
							<td></td>
							<td><label class="boldlabel" style='font-size:10px;'>Chipco Start Date:</label></td>
							<td><span class="intpSpan"><?php echo $form->text("Project.dateartproofsponsor", array('value'=>$dateart,'id' => 'dateartproofsponsor', 'div' => false, 'label' => '',"class" => "inpt_txt_fld",'style'=>'width:133px','readonly'=>'readonly'));?></span> &nbsp; <input type="button" class="calendarcls" id="dateartproofsponsorBP"></td>
							</tr>
							
							
							<tr><td colspan='5'>&nbsp;</td></tr>
							<!--tr><td colspan='5'>
										<span class="btnLft">
										<button type="submit" id="Submit" class="btnRht" onclick='settabinfo("2")'> Save </button></span>&nbsp;
									<span class="btnLft"><button type="button" id="saveForm" class="btnRht" ONCLICK="javascript:(window.location='/admins/index')"> Cancel </button></span>
									
								</td></tr-->
							</tbody>
						</table>
    
    </div>
<div class='clear'></div>

    </div>
    
    <!-- main tab -->
    </div>
    
    <?php echo $form->end();?>
</div>

<div class='clear'></div>
</div></div>
<div class="midPadd">
	
		<div class="top-bar" style="border-left:0px;">

		</div><br />


</div>
<div class="clear"></div>
</div>

  <div class="clear"></div>
  <!-- Body Panel ends --> 

