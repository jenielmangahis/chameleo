<script type="text/javascript">
$(document).ready(function() {
$('#FormtLst').removeClass("butBg");
$('#FormtLst').addClass("butBgSelt");
$('#weB').addClass("butBg");
}); 
</script> 
<?php 	
$base_url_admin = Configure::read('App.base_url_admin');
//$backUrl = $base_url_admin.'companylist';
?>
<script type="text/javascript">
$(document).ready(function()
{
			$('#checkall').bind('change',function(){
			var check = $(this).attr('checked')?1:0;
			if(check ==1)
			{
					$('.checkid').each(function()
					{
							$(this).attr('checked',true);

					});


			}else{

					$('.checkid').each(function()
					{
							$(this).attr('checked',false);

					});
			}		

	})

});
$(document).ready(function()
{   
	$('.checkid').bind('change',function()
	{   
		//event.stopPropagation();
		var i=0;
		var j=0;
		$('.checkid').each(function(){
			i++;
			var check = $(this).attr('checked')?1:0;
			if(check ==1)
			{			
				j++;
			}


		});
		
		if(i==j)
			$('#checkall').attr('checked',true);
		else
			$('#checkall').attr('checked',false);
	});
});



 	function editformtype()
	{	
	var counter=0;
	var id="";
	$('.checkid').each(function(){		
		var check = $(this).attr('checked')?1:0;
		if(check ==1)
		{			
				id=$(this).val();
				counter=counter +1;
		}
   	});	
	
	if(counter!=1)
	{
		alert("please select only one row  to edit");
		return false;
		}else{	
		document.getElementById("linkedit").href=baseUrlAdmin+"formtype_add/"+id; 
		
		}
	} 
  

function activatecontents(act,op)
{   
    var id="";
        var count=0;
    $('.checkid').each(function(){       
        var check = $(this).attr('checked')?1:0;
        if(check ==1)
        {           
            if(id==""){
                id=$(this).val();
               
                ++count;
                }
                else
                {
                id=id + "*" + $(this).val();
                ++count;
                }
        }
   });
        if(id !=""){
                        if(op=="change"){       
                                if(act=="active"){
                                        window.location=baseUrlAdmin+"changestatus/"+id+"/FormType/1/formtypelist/cngstatus";
                                        }else{
                                        window.location=baseUrlAdmin+"changestatus/"+id+"/FormType/0/formtypelist/cngstatus";
                                        }
                        }
                        if(op=="del"){
                        if(confirm("You have selected "+count +" items to delete ?"))

                         if(confirm("Are You Sure to delete the item"))
                            window.location=baseUrlAdmin+"changestatus/"+id+"/FormType/0/formtypelist/delete";
                       }
}else{
                alert('Please atleast one record should be select'); 
                return false;
        }
} 

   </script>
<?php $pagination->setPaging($paging); ?> 
 <!-- Body Panel starts -->
   <div class="container">
<div class="titlCont">

<div class="myclass">
<div align="center" class="slider" id="toppanel">
     <?php  echo $this->renderElement('new_slider');  ?>
</div>
        <?php echo $form->create("Admins", array("action" => "formtypelist",'name' => 'bloglist', 'id' => "formtypelist")) ?>
        <script type='text/javascript'>
            function setformid(formid){
                 //   document.getElementById('projectid').value= projectid;
                    window.location=baseUrlAdmin+'formtype_add/'+formid
                }
        </script>
<span class="titlTxt1"><?php echo $project['Project']['project_name'];  ?>:&nbsp;</span>          
<span class="titlTxt">  Forms</span>

<div class="topTabs">
<ul class="dropdown">
<li>
<?php
	e($html->link(
		$html->tag('span', 'New'),
		array('controller'=>'admins','action'=>'formtype_add'),
		array('escape' => false)
		)
	);
?>

</li>   
<li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
<ul class="sub_menu">
                     
                     <li><a href="javascript:void(0)" onclick="return activatecontents('active','change');">Publish</a></li>
                     <li><a href="javascript:void(0)" onclick="return activatecontents('deactive','change');">Unpublish</a></li>
                      <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');" >Trash</a></li>
                     <li class="botCurv"></li>
                </ul>
</li>
<li><a href="javascript:void(0)" onclick="editformtype();" id="linkedit"><span>Edit</span></a></li>   
</ul>
</div>
     
              <?php    $this->loginarea="admins";    $this->subtabsel="formtypelist";
             echo $this->renderElement('forms_submenus');  ?>    
</div></div>



    <div class="midCont">



	
	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>


    <!-- top curv image starts -->
    <div>
    <span class="topLft_curv"></span>
	<span class="topRht_curv"></span>
    <div class="gryTop">
		<div class="new_filter">

					<span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));
                                                        
                                                        ?> 
                                                            </span>
								<span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $base_url_admin ?>formtypelist')" id="locaa"></span>
		</div>
                    </div>	
                    <div class="clear"></div></div>

<?php $i=1; ?>			
		
                    <div class="tblData">

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr class="trBg">
    <th align="center" valign="middle"  width="1%">#</th>
       <th align="center" valign="middle" width="3%" ><input type="checkbox" value="" name="checkall" id="checkall" /></th>
      <th align="center" valign="middle" width="20%">Creation Date <span class="right"><?php echo $pagination->sortBy('created', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span></th>
	  
      <th align="center" valign="middle" width="25%">Form Name <span class="right"><?php echo $pagination->sortBy('formtype_name', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span></th>
	  
	     <th align="center" valign="middle" width="15%">Relationship Type <span class="right"><?php echo $pagination->sortBy('releation_type', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span></th>

	  
	  
      <th align="center" valign="middle" width="30%">Form Description <span class="right"><?php echo $pagination->sortBy('form_description', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span></th>
     <th align="center" valign="middle" width="10%">Status<span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span></th>

      </tr>
   	<?php if($formtypedata){ 
	$alt=0;
		$i=1;
   			foreach($formtypedata as $eachrow){
			if($alt%2==0)
				$class="style='background-color:#FFF;'";
			else
				$class="style='background-color:#f8f8f8;'";
				
			$alt++;
   			$recid = $eachrow['FormType']['id'];
			$modelname = "FormType";
   			$redirectionurl = "formtypelist";
   		//	$company_type_id = $eachrow['AdminsType']['company_type_name'];
   			$formtype_name = $eachrow['FormType']['formtype_name'];
			if($formtype_name) $formtype_name = AppController::WordLimiter($formtype_name,25);
            $releation_type = $eachrow['FormType']['releation_type'];
					if($releation_type > 0){
						$getrelationtype =  $common->getrelationshiptype($releation_type,'list');	
					}
             $form_created = date("m-d-Y H:i:s", strtotime($eachrow['FormType']['created']));    
             
            $form_description = $eachrow['FormType']['form_description'];
            if($form_description) $form_description = AppController::WordLimiter($form_description,100); 			
   		?>
   	<tr <?php echo $class;?>>	
			
		<td align="center"><a><span><?php echo $i++;?></span></a></td>
		<td align="center"><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>
          <td align="left" valign="middle">
			
			<?php
				e($html->link(
					$html->tag('span', $form_created),
					array('controller'=>'admins','action'=>'formtype_add',$recid),
					array('escape' => false)
					)
				);
		?>
		</td>     
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $formtype_name),
					array('controller'=>'admins','action'=>'formtype_add',$recid),
					array('escape' => false)
					)
				);
		?>
		</td>
		<td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', isset($getrelationtype)?$getrelationtype:'N/A'),
					array('controller'=>'admins','action'=>'formtype_add',$recid),
					array('escape' => false)
					)
				);
		?>
		</td>      
        <td align="left" valign="middle">
			<?php
				e($html->link(
					$html->tag('span', $form_description),
					array('controller'=>'admins','action'=>'formtype_add',$recid),
					array('escape' => false)
					)
				);
		?>
		</td>      
        <td align="center" valign="middle">
		<?php if(isset($blog_title)){
			$blog_title=$blog_title;
		}else{
			$blog_title='';
		}
				
		?>
			<?php if($eachrow['FormType']['active_status']=='1'){ 

			e(
								$html->link(
									$html->image('active.gif',array('title'=>'Click here to deactivate '.$blog_title)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,0,$redirectionurl,'cngstatus'),
									array('escape'=>false)
								)
							);
						}else {

							e(
								$html->link(
									$html->image('deactive.gif',array('title'=>'Click here to activate '.$blog_title)),
									array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,1,$redirectionurl,'cngstatus'),
									array('escape'=>false)
								)
							);
						}
			?>
			
		</td>
	
		</tr>
	<?php } }else{ ?>
	<tr><td colspan="6" align="center">No forms found.</td></tr>
	<?php } ?>
	</table> 
    
			
 </div>
                    <div>
                    <span class="botLft_curv"></span>
						<span class="botRht_curv"></span>
<div class="gryBot"><?php if($formtypedata) { echo $this->renderElement('newpagination'); } ?>
                    </div>
                    <div class="clear"></div>
                    </div>
<!--inner-container ends here-->

<?php echo $form->end();?>

                    </div>

<div class="clear"></div>