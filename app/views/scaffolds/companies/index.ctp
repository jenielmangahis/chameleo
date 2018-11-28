<?php   
//pr($this->data);
//pr($socialicons);
//pr($page_content);

?>

<?php if($rightbar==1) {?>
	<div class="leftPanel">
<?php } else { ?>
	<div class="leftPanel" style="width:878px;padding:auto 15px">
<?php } ?>

  <!--<div class="clear">&nbsp;</div>-->
  <div class="editorTxt">
    <?php echo $page_content['Content']['content'];?>
  </div>
  
  </div>