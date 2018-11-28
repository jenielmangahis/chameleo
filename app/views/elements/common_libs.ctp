<?php
    // For layouts
    // new_admin_layout
?>
<?php 
	echo $javascript->link('jquery-1.7.2.min.js');

	echo $javascript->link('admin_validate.js');
	echo $html->css('newadmintemplate.css','stylesheet');

	// autocomplete  css & js  

	echo $javascript->link('common.js');

	echo $javascript->link('slide.js');   
	echo $html->css('css/slide.css','stylesheet');

	echo $html->css('css/style.css','stylesheet');
	// Drop Down Action Menu
    echo $javascript->link('jquery.dropdownPlain.js'); 
?>
<script>
    var baseUrl = '<?php echo Configure::read('App.base_url'); ?>';
    var baseUrlAdmin = '<?php echo Configure::read('App.base_url_admin'); ?>';

    // Show/Hide Flash Messages
    function show(){
        $('#blck').show();
    }
    function hideDiv1(){
        $('#ablck').fadeOut('slow');  
    }  
    function hideDiv(){
        $('#blck').fadeOut('slow');  
    }	
</script>