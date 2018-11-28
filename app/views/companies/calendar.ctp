<script type='text/javascript'>
$(document).ready(function() { 
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
			},
		events:[ <?php echo $json; ?> ], // this is where we call the php variable
		weekMode: 'variable'
    });
        
});
</script>
<div class="boxBg1">
  <p class="boxTop1"><?php //echo $html->image('/img/'.$project_name.'/rhtBox_top.gif', array('class'=>'right'));?></p>
  <div class="boxBor1">
  <div class="boxPad">
    <!--&nbsp;&nbsp;&nbsp;<font size="+2" color="black"><?php // echo ucfirst($project_name)."'s";?> Events</font><br />-->

    
<br /><br />
<div id='calendar' style='width: 900px; margin: 0 auto;'></div>       


  </div>
  </div><p class="boxBot1">
  <?php //echo $html->image('/img/'.$project_name.'/rhtBox_bot.gif', array('class'=>'right'));?></p>
  
  </div>

