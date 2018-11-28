<?php $lgrt = $session->read('newsortingby');
    $coinHolder = $this->params['pass'][0];
    //echo $javascript->codeBlock("var coinHolder = $coinHolder");
?>     
<style type="text/css">
    .ui-datepicker-trigger{position:absolute;background:none;margin-left:5px;}
</style>


<!--container starts here-->
<?php 
if(isset($paging)){
	$paging=$paging;
}else{
	$paging='';
}
$pagination->setPaging($paging); ?>  
    <div class="titlCont">
        <div style="width:960px; margin:0 auto;">
            <div align="center" class="slider" id="toppanel" style="height: 20px;">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
           <?php //echo $form->create("Admins", array("action" => "memberhistory",'name' => 'memberhistory', 'id' => "memberhistory")) ?>      
            <span class="titlTxt1"><?php echo $project['Project']['project_name'];  ?>:&nbsp;</span>
            <span class="titlTxt"> History </span>
  
            <div class="topTabs">
                            <!--  <ul>
      <li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
                    <li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>    
                    <li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='/< ?php echo $lgrt;?>')"><span> Cancel</span></button></li>    
                </ul>                     -->
            </div>

           
                        <?php    $this->loginarea="admins";    $this->subtabsel="history";
                            echo $this->renderElement('member_submenus');  ?>   
                   

        </div>
    </div>




  <div class="midCont" id="newhldtab">



    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>

    <!-- top curv image starts -->
                     <?php  echo $this->renderElement('coming_soon');  ?>              
<!--inner-container ends here-->
  </div>   


    <div class="clear"></div>
 </div>      