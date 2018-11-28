<script type="text/javascript">

$(document).ready(function() {
 
$('#hoMe').removeClass("butBg");
$('#hoMe').addClass("butBgSelt");
}); 

</script>  

<!--container starts here-->
<?php //$pagination->setPaging($paging); ?>
<div class="titlCont1"><div class="centerPage"> 
       <div align="center" id="toppanel" >
      <?php  echo $this->renderElement('new_slider');  ?>
</div>
        <span class="newtitlTxt">Home</span>
        <div class="topTabs">             
        </div>
</div></div>
<div class="midCont">

 <?php if($session->check('Message.flash')){ ?> 
<div id="blck"> 
        <div class="msgBoxTopLft"><div class="msgBoxTopRht"><div class="msgBoxTopBg"></div></div></div>
            <div class="msgBoxBg">
                <div class=""><a href="#." onclick="hideDiv();"><img src="/img/close.png" alt="" style="margin-left: 945px;
    position: absolute;
    z-index: 11;" /></a>
                    <?php  $session->flash();    ?> 
                </div>
                    <div class="msgBoxBotLft"><div class="msgBoxBotRht"><div class="msgBoxBotBg"></div></div></div>
        </div>
</div>
                                            <?php } ?>
<h1 style="text-align: center;">Welcome To Administrator Area<h1>
</div>  