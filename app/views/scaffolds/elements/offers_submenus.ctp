<?php if($this->loginarea){
	if($this->loginarea=='companies'){
		 $tab='companylist'; 
	}else if($this->loginarea=='offers'){
		$tab='offerlist'; 
	} 
?>
  <div class="clear"></div>                                                                     
            <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Current'),
								array('controller'=>$this->loginarea,'action'=>$tab),
								array('escape' => false,'class'=> ($this->subtabsel=="offerlist" || $this->subtabsel=="offerlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php 
							e($html->link(
								$html->tag('span', 'Taken'),
								array('controller'=>$this->loginarea,'action'=>'taken'),
								array('escape' => false,'class'=> ($this->subtabsel=="taken")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php 
							e($html->link(
								$html->tag('span', 'Used-UnPaid'),
								array('controller'=>$this->loginarea,'action'=>'used_unpaid'),
								array('escape' => false,'class'=> ($this->subtabsel=="used_unpaid")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php 
							e($html->link(
								$html->tag('span', 'Used-Paid'),
								array('controller'=>$this->loginarea,'action'=>'used_paid'),
								array('escape' => false,'class'=> ($this->subtabsel=="used_paid")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php 
							e($html->link(
								$html->tag('span', 'Expired'),
								array('controller'=>$this->loginarea,'action'=>'expired'),
								array('escape' => false,'class'=> ($this->subtabsel=="expired")?'tabSelt':'')
								)
							);
						?>
					</li>
					  <li>
						<?php 
							e($html->link(
								$html->tag('span', 'By Member'),
								array('controller'=>$this->loginarea,'action'=>'bymember'),
								array('escape' => false,'class'=> ($this->subtabsel=="bymember")?'tabSelt':'')
								)
							);
						?>
					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'By Merchants'),
								array('controller'=>$this->loginarea,'action'=>'bymerchant'),
								array('escape' => false,'class'=> ($this->subtabsel=="bymerchant")? 'tabSelt':'')
								)
							);
						?>
					</li>
					
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Pledges/Discount'),
								array('controller'=>$this->loginarea,'action'=>'by_pledge_discount'),
								array('escape' => false,'class'=> ($this->subtabsel=="by_pledge_discount")?'tabSelt':'')
								)
							);
						?>
					</li>
					
					
					
					
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Coupons'),
								array('controller'=>$this->loginarea,'action'=>'coupons'),
								array('escape' => false,'class'=> ($this->subtabsel=="coupons")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Offer Calender'),
								array('controller'=>'offers','action'=>'calendar'),
								array('escape' => false,'class'=> ($this->subtabsel=="calendar")?'tabSelt':'')
								)
							);
						?>

					</li>
					
				<li>
						<?php
							e($html->link(
								$html->tag('span', 'Categories'),
								array('controller'=>'offers','action'=>'category'),
								array('escape' => false,'class'=> ($this->subtabsel=="category")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Offer Email'),
								array('controller'=>$this->loginarea,'action'=>'offeremail'),
								array('escape' => false,'class'=> ($this->subtabsel=="currentofferlist")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					
				  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Offer Page'),
								array('controller'=>$this->loginarea,'action'=>'offerpages'),
								array('escape' => false,'class'=> ($this->subtabsel=="offerpages")?'tabSelt':'')
								)
							);
						?>

					</li>
				<!--   	
				
				 <li>
						<?php 
							e($html->link(
								$html->tag('span', 'Merchant Page'),
								array('controller'=>$this->loginarea,'action'=>'offertypelist'),
								array('escape' => false,'class'=> ($this->subtabsel=="offertypelist")?'tabSelt':'')
								)
							);
						 ?>

				</li>
			
				
				 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiry Page'),
								array('controller'=>$this->loginarea,'action'=>'offerlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="offerlist")?'tabSelt':'')
								)
							);
						?>

				</li>
				
				
				 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Event Page'),
								array('controller'=>$this->loginarea,'action'=>'offerlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="offerlist")?'tabSelt':'')
								)
							);
						?>

				</li>
                   
                 -->  
				   
            </ul>
           <div class="clear"></div> 
<?php }?>