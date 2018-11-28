 <ul class="topTabs2" id="tab-container-1-nav" style=" margin-top: 0px;padding-left: -40px;">
            <li>
			<?php
			e(
				$html->link(
					$html->tag('span','All'),
					array('controller'=>'admins','action'=>'projectlist'),
					array('class'=>(isset($this->proectlist) && $this->proectlist != "")?$this->proectlist:'','escape'=>false)
				)	
			);
			?>
			</li>
            <li>
			<?php
			e(
				$html->link(
					$html->tag('span','By Product'),
					array('controller'=>'admins','action'=>'projectlist_by_product'),
					array('class'=>(isset($this->projectlistbyproduct) && $this->projectlistbyproduct != "")?$this->projectlistbyproduct:'','escape'=>false)
				)	
			);
			?>
			</li>
			<li>
			<?php
				e($html->link(
							$html->tag('span', 'By Owners'),
							array('controller'=>'admins','action'=>'ownerlist'),
						array('escape'=>false,'class'=>(empty($this->ownerlist)) ? '' : $this->ownerlist)
							)
				);
			?>
			</li>
			<li>
		<?php
		e(
			$html->link(
				$html->tag('span','By Billing'),
				array('controller'=>'admins','action'=>'billing_status_list'),
				array('escape'=>false,'class'=>(empty($this->billing_status_list)) ? '' : $this->billing_status_list)
			)
		);
		?>
		</li>
		<li>
		<?php
		e(
			$html->link(
			$html->tag('span','List Upload'),
			array('controller'=>'admins','action'=>'projectlist'),
			array('escape'=>false,'class'=>(empty($this->producttype)) ? '' : $this->producttype)
			)
		);	
		?>
		</li>
		<li>
		<?php
		e(
			$html->link(
			$html->tag('span','Agree History'),
			array('controller'=>'legals','action'=>'user_agreehistory'),
			array('escape'=>false,'class'=>(empty($this->producttype)) ? '' : $this->producttype)
			)
		);	
		?>
		</li>
				
		 
    </ul>