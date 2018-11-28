<?php  
echo $javascript->link('ckeditor/ckeditor');
$base_url_admin = Configure::read('App.base_url_admin');
$backUrl = $base_url_admin.'project_border_footer';
?>

<!--container starts here-->

<div class="container">
<div class="titlCont">
<div class="centerPage">
        <div align="center" class="slider" id="toppanel">
            <div id="panel">
                <div class="content clearfix">
                    <H1> Help</h1>
                    <p class="grey"><?php echo $hlpdata[0]['HelpContent']['content']; ?></p>
                </div>

            </div> <!-- /login -->  

            <!-- The tab on top --> 
            <div class="tab">
                <ul class="login">
                    <li id="toggle">
                        <a id="open" class="open" href="#."><span>Open Help Box</span></a>

                        <a id="close" style="display: none;" class="close" href="#"><span>Close Help Box</span></a>               
                    </li>
                </ul> 
            </div>
        </div>

        <?php echo $form->create("Admins", array("action" => "project_border_footer",'name' => 'project_border_footer', 'id' => "project_border_footer"))?>
        <?php  echo $this->renderElement('project_name');  ?> 
        <span class="titlTxt">
            Border Footer
        </span>
     <div class="topTabs">
                <ul>
				<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
				<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
				<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $backUrl ?>')"><span> Cancel</span></button></li>  
              </ul>
            
        </div> 
        <?php    
			$this->loginarea="admins";
			$this->subtabsel="project_border_footer";
            echo $this->renderElement('websites_submenus');
		?>   
    </div></div>
    
    
    <?php    //if($session->check('Message.flash')){ ?><div style="width:400px;margin:0 auto;"><?php //$session->flash();?></div><?php //}?>
<div class="clear"></div>


        
<div class="rightpanel">


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

<div id="center-column">
            
        <!-- ADD USER FORM -->
    
        <table width="100%" align="center" cellpadding="1" cellspacing="1">
        <tr>
              <td width="100%" colspan=2 style="vertical-align:top" >
            <?php    
                    echo $form->hidden('ProjectBorderFooter.id',array('id'=>'id','value'=>$page_footer_id));
            
                        echo $form->textarea('ProjectBorderFooter.page_footer_content', array('id'=>'mailfooter','class'=>'ckeditor','value'=>$page_footer_content));                        
                        
                ?>
            </td>
            </tr>
          
        
        
    <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>    


                    
                    
                </table>
                
            </div>

 
</div><!--inner-container ends here-->

  

<?php echo $form->end();?>


<div class="clear"></div>


</div><!--container ends here-->


