<script type="text/javascript">
	$(document).ready(function() {
		$('#memBrs').removeClass("butBg");
		$('#memBrs').addClass("butBgSelt");
}); 
</script> 
<?php
//echo '<pre>';print_r($markerStringArr);
$markerString = implode(',',$markerStringArr);
//echo $markerString;
//$markerString = '{ latitude: 47.58969,longitude: 9.473413,icon: { image: baseUrl+"images/gmap_pin_orange.png",iconanchor: [12,46] } }';

?>

<?php 	
echo $javascript->link('maps');
echo $javascript->link('mapiconmaker');
echo $javascript->link('jquery_003');
echo $javascript->link('jquery_002');		
?>
<script type="text/javascript">
	$(function()
	{
		var map = new GMap2(document.getElementById("map4"));
          	map.setUIToDefault();
        <?php 
	        if(!empty( $markerStringArr)){	
			foreach($markerStringArr as $llc){ ?>
			  map.setCenter(new GLatLng(<?php echo $llc['lat']; ?>, <?php echo $llc['long']; ?>), 5);
			  var marker = new GMarker(map.getCenter(), {icon: MapIconMaker.createMarkerIcon({width: 64, height: 64, primaryColor: "<?php echo $llc['color']; ?>"})});
			  //marker.openInfoWindowHtml('<p>hello</p>');
			  map.addOverlay(marker);		
		<?php }} else{ ?>
		 		map.setCenter(new GLatLng('40.4230', '98.7372'), 5);
				map.addOverlay(new GMarker(map.getCenter(), none));
		<?php } ?>		
	});
	</script>
	
<div class="container">
         <div class="titlCont">
		 	
		  		<div class="centerPage" >
				<div align="center" class="slider" id="toppanel">
               		 <?php  echo $this->renderElement('new_slider');  ?>
				</div>				
		            <span class="titlTxt">Member Mapping  </span>
					<div class="topTabs"></div>
			     <?php
			 		
					$this->loginarea="admins"; $this->subtabsel=map;
                  echo $this->renderElement('memberlist_submenus');  
			?>
		 		</div>
			</div>
		</div>
		<div class="midCont" id="cmplisttab">
		<div id="map4" style="height:800px;">coming soon</div>
		
		
</div>			