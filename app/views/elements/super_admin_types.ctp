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
			array('class'=>(isset($this->categorylist) && $this->categorylist != "")?$this->categorylist:'','escape' => false)
			)
		);
		?>
		</li>
		
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Non-Profit'),
			array('controller'=>'admins','action'=>'nonprofittypelist'),
			array('class'=>(isset($this->nonprofittypelist) && $this->nonprofittypelist != "")?$this->nonprofittypelist:'','escape' => false)
			)
		);
		?>
		</li>
		
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Contacts'),
			array('controller'=>'admins','action'=>'contacttype'),
			array('class'=>(isset($this->contacttype) && $this->contacttype != "")?$this->contacttype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Billing'),
			array('controller'=>'admins','action'=>'billingtype_list'),
			array('class'=>(isset($this->billingtype_list) && $this->billingtype_list != "")?$this->billingtype_list:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'System Pricing'),
			array('controller'=>'admins','action'=>'system_pricing_list','2'),
			array('class'=>(isset($this->system_pricing_list) && $this->system_pricing_list != "")?$this->system_pricing_list:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Coin Prices'),
			array('controller'=>'admins','action'=>'pricingtype'),
			array('class'=>(isset($this->pricingtype) && $this->pricingtype != "")?$this->pricingtype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Shipping'),
			array('controller'=>'admins','action'=>'shippingtype'),
			array('class'=>(isset($this->shippingtype) && $this->shippingtype != "")?$this->shippingtype:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
<?php
if($_GET['url']==='admins/formtypelist'){
	e($html->link(
				$html->tag('span', 'Forms'),
				array('controller'=>'admins','action'=>'formtypelist'),
				array('class'=>'tabSelt','id'=>'FormtLst','escape' => false)
				)
	);
	}
	else{
	e($html->link(
				$html->tag('span', 'Forms'),
				array('controller'=>'admins','action'=>'formtypelist'),
				array('class'=>'butBg','id'=>'FormtLst','escape' => false)
				)
	);
	}
?>
</li>
		<?php /*?><li>
		<?php
		e($html->link(
			$html->tag('span', 'Forms Types'),
			array('controller'=>'admins','action'=>'formtypes'),
			array('class'=>(isset($this->formtypes) && $this->formtypes != "")?$this->formtypes:'','escape' => false)
			)
		);
		?>
		</li>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Form Status'),
			array('controller'=>'admins','action'=>'sa_formstatustypelist'),
			array('class'=>(isset($this->sa_formstatustypelist) && $this->sa_formstatustypelist != "")?$this->sa_formstatustypelist:'','escape' => false)
			)
		);
		?>
		</li><?php */?>
		<li>
		<?php
		e($html->link(
			$html->tag('span', 'Overrides'),
			array('controller'=>'admins','action'=>'overrideslist'),
			array('class'=>(isset($this->overrideslist) && $this->overrideslist != "")?$this->overrideslist:'','escape' => false)
			)
		);
		?>
		</li>

</ul>