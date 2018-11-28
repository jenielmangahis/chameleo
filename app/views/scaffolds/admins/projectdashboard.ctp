<!--container starts here-->
<div class="titlCont1">
        <div class="centerPage">
                <div align="center" id="toppanel" >
                        <?php  echo $this->renderElement('new_slider');  ?>
        </div><span class="titlTxt1"><?php echo $project_name; ?>:&nbsp;</span><span class="titlTxt"> Dashboard </span><br /><br /><br><br><br><br><br>
</div>

<div class="midCont">

 <?php if($session->check('Message.flash')){ ?> 
<div id="blck"> 
        <div class="msgBoxTopLft"><div class="msgBoxTopRht"><div class="msgBoxTopBg"></div></div></div>
	        <div class="msgBoxBg">
		        <div class="">
				<?php
				e($html->link(
					$html->image('close.png',array('style'=>'margin-left: 945px; position: absolute; z-index: 11;','alt'=>'Close')),
					'javascript:void(0)',
					array('escape' => false,'onclick' => "hideDiv()")
					)
				);
				$session->flash();    
				?> 
		        </div>
	                <div class="msgBoxBotLft"><div class="msgBoxBotRht"><div class="msgBoxBotBg"></div></div></div>
		</div>
</div>
                                            <?php } ?>
<h1 style="text-align: center;">Selected Project : <?php echo $project_name; ?><h1>
</div>  
    

