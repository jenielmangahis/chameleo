

            <ul id="tab-container-1-nav" class="topTabs2" style="padding-left: -40px;">
                
				
					  <li>
						<?php
						/*	e($html->link(
								$html->tag('span', 'Companies'),
								array('controller'=>'contacts','action'=>'sa_companylist'),
								array('escape' => false,'class'=> ($this->subtabsel=="sa_companylist")?'tabSelt':'')
								)
							);*/
							
							e($html->link(
								$html->tag('span', 'Customers'),
								array('controller'=>'#','action'=>'#'),
								array('escape' => false,'class'=> ($this->subtabsel=="sa_companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
					
                    <li>
						
						<?php
							e($html->link(
								$html->tag('span', 'Contacts'),
								array('controller'=>'contacts','action'=>'sa_contactlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="sa_contactlist" || $this->subtabsel=="companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Prospects'),
								array('controller'=>'prospects','action'=>'projectmerchant','2'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectmerchant")?'tabSelt':'')
								)
							);
						?>
					</li>
                   
                   
            </ul>

