 <ul class="topTabs2" id="tab-container-1-nav" style=" margin-top: 0px;padding-left: -40px;">
            <li>
				<?php
				e($html->link(
					$html->tag('span', 'Submitted'),
					array('controller'=>'admins','action'=>'coinset_orders'),
					array('escape' => false,'class'=> ($this->subtabsel=="coinset_orders")?'tabSelt':'')

					)
				);
				?>
			</li>
            <li>
				<?php
				e($html->link(
					$html->tag('span', 'Approved'),
					array('controller'=>'admins','action'=>'coinset_orders_approved'),
					array('escape' => false,'class'=> ($this->subtabsel=="coinset_orders_approved")?'tabSelt':'')

					)
				);
				?>
			</li>
            <li>
				<?php
				e($html->link(
					$html->tag('span', 'Approved-Changes'),
					array('controller'=>'admins','action'=>'coinset_orders_approved_changes'),
					array('escape' => false,'class'=> ($this->subtabsel=="coinset_orders_approved_changes")?'tabSelt':'')

					)
				);
				?>
			</li>	
            
            </ul>