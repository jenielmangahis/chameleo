<script type="text/javascript">
$(document).ready(function() {
$('#EmailMnu').removeClass("butBg");
$('#EmailMnu').addClass("butBgSelt");
}); 
</script>
<?php 
//echo '<pre>';print_r($_SERVER);
$base_url = Configure::read('App.base_url');

$backUrl = $base_url.'mailtasks/mailtask_list';
?>
<?php
echo $javascript->link('datetimepicker/jquery-1.4.2.min.js');
echo $javascript->link('datetimepicker/jquery-ui-1.8.custom.min.js');
echo $javascript->link('datetimepicker/timepicker_plug/withouttime.js');
echo $html->css('/css/jquery_ui_datepicker');
echo $html->css('timepicker_plug/css/style');
?>

<?php echo $form->create("mailtasks", array("action" => "addcommtask",'name' => 'addcommtask', 'id' => "addcommtask", 'class' => 'adduser','onsubmit'=>'return validateTaskForm()'))?>
<input
	type="hidden" name="data[CommunicationTask][id]" id="recid"
	value="<?php echo (isset($recid))?$recid :''; ?>" />
<div class="container">
	<div class="titlCont">


		<div class="myclass">
			<div align="center" id="toppanel">
				<?php  echo $this->renderElement('new_slider');  ?>
			</div>

			<span class="titlTxt">Mail Tasks </span>
			<div class="topTabs">
				<ul class="dropdown">
					<li>
						<button type="submit" value="Submit" class="button" name="data[Action][redirectpage]">	
							<span> Save </span>	
						</button>
					</li>
					<li>
						<button type="submit" value="Submit" class="button"	name="data[Action][noredirection]">
							<span>Apply</span>
						</button>
					</li>
					<li>
						<button type="button" id="saveForm" class="button" ONCLICK="javascript:(window.location='<?php echo $backUrl ?>')">
							<span> Cancel</span>
						</button>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<?php $this->mail_tasks="tabSelt"; ?>
		</div>

	</div>
	<div class="centerPage" id="sndmail">
		<?php if($session->check('Message.flash')) { 
			echo $this->renderElement('error_message');
} ?>

 <div id="loading" style="position:absolute; width:100%; text-align:center; top:250px;">
 	<!-- <img src="/img/ajax-pageloader.gif" alt="Imagecoins:pageloader" /> -->
 </div>  
		<br />
		<div class="midform">
			<table class="tbltemptpye">
				<tr>
					<td align="right"><label class="boldlabel">Relationship Type <span
							class="red">*</span>
					</label></td>
					<td valign="top"><span class="txtArea_top"><span
							class="txtArea_bot"><span id="compdiv"> <?php echo $form->select("CommunicationTask.email_template_type",$templatetypedropdown,$selectedtemplatetype, array('id' => 'email_template_type', 'div' => false, 'label' => '',"class" =>"multilist","maxlength" => "250"),"---Select---"); ?>
							</span> </span> </span>
					</td>
				</tr>
				
			</table>
		</div>

		<div id="addcomm" class="midform"></div>


		<div class="clear"></div>
	</div>
	<div id="showtaskreport" title="Task Report" style="display: none;">
		<p>This is an animated dialog which is useful for displaying
			information. The dialog window can be moved, resized and closed with
			the 'x' icon.</p>
	</div>

	<div class="clear"></div>
</div>
<?php echo $form->end(); ?>
<!--inner-container ends here-->
<!--container ends here-->
<script>
function addEmailTempforTask() {   
$('#email_template_id').focus();
var resWindow=  window.open (baseUrl+'mailtasks/addsupermailcontent');
//resWindow.focus();
}
</script>


<script type="text/javascript">
		$url= baseUrl+'mailtasks/mail_task_member/<?php echo (isset($taskrecid))?$taskrecid:''; ?>';
		$(function(){
			ajax_call();
		});
		
		$('#email_template_type').live('change',function(){	
			ajax_call();
		});
		
		function ajax_call(){

			switch($('#email_template_type').val())
			{
				case '0':
						$url = baseUrl+'mailtasks/mail_task_member/<?php echo (isset($taskrecid))?$taskrecid:''; ?>';
						break;
				case '1':
						$url = baseUrl+'mailtasks/mail_task_player/<?php echo (isset($taskrecid))?$taskrecid:''; ?>';
						break;
				case '2':
						$url = baseUrl+'mailtasks/mail_task_prospect/<?php echo (isset($taskrecid))?$taskrecid:''; ?>';
						break;
				case '3':
						$url = baseUrl+'mailtasks/mail_task_offer/<?php echo (isset($taskrecid))?$taskrecid:''; ?>';
						break;
			}
			
			$.ajax({
				 type: "POST",
				 url: $url,
				 cache: false,
				 datatype:'html',
				 success: function(responsehtml){
						$('#addcomm').html(responsehtml);
				 }
			});
	} 

	<?php if(!($this->data['CommunicationTask']['id'])) { ?>
				getstateoptions('254',"Company");
			 	$("#zip_postal").show();     
	<?php } ?>

    // increase the default animation speed to exaggerate the effect
    $.fx.speeds._default = 1000;
    $(function() {
        $( "#showtaskreport" ).dialog({
            autoOpen: false,
            modal: true,
            width: 560,
            show: "blind",
            hide: "blind"
        });

       $( "#runreport" ).live('click', function() {  // runTaskReport();
           	alert('Running ');
            $.ajax({
                            type: "POST",  
                            data:  $("#addcommtask").serialize() ,
                            url: baseUrlAdmin+'commtask_get_report_list_by_ajax/',
                            cache: false,
                            success: function(result){    
                                      $("#showtaskreport").html(result); 
                                         $( "#showtaskreport" ).dialog( "open" );
                                      return false; 
                            }
              });
        });
    });
       // This function is called after closing of child window ie. on page addmailtemplate.ctp 
        function GetEmailTempRefresh(){
           // alert("Refresh EMail temp dorp dwon");
            var pid='<?php echo $projectid;?>';
            var selectedid=$("#email_template_id").val();
            getemailtemplatesbyajax(pid, 'email_template_id', selectedid );
        }
        
         /**
         * Funtion addnew comment type in pop-up
         */
         function addCommentTypeforTask() {
             $('#relatesto_commenttype_id').focus();
	             var resWindow=  window.open (baseUrlAdmin+'addcommenttype/popup', 'AddCommentType','location=1,status=1,scrollbars=1, width=950,height=650');
	             resWindow.focus();
         }
           
          // This function is called after closing of child window ie. on page addcommenttype.ctp 
        function GetCommentTypeRefresh(){
            var pid='<?php echo $projectid;?>';
            var selectedid=$("#relatesto_commenttype_id").val();
           getcommenttypesbyajax(pid, 'relatesto_commenttype_id', selectedid );
        }
        /**
        * REfresh Comment type dropdown
        */
        function getcommenttypesbyajax(projectid,eleid, selectedid) {    
               if(projectid==""){
                  return false;
               }
                    
               jQuery.ajax({
                     type: "GET",
                     url: baseUrlAdmin+'getcommenttypesbyajax/'+projectid+'/'+selectedid,
                     cache: false,
                     success: function(rText){
                            jQuery('#'+eleid).html(rText);
                     }
             });
      	}
        
        function runTaskReport(){
            var current_domain=$("#current_domain").val();  
                     //location = "/admins/sendtempmail/"+id;
              $.ajax({
                            type: "GET",  
                            url: 'http://'+current_domain+'/admins/commtask_get_report_list_by_ajax/all',
                            cache: false,
                            success: function(result){      
                                      $("#showtaskreport").html(result); 
                                    //   $( "#showtaskreport" ).dialog( "open" );  
                            }
              });
        }
        
	if(document.getElementById("flashMessage")==null)
		document.getElementById("sndmail").style.paddingTop = '24px';
	else
	{
			document.getElementById("blck").style.paddingTop = '10px';
	}	
    
    
function getEmailTemplate(id){
        var current_domain=$("#current_domain").val();  

    //location = "/admins/sendtempmail/"+id;
      $.ajax({
                    url: 'http://'+current_domain+'/admins/get_email_template_details_by_ajax/'+id,
                    dataType:'json',
                    cache: false,
                    success: function(result){
                              $("#email_subject").val(result.subject);
                              $("#email_from").val(result.sender);
                    }
      });

}     

        $(function() { 
            showRecurPatternOptions();
        });

        $("#recur_pattern").live('change', function(){
           showRecurPatternOptions();  
        });
        
        /**
          * Function to Show Recurr Patter's options depends of selected Recurre Pattern
          */
        
        function showRecurPatternOptions(){
            
         var recur_pattern=$("#recur_pattern").val();
		// alert(recur_pattern);
             $("#daily_recur_pattern").hide();    
             $("#weekly_recur_pattern").hide();    
             $("#monthly_recur_pattern").hide();    
             $("#yearly_recur_pattern").hide();    
			 
             if(recur_pattern=='Daily')  {
			 	$("#daily_recur_pattern").show();
			 } 
            else if(recur_pattern=='Yearly'){
                   $("#yearly_recur_pattern").show();    
            }else if(recur_pattern=='Monthly'){
                    $("#monthly_recur_pattern").show();
            }else if(recur_pattern=='Weekly'){
                  $("#weekly_recur_pattern").show();    
            }
        }
</script>
<script type="text/javascript">
var ld=(document.all);
var Idaddcomm=(document.all);  
var Idshowtaskreport=(document.all);  
 
var ns4=document.layers;
var ns6=document.getElementById&&!document.all;
var ie4=document.all;

if (ns4) {
    ld=document.loading;
    Idaddcomm=document.addcomm;
    Idshowtaskreport=document.showtaskreport;
}else if (ns6)  {
    ld=document.getElementById("loading").style;
    Idaddcomm=document.getElementById("addcomm").style;
    Idshowtaskreport=document.getElementById("showtaskreport").style;
}else if (ie4) {
    ld=document.all.loading.style;
    Idaddcomm=document.all.addcomm.style;
    Idshowtaskreport=document.all.showtaskreport.style;
}
function init()
{
    if(ns4){
         ld.visibility="hidden";
         Idaddcomm.visibility="";
         Idshowtaskreport.visibility="";
    }else if (ns6||ie4) { 
	    ld.display="none";
	    Idaddcomm.display="block";
	    Idshowtaskreport.display="block";
    }
}

function validateTaskForm(){
	var email_template_type = 	$('#email_template_type').val();
	var task_name 			= 	$('#task_name').val();
	var email_template_id 	= 	$('#email_template_id').val();
	var email_subject 		= 	$('#email_subject').val();
	var email_from 			= 	$('#email_from').val();

	if(email_template_type == '')
	 {
		 inlineMsg('email_template_type','<strong>Please provide Email Relationship Type</strong>',2);
		 return false;
	 }
	if(task_name == '')
	 {
		 inlineMsg('task_name','<strong>Please provide Task Name</strong>',2);
		 return false;
	 }

	if(email_template_type == '0' || email_template_type == '3' ){
		if(email_template_id == '0'){
			 inlineMsg('email_template_id','<strong>Please Select Email Template</strong>',2);
			 return false;
		}
		if(email_subject == ''){
			 inlineMsg('email_subject','<strong>Please provide Email Subject</strong>',2);
			 return false;
		}
		if(email_from == ''){
			 inlineMsg('email_from','<strong>Please provide Email From</strong>',2);
			 return false;
		}
	}
	return true;
}
</script>

