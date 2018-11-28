 <div id="panel"  class="ui-widget-content">
 	<?php if ($hlpdata[0]['HelpContent']['content']) { ?>
		<div class="content clearfix">
			<H1> Help</h1>
			<!--<p class="grey"><?php echo $hlpdata[0]['HelpContent']['content']; ?></p>-->
		</div>
		<div>
			<iframe width="100%" height="446px" src='<?php echo $html->url(array('controller' => 'companies', 'action' => 'help', $hlpdata[0]['HelpContent']['id']));?>'></iframe>
		</div>

	<?php 
		  }
		  else {
	?>
		<div class="content clearfix">
			<H1> Help</h1>
			<!-- HELP CONTENT MISSING -->
		</div>
	<?php } ?>

			
	        </div> <!-- /login -->	

	        <!-- The tab on top -->	
	        <div class="tab">
		        <ul class="login">
			        <li id="toggle">
                <a id="open" class="open" href="#"><span class="open1">Open Help Page</span></a>
        
				        <a id="close" style="display: none;" class="close" href="#"><span class="close1"> Close Help Page</span></a>		
			        </li>
		        </ul> 
	        </div>
