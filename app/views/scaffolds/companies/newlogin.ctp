<?php ?><div class="boxBg">
		<!--   Arvind's code: starts  -->

 			<?php

			$site_logoutUrl='/companies/logout/';
			include('facebook.php');// this  file is in webroot
			// Create our Application instance (replace this with your appId and secret).
			
			if($_SERVER['HTTP_HOST']=="192.168.1.225:8219"){
				$facebook = new Facebook(array(
				'appId' => '204621259574670',
				'secret' => 'e9cef786f12e1d0bd14141bedef9383d',
				'cookie' => true,
				));
			}
			else if($_SERVER['HTTP_HOST']=="75.125.190.162:9085"){
				$facebook = new Facebook(array(
				'appId' => '207213385987168',
				'secret' => '788d922865a9f34c43d7b5012089b16d',
				'cookie' => true,
				));
			}else{
				$facebook = new Facebook(array(
				'appId' => '218874101473898',
				'secret' => '6c50b162c383f2fdefc5fbed34464fdc',
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
						
			$facebook_session = $facebook->getSession();
			$me = null;
			//print_r($facebook_session);
			//Session based API call.

			if ($facebook_session)
			{	unset($_SESSION['fbCounter']);
				try
				{ 
					$uid = $facebook->getUser();
					$me = $facebook->api('/me');
					//$this->Session->write('FacebookUser', serialize($me));
					$_SESSION['FacebookUser']=$me;
					
					
					
					/*if(!isset($_SESSION['counter']) && !isset($_SESSION['fbCounter']) && $_SESSION['FacebookUser'])
					{
						$_SESSION['counter']=1;
					}
					if($_SESSION['counter']==1)
					{	
						$_SESSION['counter']=$_SESSION['counter']+1;*/
						//print_r($_SESSION['FacebookUser']);
					//exit;
						echo '<script type="text/javascript">window.location="/companies/facebook_login/";</script>';	
						//header("location:/companies/facebook_login/");					
					//} 
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

		

				<!-- Facebook Login --> 
				<?php
					//$btnvar = '<fb:login-button onlogin="window.location.reload();">Login with Facebook</fb:login-button>';
				?>
				
		<!-- Arvind's code ends -->
	
	
	<div>
		
			<?php if($status!='Verified') {  ?>
		<div class="coinBoxCenter">
			<p class="coinBoxTop"><?php echo $html->image('/img/'.$project_name.'/coinBox_RhtTop.gif', array('class'=>'right'));?></p>
			<div class="boxBor">
			<div class="boxPad">
			
						<table><tr><td>
							<?php 
							if($project['Project']['serialdisplayside']=="A") $coindisplayside="sidea";
							if($project['Project']['serialdisplayside']=="B") $coindisplayside="sideb";
							if($project['Project'][$coindisplayside]=="")
							echo $html->image('/img/'.$project_name.'/sideA.png', array('class'=>'','width'=>'107','height'=>'109'));
							else
							echo $html->image('/img/'.$project_name.'/uploads/'.$project['Project'][$coindisplayside], array('class'=>'','width'=>'107','height'=>'109'));
							?>
						</td><td style="color:red;font-size:20px;valign:center">
						<?php echo $html->image('/img/'.$project_name.'/uploads/'.'/registerarrow.png', array('class'=>'','width'=>'','height'=>'')); ?>
						</td><td><p style="color:red;font-size:20px;font-weight: bolder;">Coin Serial # & Verification Code</p></td></table>
			
			</div>
			</div>
			<p class="coinBoxBot"><?php echo $html->image('/img/'.$project_name.'/coinBox_RhtBot.gif', array('class'=>'right'));?></p>
		</div>
			<p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>
			<?php }?>


				
				<div style="display:<?php if($status=='Verified') echo"none";  ?>" >
						<?php echo  $form->create('Company',array('action'=>'/signup','id'=>'SignupForm' ,'onsubmit' => 'return validateserial("add");'));?>
						<p>&nbsp;</p>  
							<div><lable class='lbl'>Serial #:<span class="red">*</span></lable> <?php echo $form->input('coinset',array('label'=>'','id'=>'coinset','div'=>false,'type'=>"text", 'size'=>'10','maxlength'=>'10' , 'class'=>'inptBox')) ?>
							</div>
							<p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>
							<div>
							<lable class='lbl'>Verification Code:<span class="red">*</span></lable> <?php echo $form->input('code',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"code",'size'=>'40','maxlength'=>'3', 'class'=>'inptBox' )) ?>
							<label for="code"></label>
							<label for="code"></label>
							
							<span style="color: LightSlateGray; font-size: 11px; font-style: italic;">(varification code is 3 characters under serial #)</span>
							</div>
								<p class="clear"><img src="/img/<?php echo $project_name?>/spacer.gif" alt="" height="15" width="1" /></p>
								<div>
								<lable style="width:150px; margin-right:5px;display:inline-block;">&nbsp;</lable> <?php echo $form->submit('Verify', array('div'=>false,"class"=>"btn"));?>
								</div>
				
						<?php echo $form->end();?>
				</div>
								

		<div class="rhtFrmCont" style="display:<?php if($status=='Verified') echo 'block'; else echo 'none'; ?>" >
		
			<h2>Create a New Account</h2>
			<?php echo  $form->create('Holder',array('action'=>'/registeruser','id'=>'SignupForm','url'=>$this->here ,'onsubmit' => 'return validateregister("add");'));?>
			<?php echo $form->input('coinstatus',array('value'=>$status,'type'=>"hidden", 'id'=>"coinstatus" )) ?>
			<?php echo $form->input('tempserial',array('value'=>$tempserial,'type'=>"hidden", 'id'=>"tempserial" )) ?>
			<?php echo $form->input('tempkey',array('value'=>$tempkey,'type'=>"hidden", 'id'=>"tempkey" )) ?>
			
			<label class="frmLbls frmLbl2">First Name:</label><span class="intpSpan"><input type="text" value="" name="" class="inpt_txt_fld" /></span><br />

				<label class="frmLbls frmLbl2">Your Email:</label><span class="intpSpan"><?php echo $form->input('screenname',array('label'=>'','div'=>false,'type'=>"text",'id'=>'screenname' , 'class'=>'inpt_txt_fld')) ?></span><br />

				<label class="frmLbls frmLbl2">Re-enter Email:</label><span class="intpSpan"><?php echo $form->input('revemail',array('label'=>'','div'=>false,'type'=>"text",'id'=>'revemail', 'class'=>'inpt_txt_fld' )) ?></span><br />

				<label class="frmLbls frmLbl2">New Password:</label><span class="intpSpan"><?php echo $form->input('password',array('label'=>'','div'=>false,'type'=>"password", 'id'=>"password", 'class'=>'inpt_txt_fld' )) ?></span><br />

				<label class="frmLbls frmLbl2">Country:</label><span class="intpSpan"><?php echo $form->select("country",$countrydropdown,0,array('label'=>'','id' => 'country','onchange'=>'return getstates(this.value,"Holder")','class'=>'inpt_txt_fld'),array('254'=>'United States')); ?></span><br />

				<label class="frmLbls frmLbl2">Zip/Postal Code:</label><span class="intpSpan"> <?php echo $form->input('zipcode',array('label'=>'','div'=>false,'type'=>"text", 'id'=>"zipcode", 'class'=>'inpt_txt_fld' )) ?></span><br />
				
				<label class="frmLbls frmLbl2"><input type="checkbox" name="nnb" value="" class="middle" /></label><span class="chkTxt">I agree with all the <a href="#.">Terms of Service</a></span><br />
			<p align="center"><span class="flx_btn_contnr">
					
					<span class="flx_button_lft">
						<?php echo $form->submit('Register', array('div'=>false,"class"=>"flx_flexible_btn",'onclick'=>'return updateCoin();'));?>
				</span>
				</span></a></p>
			<br />
			<br />
		</div>
 <div align='center'><?php if($session->check('Message.flash')){ $session->flash(); } ?> </div>
		<div class="lftReg_box" style="display:<?php if($status=='Verified') echo 'block'; else echo 'none'; ?>">
			
			<h1>Use an Existing Account</h1>
			<p>Register using your account with:</p>
			<br />
				
			<fb:login-button perms="email,user_checkins">Login with Facebook</fb:login-button>
			<br />
			<p>I already have a password: <a href="#." >Sign In</a></p>
		</div>

	</div>
                       <div class="clear"></div>
	
		

 </div>

<script language='javascript'>
	function showterms(){
 	var terms= $("#terms").val();	
		var url = '/companies/show_terms/'+terms;			
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
jConfirm('Do you have a coin to register?', 'Confirmation Dialog', function(r) {
})
document.getElementById("data1").value="ok";
}
//  var doIt=confirm('Do you have a coin to register?'); 
// if(doIt){window.location.href = "/companies/register_coin"}
</script>


<?php }?>