
            <ul id="tab-container-1-nav" class="topTabs2">
                
                    <li>
						
						<?php
							e($html->link(
								$html->tag('span', 'By Customer'),
								array('controller'=>'admins','action'=>'projectlist_by_customer','2'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectlist_by_customer" || $this->subtabsel=="projectlist_by_customer")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
						if($_GET['url']==='versions/system_version'){
							e($html->link(
								$html->tag('span', 'Versions'),
								array('controller'=>'versions','action'=>'system_version'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
							e($html->link(
								$html->tag('span', 'Versions'),
								array('controller'=>'versions','action'=>'system_version'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>
					</li>
                    <li>
						<?php
						if($_GET['url']==='admins/system_pricing_list/4'){
							e($html->link(
								$html->tag('span', 'System Pricing'),
								array('controller'=>'admins','action'=>'system_pricing_list','4'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
							e($html->link(
								$html->tag('span', 'System Pricing'),
								array('controller'=>'admins','action'=>'system_pricing_list','4'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>
					</li>
                    <li>
						<?php
						if($_GET['url']==='admins/billing_status_list/2')
						{
							e($html->link(
								$html->tag('span', 'Billing'),
								array('controller'=>'admins','action'=>'billing_status_list','2'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
								e($html->link(
								$html->tag('span', 'Billing'),
								array('controller'=>'admins','action'=>'billing_status_list','2'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>

					</li>
					 <li>
						<?php
						if($_GET['url']==='admins/status_type_list')
						{
							e($html->link(
								$html->tag('span', 'Status Types'),
								array('controller'=>'admins','action'=>'status_type_list'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
							e($html->link(
								$html->tag('span', 'Status Types'),
								array('controller'=>'admins','action'=>'status_type_list'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>

					</li>
					 <li>
						<?php
						if($_GET['url']==='admins/registercoinlist/0'){
						
							e($html->link(
								$html->tag('span', 'Coins'),
								array('controller'=>'admins','action'=>'registercoinlist','0'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
									e($html->link(
								$html->tag('span', 'Coins'),
								array('controller'=>'admins','action'=>'registercoinlist','0'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>

					</li>
					 <li>
						<?php 
						if($_GET['url']==='admins/pricingtype/2'){
							e($html->link(
								$html->tag('span', 'Coin Pricing'),
								array('controller'=>'admins','action'=>'pricingtype','2'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
						}
						else{
						e($html->link(
								$html->tag('span', 'Coin Pricing'),
								array('controller'=>'admins','action'=>'pricingtype','2'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>

					</li>
					 <li>
						<?php
						if($_GET['url']==='versions/system_version_list'){
							e($html->link(
								$html->tag('span', 'Version Setup'),
								array('controller'=>'versions','action'=>'system_version_list'),
								array('escape' => false,'class'=>'tabSelt')
								)
							);
							}
							else{
							e($html->link(
								$html->tag('span', 'Version Setup'),
								array('controller'=>'versions','action'=>'system_version_list'),
								array('escape' => false,'class'=>'')
								)
							);
							}
						?>

					</li>
                   
            </ul>
       