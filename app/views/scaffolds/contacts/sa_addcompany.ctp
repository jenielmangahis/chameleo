<script type="text/javascript">
$(document).ready(function() {
$('#compAnies').removeClass("butBg");
$('#compAnies').addClass("butBgSelt");
}); 
</script>
<?php	if($this->data['Company']['id']){
				$act = 'edit';
		}else{
				$act = 'add';
		}      
?>
<div class="titlCont1"><div class="centerPage">
    
       <div align="center" id="toppanel" >
     <?php  echo $this->renderElement('new_slider');  ?>
   
</div> 

<?php echo $form->create("contacts", array("action" => "sa_addcompany",'type' => 'file','enctype'=>'multipart/form-data','name' => 'addcompany', 'id' => "addcompany1","onsubmit"=>"return validatecompany('$act');"))?>
   
  <span class="titlTxt"><?php echo $PageHeading; ?> </span>
        <div class="topTabs">
                <ul>
                <li><button class="button" id="Submit" name="redirectpage" type="submit"><span> Save</span> </button>&nbsp;</li>
                <!--<li><a href="#." class=""><span>Apply</span></a></li>-->
				<li><button class="button" id="Submit" name="redirectpage" type="submit"><span> Apply</span> </button>&nbsp;</li>
                <li>
					
					<?php
					e($html->link(
					$html->tag('span', 'Cancel'),
					array('controller'=>'contacts','action'=>'sa_companylist'),
					array('escape' => false)
					)
				);
?>
				
				</li>
                </ul>
        </div>
</div>
</div>
<div class="rightpanel">
<div id="center-column">
	<div class="left">
		
		<!-- ADD Sub Admin FORM BOF -->
                  
                     <!-- ADD FIELD BOF -->

		
<div class='left' style="width:816px;">		
 <?php if($session->check('Message.flash')){ ?> 
<div id="blck"> 
        <div class="msgBoxTopLft"><div class="msgBoxTopRht"><div class="msgBoxTopBg"></div></div></div>
	        <div class="msgBoxBg">
		        <div class="">
				
			        <?php  
					e($html->link(
						$html->image('close.png',array('style'=>'margin-left: 945px; position: absolute; z-index: 11;','alt'=>'Close')),
						'javascript:void(0)',
						array('escape' => false,'onclick' => "hideDiv()")
						)
					);
					$session->flash();    ?> 
		        </div>
	                <div class="msgBoxBotLft"><div class="msgBoxBotRht"><div class="msgBoxBotBg"></div></div></div>
		</div>
</div> <?php } ?>
		<table cellspacing="10" cellpadding="0" align="center" width="455px" class='left'>
		
  <tbody>
    <tr>
      <td colspan="5"><?php if($session->check('Message.flash')){ $session->flash(); } 
      				echo $form->error('Company.company_name', array('class' => 'errormsg'));
      				echo $form->error('Company.company_type_id', array('class' => 'errormsg'));
      				 echo $form->hidden("Company.id", array('id' => 'companyid'));
					 if(!empty($projectname)){
      				 echo $form->hidden("projectname", array('id' => 'projectname','value'=>$projectname));
					 }
      	?></td>
    </tr>
    
    <tr>
      <td align="right"><label class="boldlabel">Company Type <span class="red">*</span></label></td>
      <td><label for="project_name"></label>
      	<span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="compdiv"><?php echo $form->select("Company.company_type_id",$companytypedropdown,$selectedcompanytype,array('id' => 'company_type_id','class'=>'multilist'),"---Select---"); ?></span></span></span>
		</td>
     
    </tr>
    <?php
	if($this->data['Company']['id'] && $realeted_projects_flag == true) {
	?>
	<tr>
	  <td valign="top"><label class="boldlabel">Owner of Project(s)</label></td>
	  <td>
		<label for="project_name"></label>
		<span class="txtArea_top">
			<span class="txtArea_bot">
				<span id="compdiv">
				<?php
				 //$realetedProjects = array();
				 echo $form->select('ProjectOwner.owners',$realetedProjectsC, null,array('multiple'=>'multiple','id'=>'companies_bb','size'=>'4','empty'=>false,'class'=>'multilist','tabindex'=>2,'style'=>'min-height:32px;','disabled'=>'disabled'));
				?>
				</span>
			</span>
		</span>
	</td>
	</tr>
	<?php
	}
	?>
    <tr>
      <td align="right"><label class="boldlabel">Company Name <span class="red">*</span></label></td>
      <td ><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.company_name", array('id' => 'company_name', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150"));?></span></td>
     
    </tr>
    
    <tr>
      <td align="right"><label class="boldlabel">Address 1 <span class="red">*</span></label></td>
      <td ><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.address1", array('id' => 'address1', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "200"));?></span></td>
     
    </tr>
    
    <tr>
      <td align="right"><label class="boldlabel">Address 2 </label></td>
      <td ><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.address2", array('id' => 'address2', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "200"));?></span></td>
     
    </tr>
    
    <tr>
      <td align="right"><label class="boldlabel">Country <span class="red">*</span></label></td>
      <td><label for="project_name"></label>
       <span class="txtArea_top">
                                <span class="txtArea_bot">
                                    <span id="compdiv"> <?php echo $form->select("Company.country",$countrydropdown,$selectedcountry,array('id' => 'country','class'=>'multilist','onchange'=>'return getstateoptions(this.value,"Company")'),array('254'=>'United States')); ?></span></span></span></td>
     
    </tr>
    
    
     <tr>
      <td align="right"><label class="boldlabel">State <span class="red">*</span></label></td>
      <td><label for="project_name"></label>
        <span class="txtArea_top">
                                <span class="txtArea_bot">
                                   <span id="statediv">
                                    <?php echo $form->select("Company.state",$statedropdown,$selectedstate,array('id' => 'state',"class" => "multilist"),"---Select---"); ?></span></span></span></td>
      
    </tr>
    
    <tr>
      <td align="right"><label class="boldlabel">City <span class="red">*</span></label></td>
      <td ><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.city",array('id' => 'city', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "150")); ?></span></td>
     
    </tr>
    
     <tr>
      <td align="right"><label class="boldlabel">Zip/Postal Code <span class="red">*</span></label></td>
      <td><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.zipcode", array('id' => 'zipcode', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "10"));?></span></td>
      
    </tr>
    
      <tr>
      <td align="right"><label class="boldlabel">Email <span class="red">*</span></label></td>
      <td><label for="project_name"></label>
        <span class="intpSpan"><?php echo $form->input("Company.email", array('id' => 'email', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "200"));?></span></td>
     
    </tr>
    
     <tr>
      <td align="right"><label class="boldlabel">Phone </label></td>
      <td><label for="project_name"></label>
       <span class="intpSpan"> <?php echo $form->input("Company.phone", array('id' => 'phone', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "12"));?></span></td>
     
    </tr>
    
     <tr>
      <td align="right"><label class="boldlabel">Fax </label></td>
      <td><label for="project_name"></label>
         <span class="intpSpan"> <?php echo $form->input("Company.fax", array('id' => 'fax', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "10"));?></span></td>
     
    </tr>
    
    
    
    <tr><td colspan='2'><b>Any item with a</b>  "<span class="red">*</span>"  <b>requires an entry.</b></td></tr>

  </tbody>
</table>


<table class='left' width="360px" style="margin-top: 20px;">
				<?php if($this->data['Company']['id']) { ?>	
					<tr>
					  <td  valign='top'><label class="boldlabel">Contacts </label></td>
				      <td>
				      	<div style="width: 230px;min-height: 150px; overflow: auto; border: solid 1px #ccc" class='multilist'>
				      	<?php 
						//print_r($contacts);
						//echo $form->select('contacts',$contacts, null,array('multiple'=>'multiple','id'=>'contacts','size'=>'10','empty'=>false,'style'=>'width:300px;','disabled'=>'disabled','class'=>'multilist'));?>
				      	<table class='multilist' style="" border="1" width="100%">
							<tr><th align="left" width="45%">Name</th><th align="left" width="55%">Title</th></tr>
							<?php foreach($contacts as $title=>$name) {?>
							<tr><td><?php echo $title ?></td><td><?php echo $name ?></td></tr>
							<?php } ?>
						</table>
						</div>
						<!--<span class="btnLft"><input type="button" class="btnRht" value="View" name="view" ONCLICK="viewcontact()") /> </span>-->

                        <span style="display:inline-block;width:8px"></span>
                        <span class="btnLft"><input type="button"  class="btnRht" value="Add" ONCLICK="addcontact();" /></span>
						<input type="hidden" value="<?php echo $this->data['Company']['id']; ?>" id="companyvalue"/>
						</td>
					</tr>
				<?php } ?>
				 <tr>
				  <td align="right"><label class="boldlabel">Website </label></td>
				  <td ><label for="project_name"></label>
					<span class="intpSpan"> <?php echo $form->input("Company.website", array('id' => 'website', 'div' => false, 'label' => '',"class" => "inpt_txt_fld","maxlength" => "250"));?></span></td>
				 
				</tr>
				
				 <tr>
				  <td align="right"><label class="boldlabel">Note </label></td>
				  <td ><label for="project_name"></label>
				   <span class="txtArea_top"><span class="txtArea_bot"><?php echo $form->textarea("Company.notes", array('id' => 'notes', 'div' => false, 'label' => '','cols' => '24', 'rows' => '4',"class" => "noBg"));?></span></span></td>
				 
				</tr>
				<tr>
				 
				  <td valign='top' align="right"><label class="boldlabel">Company Logo</label></td>
				  <td><?php  echo $form->file('Company.complogo',array('id'=> 'logo',"class" => "contactInput"));?><br>
				  <span style="color: LightSlateGray;font-size: 11px;font-style: italic;">Recommended file size 250x250.</span>
				   <br />&nbsp; 
				   <?php 
				   if($this->data['Company']['logo'] !='')
					echo $html->image('uploads/'.$this->data['Company']['logo'],array('width'=>'100','height'=>'100','alt'=>''));
				   else
					echo $html->image('nologo.jpg');
				   ?> 
				   </td>
				 
				 </tr>
		       
			</table>



</div>
<?php echo $form->end();?>
					
					<!-- ADD Sub Admin  FORM EOF -->

				
			</div></div>
 
</div><!--inner-container ends here-->

  
<div class="clear"></div>


</div><!--container ends here-->
<script language='javascript'>
function viewcontact(){
	window.location=baseUrl+'contacts/sa_contactlist';

}
function addcontact(){

	var id=document.getElementById('companyvalue').value;
	window.location=baseUrl+'contacts/sa_addcontacts';

}
<?php if(!($this->data['Company']['id'])) { ?>
getstateoptions('254',"Company"); <?php } ?>
</script>
