<!-- Body Panel starts -->
<?php
    echo $javascript->link('coin_serial.js');
?>

<div class="navigation">
    <div class="boxBg">

        <!--<div class="boxBor">
        <div class="boxPad">
        <?php //echo $this->element("leftmenubar");?>  


        <p>&nbsp;</p>
        </div>
        </div>
        <p class="boxBot1">
        <?php //echo $html->image('/img/'.$project_name.'/rhtBox_bot.gif', array('class'=>'right'));?></p>-->

    </div>
</div>
<div class="bdyCont">
    <div class="boxBg1">

        <div class="boxBor1">
            <div class="boxPad">
                <h2 style="float:left;">Register Coin</h2>

                <div style="float: left; position: relative;width: 650px;margin-left:198px; margin-top:-30px;">     
                    <div style="float:right;height: 30px;position:relative;background-color:#4f9bd7; width: auto;" class="border_shadow">

                        <?php echo $this->element("leftmenubar");?>  
                    </div>

                </div>

                <div style="float: left; position: relative;width: auto;margin-left:855px; margin-top:-30px;">  
                    <div style="float:right;height: 30px;position:relative;background-color:#209f20; width: auto;" class="border_shadow">
                        <ul class="dash_menu_opp" style="margin-left: 5px; margin-right: 3px;"> 
                            <li><a href="javascript:document.coin_frm.submit();"><span>Save</span></a></li>
                        </ul>   
                    </div>
                </div>
                 <?php 
                    if(!empty($coinsdetail))
                    {
                    ?>

                <div class="coinBoxCenter" style="width: 900px;">
                    <br />
                    <br /><br /><br />

                    <!--<p class="coinBoxTop"><?php //echo $html->image('/img/'.$project_name.'/coinBox_RhtTop.gif', array('class'=>'right'));?></p>-->
                    <div class="boxBor">
                        <div align="center" style=" margin-top:50px;">

                            <br /> 
                           
                            <table width="100%" style="border: black 1px solid;" class="border_shadow">
                            <tr>
                            <th style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid;border-bottom:black 1px solid;">Coins with no <br /> Verification code and prefix</th>
                            <th style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid ;border-bottom:black 1px solid;">Coins with only prefix</th>
                            <th style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid ;border-bottom:black 1px solid;">Coins with only <br /> Verification code</th>
                            <th style="border-bottom:black 1px solid;">Coins with <br /> Verification code and prefix</th>
                            </tr>
                                <tr>
                                    
                                    <td width="25%" style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid ;">
                                    
                                        <?php
                                            
                                            $cnt=0;
                                           
                                            if(!empty($coinsdetail))
                                            {
                                                for($i=0;$i<count($coinsdetail);$i++)
                                                {
                                                    if($cnt==5)
                                                        break;

                                                    if($coinsdetail[$i]['Coinset']['serialdisplayside']=="A")
                                                        $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sidea'];
                                                    else
                                                        if($coinsdetail[$i]['Coinset']['serialdisplayside']=="B")
                                                            $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sideb'];
                                                        else
                                                            $image_url="";

                                                    if($coinsdetail[$i]['Coinset']['sidea'] || $coinsdetail[$i]['Coinset']['sideb'])
                                                    {
                                                        $cnt++;
                                                        $no_image=0;
                                                    }
                                                    else
                                                        $no_image=1;

                                                    if($no_image==0)
                                                    {
                                                        if($coinsdetail[$i]['Coinset']['verifycode']=="" && $coinsdetail[$i]['Coinset']['serialprefix']=="")
                                                        {

                                                            echo $html->image($image_url, array('class'=>'','width'=>'150','height'=>'150'));
                                                            echo"<br/>"; 
                                                          
                                                        ?>

                                                        <?php
                                                        }
                                                    }
                                                ?> 




                                                <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    
                                    
                                     <td width="25%" style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid ;">
                                    
                                        <?php
                                           
                                            $cnt=0;

                                            if(!empty($coinsdetail))
                                            {
                                                for($i=0;$i<count($coinsdetail);$i++)
                                                {
                                                    if($cnt==5)
                                                        break;

                                                    if($coinsdetail[$i]['Coinset']['serialdisplayside']=="A")
                                                        $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sidea'];
                                                    else
                                                        if($coinsdetail[$i]['Coinset']['serialdisplayside']=="B")
                                                            $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sideb'];
                                                        else
                                                            $image_url="";

                                                    if($coinsdetail[$i]['Coinset']['sidea'] || $coinsdetail[$i]['Coinset']['sideb'])
                                                    {
                                                        $cnt++;
                                                        $no_image=0;
                                                    }
                                                    else
                                                        $no_image=1;

                                                    if($no_image==0)
                                                    {
                                                        if($coinsdetail[$i]['Coinset']['verifycode']=="" && $coinsdetail[$i]['Coinset']['serialprefix']!="")
                                                        {

                                                            echo $html->image($image_url, array('class'=>'','width'=>'150','height'=>'150'));
                                                            echo"<br/>"; 

                                                        
                                                        ?>

                                                        <?php
                                                        }
                                                    }
                                                ?> 




                                                <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    
                                     <td width="25%" style="padding-left: 15px; padding-right: 15px; border-right:black 1px solid ;">
                                    
                                        <?php
                                            $cnt=0;
                                            
                                            if(!empty($coinsdetail))
                                            {
                                                for($i=0;$i<count($coinsdetail);$i++)
                                                {
                                                    if($cnt==5)
                                                        break;

                                                    if($coinsdetail[$i]['Coinset']['serialdisplayside']=="A")
                                                        $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sidea'];
                                                    else
                                                        if($coinsdetail[$i]['Coinset']['serialdisplayside']=="B")
                                                            $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sideb'];
                                                        else
                                                            $image_url="";

                                                    if($coinsdetail[$i]['Coinset']['sidea'] || $coinsdetail[$i]['Coinset']['sideb'])
                                                    {
                                                        $cnt++;
                                                        $no_image=0;
                                                    }
                                                    else
                                                        $no_image=1;

                                                    if($no_image==0)
                                                    {
                                                        if($coinsdetail[$i]['Coinset']['verifycode']!="" && $coinsdetail[$i]['Coinset']['serialprefix']=="")
                                                        {

                                                            echo $html->image($image_url, array('class'=>'','width'=>'150','height'=>'150'));
                                                            echo"<br />"; 
                            
                                                        ?>

                                                        <?php
                                                        }
                                                    }
                                                ?> 




                                                <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    
                                     <td width="25%" style="padding-left: 15px; padding-right: 15px;">
                                    
                                        <?php
                                            $cnt=0;
                                            
                                            if(!empty($coinsdetail))
                                            {
                                                for($i=0;$i<count($coinsdetail);$i++)
                                                {
                                                    if($cnt==5)
                                                        break;

                                                    if($coinsdetail[$i]['Coinset']['serialdisplayside']=="A")
                                                        $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sidea'];
                                                    else
                                                        if($coinsdetail[$i]['Coinset']['serialdisplayside']=="B")
                                                            $image_url="/img/".$project_name."/uploads/".$coinsdetail[$i]['Coinset']['sideb'];
                                                        else
                                                            $image_url="";

                                                    if($coinsdetail[$i]['Coinset']['sidea'] || $coinsdetail[$i]['Coinset']['sideb'])
                                                    {
                                                        $cnt++;
                                                        $no_image=0;
                                                    }
                                                    else
                                                        $no_image=1;

                                                    if($no_image==0)
                                                    {
                                                        if($coinsdetail[$i]['Coinset']['verifycode']!="" && $coinsdetail[$i]['Coinset']['serialprefix']!="")
                                                        {

                                                            echo $html->image($image_url, array('class'=>'','width'=>'150','height'=>'150'));
                                                            echo"<br />";                                                             
                                                        ?>

                                                        <?php
                                                        }
                                                    }
                                                ?> 




                                                <?php
                                                }
                                            }
                                        ?>
                                    </td>

                                </tr>
                                
                                <!--<tr>
                                <td style="border-top:black 1px solid;">&nbsp;</td>
                                <td style="border-top:black 1px solid;">&nbsp;</td>
                                <td style="border-top:black 1px solid;">

                                                            <div align="center" style="padding-top: 15px;">
                                                            <label class='lbl' style=" width: 105px; margin-left:2px;">Verification Code<span class="red">*</span></label>
                                                            <span class="intpSpan">
                                                            <?php //echo $form->input('code',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"code",'size'=>'40','maxlength'=>'3', 'class'=>'inptBox','style'=>'width:50px;' )) ?>
                                                            </span>
                                                            </div>
                                                           
                                                            
                               
                                </td>
                                 <td style="border-top:black 1px solid;">

                                                            <div align="center" style="padding-top: 15px;">
                                                            <label class='lbl' style=" width: 105px; margin-left:2px;">Verification Code<span class="red">*</span></label>
                                                            <span class="intpSpan">
                                                            <?php //echo $form->input('code',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"code",'size'=>'40','maxlength'=>'3', 'class'=>'inptBox','style'=>'width:50px;' )) ?>
                                                            </span>
                                                            </div>
                                                           
                                                            
                               
                                </td>
                                </tr>-->
                                
                            </table>
                            
                        </div>

                    </div>

                </div>
                <br />
                <div style="margin: 0pt auto; width: 360px;">

                    <?php echo  $form->create('Coinset',array('action'=>'/companies/register_coin','name'=>'coin_frm','id'=>'','url'=>$this->here,'onsubmit' => 'return validatecoinserial("add");'));?>

                    <p>&nbsp;</p>  
                    <div><span align='center'><?php if($session->check('Message.flash')){ $session->flash(); } ?> </span></div>
                    <div><label class='lbl' style=" width: 89px;">Coin Serial <span class="red">*</span></label>
                        <span class="intpSpan">
                            <?php echo $form->input('coinserial',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"coinserial",'size'=>'40','maxlength'=>'10', 'class'=>'inptBox','onblur'=>'hidemessage()' )) ?>
                        </span>
                    </div>


                    <?php //  if($project['Project']['coins_verificationshow']==1){?>
                        <div style="width: 700px"><label class='lbl' style=" width: 120px; margin-left: -31px;">Verification Code<span class="red">*</span></label>
                        <span class="intpSpan">
                        <?php echo $form->input('code',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"code",'size'=>'40','maxlength'=>'3', 'class'=>'inptBox' )) ?>
                        </span><font size="1"> Enter verification code when you want to register coin with verification code.</font>
                        </div>
                    <?php // } ?>
                    <p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>

                    <div><label style="width:90px; margin-right:5px;display:inline-block;">&nbsp;</label>
                        <?php // echo $form->submit('Submit', array('div'=>false,"class"=>"btn",'style'=>"width:91px"));?> 
                    </div>
                    <?php echo $form->end();?>
                </div>
                <?php 
                }
                else
                {
                    echo "<br><br><br />No coins available to register.";
                }
                
                 ?>
                
            </div>
            <br/><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="red">*</span><b>Required Field</b>	
        </div><p class="boxBot1"><?php //echo $html->image('/img/'.$project_name.'/rhtBox_bot.gif', array('class'=>'right'));?>
        </p>

    </div>
</div>

<div class="clear"></div>
<!-- Body Panel ends --> 

<script language='javascript'>
    function hidemessage(){
        if(document.getElementById("flashMessage")!=null)
            document.getElementById("flashMessage").style.display="none";

    }
</script>
