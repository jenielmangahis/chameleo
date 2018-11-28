<?php
$base_url = Configure::read('App.base_url');
$resetUrl = $base_url.'players/types/'.$option;
?> 

<div class="midCont" id="newcnttab">	

	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>



    <div><span class="topLft_curv"></span>
    <span class="topRht_curv"></span>                
        <div class="gryTop">
        		
                <?php echo $form->create("Admins", array("action" => "contacttype",'name' => 'contacttype', 'id' => "contacttype")) ?>
                <script type='text/javascript'>
                        function setprojectid(projectid){
                                        document.getElementById('projectid').value= projectid;
                                        document.adminhome.submit();
                                }
                </script>     
                <div class="new_filter" >
                <div style="float:left">
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));?></span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $resetUrl ?>')" id="locaa"></span>
                </div>
  <div style="float:left">  <?php if($session->check('Message.flash')){ ?> 
        
                      <?php $session->flash(); ?> <?php } 
                        if(!isset($selectedprojectid)) $selectedprojectid="";

                        echo $form->hidden("Admins.projectid", array('id' => 'projectid','value'=>"$selectedprojectid"));
        ?></div> 
               <div class="clear"></div>
         </span>
        </div> 
        </div>
        <div class="clear"></div>
</div>

<div class="tblData">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="trBg"> 
					<th align="center" valign="middle" style="width:1%">#</th>
					<th align="center" valign="middle" style="width:1%"><input type="checkbox" id="checkall" name="checkall" value=""></th>
					<th align="center" valign="middle" style="width:67%"><span class="right"><?php echo $pagination->sortBy('contact_type_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Contact Type</th>
					<?php /* ?>
					<th align="center" valign="middle" style="width:21%"><span class="right"><?php echo $pagination->sortBy('project_lead', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Project Administrator</th>
					<?php */ ?>
					<th align="center" valign="middle" style="width:10%"><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>

				</tr>
		<?php if($contacttypedata){  
			$i=1;
			// Start of Record no, custmization
   			$pagerL = Configure::read('Pagging.limit');	 
			if(isset($this->params['url']['page']) && $this->params['url']['page'] > 1 ) {
			$i= $i+($pagerL*($this->params['url']['page']-1));
			}
			// End
			
   			foreach($contacttypedata as $eachrow){
   			$recid = $eachrow['ContactType']['id'];
   			$modelname = "ContactType";
   			$redirectionurl = "contacttype";
			$rowClass = ($i%2 == 0)?'altrow':''; 
   		?>

	<tr class='<?php echo $rowClass ?>'>
		<td align="center" class='newtblbrd' valign="middle"><?php echo $i++ ?></td>
		<td align="center" class='newtblbrd' valign="middle"><input type="checkbox" value="<?php echo $recid; ?>" name="checkid[]" class="checkid"></td>
		<td align="left" class='newtblbrd' valign="middle">
		<?php
		e($html->link(
			$html->tag('span', $eachrow['ContactType']['contact_type_name']),
			array('controller'=>'players','action'=>'types',$option),
			array('escape' => false)
			)
		);
		?>
		</td>
		
		<td align="center" valign="middle" class='newtblbrd'>
		<?php 
		if($eachrow['ContactType']['active_status']=='1'){
			echo  $html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$eachrow['ContactType']['contact_type_name']));
		} else {
			echo  $html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$eachrow['ContactType']['contact_type_name']));
		}			
	    ?>
		</td>
		</tr>
	<?php } }else{ ?>
	<tr><td colspan="2" align="center">No Contact Type Found.</td></tr>
	<?php } ?>
	</table>
        
</div><!--inner-container ends here-->

   <div>
                    <span class="botLft_curv"></span>
                    <span class="botRht_curv"></span>
      
                    <div class="gryBot">
                    
                  <?php if($contacttypedata) { echo $this->renderElement('newpagination'); } ?>
        </div>

                    
                    <div class="clear"></div>
                    </div>
<div class="clear"></div>
                    </div>