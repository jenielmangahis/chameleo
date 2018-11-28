<?php 
//$companyId = $this->params['pass']['0'];
if($this->loginarea){
		if($this->loginarea=='companies'){
		$tab='companylist';
	}else if($this->loginarea=='prospects'){
		$tab='projectmerchant';
	} 
?>                                                                     
  <div class="clear"></div> 
            <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<?php
							$addtye = ($addtype == "Marchant")? "addmerchant" : "addprospectnonprofit" ;						
							e($html->link(

								$html->tag('span', 'Detail'),
								array('controller'=>$this->loginarea,'action'=>$addtye,$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="projectmerchant" || $this->subtabsel=="projectmerchantlist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<?php if($hq_id > 0){ } else{?>
					  <li>
						<?php
					
							e($html->link(
								$html->tag('span', 'Branches'),
								array('controller'=>$this->loginarea,'action'=>'branchlist',$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="brancheslist")?'tabSelt':'')
								)
							);
						?>
					</li>
					<?php } ?>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Graphics'),
								array('controller'=>$this->loginarea,'action'=>'addgraphic',$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="graphics" || $this->subtabsel=="graphics")?'tabSelt':'')
								)
							);
						?>
					</li>
					
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Email'),
								array('controller'=>$this->loginarea,'action'=>'sendmail',$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="sendemail" || $this->subtabsel=="sendemail")?'tabSelt':'')
								)
							);
						?>
					</li>
					
					
					
					
                  
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'Notes'),
								array('controller'=>$this->loginarea,'action'=>'notelist',$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="notelist")?'tabSelt':'')
								)
							);
						?>
					</li>
                    <li>
						<?php
							e($html->link(
								$html->tag('span', 'History'),
								array('controller'=>$this->loginarea,'action'=>'history',$cid,$addtype),
								array('escape' => false,'class'=> ($this->subtabsel=="history")?'tabSelt':'')
								)
							);
						?>

					</li>
					
					
					
					
				
				   
            </ul>
     
       <div class="clear"></div> 
<?php }?>