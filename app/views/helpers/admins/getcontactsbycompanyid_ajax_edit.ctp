<?php //echo $form->select('contacts',$contects, null,array('multiple'=>'multiple','id'=>'contacts','size'=>'5','empty'=>false,'class'=>'multilist multi'));
?>
<?php 
foreach($contects as $k=>$val) {
?>
<optgroup label="<?php echo $k ?>">
<?php 
	foreach($val as $itemk=>$itemV) {
	$selection = '';
	if(in_array($itemk,$selectionIds))
	$selection = ' selected="selected"';
?>
	<option value="<?php echo $itemk ?>" <?php echo $selection ?>><?php echo $itemV ?></option>
<?php 
	}
?>
</optgroup>
<?php 
}
?>