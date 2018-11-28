        <ul class="topTabs2" id="tab-container-1-nav" style="padding-left: -40px;">
        <li>
		<?php
		e($html->link(
			$html->tag('span', 'Agreements'),
			array('controller'=>'legals','action'=>'user_agreement_list_by_project'),
			array('escape' => false,'class'=>'tabSelt')
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Agree Setup'),
			array('controller'=>'legals','action'=>'user_agreement_list'),
			array('escape' => false,'class'=>'')
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Agree History'),
			array('controller'=>'legals','action'=>'user_agreehistory'),
			array('escape' => false,'class'=>'')
			)
		);
		?>
		</li>
        <li>
		<?php
		e($html->link(
			$html->tag('span', 'Spam Policy'),
			array('controller'=>'legals','action'=>'spam_policy/edit/3'),
			array('escape' => false,'class'=>'')
			)
		);
		?>
		</li>
        <li>
		<?php
		e($html->link(
			$html->tag('span', 'Terms & Privacy'),
			array('controller'=>'legals','action'=>'terms_by_admin/edit/18'),
			array('escape' => false,'class'=>'')
			)
		);
		?>
		</li>
		 <li>
		<?php
		e($html->link(
			$html->tag('span', 'Border Footer'),
			array('controller'=>'setups','action'=>'border_footer_list'),
			array('escape' => false,'class'=>'')
			)
		);
		?>
		</li>
        </ul>