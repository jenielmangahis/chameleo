
<ul class="topTabs2" id="tab-container-1-nav" style="padding-left: -40px;">
        <li>
		<?php
		e(
			$html->link(
			$html->tag('span','Help'),
			array('controller'=>'setups','action'=>'help_list'),
			array('escape'=>false,'class'=>(empty($this->help_list)) ? '' : $this->help_list)
			)
		);	
		?>
		</li>
        
        		
        <li>
		<?php
		e(
			$html->link(
			$html->tag('span','Get Started'),
			array('controller'=>'setups','action'=>'getstarted'),
			array('escape'=>false,'class'=>(empty($this->getstarted)) ? '' : $this->getstarted)
			)
		);	
		?>		
		</li>
        
		<li>
		<?php
		e(
			$html->link(
			$html->tag('span','Password'),
			array('controller'=>'setups','action'=>'super_admin_changepassword'),
			array('escape'=>false,'class'=>(empty($this->changePassword)) ? '' : $this->changePassword)
			)
		);	
		?>
		</li>
</ul>