<ul class="topTabs2" id="tab-container-1-nav" style="padding-left: -40px;">
        <li>
		<?php
		e($html->link(
			$html->tag('span', 'Project'),
			array('controller'=>'admins','action'=>'projecttype'),
			array('class'=>(isset($this->projecttype) && $this->projecttype != "")?$this->projecttype:'','escape' => false)
			)
		);
		?>
		</li>
       
        <li>
		<?php
		e($html->link(
			$html->tag('span', 'Company'),
			array('controller'=>'admins','action'=>'companytype'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Categories'),
			array('controller'=>'admins','action'=>'categorylist'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Non-Profit'),
			array('controller'=>'admins','action'=>'nonprofittypelist'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Contacts'),
			array('controller'=>'admins','action'=>'contacttype'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Billing'),
			array('controller'=>'admins','action'=>'billingtype_list'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'System Pricing'),
			array('controller'=>'admins','action'=>'system_pricing_list'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Coin Prices'),
			array('controller'=>'admins','action'=>'pricingtype'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Shipping'),
			array('controller'=>'admins','action'=>'shippingtype'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Forms Types'),
			array('controller'=>'admins','action'=>'formtypes'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Form Status'),
			array('controller'=>'admins','action'=>'sa_formstatustypelist'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Overrides'),
			array('controller'=>'admins','action'=>'overrideslist'),
			array('class'=>(isset($this->companytype) && $this->companytype != "")?$this->companytype:'','escape' => false)
			)
		);
		?>
		</li>

</ul>