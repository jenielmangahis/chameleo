<?php if($this->loginarea){
	$controller = $this->loginarea; 
$paramArrar=$this->params['pass'];
if(!empty($paramArrar['0'])){
	$page_arg=$paramArrar['0'];
}else{
	$page_arg='';
}
?>                                                                     
       <div class="clear"></div>
            <ul id="tab-container-1-nav" class="topTabs2">
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Current Events'),
								array('controller'=>$controller,'action'=>'eventlist'),
								array('class'=>($this->subtabsel=="eventlist")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Past Events'),
								array('controller'=>$controller,'action'=>'pasteventlist'),
								array('class'=>($this->subtabsel=="pasteventlist")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Calendar'),
								array('controller'=>$controller,'action'=>'calendar'),
								array('class'=>($this->subtabsel=="calendar")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'AutoResponse'),
								array('controller'=>$controller ,'action'=>'eventautoresponders'),
								array('class'=>($this->subtabsel=="eventautoresponders")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
                <li>
				<?php

					e($html->link(
								$html->tag('span', 'Event Pages'),
								array('controller'=>$controller,'action'=>'event_pages','detail'),
								array('class'=>($page_arg=="detail")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Sponsor Pages'),
								array('controller'=>$controller,'action'=>'event_pages','sponsor'),
								array('class'=>($page_arg=="sponsor")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Inquiry Pages'),
								array('controller'=>$controller,'action'=>'event_pages','inquiry'),
								array('class'=>($page_arg=='inquiry')?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>  
                <li>
				<?php
					e($html->link(
								$html->tag('span', 'Types'),
								array('controller'=>$controller,'action'=>'event_types'),
								array('class'=>($this->subtabsel=="event_types")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>    
            </ul>
          
    <?php }?>