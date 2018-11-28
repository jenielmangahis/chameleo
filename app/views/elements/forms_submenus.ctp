<?php if($this->loginarea){?>                                                                     
    <div class="clear"></div>
            <ul id="tab-container-1-nav" class="topTabs2">
                <!--<li>
					
					<?php
					e($html->link(
								$html->tag('span', 'Submitted'),
								array('controller'=>'admins','action'=>'formsubmitlist'),
								array('class'=>($this->subtabsel=="formsubmitlist")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>-->
				 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-New'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','new'),
								array('escape' => false,'class'=> ($this->subtabsel=="newinquiry")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-Open'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','open'),
								array('escape' => false,'class'=> ($this->subtabsel=="openinquiry")?'tabSelt':'')
								)
							);
						?>

					</li>
					 <li>
						<?php
							e($html->link(
								$html->tag('span', 'Inquiries-History'),
								array('controller'=>$this->loginarea,'action'=>'inquirylist','history'),
								array('escape' => false,'class'=> ($this->subtabsel=="historylist")?'tabSelt':'')
								)
							);
						?>

					</li>    
                <li>
					<?php
					e($html->link(
								$html->tag('span', 'Forms List'),
								array('controller'=>'admins','action'=>'formtypelist'),
								array('class'=>($this->subtabsel=="formtypelist")?'tabSelt':'','escape' => false)
								)
					);
				?>
				</li>
                <li>
					<?php
					e($html->link(
								$html->tag('span', 'Status Types'),
								array('controller'=>'admins','action'=>'formstatustypelist'),
								array('class'=>($this->subtabsel=="formstatustypelist")?'tabSelt':'','escape' => false)
								)
					);
				?>

				</li>    
            </ul>
    <div class="clear"></div> 
    <?php }?>