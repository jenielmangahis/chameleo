<?php
$base_url_admin = Configure::read('App.base_url_admin');
$resetUrl = $base_url_admin.'systemlist';
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
        }else{  
            document.getElementById("linkedit").href=baseUrlAdmin+"editcontent/"+id; 

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
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Content/1/systemlist/cngstatus";
                }else{
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Content/0/systemlist/cngstatus";
                }
            }
            if(op=="del"){
                if(confirm("You have selected "+count +" items to delete ?"))

                    if(confirm("Are You Sure to delete the item"))
                    window.location=baseUrlAdmin+"changestatus/"+id+"/Content/0/systemlist/delete";
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
<div class="titlCont"><div class="centerPage">
                    <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div> 

        <?php echo $form->create("Admins", array("action" => "systemlist",'type' => 'file','enctype'=>'multipart/form-data','name' => 'systemlist', 'id' => "systemlist"))?>
        <script type='text/javascript'>
            function setprojectid(projectid){
                document.getElementById('projectid').value= projectid;
                document.adminhome.submit();
            }
        </script>
        <?php  echo $this->renderElement('project_name');  ?> 
        <span class="titlTxt">
            System Pages
        </span>
        <div class="topTabs">
            <ul class="dropdown">
           <!--     <li><a href="/admins/addcontentpage"><span>New</span></a></li>-->
                <li><a href="javascript:void(0)" class="tab2"><span>Actions</span></a>
                    <ul class="sub_menu">
                        <li><a href="javascript:void(0)" onclick="return activatecontents('active','change');">Publish</a></li>
                        <li><a href="javascript:void(0)" onclick="return activatecontents('deactive','change');">Unpublish</a></li>
                      <!--  <li><a href="javascript:void(0)">Copy</a></li>
                        <li><a href="javascript:void(0)" onclick="return activatecontents('asd','del');">Trash</a></li>-->
                        <li class="botCurv"></li> 
                    </ul>
                </li>
            <!--    <li><a href="javascript:void(0)" onclick="editcontent();" id="linkedit"><span>Edit</span></a></li> -->
            </ul>
        </div>


        <?php    
			$this->loginarea="admins";
			$this->subtabsel="systemlist";
            echo $this->renderElement('websites_submenus'); 
		?>   
    </div></div>


<script language='javascript'>
    function showcontentwindow(id){
        var url = baseUrlAdmin+'showcontentwindow/'+id+'/Content';
        //window.open(url,'mywindow','status=no,toolbar=no, height=800,width=800,top=200 , left=500, scrollbars=yes');
        jQuery.facebox({ ajax: url });
    }
</script>

<!--inner-container starts here-->

<div class="midCont">
    <?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>


    <!-- top curv image starts -->
    <div>
        <span class="topLft_curv"></span>
		<span class="topRht_curv"></span>
        <div class="gryTop">
			<?php
			if(!isset($key))
			$key = '';
			?>
			<div class="new_filter">
            <span class="spnFilt">Filter:</span><span class="srchBg"><?php echo $form->input("searchkey", array('id' => 'searchkey', 'div' => false, 'label' => '',"maxlength" => "200",'value'=>$key));?></span><span class="srchBg2"><?php echo $form->submit("Go", array('id' => 'searchkeysubmit', 'div' => false, 'label' => '','class'=>'btn'));
                ?> 
            </span>
            <span class="srchBg2"><input type="button" value="Reset" label="" onclick="javascript:(window.location='<?php echo $resetUrl ?>')" id="locaa"></span></div>
        <!--    <span class="srchBg2" style="float:right"><input type="submit" id="Submit" value="Update Sequence" label="" ></span>-->
        </div> 
        <div class="clear"></div></div>

    <?php $i=1; ?>  
    <div class="tblData">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr class="trBg">
                <th align="center" width="3%">#</th>
                <th align="center" width="3%"><input type="checkbox" value="" name="checkall" id="checkall" /></th>
                <th align="center" width="150px"><span class="right"><?php echo $pagination->sortBy('title', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Title</th>

                <th width="150px"><a href="#"> </a><span class="right"><?php echo $pagination->sortBy('alias', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Alias</th>
                <!--   <th  valign="middle">Metakeyword</th>-->
                <!--   <th  valign="middle">Type</th>-->
                <th  valign="middle" width="140px"><span class="right"><?php echo $pagination->sortBy('created', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Created Date</th>
                <th  valign="middle" width="150px"><span class="right"><?php echo $pagination->sortBy('modified', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Last Modified Date</th> 
               
                <th  valign="middle" width="70px"><span class="right"><?php echo $pagination->sortBy('active_status', $html->image('sorting_arow.png',array('width'=>'10','height'=>'13','alt'=>'')),null,null,' ',' '); ?></span>Status</th>

            </tr>
            <?php if($contentdata){
                    $alt=0;
                    foreach($contentdata as $eachrow){
                        if($eachrow['Content']['parent_id']==0){
                            $recid = $eachrow['Content']['id'];


                            //alternate color rows
                            if($alt%2==0)
                                $class="style='background-color:#FFF;'";
                            else
                                $class="style='background-color:#f8f8f8;'";

                            $alt++;

                            $modelname = "Content";
                            $redirectionurl = "systemlist";
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
                            $createddate = AppController::usdateformat($createddate,1);
                            $lastupdated=$eachrow['Content']['modified'];
                            $lastupdated = AppController::usdateformat($lastupdated,1);
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

                            //                      if($eachrow['Content']['metadescription']){
                            //                              $metadescription = AppController::WordLimiter($eachrow['Content']['metadescription'],9);
                            //                      }
                            /*if($eachrow['Content']['content']){
                            $content = AppController::WordLimiter(htmlentities($eachrow['Content']['content']),10);
                            }*/
                            $cont1=   '<a href="javascript:void(0)"  title="Click here to view Content." onclick="showcontentwindow('.$recid.');" >Preview</a>';

                            if($eachrow['Content']['is_sytem']=='0'){
                                $isdelflag = false;
                            }
                            if($eachrow['Content']['alias']=='privacy' || $eachrow['Content']['alias']=='terms'){
                                $issequence = false;
                            }
                          /*   if($alias=="register" || $alias=="login" || $alias=="logout" || $alias=="comments" || $alias=="dashboard"  )
                            {
*/

                            ?>
                            <tr <?php echo $class;?>>    
                                <td align="center"><?php echo $i++;?></td>
                                <td align="center">
                                    <input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid; ?>" />
                                </td>
                                <td  align="left"  valign="left">
								<?php
								if($eachrow['Content']['parent_id']==0){
								$title = $title?$title:"N/A";
								} else { 
								$title = $title?"      ".$title:"N/A";
								} 
								e($html->link(
									$html->tag('span', $title),
									array('controller'=>'admins','action'=>'editcontent',$recid),
									array('escape' => false)
									)
								);
								?>
								</td>
                                <td  align="left" valign="left">
								<?php
								e($html->link(
									$html->tag('span', $alias?$alias:"N/A"),
									array('controller'=>'admins','action'=>'editcontent',$recid),
									array('escape' => false)
									)
								);
								?>
								</td>
                                <td  align="center" valign="middle"><span style="color: #4d4d4d"><?php echo $createddate?$createddate:"N/A"; ?></span></td>
                                <td  align="center" valign="middle"><span style="color: #4d4d4d"><?php echo $lastupdated?$lastupdated:"N/A"; ?></span></td>
                          

                            <?php    if($isdelflag==true){ ?>

                                    <td align="center"  valign="middle">
									<?php 
									if($eachrow['Content']['active_status']=='1'){
										e($html->link(
											$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$title)),
											array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus'),
											array('escape' => false)
											)
										);
									} else {
										e($html->link(
											$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$title)),
											array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus'),
											array('escape' => false)
											)
										);
									}			
									?>
									
                                    </td>


                                    <?php }else{  if($eachrow['Content']['alias']!='home_page' && $eachrow['Content']['alias']!='home-page' ){?>

                                        <td align="center"  valign="middle">
										
										<?php 
										if($eachrow['Content']['active_status']=='1'){
											e($html->link(
												$html->image('active.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to deactivate '.$title)),
												array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'0',$redirectionurl,'cngstatus'),
												array('escape' => false)
												)
											);
										} else {
											e($html->link(
												$html->image('deactive.gif',array('width'=>'10','height'=>'13','alt'=>'','title'=>'Click here to activate '.$title)),
												array('controller'=>'admins','action'=>'changestatus',$recid,$modelname,'1',$redirectionurl,'cngstatus'),
												array('escape' => false)
												)
											);
										}			
										?>
                                        </td>
                                        <?php } else{ ?>
                                        <td>&nbsp;</td>
                                        <?php } ?>




                                    <?php }	// end of login.register,logout check
                       /* }
                        else{
                            continue;
                        }*/
                        
                        } ?>
                    </tr>
                    <?php
                        foreach($contentdata as $eachrow2){
                            if($eachrow['Content']['id'] == $eachrow2['Content']['parent_id'])
                            {

                                //echo $eachrow['Content']['title'];
                                $recid = $eachrow2['Content']['id'];
                                $modelname = "Content";
                                $redirectionurl = "systemlist";
                                $isdelflag = true;
                                $issequence = true;
                                $title = $eachrow2['Content']['title'];
                                if($title){$title =AppController::WordLimiter($title,10);}
                                $alias = $eachrow2['Content']['alias'];
                                if($eachrow2['Content']['parent_id']==0){
                                    $file_sequence = $eachrow2['Content']['file_sequence'];$file_sequence_child = "N/A";}
                                else{$file_sequence_child = $eachrow2['Content']['file_sequence'];$file_sequence = "N/A";}
                                $createddate=$eachrow['Content']['created'];
                                $createddate = AppController::usdateformat($createddate,1);
                                $lastupdated=$eachrow['Content']['modified'];
                                $lastupdated = AppController::usdateformat($lastupdated,1);
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

                                //                      if($eachrow['Content']['metadescription']){
                                //                              $metadescription = AppController::WordLimiter($eachrow['Content']['metadescription'],9);
                                //                      }
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
                                
                                if($title=="Register" || $title=="Login" || $title=="Logout" )
                                {

                            ?>
                            <tr>
                                <td  align="center" valign="middle"><?php echo $i++;?></td>
                                <td  align="center" valign="middle"><input type="checkbox"  class="checkid" name="checkid[]" value="<?php echo $recid ?>" /></td>
                                <td   align="left" valign="middle"><a href="/companies/editcontent/<?php echo $recid; ?>"><span class="for_SubCat"><?php if($eachrow2['Content']['parent_id']==0){echo $title?$title:"N/A";}else{echo $title?$title:"N/A";} ?></a></span></td>
                                <td   align="left" valign="middle"><a href="/companies/editcontent/<?php echo $recid; ?>"><span><?php echo $alias?$alias:"N/A"; ?></a></span></td>
                                <!--<td   align="center" valign="middle"><a><span><?php //echo $metakeyword?$metakeyword:"N/A"; ?></a></span></td>-->
                                <!--<td   align="center" valign="middle"><a><span><?php //echo $type?$type:"N/A"; ?></a></span></td>-->
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

                                    <td align="center" valign="middle"><?php if($eachrow2['Content']['active_status']=='1'){ ?><a href="/admins/changestatus/<?php echo $recid.'/'.$modelname.'/'.'0/'.$redirectionurl.'/cngstatus'?>"><img src="/img/active.gif" alt="" title="Click here to deactivate <?php echo $title; ?>" /></a><?php }else{ ?><a href="/admins/changestatus/<?php echo $recid.'/'.$modelname.'/'.'1/'.$redirectionurl?>"><img src="/img/deactive.gif" alt=""  title="Click here to activate <?php echo $title; ?>" /></a><?php } ?>
                                    </td>
                                    <?php }else{ ?>
                                    <td  valign="middle">System</td>


                                    <?php } ?>
                            </tr>


                            <?php 
                            }//end register login check
                                }?>

                        <?php }
                } ?>
                <!--<tr><td colspan='8'> <button type="submit" id="Submit"  class="button"><span> Update Sequence</span> </button></td></tr>-->
                <?php  }else{ ?>
                <tr><td colspan="7" align="center">No Ssystem Found.</td></tr>
                <?php  } ?>
        </table>
    </div>

    <div>
        <span class="botLft_curv"></span>
		<span class="botRht_curv"></span>
        <div class="gryBot">  <?php if($contentdata) { echo $this->renderElement('newpagination'); } ?>
        </div>
        <!--inner-container ends here-->


        
        <div class="clear"></div>
    </div>
    <!--inner-container ends here-->
    <?php echo $form->end();?>
    <div class="clear"></div><!--container ends here-->
                    </div>
