<?php if($this->loginarea){
		if($this->loginarea=='companies'){
		$tab='companylist';
	}else if($this->loginarea=='players'){
		$tab='projectcompanylist';
	} 
?>                                                                     
    <div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
    <div style="height: 30px; clear:both; width:1000px">
        <div id="tab-container-1">
            <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Companies'),
								array('controller'=>$this->loginarea,'action'=>$tab),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanylist" || $this->subtabsel=="companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
					  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Contacts'),
								array('controller'=>$this->loginarea,'action'=>'contactlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="contactlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Merchants'),
								array('controller'=>$this->loginarea,'action'=>'projectmerchantlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectmerchantlist" || $this->subtabsel=="projectmerchantlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Non Profits'),
								array('controller'=>$this->loginarea,'action'=>'projectnonprofitlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectnonprofitlist" || $this->subtabsel=="projectnonprofitlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					
					
					
					
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Company Type'),
								array('controller'=>$this->loginarea,'action'=>'projectcompanytypes'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanytypes")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Contact Type'),
								array('controller'=>$this->loginarea,'action'=>'projectcontacttypes'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Non-Profit Type'),
								array('controller'=>$this->loginarea,'action'=>'nonprofittypelist'),
								array('escape' => false,'class'=> ($this->subtabsel=="nonprofittypelist")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					
				  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Categories'),
								array('controller'=>$this->loginarea,'action'=>'categorylist'),
								array('escape' => false,'class'=> ($this->subtabsel=="categorylist")?'tabSelt':'')
								)
							);
						?>

					</li>
					
				<!--
				 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Offer Types'),
								array('controller'=>$this->loginarea,'action'=>'offertypelist'),
								array('escape' => false,'class'=> ($this->subtabsel=="offertypelist")?'tabSelt':'')
								)
							);
						?>

				</li>
				
				
				 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Offers'),
								array('controller'=>$this->loginarea,'action'=>'offerlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="offerlist")?'tabSelt':'')
								)
							);
						?>

				</li>
                   -->
                   
				   
            </ul>
        </div>
    </div>  
    
       <div class="clear"></div> 
<?php }?>