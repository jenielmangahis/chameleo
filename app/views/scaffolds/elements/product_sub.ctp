
            <ul id="tab-container-1-nav" class="topTabs2">
                
                    <li>
						
						<?php
							e($html->link(
								$html->tag('span', 'By Customer'),
								array('controller'=>'admins','action'=>'projectlist_by_customer'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanylist" || $this->subtabsel=="companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Versions'),
								array('controller'=>'admins','action'=>'projectlist_by_product'),
								array('escape' => false,'class'=> ($this->subtabsel=="contactlist")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'System Pricing'),
								array('controller'=>'admins','action'=>'system_pricing_list'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanytypes")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Billing'),
								array('controller'=>'admins','action'=>'billing_status_list'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Status Types'),
								array('controller'=>'admins','action'=>'status_type_list'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Coins'),
								array('controller'=>'admins','action'=>'producttype'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Coin Pricing'),
								array('controller'=>'admins','action'=>'pricingtype'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Version Setup'),
								array('controller'=>'versions','action'=>'system_version_list'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcontacttypes")?'tabSelt':'')
								)
							);
						?>

					</li>
                   
            </ul>
       