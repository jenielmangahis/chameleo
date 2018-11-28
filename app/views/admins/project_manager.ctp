
<script type="text/javascript">
$(document).ready(function() {
$('#LinkMnu').removeClass("butBg");
$('#LinkMnu').addClass("butBgSelt");
}); 
</script>
<?php 
$base_url = Configure::read('App.base_url');
$base_url = Configure::read('App.base_url');
$backUrl = $base_url.'admins/projectlist';
?>


</script>
<?php 
	$editLink = "editusertype/".$id;
?>

<form id="Role" class="adduser" action="<?php echo $urlwrite;?>" method="post" name="Role">

<div class="container"> 
<div class="titlCont">


<div class="myclass">
<div align="center" id="toppanel" >
	<?php  echo $this->renderElement('new_slider');  ?>
</div>

<span class="titlTxt">Edit User</span>
<div class="topTabs">
<ul class="dropdown">
<li>
<button type="submit" value="Submit" class="button" name="data[Action][redirectpage]" style="padding-left:0px;"><span>Save</span></button>
</li>
<li>
<button type="button" id="saveForm" class="button"  ONCLICK="javascript:(window.location='<?php echo $redirectLocation ?>')" style="padding-left:0px;"><span>Cancel</span>
</button>
</li>

</ul>
</div> 
<div class="clear"></div>
<?php $this->mail_tasks="tabSelt"; ?> 
<?php  echo $this->renderElement('project_list_submenu');  ?>  
</div>

</div>
<div class="midPadd" id="addcmp">

<?php if($session->check('Message.flash')) { echo $this->renderElement('error_message'); } ?>          

<br />

<div id="loading" style="display: none;"><img src="/img/ajax-pageloader.gif" alt="Imagecoins:pageloader" /></div>
<div id="addcomm">
<table cellspacing="0" cellpadding="0" align="left" width="100%">
	<tbody>
		<tr>
			<td width="50%" valign="top">
				<table cellspacing="10" cellpadding="0" align="left" width="100%">
					<tbody>

	<tr>
		<td align="left" valign="top">
			<label class="boldlabel">Project Type<span style="color: red;">*</span></label>
		</td>
		<td colspan="3" valign="top">
			<span class="intpSpan">
					<?php echo $form->input("projectType", array('div' => false, 'label' => '','style' =>'width:200px;',"class"=>"inpt_txt_fld","maxlength" => "250","value"=>$projects['SiteType']['project_type_name']));?>
			</span>
		</td>	
	</tr>

<tr>
<td align="left" valign="top"><label class="boldlabel">Project Owner
</label></td>
<td colspan="3" valign="top"><span class="txtArea_top"> <span class="txtArea_bot"> <?php
$option = array();
if(count($projects['ProjectOwner']))
{
	foreach ($projects['ProjectOwner'] as $row) {
			$cdata = $common->getCompanyName($row['owner_id']);
			if(count($cdata))
			{	
				$option[$cdata[0]['Company']['id']] = $cdata[0]['Company']['company_name']; 
			}
	}
}	

				if(count($this->data['Admin']))
				{
					foreach ($this->data['Admin'] as $row) {
						$option[$row['id']] = $row['username'].' ' . $row['firstname'] . ' '. $row['lastname'];	
					}
				}
echo $form->select("admin.user_id",$option,$option,array('id' => 'admin_users','class'=>'multilist','multiple' => true),array('0'=>'Username')); ?>
</span>
</span> </td>
</tr>
<tr>
<td></td>
<td valign="top">
<table><tbody>
<?php 
$loopCounter = 1;
$vbCounter = (int)(count($menuData['menu'])/3);
$vbCounter = $vbCounter+1;
foreach ($menuData['menu'] as $row) {  
	if(count($row[1]))
	{
?>
<tr>
<td valign="top">
<label class="boldlabel"><?php echo  $row[0]['Menu']['name'];?>
</label><br>
<span class="txtArea_top"> <span class="txtArea_bot"> <?php 
$option = $row[1];
$accessKey = "admin.".str_replace(" ", "_", $row[0]['Menu']['name'])."_item_id";
//echo $form->select($accessKey,$option,$option,array('id' => 'admin_users','class'=>'multilist','multiple' => 'checkbox')); 

echo $form->select($accessKey,$option,$menuData['previousChecked'],array('id' => 'admin_users','class'=>'multilist','multiple' => 'checkbox'));

?>

</span>
</span> </td>
</tr>
<?php
		if($loopCounter%$vbCounter==0)
		{
			echo "</tbody></table></td><td valign='top'><table><tbody>";
		}
	} 
	$loopCounter++;
} 
?>
</tbody></table></td>
</tr>
	</tbody>
</table>
<div class="clear"></div>
</div>

  <link media="screen" href="<?php echo Router::url('/', true);?>ui-message/jquery.msg.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo Router::url('/', true);?>ui-message/jquery.center.min.js"></script>
  <script type="text/javascript" src="<?php echo Router::url('/', true);?>ui-message/jquery.msg.min.js"></script>

<script type="text/javascript">
$("#Role").submit(function() {

    var url = "<?php echo $urlwrite;?>"; // the script where you handle the form input.
    var redirectLocation = "<?php echo $redirectLocation;?>"; 
    if(validateURL(url))
   	{
   		alert('Please correct project url');
   		return false;
	}
    $.ajax({
           type: "POST",
           url: url,
           data: $("#Role").serialize(), // serializes the form's elements.
           beforeSend: function() {
           		  $.msg({ content: 'Please wait ...........',fadeIn : 500,fadeOut : 200,timeOut : 5000});
           },
           complete: function(data) {
           },
           success: function(data)
           {
           	   window.location = redirectLocation;
           }
         });
    return false; // avoid to execute the actual submit of the form.
});

function validateURL(textval) {
  var urlregex = new RegExp(
        "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
  return urlregex.test(textval);
}
</script>
