<?php if($this->loginarea){?>                                                                     
    <div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
    <div style="height: 30px; clear:both;">
        <div id="tab-container-1">
            <ul id="tab-container-1-nav" class="topTabs2">
                <li>
					<?php
						e($html->link(
							$html->tag('span', 'Send Mail'),
							array('controller'=>$this->loginarea,'action'=>'sendtempmail'),
							array('class'=> ($this->subtabsel=="sendtempmail")?'tabSelt':'','escape' => false)
							)
						);
					?>
				</li>
                <li>
					<?php
						e($html->link(
							$html->tag('span', 'Mail Templates'),
							array('controller'=>$this->loginarea,'action'=>'mailtemplatelist'),
							array('class'=> ($this->subtabsel=="mailtemplatelist")?'tabSelt':'','escape' => false)
							)
						);
					?>

				</li>
                <li>
					
					<?php
						e($html->link(
							$html->tag('span', 'Responders'),
							array('controller'=>$this->loginarea,'action'=>'mailautoresponderlist'),
							array('class'=> ($this->subtabsel=="mailautoresponderlist")?'tabSelt':'','escape' => false)
							)
						);
					?>

				</li>
                <li>
						
					<?php
						e($html->link(
							$html->tag('span', 'Task Setup'),
							array('controller'=>$this->loginarea,'action'=>'addcommtask'),
							array('class'=> ($this->subtabsel=="addcommtask")?'tabSelt':'','escape' => false)
							)
						);
					?>

				</li>          
                <li>
					<?php
						e($html->link(
							$html->tag('span', 'Active Tasks'),
							array('controller'=>$this->loginarea,'action'=>'commtasklist'),
							array('class'=> ($this->subtabsel=="commtasklist")?'tabSelt':'','escape' => false)
							)
						);
					?>

				</li>    
                <li>
					<?php
						e($html->link(
							$html->tag('span', 'Task History'),
							array('controller'=>$this->loginarea,'action'=>'commtaskhistorylist'),
							array('class'=> ($this->subtabsel=="commtaskhistorylist")?'tabSelt':'','escape' => false)
							)
						);
					?>
				</li>
				<li>
					<?php
						e($html->link(
							$html->tag('span','Spam Policy'),
							array('controller'=>$this->loginarea,'action'=>'spam_policy_project'),
							array('class'=> ($this->subtabsel=="spam_policy_project")?'tabSelt':'','escape' => false)
							)
						);
					?>
				</li> 
            </ul>
        </div>
    </div>  

    <div class="clear"></div> 
    <?php }?>