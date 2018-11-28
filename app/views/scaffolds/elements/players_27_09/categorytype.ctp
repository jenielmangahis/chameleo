<div class="midCont" id="newcntlist">
        <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
         <!-- top curv image starts -->
        <div>
            <span class="topLft_curv"></span>
            <span class="topRht_curv"></span>
            <div class="gryTop">
				<div class="new_filter" >
                <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));

                    ?> 
                </span>
                <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location=baseUrl+'players/categorylist')" id="locaa"></span>
            </div>	
            </div>
            <div class="clear"></div></div>
         <?php $i=1; ?>			
        <div class="tblData">


            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admgrid"> 
                <tr class="trBg">
                    <th align="center" valign="middle" style="width:1%">#</th>
                    <th align="center" valign="middle" style="width:2%"><input type="checkbox" value="" name="checkall" id="checkall" /></th>
                    <th align="center" valign="middle" style="width:25%"><span class="right"><?php echo $pagination->sortBy('category_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Category</th>
                    <th align="center" valign="middle" style="width:20%"><span class="right"><?php echo $pagination->sortBy('category_name',$html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' ');?></span>Related Offers</th>
                    <th align="center" valign="middle" style="width:27%"><span class="right"><?php echo $pagination->sortBy('category_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Related Merchant</th>
                    <th align="center" valign="middle" style="width:20%"><span class="right"><?php echo $pagination->sortBy('description', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Description</th>
                   </tr>
                <?php if($categorydata){
                        $i=1;
                        foreach($categorydata as $eachrow){
							//echo "<pre>";
							//print_r($eachrow); exit;
                            $recid = $eachrow['CategoryDetail']['id'];
                            $modelname = "Category";
                            $redirectionurl = "categorylist";
                            $category_name = $eachrow['Category']['category_name'];
                            if($category_name)	$category_name = AppController::WordLimiter($category_name,20);
                            $offers ='';
							$description = $eachrow['CategoryDetail']['description'];
                            if($description)	$description = AppController::WordLimiter($description,30);
                        ?>
                            <tr <?php echo ($i%2 == 0)? "class='altrow'" :""; ?> >	
                                <td align="center" class='newtblbrd'><span><?php echo $i++;?></span></td>
                                <td align="center" class='newtblbrd'><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>

                                <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span',$category_name ),
									array('controller'=>'players','action'=>'viewcategory',$recid),
									array('escape' => false)
									)
								);
							?>
								</td>
								
								 <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span',$offers ),
									array('controller'=>'players','action'=>'viewcategory',$recid),
									array('escape' => false)
									)
								);
							?>
								
								
                                <td align="left" valign="middle" class='newtblbrd'>
									
								<?php
									$checki = 1;
									if(isset($eachrow['CompanyToCategory'])) {
									$count_cname = count($eachrow['CompanyToCategory']);
								   foreach($eachrow['CompanyToCategory'] as $ctc){
								 	$company = AppController::getCompanyNameById($ctc['company_id']);
									e($html->link(
									$html->tag('span', $company['company_name']),
									array('controller'=>'players','action'=>'addcompany',$company['id']),
									array('escape' => false)
									)); 
									if($count_cname > $checki){
										echo ", ";
										$checki++;
									}
								}}
							?>
								</td>
                               

								</td>
                                <td align="left" valign="middle" class='newtblbrd'>
									
									<?php
									e($html->link(
									$html->tag('span', $description),
									array('controller'=>'players','action'=>'viewcategory',$recid),
									array('escape' => false)
									)
								);
							?>
								</td>
                                                         
                            </tr>

                        <?php } }else{ ?>
                    <tr><td colspan="6" align="center">No Categories Found.</td></tr>
                    <?php } ?>
            </table>


        </div>
        <div>
            <span class="botLft_curv"></span>
            <span class="botRht_curv"></span>
            <div class="gryBot"><?php if($categorydata) { echo $this->renderElement('newpagination'); } ?>
            </div>
            <div class="clear"></div>
        </div>
        <!--inner-container ends here-->

        <?php echo $form->end();?>

    </div>