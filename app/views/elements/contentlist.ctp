
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



 	function editcontent()
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
		document.getElementById("linkedit").href="/companies/editcontent/"+id; 
		
		}
	} 


function activatecontents(act,op)
{	
	var id="";
	$('.checkid').each(function(){		
		var check = $(this).attr('checked')?1:0;
		if(check ==1)
		{			
			if(id=="")
				id=$(this).val();
			else
				id=id + "*" + $(this).val();
		}
   });
	if(id !=""){
			if(op=="change"){	
				if(act=="active"){
					window.location="/companies/changestatus/"+id+"/Content/1/contentlist/cngstatus";
					}else{
					window.location="/companies/changestatus/"+id+"/Content/0/contentlist/cngstatus";
					}
			}
			if(op=="del"){
			window.location="/companies/changestatus/"+id+"/Content/0/contentlist/delete";
			}
	}else{
		alert('Please atleast one record should be select'); 
		return false;
	}
}
</script>



<!--container starts here-->
<?php $pagination->setPaging($paging); ?>
<div class="container">
<div class="titlCont">
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
            <a id="open" class="open" href="#."><span>Click Here to Open Help Box</span></a>

				<a id="close" style="display: none;" class="close" href="#"><span>Click Here to Close Help Box</span></a>		
			</li>
		</ul> 
	</div>



</div>

<span class="titlTxt">
Content List
</span>
<div class="topTabs">
<ul class="dropdown">
<li><a href="/companies/addcontentpage"><span>New</span></a></li>
<li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
<ul class="sub_menu">
        			 <li><a href="javascript:void(0)" onclick="return activatecontents('active','change');">Publish</a></li>
        			 <li><a href="javascript:void(0)" onclick="return activatecontents('deactive','change');">Unpublish</a></li>
        			 <!--li><a href="javascript:void(0)">Copy</a></li-->
        			 <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');">Trash</a></li>
                     <li class="botCurv"></li>
        		</ul>
</li>
<li><a href="javascript:void(0)" onclick="editcontent();" id="linkedit"><span>Edit</span></a></li>
</ul>
</div>
</div>


<script language='javascript'>
	function showcontentwindow(id){
		var url = '/companies/showcontentwindow/'+id+'/Content';
		//window.open(url,'mywindow','status=no,toolbar=no, height=800,width=800,top=200 , left=500, scrollbars=yes');
		jQuery.facebox({ ajax: url });
	}
</script>

<!--inner-container starts here-->

    <div class="midCont">

    <!-- top curv image starts -->
    <div>
    <span class="topLft_curv"></span>
		
		<div class="gryTop">
		<?php echo $form->create("Company", array("action" => "contentlist",'type' => 'file','enctype'=>'multipart/form-data','name' => 'contentlist', 'id' => "contentlist"))?>
		<script type='text/javascript'>
			function setprojectid(projectid){
					document.getElementById('projectid').value= projectid;
					document.adminhome.submit();
				}
		</script>
		<span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200",'value'=>$key));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => '','class'=>'btn'));
			?> 
		</span>
		<span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='/companies/contentlist')" id="locaa"></span>
		<span class="spnFilt">
		 <?php if($session->check('Message.flash')){ ?> 
	
		<?php $session->flash(); } ?>
                    </span>
                    </div> <span class="topRht_curv"></span>
                    <div class="clear"></div></div>

                    <?php $i=1; ?>  
                    <div class="tblData">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="trBg">
		 <th align="center" width="3%">#</th>
    <th align="center" width="3%"><input type="checkbox" value="" name="checkall" id="checkall" /></th>
	  <th align="left" width="3%"><span class="right"><?php echo $pagination->sortBy('title', '<img src="/img/'.$project_name.'/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span>Title</th>
	   
      <th width="12%"><a href="#"> Alias </a></th>
   <!--   <th  valign="middle">Metakeyword</th>-->
   <!--   <th  valign="middle">Type</th>-->
	<th  valign="middle">Created Date</th>
<th  valign="middle">Last Modified Date</th> 
      <th  valign="middle">Content</th>
	<th valign="middle"><span class="right"><?php echo $pagination->sortBy('file_sequence', '<img src="/img/'.$project_name.'/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span>Parent<br/>#Seq</th>
      <th valign="middle"><span class="right"><?php echo $pagination->sortBy('file_sequence', '<img src="/img/'.$project_name.'/sorting_arow.png" width="10" height="13" alt="" />',null,null,' ',' '); ?></span>Child<br/>#Seq</th>
      <th  valign="middle">Status</th>
      <th valign="middle">Edit</th>
      <th  valign="middle">Delete</th>
      </tr>
   	<?php if($contentdata){
  
   		foreach($contentdata as $eachrow){
            if($eachrow['Content']['parent_id']==0){
            $recid = $eachrow['Content']['id'];
	
   			$modelname = "Content";
   			$redirectionurl = "contentlist";
   			$isdelflag = true;
   			$issequence = true;
   			$title = $eachrow['Content']['title'];
			if($title){$title =AppController::WordLimiter($title,10);}
   			$alias = $eachrow['Content']['alias'];
			if($eachrow['Content']['parent_id']==0){
   			$file_sequence = $eachrow['Content']['file_sequence'];$file_sequence_child = "N/A";}
			else{$file_sequence_child = $eachrow['Content']['file_sequence'];$file_sequence = "N/A";}
   			$metakeyword='';
   			$metadescription='';
			$createddate=$eachrow['Content']['created'];
			$lastupdated=$eachrow['Content']['modified'];
   			if($eachrow['Content']['metakeyword']){
   				$metakeyword = AppController::WordLimiter($eachrow['Content']['metakeyword'],9);
   			}
			if($eachrow['Content']['parent_id']==0){
    				$type = "Parent";
			}
			else
			{
				$type = "Child";
			}

//    			if($eachrow['Content']['metadescription']){
//    				$metadescription = AppController::WordLimiter($eachrow['Content']['metadescription'],9);
//    			}
   			/*if($eachrow['Content']['content']){
   				$content = AppController::WordLimiter(htmlentities($eachrow['Content']['content']),10);
   			}*/
			$cont1=   '<a href="javascript:void(0)"  title="Click here to view Content." onclick="showcontentwindow('.$recid.');" >View Content</a>';

   			if($eachrow['Content']['is_sytem']=='0'){
				$isdelflag = false;
			}
   			if($eachrow['Content']['alias']=='privacy' || $eachrow['Content']['alias']=='terms'){
				$issequence = false;
			}

   		?>
   	<tr>	
		<td align="center"><?php echo $i++;?></td>
		<td align="center">
		
			<input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" />
		
		</td>
		<td  align="center"  valign="middle"><a><span><?php if($eachrow['Content']['parent_id']==0){echo $title?$title:"N/A";}else{echo $title?"      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title:"N/A";} ?></a></span></td>
		<td  align="center" valign="middle"><a><span><?php echo $alias?$alias:"N/A"; ?></a></span></td>
		<!--<td  align="center" valign="middle"><a><span><?php echo $createddate?$createddate:"N/A"; ?></a></span></td>-->
		<!--<td  align="center" valign="middle"><a><span><?php echo $type?$type:"N/A"; ?></a></span></td>-->
		<td  align="center" valign="middle"><a><span><?php echo $createddate?$createddate:"N/A"; ?></a></span></td>
		<td  align="center" valign="middle"><a><span><?php echo $lastupdated?$lastupdated:"N/A"; ?></a></span></td>
		<td  align="center" valign="middle"><?php echo $cont1; ?></td>
		<?php if($issequence==true) {
		if($eachrow['Content']['alias']=='home_page') $readonly="readonly"; else $readonly="";?>
			<?php if($eachrow['Content']['parent_id']==0){ $seq=$file_sequence; ?>
			<td>
			<?php echo $form->input("$recid", array('id' => "dispanysec_$recid", 'div' => false, 'label' => '','style'=>'align:center;width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"$seq",'readonly'=>$readonly)); ?>
			</td>
			<td>
			<?php echo"";echo $form->input("nam1", array('id' => "temp1", 'div' => false, 'label' => '','style'=>'align:center;width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"",'readonly'=>'readonly')); ?>
			</td>
			<?php }else{$seq=$file_sequence_child; ?>
			<td>
			<?php echo"";echo $form->input("nam2", array('id' => "temp2", 'div' => false, 'label' => '','style'=>'align:center;width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"",'readonly'=>'readonly')); ?>
			</td>
			<td>
			<?php echo $form->input("$recid", array('id' => "dispanysec_$recid", 'div' => false, 'label' => '','style'=>'align:center;width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"$seq",'readonly'=>$readonly)); }?>
			</td>

		<?php }else{ ?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

		<?php } if($isdelflag==true){ ?>

		<td align="center"  valign="middle"><?php if($eachrow['Content']['active_status']=='1'){ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/cngstatus'?>"><img src="/img/<?php echo $project_name; ?>/active.gif" alt="" title="Click here to deactivate <?php echo $title; ?>" /></a><?php }else{ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'1/'.$redirectionurl?>"><img src="/img/<?php echo $project_name; ?>/deactive.gif" alt=""  title="Click here to activate <?php echo $title; ?>" /></a><?php } ?>
		</td>
		<td align="center"  valign="middle"><a href="/companies/editcontent/<?php echo $recid; ?>"><img src="/img/<?php echo $project_name; ?>/edit.png" alt="" title="Click here to Edit <?php echo $title; ?>" /></a></td>
        	<td align="center" valign="middle"><a onclick="return delete_record();" href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/delete'?>"><img src="/img/<?php echo $project_name; ?>/delete.png" alt="" title="Click here to delete <?php echo $title; ?>" /></a></td>
		<?php }else{  if($eachrow['Content']['alias']!='home_page' && $eachrow['Content']['alias']!='home-page' ){?>
			
		<td align="center"  valign="middle"><?php if($eachrow['Content']['active_status']=='1'){ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/cngstatus'?>"><img src="/img/<?php echo $project_name; ?>/active.gif" alt="" title="Click here to deactivate <?php echo $title; ?>" /></a><?php }else{ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'1/'.$redirectionurl?>"><img src="/img/<?php echo $project_name; ?>/deactive.gif" alt=""  title="Click here to activate <?php echo $title; ?>" /></a><?php }?>
		</td>
		<?php } else{ ?>
		<td>&nbsp;</td>
	        <?php } ?>
 		<td align="center" valign="middle">
		<?php
		if($eachrow['Content']['title']!='COMMENTS'){
		?>
		<a href="/companies/editcontent/<?php echo $recid; ?>"><img src="/img/<?php echo $project_name; ?>/edit.png" alt="" title="Click here to Edit <?php echo $tempname; ?>" /></a>
		<?php }?>
		</td>



		<?php }} ?>
		</tr>
	 <?php
              foreach($contentdata as $eachrow2){
                if($eachrow['Content']['id'] == $eachrow2['Content']['parent_id'])
                {

                    //echo $eachrow['Content']['title'];
            $recid = $eachrow2['Content']['id'];
   			$modelname = "Content";
   			$redirectionurl = "contentlist";
   			$isdelflag = true;
   			$issequence = true;
   			$title = $eachrow2['Content']['title'];
			if($title){$title =AppController::WordLimiter($title,10);}
   			$alias = $eachrow2['Content']['alias'];
			if($eachrow2['Content']['parent_id']==0){
   			$file_sequence = $eachrow2['Content']['file_sequence'];$file_sequence_child = "N/A";}
			else{$file_sequence_child = $eachrow2['Content']['file_sequence'];$file_sequence = "N/A";}
			$createddate=$eachrow['Content']['created'];
			$lastupdated=$eachrow['Content']['modified'];
   			$metakeyword='';
   			$metadescription='';
   			if($eachrow2['Content']['metakeyword']){
   				$metakeyword = AppController::WordLimiter($eachrow2['Content']['metakeyword'],9);
   			}
			if($eachrow2['Content']['parent_id']==0){
    				$type = "Parent";
			}
			else
			{
				$type = "Child";
			}

//    			if($eachrow['Content']['metadescription']){
//    				$metadescription = AppController::WordLimiter($eachrow['Content']['metadescription'],9);
//    			}
   			/*if($eachrow['Content']['content']){
   				$content = AppController::WordLimiter(htmlentities($eachrow['Content']['content']),10);
   			}*/
			$cont1=   '<a href="javascript:void(0)"  title="Click here to view Content." onclick="showcontentwindow('.$recid.');" >View Content</a>';

   			if($eachrow2['Content']['is_sytem']=='0'){
				$isdelflag = false;
			}
   			if($eachrow2['Content']['alias']=='privacy' || $eachrow2['Content']['alias']=='terms'){
				$issequence = false;
			}

   		?>
   	<tr>
		<td  align="center" valign="middle"><?php echo $i++;?></td>
		<td  align="center" valign="middle"><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid ?>" /></td>
		<td   align="center" valign="middle"><a><span class="for_SubCat"><?php if($eachrow2['Content']['parent_id']==0){echo $title?$title:"N/A";}else{echo $title?$title:"N/A";} ?></a></span></td>
		<td   align="center" valign="middle"><a><span><?php echo $alias?$alias:"N/A"; ?></a></span></td>
		<!--<td   align="center" valign="middle"><a><span><?php echo $metakeyword?$metakeyword:"N/A"; ?></a></span></td>-->
		<!--<td   align="center" valign="middle"><a><span><?php echo $type?$type:"N/A"; ?></a></span></td>-->
		<td  align="center" valign="middle"><a><span><?php echo $createddate?$createddate:"N/A"; ?></a></span></td>
		<td  align="center" valign="middle"><a><span><?php echo $lastupdated?$lastupdated:"N/A"; ?></a></span></td>
		<td   align="center" valign="middle"><?php echo $cont1; ?></td>
		<?php if($issequence==true) {
		if($eachrow2['Content']['alias']=='home_page') $readonly="readonly"; else $readonly="";?>
			<?php if($eachrow2['Content']['parent_id']==0){ $seq=$file_sequence; ?>
			<td>
			<?php echo $form->input("$recid", array('id' => "dispanysec_$recid", 'div' => false, 'label' => '','style'=>'width:20px;',"class" => "align:'center';contactInput","maxlength" => "2",'value'=>"$seq",'readonly'=>$readonly)); ?>
			</td>
			<td>
			<?php echo"";echo $form->input("nam1", array('id' => "temp1", 'div' => false, 'label' => '','style'=>'width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"",'readonly'=>'readonly')); ?>
			</td>
			<?php }else{$seq=$file_sequence_child; ?>
			<td>
			<?php echo"";echo $form->input("nam2", array('id' => "temp2", 'div' => false, 'label' => '','style'=>'width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"",'readonly'=>'readonly')); ?>
			</td>
			<td>
			<?php echo $form->input("$recid", array('id' => "dispanysec_$recid", 'div' => false, 'label' => '','style'=>'width:20px;',"class" => "contactInput","maxlength" => "2",'value'=>"$seq",'readonly'=>$readonly)); }?>
			</td>






		<?php }else{ ?>
		<td>&nbsp;</td>
		<?php } if($isdelflag==true){ ?>

		<td align="center" valign="middle"><?php if($eachrow2['Content']['active_status']=='1'){ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/cngstatus'?>"><img src="/img/<?php echo $project_name; ?>/active.gif" alt="" title="Click here to deactivate <?php echo $title; ?>" /></a><?php }else{ ?><a href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'1/'.$redirectionurl?>"><img src="/img/<?php echo $project_name; ?>/deactive.gif" alt=""  title="Click here to activate <?php echo $title; ?>" /></a><?php } ?>
		</td>
		<td align="center" valign="middle"><a href="/companies/editcontent/<?php echo $recid; ?>"><img src="/img/<?php echo $project_name; ?>/edit.png" alt="" title="Click here to Edit <?php echo $title; ?>" /></a></td>
        <td align="center" valign="middle"><a onclick="return delete_record();" href="/companies/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/delete'?>"><img src="/img/<?php echo $project_name; ?>/delete.png" alt="" title="Click here to delete <?php echo $title; ?>" /></a></td>
		<?php }else{ ?>
		<td  valign="middle">System</td>
		<td  valign="middle">
		<?php
		if($eachrow2['Content']['title']!='COMMENTS'){
		?>
		<a href="/companies/editcontent/<?php echo $recid; ?>"><img src="/img/<?php echo $project_name; ?>/edit.png" alt="" title="Click here to Edit <?php echo $tempname; ?>" /></a>
		<?php }?>
		</td>

		<?php } ?>
		</tr>


               <?php }?>

           <?php }
 } ?>
	 <tr><td colspan='8'> <button type="submit" id="Submit"  class="button"><span> Update Sequence</span> </button></td></tr>
	 <?php  }else{ ?>
	<tr><td colspan="7" align="center">No Contacts Found.</td></tr>
	<?php  } ?>
	</table>
	<?php if($contentdata) { echo $this->renderElement('newpagination'); } ?>

</div>

                    <div>
                    <span class="botLft_curv"></span>
      
                    <div class="gryBot">
                    </div>
                    <!--inner-container ends here-->
        

                    <span class="botRht_curv"></span>
                    <div class="clear"></div>
                    </div>
<!--inner-container ends here-->
<?php echo $form->end();?>




<div class="clear"></div><!--container ends here-->
                    </div>