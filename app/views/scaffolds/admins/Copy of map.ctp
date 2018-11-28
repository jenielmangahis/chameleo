<script type="text/javascript">
	$(document).ready(function() {
		$('#memBrs').removeClass("butBg");
		$('#memBrs').addClass("butBgSelt");
}); 
</script> 
<script type="text/javascript">
	$(function()
	{
		$("#map4").gMap({ controls: false,
                  scrollwheel: false,
                  markers: [{ latitude: 47.670553,
                              longitude: 9.588479,
                              icon: { image: baseUrl+"images/gmap_pin_orange.png",
                                      iconsize: [26, 46],
                                      iconanchor: [12,46],
                                      infowindowanchor: [12, 0] } },
                            { latitude: 47.65197522925437,
                              longitude: 9.47845458984375 },
                            { latitude: 47.594996,
                              longitude: 9.600708,
                              icon: { image: baseUrl+"images/gmap_pin_grey.png",
                                      iconsize: [26, 46],
                                      iconanchor: [12,46],
                                      infowindowanchor: [12, 0] } }],
                  icon: { image: baseUrl+"images/gmap_pin.png", 
                          iconsize: [26, 46],
                          iconanchor: [12, 46],
                          infowindowanchor: [12, 0] },
                  latitude: 47.58969,
                  longitude: 9.473413,
                  zoom: 10 });
	});
	</script>
	
<?php 	
echo $javascript->link('maps.js');
echo $javascript->link('jquery_003.js');
echo $javascript->link('jquery_002.js');		
?>
<div class="container">
         <div class="titlCont">
		  	<div class="centerPage" >
				 <div align="center" class="slider" id="toppanel">
                <?php  echo $this->renderElement('new_slider');  ?>
            </div>
			     <?php
			 		
					$this->loginarea="admins";    $this->subtabsel=map;
                  	//echo $this->renderElement('memberlist_submenus');  
			?>
		 	</div>
		</div>
		<div class="midCont" id="cmplisttab">
		<div id="map4" style="height:800px;">coming soon</div>
		
		</div>
</div>			