<?php
echo $javascript->link('coin_serial.js');
?>

<div class="boxBg">
		<!--   Arvind's code: starts <?php print_r($session);?> -->

 			<?php

			$site_logoutUrl='/companies/logout/';
			include('facebook.php');// this  file is in webroot
			// Create our Application instance (replace this with your appId and secret).
		if(!empty( $project['Project']['facebookappkey'])&& !empty($project['Project']['facebooksecretkey']))
		{
		
		$facebook = new Facebook(array(
						'appId' => $project['Project']['facebookappkey'],
						'secret' => $project['Project']['facebooksecretkey'],
						'cookie' => true,
						));
		
		}
		else{
		$appId = Configure::read('FB.appId');
		$secret = Configure::read('FB.secret');
		$facebook = new Facebook(array(
						'appId' => $appId,
						'secret' => $secret,
						'cookie' => true,
						));
		}
			// We may or may not have this data based on a $_GET or $_COOKIE based session.
			//
			// If we get a session here, it means we found a correctly signed session using
			// the Application Secret only Facebook and the Application know. We dont know
			// if it is still valid until we make an API call using the session. A session
			// can become invalid if it has already expired (should not be getting the
			// session back in this case) or if the user logged out of Facebook
						
			if (isset($_SESSION['facbooklogoutcheck'])||isset($_SESSION['facbooklogoutduesignup']) || $_SESSION['registercoin']==1) {
 				                $logoutUrl = $facebook->getLogoutUrl();
						unset($_SESSION['facbooklogoutcheck']);
						unset($_SESSION['facbooklogoutduesignup']);
						unset($_SESSION['registercoin']);

					?>
						
 						<script type='text/javascript'> window.location='<?php echo $logoutUrl; ?>';</script>  

					<?php	}		
	
			$facebook_session = $facebook->getUser();
			$me = null;
			//Session based API call.

			if ($facebook_session)
			{	unset($_SESSION['fbCounter']);
				try
				{ 
					$uid = $facebook->getUser();
					$me = $facebook->api('/me');
					$_SESSION['FacebookUser']=$me;
						echo '<script type="text/javascript">window.location="/companies/facebook_login/";</script>';	
				}
				catch (FacebookApiException $e)
				{
					error_log($e);
				}
			}
		?>

		<div id="fb-root"></div>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
				appId : '<?php echo $facebook->getAppId(); ?>',
				session : <?php echo json_encode($facebook_session); ?>, // don't refetch the session when PHP already has it
				status : true, // check login status
				cookie : true, // enable cookies to allow the server to access the session
				xfbml : true // parse XFBML
				});
	
				// whenever the user logs in, we refresh the page
				FB.Event.subscribe('auth.login', function() {
					window.location.reload();
				});
				FB.Event.subscribe('auth.logout', function() {
					window.location.reload();
				});
			};

			(function() {

			var e = document.createElement('script');

			e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';

			e.async = true;

			document.getElementById('fb-root').appendChild(e);

			}());
		/*************************************************************************

			* Function Name: site_sign_out

			* Function Arguments: N/A

			* Function Return: N/A.

			* Purpose: To logout for a user from application and, if user logged in through facebook then also it logout from facebook.

			* Created on :Feb23, 2011

		*************************************************************************/

			function site_sign_out()

			{

				<?php if($me) // this will work if user login through facebook.

				{

					$logoutUrl = $facebook->getLogoutUrl(); //facebook logout url

					

					$application_logout_url = $site_logoutUrl; // this code is for our application logout function.

					$application_logout_url =str_replace('/','%2F',$application_logout_url); // replace '/' with '%2F' 



					// This code for change logout url.

					$domain_ip = split('next=',$logoutUrl);//split facebook current logout url and add our own logout url

					$domain_org_dip = split('&access_token=',$domain_ip[1]);

					

					$server_out = 'http://'.$_SERVER['HTTP_HOST'].$application_logout_url;

					$server_out = str_replace(array(':','/'), array('%3A','%2F'), $server_out);

					

					$site_logoutUrl = $domain_ip[0].'next='.$server_out.'&access_token='.$domain_org_dip[1];

				}

				

				?>	

				

				window.location.href="<?php echo $site_logoutUrl; ?>";

			}

		</script> 

		

	
	<div>
				<div style="margin:0 auto;width:400px;display:none<?php //if($status=='Verified') echo "none"; else echo "block";?>" >
						<?php echo  $form->create('Company',array('action'=>'/registeruser','id'=>'SignupForm' ,'onsubmit' => 'return validateserial("add");'));?>
						<p>&nbsp;</p>
							
							<div ><lable class='lbl' style=" width: 115px; margin-left: -24px;">Serial #:<span class="red">*</span></lable> <?php echo $form->input('coinset',array('label'=>false,'id'=>'coinserial','div'=>false,'type'=>"text", 'size'=>'10','maxlength'=>'10' , 'class'=>'inptBox')) ?>
							</div>
							<p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>
							<?php if($project['Project']['coins_verificationshow']==1){?>
							<div style="width:535px;">
							<lable class='lbl' style=" width: 115px; margin-left: -24px;">Verification Code:<span class="red">*</span></lable> <?php echo $form->input('code',array('label'=>false,'div'=>false,'type'=>"text", 'id'=>"code",'size'=>'40','maxlength'=>'3', 'class'=>'inptBox' )) ?>
							<label for="code"></label>
							<label for="code"></label>
							
							<span style="color: LightSlateGray; font-size: 11px; font-style: italic;">(varification code is 3 characters under serial #)</span>
							</div>
							<?php } ?>
								<p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>
								<div>
								<lable style="width:91px; margin-right:5px;display:inline-block;">&nbsp;</lable> <?php echo $form->submit('Verify', array('div'=>false,"class"=>"btn",'style'=>"width:91px"));?>
								</div>
				
						<?php echo $form->end();?>
				</div><br/><br/>
			<?php if($session->check('Message.flash')){ 
				$session->flash(); 
				}elseif(isset($_SESSION['flashmessage']) && $_SESSION['flashmessage']!=""){  
						if(!isset($_SESSION['refreshcount']))
						$_SESSION['refreshcount']=0;?> 
						
				<div  class="successmsg"  ><?php  echo $_SESSION['flashmessage']; ?></div>


						<?php
						$_SESSION['refreshcount']=$_SESSION['refreshcount']+1;
						
						if($_SESSION['refreshcount']==3)
						{
						unset($_SESSION['refreshcount']);
						unset($_SESSION['flashmessage']);
						}
						}
						?> 
			

			<?php	
			 ?> </div>					

		<div class="rhtFrmCont">
		
			<h2>Create a New Account</h2>
			<?php echo  $form->create('Holder',array('action'=>'/registeruser','id'=>'SignupForm','url'=>$this->here ,'onsubmit' => 'return validateregister("add");'));?>
			<?php //echo $form->input('coinstatus',array('value'=>$status,'type'=>"hidden", 'id'=>"coinstatus" )) ?>
			<?php //echo $form->input('tempserial',array('value'=>$tempserial,'type'=>"hidden", 'id'=>"tempserial" )) ?>
			<?php //echo $form->input('tempkey',array('value'=>$tempkey,'type'=>"hidden", 'id'=>"tempkey" )) ?>
			
			<label class="frmLbls frmLbl2">First Name:</label><span class="intpSpan"><?php echo $form->input('screenname',array('label'=>'','div'=>false,'type'=>"text",'id'=>'screenname' , 'class'=>'inpt_txt_fld')) ?></span><br />

				<label class="frmLbls frmLbl2">Your Email:</label><span class="intpSpan"><?php echo $form->input('email',array('label'=>'','div'=>false,'type'=>"text",'id'=>'email' , 'class'=>'inpt_txt_fld')) ?></span><br />

				<label class="frmLbls frmLbl2">Re-enter Email:</label><span class="intpSpan"><?php echo $form->input('revemail',array('label'=>'','div'=>false,'type'=>"text",'id'=>'revemail', 'class'=>'inpt_txt_fld' )) ?></span><br />

				<label class="frmLbls frmLbl2">New Password:</label><span class="intpSpan"><?php echo $form->input('password',array('label'=>'','div'=>false,'type'=>"password", 'id'=>"password", 'class'=>'inpt_txt_fld' )) ?></span><br />

				<label class="frmLbls frmLbl2">Country:</label><span class="intpSpan"><span class="inptSpn_rht"><?php echo $form->select("country",$countrydropdown,0,array('label'=>'','id' => 'country','onchange'=>'return getstates(this.value,"Holder")','class'=>'inpt_sel_fld'),array('254'=>'United States')); ?></span></span><br />

				<label class="frmLbls frmLbl2">Zip/Postal Code:</label><span class="intpSpan"> <?php echo $form->input('zipcode',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"zipcode", 'class'=>'inpt_txt_fld' )) ?></span><br />
				
				<label class="frmLbls frmLbl2"><input type="checkbox" name="termsofservice" id="termsofservice" value="" class="middle" /></label><span class="chkTxt">I agree with all the <a href="#" onclick="showterms();" >Terms of Service</a></span><br />
				<span class="for_reg_but">
					<span class="flx_btn_contnr">
					
					<span class="flx_button_lft">
						<?php echo $form->submit('Register', array('div'=>false,"class"=>"flx_flexible_btn",'onclick'=>'return updateCoin();'));?>
				</span>
				</span></a></span>
			<br />
			<br />
		</div>
 <div >
		<div class="lftReg_box" style="display:block<?php //if($status=='Verified') echo 'block'; else echo 'none'; ?>">
			
			<h1>Use an Existing Account</h1>
			<p>Register using your account with:</p>
			<br />
				
			<fb:login-button perms="email,user_checkins" size="xlarge"> Facebook</fb:login-button>
			<br />
			<br>
			<br>
			
			<p>I already have a password: <a href="/companies/login" >Sign In</a></p>
		</div>
		
	</div>
                       <div class="clear"></div>
	
		

 </div>

	 

<script language='javascript'>




	function showterms(){
 	
		var url = '/companies/show_terms/Terms';			
			jQuery.facebox({ ajax: url });
	}

</script>


<script src="/js/jquery.alerts.js" type="text/javascript"></script>
<link href="/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<?php
//if($status1=="ok")
{?>
<script language='javascript'>

 function updateCoin()
 {
// jConfirm('Do you have a coin to register?', 'Confirmation Dialog', function(r) { })
 if(trim($('#screenname').val()) == '')
	 {
		 inlineMsg('screenname','<strong>Screen Name required.</strong>',2);
		 return false;
	 }
	 if(tagValidate($('#screenname').val()) == true){
		 inlineMsg('screenname','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 } 
    	if(trim($('#email').val()) == '')
	 {
		 inlineMsg('email','<strong>Email required.</strong>',2);
		 return false;
	 }
	if(!validateemail($('#email').val()))
		 {
			 inlineMsg('email','<strong>Please enter valid email address.</strong>',2);
			 return false;
		 }
	 if(tagValidate(trim($('#email').val())) == true){
		 inlineMsg('email','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 } 
	if(trim($('#revemail').val()) == '')
	 {
		 inlineMsg('revemail','<strong>Confirm Email required.</strong>',2);
		 return false;
	 }
	if(trim($('#email').val())!= trim($('#revemail').val()))
	 {
		 inlineMsg('revemail','<strong>confirm Email not matched.</strong>',2);
		 return false;
	 }
	if(trim($('#password').val()) == '')
	 {
		 inlineMsg('password','<strong>Password required.</strong>',2);
		 return false;
	 }
	 if(tagValidate(trim($('#password').val())) == true){
		 inlineMsg('password','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 } 
	/* if(trim($('#password_confirm').val()) == '')
	 {
		 inlineMsg('password_confirm','<strong>Confirm Password required.</strong>',2);
		 return false;
	 }
	 if(tagValidate(trim($('#password_confirm').val())) == true){
		 inlineMsg('password_confirm','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 } */
 
	
	if($('#country').val() == '')
	 {
		 inlineMsg('country','<strong>Country required.</strong>',2);
		 return false;
	 }
	 if(tagValidate($('#country').val()) == true){
		 inlineMsg('country','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 } 	
	if(trim($('#zipcode').val()) == '')
	 {
		 inlineMsg('zipcode','<strong>Zip required.</strong>',2);
		 return false;
	 }
	 if(tagValidate(trim($('#zipcode').val())) == true){
		 inlineMsg('zipcode','<strong>Please dont use script tags.</strong>',2);
		 return false; 
	 }
	 

if(document.getElementById("termsofservice").checked==false)
	{
	
	alert("confirm to the terms and conditions");
	return false;
	}


	
	
	return true;
}

function validateemail(email) { 
    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
   
    
     if(email=="")
     {
         
         return false;
     }
     if(!email.match(emailRegex))
      {
       
        return false;
      }
     
    return true;
}
//  var doIt=confirm('Do you have a coin to register?'); 
// if(doIt){window.location.href = "/companies/register_coin"}
</script>


<?php }?>