<script type="text/javascript">
	$(document).ready(function() {
		$('#playMnu').removeClass("butBg");
		$('#playMnu').addClass("butBgSelt");
	}); 
</script>
<?php
$base_url = Configure::read('App.base_url');
$backUrl = $base_url.'players/playerslist/'.$option;
?> 

<div class="container">
         <div class="titlCont">
		  <div class="centerPage" >
            <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
            
           <?php echo $form->create("players", array("action" => "addgraphic/".$option, 'name' => 'addgraphic', 'type' => 'file','enctype'=>'multipart/form-data', 'id' => "addgraphic"));  
            echo $form->hidden("option", array('id' => 'option','value'=>"$option"));
            echo $form->hidden("Company.id", array('id' => 'companyid'));  
			echo $form->hidden("projectname", array('id' => 'projectname','value'=>"$projectname"));
			echo $form->hidden("projectid", array('id' => 'projectid','value'=>"$project_id"));
	 	   ?>
                 
            <script type='text/javascript'>
                function setprojectid(projectid){
                    document.getElementById('projectid').value= projectid;
                    document.adminhome.submit();
                }
            </script>
            <span class="titlTxt1"><?php  echo $current_company_name; echo ($current_company_name !='')? ' : ' :'';  ?></span>&nbsp;
             <span class="titlTxt"><?php echo ucfirst($option); ?> Graphics</span>
           <div class="topTabs">
               <ul>
					<li><button type="submit" value="Submit" class="button" name="data[Action][redirectpage]"><span>Save</span></button></li>
					<li><button type="submit" value="Submit" class="button" name="data[Action][noredirection]"><span>Apply</span></button></li>
					<li><button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $backUrl ?>')"><span> Cancel</span></button></li>
				</ul>
            </div>
            <div class="clear" ></div> 
        	<?php    $this->loginarea="players";    $this->subtabsel='graphics';
                            echo $this->renderElement('players/player_inner_submenu');  ?>   
        	
             </div>
        </div>
<div id="addcmp"  class="midCont">	
<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>
<table cellspacing="10" cellpadding="0">
		
  <?php if($session->check('Message.flash')){ ?>
    <tr>
      <td colspan="5"><?php $session->flash(); 
      				//echo $form->error('Company.company_name', array('class' => 'msgTXt'));
      				//echo $form->error('Company.company_type_id', array('class' => 'msgTXt'));
      				
      	?></td>
    </tr>
    <?php }?>  
  
   
<tr>
				 
				  <td valign='top' align="right"><label class="boldlabel">Square Graphic</label></td>
				  <td>
				  &nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $form->file('Company.square_graphic',array('id'=> 'square_graphic',"class" => "contactInput"));?><br>
				  &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: LightSlateGray;font-size: 11px;font-style: italic;">Used for 210X210 formats of image formatted appropriately.</span>
				   <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				   <?php 
				   if(isset($this->data['Company']['square_graphic']) && $this->data['Company']['square_graphic'] !='')
					echo $html->image('company/square/'.$this->data['Company']['square_graphic'],array('width'=>'210','height'=>'210','alt'=>''));
				   else
					echo $html->image('company/square/210X210.png');
				   ?> 
				   </td>
				 
				 </tr>
		       
			   
	
	<tr>
				 
				  <td valign='top' align="right"><label class="boldlabel">Wide Graphic</label></td>
				  <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $form->file('Company.wide_graphic',array('id'=> 'wide_graphic',"class" => "contactInput"));?><br>
				  &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: LightSlateGray;font-size: 11px;font-style: italic;">Used for 350X210 formats of image formatted appropriately.</span>
				   <br />&nbsp;&nbsp;&nbsp;&nbsp;
				   <?php 
				   if(isset($this->data['Company']['wide_graphic']) && $this->data['Company']['wide_graphic'] !='')
					echo $html->image('company/wide/'.$this->data['Company']['wide_graphic'],array('width'=>'350','height'=>'210','alt'=>''));
				   else{
				  	echo $html->image('company/wide/350X220.png'); 
				 
				   }
				   ?> 
				   </td>
				 
				 </tr>
		       
			   
			   <tr>
				 
				  <td valign='top' align="right"><label class="boldlabel">Tall Graphic</label></td>
				  <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $form->file('Company.tall_graphic',array('id'=> 'tall_graphic',"class" => "contactInput"));?><br>
				 &nbsp;&nbsp;&nbsp;&nbsp; <span style="color: LightSlateGray;font-size: 11px;font-style: italic;">Used for 210X350 formats of image formatted appropriately.</span>
				   <br />&nbsp;&nbsp;&nbsp;&nbsp;
				   <?php 
				   if(isset($this->data['Company']['tall_graphic']) && $this->data['Company']['tall_graphic'] !='')
					echo $html->image('company/tall/'.$this->data['Company']['tall_graphic'],array('width'=>'210','height'=>'350','alt'=>''));
				   else
					echo $html->image('company/tall/210X336.png');
				   ?> 
				   </td>
				 
				 </tr>
  


 <tr><td colspan="2" style="text-align: left; padding: 20px 5px 20px 5px ;" class="top-bar">
                             <?php  echo $this->renderElement('bottom_message');  ?>
                            </td></tr>
 </table>
<!--inner-container ends here-->
<?php echo $form->end();?>
</div>

 <div class="clear"></div>    
</div>   
<script type="text/javascript">
    if(document.getElementById("flashMessage")!=null){		
        document.getElementById("cmplisttab").className = "newmidCont";
    }	
</script>