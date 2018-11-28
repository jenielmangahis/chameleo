

            <ul id="tab-container-1-nav" class="topTabs2" style="padding-left: -40px;">
                
				
					  <li>
						<?php
							e($html->link(
								$html->tag('span', 'Companies'),
								array('controller'=>'contacts','action'=>'sa_companylist'),
								array('escape' => false,'class'=> ($this->subtabsel=="contactlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					
                    <li>
						
						<?php
							e($html->link(
								$html->tag('span', 'Contacts'),
								array('controller'=>'contacts','action'=>'sa_contactlist'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanylist" || $this->subtabsel=="companylist")?'tabSelt':'')
								)
							);
						?>
					</li>
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Prospects'),
								array('controller'=>'contacts','action'=>'sa_companylist'),
								array('escape' => false,'class'=> ($this->subtabsel=="projectcompanytypes")?'tabSelt':'')
								)
							);
						?>
					</li>
                   
                   
            </ul>

