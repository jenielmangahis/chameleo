<?php if($this->loginarea){?>
           
               <div class="clear"><img src="../../img/spacer.gif" width="1" height="12px;" /></div>
				<div style="height: 30px; clear:both; float:left;">
                <div id="tab-container-1">
                    <ul id="tab-container-1-nav" class="topTabs2">
                    <li>
						<!--<a href="/<?php echo $this->loginarea;?>/memberlist" <?php if($this->subtabsel=="memberlist") {?> class="tabSelt" <?php } ?> ><span>Members</span></a>-->
						<?php
						e($html->link(
									$html->tag('span', 'Members'),
									'/'.$this->loginarea.'/memberlist',
									array('class'=> ($this->subtabsel=="memberlist")?'tabSelt':'','escape' => false )
									)
						);
					?>
					</li>
                    <li>
					<?php
						e($html->link(
									$html->tag('span', 'Holders'),
									'/'.$this->loginarea.'/holderslist',
									array('class'=> ($this->subtabsel=="holderslist")?'tabSelt':'','escape' => false )
									)
						);
					?>
					
					</li>
                    <li>
					<?php
						e($html->link(
									$html->tag('span', 'Non Holders'),
									'/'.$this->loginarea.'/nonholderslist',
									array('class'=> ($this->subtabsel=="nonholderslist")?'tabSelt':'','escape' => false )
									)
						);
					?>
					</li>
                    <li>
					<?php
						e($html->link(
									$html->tag('span', 'Non Members'),
									'/'.$this->loginarea.'/nonmemberslist',
									array('class'=> ($this->subtabsel=="nonmemberslist")?'tabSelt':'','escape' => false )
									)
						);
					?>
					</li> 
                    <li>
					<?php
						e($html->link(
									$html->tag('span', 'Top Points'),
									'/'.$this->loginarea.'/top_points',
									array('class'=> ($this->subtabsel=="top_points")?'tabSelt':'','escape' => false )
									)
						);
					?>
					</li> 
                    <li>					
						<?php
						e($html->link(
									$html->tag('span', 'Points Detail'),
									'/'.$this->loginarea.'/points_detail',
									array('class'=> ($this->subtabsel=="points_detail")?'tabSelt':'','escape' => false )
									)
						);
					?>
					</li>  
                    <li>					
						<?php
						e($html->link(
									$html->tag('span', 'Points Setup'),
									'/'.$this->loginarea.'/points',
									array('class'=> ($this->subtabsel=="points")?'tabSelt':'','escape' => false )
									)
						);
					?>

					</li> 
                    <li>
						<?php
						e($html->link(
									$html->tag('span', 'Member Type'),
									'/'.$this->loginarea.'/projectmembertypes',
									array('class'=> ($this->subtabsel=="projectmembertypes")?'tabSelt':'','escape' => false )
									)
						);
					?>

					</li>
					     <li>
						<?php
						e($html->link(
									$html->tag('span', 'Map'),
									'/'.$this->loginarea.'/map',
									array('class'=> ($this->subtabsel=="map")?'tabSelt':'','escape' => false )
									)
						);
					?>

					</li>
                    </ul>
                </div>
            </div>  
            <div class="clear"></div>
<?php }?>