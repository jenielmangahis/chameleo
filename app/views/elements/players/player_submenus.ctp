<?php if($this->loginarea){
		if($this->loginarea=='companies'){
		$tab='companylist';
	}else if($this->loginarea=='players'){
		$tab='playerslist';
	} 
?>   
                                                               
    <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Companies'),
								array('controller'=>$this->loginarea,'action'=>$tab ,'company'),
								array('escape' => false,'class'=> ($this->subtabsel=="companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Merchants'),
								array('controller'=>$this->loginarea,'action'=>$tab ,'merchant'),
								array('escape' => false,'class'=> ($this->subtabsel=="merchantlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Non-Profit'),
								array('controller'=>$this->loginarea,'action'=>$tab ,'nonprofit'),
								array('escape' => false,'class'=> ($this->subtabsel=="nonprofitlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Vendors'),
								array('controller'=>$this->loginarea,'action'=>$tab,'vendor'),
								array('escape' => false,'class'=> ($this->subtabsel=="vendorlist")?'tabSelt':'')
								
								)
							);
						?>
					</li>
					
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Sales'),
								array('controller'=>$this->loginarea,'action'=>$tab,'sale'),
								array('escape' => false,'class'=> ($this->subtabsel=="salelist")?'tabSelt':'') 
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Advertiser'),
								array('controller'=>$this->loginarea,'action'=>$tab ,'advertiser' ),
								array('escape' => false,'class'=> ($this->subtabsel=="advertiserlist")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Other'),
								array('controller'=>$this->loginarea,'action'=>$tab ,'other'),
								array('escape' => false,'class'=> ($this->subtabsel=="otherlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Contacts'),
								array('controller'=>$this->loginarea,'action'=>'contactlist', 'contacts'  ),
								array('escape' => false,'class'=> ($this->subtabsel=="contact")?'tabSelt':'')
								)
							);
						?>

					</li>
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Types'),
								array('controller'=>$this->loginarea,'action'=>'types', 'company'  ),
								array('escape' => false,'class'=> ($this->subtabsel=="types")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Email'),
								array('controller'=>$this->loginarea,'action'=>'tasklist' ),
								array('escape' => false,'class'=> ($this->subtabsel=="tasklist")?'tabSelt':'')
								)
							);
						?>
					</li>
            </ul> 
            
<?php }?>