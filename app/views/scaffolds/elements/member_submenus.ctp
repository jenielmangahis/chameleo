<?php
	
	if($this->loginarea){?>
           <div class="clear">

			<?php
			e($html->image('spacer.gif',array('width'=>'1','height'=>'12px')));
			?>
		</div>
            <div style="height: 30px; clear:both;">
                <div id="tab-container-1">
                    <ul id="tab-container-1-nav" class="topTabs2">
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Details'),
									array('controller'=>$this->loginarea,'action'=>$projecteditmember,$recordid),
									array('class'=> ($this->subtabsel=="details")?'tabSelt':'','escape' => false )
									)
								);
							?>
						</li>
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Comments'),
									array('controller'=>$this->loginarea,'action'=>'membercomments',$recordid),
									array('class'=> ($this->subtabsel=="comments")?'tabSelt':'','escape' => false )
									)
								);
							?>		
						</li>
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Emails/SMS'),
									array('controller'=>$this->loginarea,'action'=>'memberemails',$recordid),
									array('class'=> ($this->subtabsel=="emails")?'tabSelt':'','escape' => false )
									)
								);
							?>		
						</li> 
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Messages'),
									array('controller'=>$this->loginarea,'action'=>'membermessages',$recordid),
									array('class'=> ($this->subtabsel=="messages")?'tabSelt':'','escape' => false )
									)
								);
							?>	

						</li> 
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Events'),
									array('controller'=>$this->loginarea,'action'=>'memberevents',$recordid),
									array('class'=> ($this->subtabsel=="events")?'tabSelt':'','escape' => false )
									)
								);
							?>	

						</li> 
						       <li>
							<?php
									e($html->link(
									$html->tag('span', 'Offers'),
									array('controller'=>$this->loginarea,'action'=>'memberoffers',$recordid),
									array('class'=> ($this->subtabsel=="memberoffers")?'tabSelt':'','escape' => false )
									)
								);
							?>	

						</li>  
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Points'),
									array('controller'=>$this->loginarea,'action'=>'memberpoints',$recordid),
									array('class'=> ($this->subtabsel=="points")?'tabSelt':'','escape' => false )
									)
								);
							?>

						</li> 
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'Donations'),
									array('controller'=>$this->loginarea,'action'=>'memberpurchases',$recordid),
									array('class'=> ($this->subtabsel=="purchases")?'tabSelt':'','escape' => false )
									)
								);
							?>

						</li> 
                        <li>
							<?php
									e($html->link(
									$html->tag('span', 'History'),
									array('controller'=>$this->loginarea,'action'=>'memberhistory',$recordid),
									array('class'=> ($this->subtabsel=="history")?'tabSelt':'','escape' => false )
									)
								);
							?>
						</li> 
                   </ul>
                </div>
            </div>  
            <div class="clear"></div>
<?php }?>