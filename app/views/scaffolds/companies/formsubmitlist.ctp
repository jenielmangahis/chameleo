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



 	function editformsubmitted()
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
		document.getElementById("linkedit").href="/companies/formsubmitted/"+id; 
		
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
                                        window.location="/companies/changestatus/"+id+"/FormSubmit/1/formsubmitlist/cngstatus";
                                        }else{
                                        window.location="/companies/changestatus/"+id+"/FormSubmit/0/formsubmitlist/cngstatus";
                                        }
                        }
                        if(op=="del"){
                        if(confirm("You have selected "+count +" items to delete ?"))

                         if(confirm("Are You Sure to delete the item"))
                            window.location="/companies/changestatus/"+id+"/FormSubmit/0/formsubmitlist/delete";
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
        <?php echo $form->create("Company", array("action" => "formsubmitlist",'name' => 'formsubmitlist', 'id' => "formsubmitlist")) ?>

<span class="titlTxt">
Forms Submitted
</span>
<div class="topTabs">
<ul class="dropdown">
<!-- <li><a href="/companies/formtype_add"><span>New</span></a></li>    
<li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
<ul class="sub_menu">
                     
                     <li><a href="javascript:void(0)" onclick="return activatecontents('active','change');">Publish</a></li>
                     <li><a href="javascript:void(0)" onclick="return activatecontents('deactive','change');">Unpublish</a></li>
                      <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');" >Trash</a></li>
                     <li class="botCurv"></li>
                </ul>
</li>-->
<li><a href="javascript:void(0)" onclick="editformsubmitted();" id="linkedit"><span>Edit</span></a></li>   
</ul>
</div>
        
        <?php    $this->loginarea="companies";    $this->subtabsel="formsubmitlist";
             echo $this->renderElement('forms_submenus');  ?>   
</div></div>



    <div class="midCont">



	
	<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>


    <!-- top curv image starts -->
    <div>
    <span class="topLft_curv"></span>
    <div class="gryTop">

					<span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200"));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => ''));
                                                        
                                                        ?> 
         </span>
		<span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='/companies/formsubmitlist')" id="locaa"></span>
        <span class="srchBg2"><input type="button" value="Csv file download" label="" onclick="jjavascript:(window.location='/companies/forms_csvdownloads')" > </span>
		
                    </div>	<span class="topRht_curv"></span>
                    <div class="clear"></div></div>

<?php $i=1; ?>			
		
                    <div class="tblData">

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr class="trBg">
	<th align="center" valign="middle"  width="5%">#</th>
	   <th align="center" valign="middle" width="3%" ><input type="checkbox" value="" name="checkall" id="checkall" /></th>
      <th align="center" valign="middle" width="15%">Date <span class="right"><?php echo $pagination->sortBy('created', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
      <th align="center" valign="middle" width="15%">Status <span class="right"><?php echo $pagination->sortBy('statustype_id', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
      <th align="center" valign="middle" width="12%">Last Name <span class="right"><?php echo $pagination->sortBy('fld_lastname', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
      <th align="center" valign="middle" width="12%">First Name <span class="right"><?php echo $pagination->sortBy('fld_firstname', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
	  <th align="center" valign="middle" width="12%">List1 <span class="right"><?php echo $pagination->sortBy('fld_list1', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
      <th align="center" valign="middle" width="30%">Message <span class="right"><?php echo $pagination->sortBy('fld_message', '<img src="/img/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span></th>
      </tr>
   	<?php if($formsubmitdata){ 
	$alt=0;
		$i=1;
   			foreach($formsubmitdata as $eachrow){
					//alternate color rows
			if($alt%2==0)
				$class="style='background-color:#FFF;'";
			else
				$class="style='background-color:#f8f8f8;'";
				
				$alt++;
   			$recid = $eachrow['FormSubmit']['id'];
   			$modelname = "FormSubmit";
   			$redirectionurl = "formsubmitlist";
   		//	$company_type_id = $eachrow['CompanyType']['company_type_name'];
               $submitted_date = date("m-d-Y H:i:s", strtotime($eachrow['FormSubmit']['created']));
               
               $curr_status = $eachrow['FormSubmitStatustype']['statustype_name'];
               if($curr_status=='0' || $curr_status==null || $curr_status==''){
                   $curr_status="New Submission";
               }
               $last_name = $eachrow['FormSubmit']['fld_lastname'];
               $first_name = $eachrow['FormSubmit']['fld_firstname'];
               $list1 = $eachrow['FormSubmit']['fld_list1'];
   			   $message = $eachrow['FormSubmit']['fld_message'];
               if($message) $message = AppController::WordLimiter($message,25);
            
       
   			
   		?>
   	<tr <?php echo $class;?>>	
			
		<td align="center"><a><span><?php echo $i++;?></span></a></td>
		<td align="center"><a><span><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" /></span></a></td>
        <td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $submitted_date; ?></a></span></td>
        <td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $curr_status; ?></a></span></td>
        <td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $last_name; ?></a></span></td>
		<td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $first_name; ?></a></span></td>
        <td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $list1; ?></a></span></td>      
        <td align="left" valign="middle"><a href="/companies/formsubmitted/<?php echo $recid?>" ><span><?php echo $message; ?></a></span></td>      
	
		</tr>
	<?php } }else{ ?>
	<tr><td colspan="8" align="center">No record found.</td></tr>
	<?php } ?>
	</table> 
    
			
 </div>
                    <div>
                    <span class="botLft_curv"></span>
<div class="gryBot"><?php if($formsubmitdata) { echo $this->renderElement('newpagination'); } ?>
                    </div><span class="botRht_curv"></span>
                    <div class="clear"></div>
                    </div>
<!--inner-container ends here-->

<?php echo $form->end();?>

                    </div>

<div class="clear"></div>
