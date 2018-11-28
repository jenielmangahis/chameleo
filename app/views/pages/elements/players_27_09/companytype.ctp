<?php
$base_url = Configure::read('App.base_url');
$resetUrl = $base_url.'players/types/'.$option;
?> 

<div class="midCont" id="newcmptab">

	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

    <div>
       <span class="topLft_curv"></span>         		
       <span class="topRht_curv"></span>
        <div class="gryTop">
        		
                <?php echo $form->create("players", array("action" => "types",'name' => 'companytype', 'id' => "companytype")) ?>
                <script type='text/javascript'>
                        function setprojectid(projectid){
                                        document.getElementById('projectid').value= projectid;
                                        document.adminhome.submit();
                                }
                </script>
                <div class="new_filter">
                 
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));?></span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $resetUrl ?>')" id="locaa"></span>
               
  <div style="float:left">  <?php if($session->check('Message.flash')){ ?> 
        
                        <?php $session->flash(); ?> <?php } 
                        if(!isset($selectedprojectid)) $selectedprojectid="";

                        echo $form->hidden("Admins.projectid", array('id' => 'projectid','value'=>"$selectedprojectid"));
        	?></div>
         </span>
	        </div> 
	        </div>
        <div class="clear"></div>
</div>

<div class="tblData">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                

  		<tr class="trBg">
		<th align="center" valign="middle" style="width:2%">#</th>
		<th align="center" valign="middle" style="width:2%"><input type="checkbox" id="checkall" name="checkall" value=""></th>
            <th align="center" valign="middle" style="width:35%"><span class="right"><?php echo $pagination->sortBy('CompanyTypeCategories.company_type_category_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Company Type</th>
	        <th align="center" valign="middle" style="width:25%"><span class="right"><?php echo $pagination->sortBy('is_3rdparty', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Is 3rd party?</th>
			<th align="center" valign="middle" style="width:25%"><span class="right"><?php echo $pagination->sortBy('CompanyTypeStatus.company_type_status_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Company Type Status</th>
     		<th align="center" valign="middle" style="width:15%"><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>

      </tr>
   	<?php if($companytypedata){ 
			$i=1;
			// Start of Record no, custmization
   			$pagerL = Configure::read('Pagging.limit');	 
			if(isset($this->params['url']['page']) && $this->params['url']['page'] > 1 ) {
			$i= $i+($pagerL*($this->params['url']['page']-1));
			}
			// End
   			foreach($companytypedata as $eachrow){
   			$recid = $eachrow['CompanyType']['id'];
   			$modelname = "CompanyType";
   			$redirectionurl = "companytype";
            $is_3rdparty =$eachrow['CompanyType']['is_3rdparty'];  
   			 if($is_3rdparty=='1'){
                 $is_3rdparty_val="Yes";
             }else{
                  $is_3rdparty_val="No";  
             }
            
            $companytypecategoryname = $eachrow['CompanyTypeCategory']['company_type_category_name'];
			$companytypestatus = $eachrow['CompanyTypeStatus']['company_type_status_name'];
   			
   		?>
	
	<?php if($i%2 == 0) { ?>
   			<tr class='altrow'>
   	<?php }else { ?>
   			<tr>
   	<?php } ?>
   	
   	<td align="center" class='newtblbrd' valign="middle"><?php echo $i++ ?></td><td align="center" class='newtblbrd'   
                 valign="middle"><input type="checkbox" value="<?php echo $recid; ?>" name="checkid[]" class="checkid"></td>
		<td align="left" class='newtblbrd' valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $companytypecategoryname),
					array('controller'=>'players','action'=>'types',$option),
					array('escape' => false)
					)
				);
			?>
		</td>
		<td align="center" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $is_3rdparty_val),
					array('controller'=>'players','action'=>'types',$option),
					array('escape' => false)
					)
				);
			?>
		</td> 
		<td align="center" valign="middle">
			
			<?php
				e($html->link(
					$html->tag('span', $companytypestatus),
					array('controller'=>'players','action'=>'types',$option),
					array('escape' => false)
					)
				);
			?>

		</td>  
		<td align="center" valign="middle" class='newtblbrd'>
		<?php	
			if($eachrow['CompanyType']['active_status']=='1'){ 
				echo  $html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$eachrow['CompanyType']['company_type_name']));
			}else{
				echo  $html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'dfdd','title'=>'Click here to activate '.$eachrow['CompanyType']['company_type_name']));
			}				
		?>
		</td>
		</tr>
	<?php } }else{ ?>
	<tr><td colspan="6" align="center">No Company Type Found.</td></tr>
	<?php } ?>
	</table>
	


</div><!--inner-container ends here-->

     <div>
                    <span class="botLft_curv"></span>
     				 <span class="botRht_curv"></span>
                    <div class="gryBot">
                    
				  <?php if(isset($companytypedata) && !empty($companytypedata)) { echo $this->renderElement('newpagination'); } ?>
        </div>

                    
                    <div class="clear"></div>
                    </div>




<div class="clear"></div>


</div> 