<div class="midCont" id="newcntlist">
        <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
         <!-- top curv image starts -->
        <div>
            <span class="topLft_curv"></span>
            <span class="topRht_curv"></span>
            <div class="gryTop">
				<div class="new_filter">
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));

                    ?> 
                </span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location=baseUrl+'admins/nonprofittypelist')" id="locaa"></span>
            </div>	
            </div>
            <div class="clear"></div></div>
         <?php $i=1; ?>			
        <div class="tblData">


            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admgrid"> 
                <tr class="trBg">
                    <th align="center" valign="middle" style="width:1%">#</th>
                    <th align="center" valign="middle" style="width:2%"><input type="checkbox" value="" name="checkall" id="checkall" /></th>
                    <th align="center" valign="middle" style="width:30%"><span class="right"><?php echo $pagination->sortBy('non_profit_type_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Non-Profit Type</th>
                    <th align="center" valign="middle" style="width:67%"><span class="right"><?php echo $pagination->sortBy('description',$html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Description</th>
                   </tr>
                <?php if($nonprofittypedata){
                        $i=1;
                        foreach($nonprofittypedata as $eachrow){
							//echo "<pre>";
							//print_r($eachrow); exit;
                            $recid = $eachrow['NonProfitType']['id'];
                            $modelname = "NonProfitType";
                            $redirectionurl = "nonprofittypelist";
                            $non_profit_type_name = $eachrow['NonProfitType']['non_profit_type_name'];
                           // if($non_profit_type_name)	$non_profit_type_name = AppController::WordLimiter($non_profit_type_name,12);
                            
							$description = $eachrow['NonProfitType']['description'];
                            if($description)	$description = AppController::WordLimiter($description,80);
                        ?>

                        <?php if($i%2 == 0) { ?>

                            <tr class='altrow'>	
                                <td align="center" class='newtblbrd'><span><?php echo $i++;?></span></td>
                                <td align="center" class='newtblbrd'><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>

                                <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span',$non_profit_type_name  ),
									array('controller'=>'players','action'=>'types',$option),
									array('escape' => false)
									)
								);
							?>
								</td>
								
								 <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span', $description ),
									array('controller'=>'players','action'=>'types',$option),
									array('escape' => false)
									)
								);
							?>
								
								
                              
                                                         
                            </tr>

                            <?php } else { ?>

                            <tr>	
                                <td align="center"><span><?php echo $i++;?></span></td>
                                <td align="center"><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>

                                <td align="left" valign="middle">
									
									<?php
									e($html->link(
									$html->tag('span',$non_profit_type_name  ),
									array('controller'=>'players','action'=>'types',$option),
									array('escape' => false)
									)
								);
							?>
								</td>
                                <td align="left" valign="middle">
									
								<?php
									e($html->link(
									$html->tag('span',$description ),
									array('controller'=>'players','action'=>'types',$option),
									array('escape' => false)
									)
								);
							?>
								</td>
                               
                                                            
                            </tr>
                            <?php } ?>	
                        <?php } }else{ ?>
                    <tr><td colspan="4" align="center">No Non-Profit Type(s) Found.</td></tr>
                    <?php } ?>
            </table>


        </div>
        <div>
            <span class="botLft_curv"></span>
            <span class="botRht_curv"></span>
            <div class="gryBot"><?php if($nonprofittypedata) { echo $this->renderElement('newpagination'); } ?>
            </div>
            <div class="clear"></div>
        </div>
        <!--inner-container ends here-->

        <?php echo $form->end();?>

    </div>