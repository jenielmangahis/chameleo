<input type="hidden" id="rec_eventid" name="data[rec_eventid]" value="<?php echo $recur_event_data['RecurringEvent']['id']; ?>" />  
<input type="hidden" id="max_att" name="max_att" value="<?php echo $recur_event_data['RecurringEvent']['max_attendees']; ?>" /> 
<div class="margin8px"><b>Date & Time:</b> <?php echo date("F j, Y", strtotime($recur_event_data['RecurringEvent']['start_date'])); ?> </div>
                                             <div class="margin8px"><div style=" margin-left: 72px;"><?php echo date("g:i a", strtotime($recur_event_data['RecurringEvent']['starttime'])); ?> To <?php echo date("g:i a", strtotime($recur_event_data['RecurringEvent']['endtime'])); ?></div>
                                             </div>
                                                 <!--<div class="margin8px"><b>End Time: &nbsp;</b><?php // echo date("F j, Y, g:i a", strtotime($eventrow['Event']['endtime'])); ?> <br /></div>-->                                            
                                                <div class="margin8px"><b>Max. Attendees:</b> <?php echo $recur_event_data['RecurringEvent']['max_attendees']; ?> &nbsp;&nbsp;<b># Attending:</b> <?php echo $max_attendees_start; ?>  </div> 