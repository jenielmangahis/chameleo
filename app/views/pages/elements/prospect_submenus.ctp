<?php if($this->loginarea){
		if($this->loginarea=='companies'){
		$tab='companylist';
	}else if($this->loginarea=='prospects'){
		$tab='projectmerchant';
	} 
?>                                                                     
    			<div class="clear"></div>
            <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Merchants'),
								array('controller'=>$this->loginarea,'action'=>$tab),
								array('escape' => false,'class'=> ($this->subtabsel=="projectmerchant" || $this->subtabsel=="projectmerchantlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Non-Profit'),
								array('controller'=>$this->loginarea,'action'=>'prospectnonprofit'),
								array('escape' => false,'class'=> ($this->subtabsel=="nonprofitlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Vendors'),
								array('controller'=>$this->loginarea,'action'=>'prospectlist','Vendor'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectvendors")?'tabSelt':'')
								
								)
							);
						?>
					</li>
					
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Sales'),
								array('controller'=>$this->loginarea,'action'=>'prospectlist','Sales'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectsales")?'tabSelt':'') 
								)
							);
						?>
					</li>
					
					
					
					
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Advertiser'),
								array('controller'=>$this->loginarea,'action'=>'prospectlist','Advertiser'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcAdvertiser")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Other'),
								array('controller'=>$this->loginarea,'action'=>'prospectlist','Other'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectother")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Email'),
								array('controller'=>$this->loginarea,'action'=>'prospectemaillist'),
								array('escape' => false,'class'=> ($this->subtabsel=="prospectemails")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					
				  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-New'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','new'),
								array('escape' => false,'class'=> ($this->subtabsel=="newinquiry")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-Open'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','open'),
								array('escape' => false,'class'=> ($this->subtabsel=="openinquiry")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-History'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','history'),
								array('escape' => false,'class'=> ($this->subtabsel=="historylist")?'tabSelt':'')
								)
							);
						?>

					</li>
				   
            </ul>
      
       <div class="clear"></div> 
<?php }?>