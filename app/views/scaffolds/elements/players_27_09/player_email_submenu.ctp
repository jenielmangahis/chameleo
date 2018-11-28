<?php 
//$cmpid = $this->Session->Read("current_company");
$cmpid = ($this->data['Company']['id'])?'/'.$this->data['Company']['id']:'';
if($this->loginarea){
		if($this->loginarea=='companies'){
		$tab='companylist';
	}else if($this->loginarea=='players'){
		$tab='tasklist';
		//$tab='adddetail/'.$option.$cmpid;
	} 
	
?>                                                                     
            <ul id="tab-container-1-nav" class="topTabs2">
                    <li> 
						<?php
							e($html->link(
								$html->tag('span', 'Tasks'),
								array('controller'=>$this->loginarea,'action'=>$tab),
								array('escape' => false,'class'=> ($this->subtabsel=="tasklist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Templates'),
								array('controller'=>$this->loginarea,'action'=>'templatelist', $option, $current_company),
								array('escape' => false,'class'=> ($this->subtabsel=="templatelist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<li>
						<?php 
							e($html->link(
								$html->tag('span', 'Active'),
								array('controller'=>$this->loginarea,'action'=>'activelist', $option, $current_company),
								array('escape' => false,'class'=> ($this->subtabsel=="activelist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<li>
						<?php
							e($html->link(
								$html->tag('span', 'Task History'),
								array('controller'=>$this->loginarea,'action'=>'taskhistory', $option),
								array('escape' => false,'class'=> ($this->subtabsel=="taskhistory")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Responders'),
								array('controller'=>$this->loginarea,'action'=>'responders', $option),
								array('escape' => false,'class'=> ($this->subtabsel=="responders")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Auto Responders'),
								array('controller'=>$this->loginarea,'action'=>'autoresponders', $option),
								array('escape' => false,'class'=> ($this->subtabsel=="autoresponders")?'tabSelt':'')
								)
							);
						?>
					</li>
            </ul>
           <div class="clear"></div> 
<?php }?>