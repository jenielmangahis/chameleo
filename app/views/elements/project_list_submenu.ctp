 <ul class="topTabs2" id="tab-container-1-nav" style=" margin-top: 0px;padding-left: -40px;">
            <li>
			<?php
			if($_GET['url']==='admins/projectlist' || $_GET['url']==='admins/projectlist/1'){
			e(
				$html->link(
					$html->tag('span','All'),
					array('controller'=>'admins','action'=>'projectlist','1'),
					array('class'=>'tabSelt','escape'=>false)
				)	
			);
			}else{
			e(
				$html->link(
					$html->tag('span','All'),
					array('controller'=>'admins','action'=>'projectlist','1'),
					array('class'=>'','escape'=>false)
				)	
			);
			}
			?>
			</li>
            <li>
			<?php
			e(
				$html->link(
					$html->tag('span','By Product'),
					array('controller'=>'admins','action'=>'projectlist_by_product','1'),
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
		if($_GET['url']==='admins/projectlist/2'){
		e(
			$html->link(
			$html->tag('span','List Upload'),
			array('controller'=>'admins','action'=>'projectlist','2'),
			array('escape'=>false,'class'=>'tabSelt')
			)
		);	
		}
		else{
		e(
			$html->link(
			$html->tag('span','List Upload'),
			array('controller'=>'admins','action'=>'projectlist','2'),
			array('escape'=>false,'class'=>'')
			)
		);
		}
		?>
		</li>
<li>
		<?php
		if($_GET['url']==='legals/user_agreehistory'){
		e(
			$html->link(
			$html->tag('span','Agree History'),
			array('controller'=>'legals','action'=>'user_agreehistory'),
			array('escape'=>false,'class'=>'tabSelt')
			)
		);	
		}
		else{
		e(
			$html->link(
			$html->tag('span','Agree History'),
			array('controller'=>'legals','action'=>'user_agreehistory'),
			array('escape'=>false,'class'=>'')
			)
		);
		}
		?>
</li>

<li>
		<?php
		if($_GET['url']==='admins/projectmanagerlist/1' || ($this->params['controller']==='admins'&& $this->params['action']==='project_manager' )){
		e(
			$html->link(
			$html->tag('span','Project Manager'),
			array('controller'=>'admins','action'=>'projectmanagerlist','1'),
			array('escape'=>false,'class'=>'tabSelt')
			)
		);	
		}
		else{
		e(
			$html->link(
			$html->tag('span','Project Manager'),
			array('controller'=>'admins','action'=>'projectmanagerlist','1'),
			array('escape'=>false,'class'=>'')
			)
		);	
		}
		
		?>
</li>
				
		 
    </ul>