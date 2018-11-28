<?php if($_SESSION['User']['User']['usertype']=="holder"){?>
    <ul class="dash_menu" style="margin-left: 5px; margin-right: 5px; ">
        <li style="border-right:2px solid white;">
			<!--<a href="/companies/dashboard" class="<?php if( $_SERVER['REQUEST_URI']=="/companies/dashboard") echo "tabcheck"; ?>" ><span>Dashboard</span></a>-->
			<?php
				 $serUrl=explode('/',$_SERVER['REQUEST_URI']);
			//print_r($serUrl);
				$dsclass='';$reclass='';$viewclass='';$viewpclass='';$invclass='';$dseclass='';$updpclass='';$message='';
				if($serUrl['2']=='dashboard'){
					$dsclass="tabcheck";
				}else if($serUrl['2']=='register_coin'){
					$reclass="tabcheck";
				}else if($serUrl['2']=='view_registeredcoins'){
					$viewclass="tabcheck";
				}else if($serUrl['2']=='view_points'){
					$viewpclass="tabcheck";
				}else if($serUrl['2']=='invite_friends'){
					$invclass="tabcheck";
				}else if($serUrl['2']=='dashboard_events'){
					$dseclass="tabcheck";
				}else if($serUrl['2']=='update_profile'){
					$updpclass="tabcheck";
				}else if($serUrl['2']=='messages'){
					$message="tabcheck";
				}
			?>
			<?php
				e($html->link(
					$html->tag('span', 'Dashboard'),
					array('controller'=>'companies','action'=>'dashboard'),
					array('escape' => false,'class'=>$dsclass)
					)
				);
			?>
		</li>
        <?php 
            ##import coinset  model for processing
            App::import("Model", "Coinset");
            $this->Coinset =   & new Coinset();    
            $coinsetname="";
            $unitcount=0;
            //Coinset box

            $condition3 = "Coinset.project_id = '".$project['Project']['id']."' AND  Coinset.delete_status = '0'";
            $coinsetdata = $this->Coinset->find('all',array("conditions"=>$condition3,'order'=>'Coinset.id desc'));

            if($coinsetdata){
                foreach ($coinsetdata as $eachcoinset){
                    $coinsetname = $eachcoinset['Coinset']['coinset_name'].', '.$coinsetname;
                    $unitcount = ($eachcoinset['Coinset']['numunits']+$unitcount);
                }
                $coinsetname = substr($coinsetname,0,-2);
            }
            //if($projdetails && $projdetails['Project']['numunits']!="" && $projdetails['Project']['numunits']> 0 ) 

            if($unitcount && $unitcount != "" && $unitcount > 0 ) {?>
            <li  style="border-right:2px solid white;">
				<?php
				e($html->link(
					$html->tag('span', 'Register coin'),
					array('controller'=>'companies','action'=>'register_coin'),
					array('escape' => false,'class'=>$reclass)
					)
				);
				?>
			</li> 
            <?php } ?>
        <li  style="border-right:2px solid white;">
			<?php
				e($html->link(
					$html->tag('span', 'Coins & Comment'),
					array('controller'=>'companies','action'=>'view_registeredcoins'),
					array('escape' => false,'class'=>$viewclass)
					)
				);
				?>
		</li>
        <?php if($project['ProjectType']['istransferable']==1){ ?>
            <?php if($project['ProjectType']['simple_cointransfer']==0){ ?>
                <!--<li  style="border-right:2px solid white;"><a href="/companies/transfer_request" class="<?php  //if( $_SERVER['REQUEST_URI']=="/companies/transfer_request") echo "tabcheck"; ?>" ><span>Send Coin Transfer Request</span></a></li>-->
                <?php }?>
            <?php }?>

        <?php
            if($project['ProjectType']['showpoints']==1)
            {
            ?>
            <li  style="border-right:2px solid white;">
				<?php
					e($html->link(
						$html->tag('span', 'Points'),
						array('controller'=>'companies','action'=>'view_points'),
						array('escape' => false,'class'=>$viewpclass)
						)
					);
				?>

			</li>
            <?php
            } 
        ?>
        <li  style="border-right:2px solid white;">
			<?php
					e($html->link(
						$html->tag('span', 'Invite'),
						array('controller'=>'companies','action'=>'invite_friends'),
						array('escape' => false,'class'=>$invclass)
						)
					);
				?>
		</li>
        <li  style="border-right:2px solid white;">
			<?php
					e($html->link(
						$html->tag('span', 'Events'),
						array('controller'=>'companies','action'=>'dashboard_events'),
						array('escape' => false,'class'=>$dseclass)
						)
					);
			?>

		</li>
        <li  style="border-right:2px solid white;">
			<?php
				e($html->link(
					$html->tag('span', 'Edit Profile'),
					array('controller'=>'companies','action'=>'update_profile'),
					array('escape' => false,'class'=>$updpclass)
					)
				);
			?>
		</li>
        <li  style="border-right:2px solid white;">
			<?php
				e($html->link(
					$html->tag('span', 'Message'),
					array('controller'=>'companies','action'=>'messages'),
					array('escape' => false,'class'=>$message)
					)
				);
			?>
		</li>

        <!--<li><a href="/companies/changeuserpassword" class="<?php if( $_SERVER['REQUEST_URI']=="/companies/change_password") echo "tabcheck"; ?>" ><span>Change Password</span></a></li>-->
        <!--<li><a href="/companies/view_registeredcoins" class="<?php //if( $_SERVER['REQUEST_URI']=="/companies/view_registeredcoins") echo "actNav"; ?>"><span>View Registered coins</span></a></li>-->
        <li>
			
			<?php
				e($html->link(
					$html->tag('span', 'Logout'),
					array('controller'=>'companies','action'=>'logout'),
					array('escape' => false,'class'=>$updpclass)
					)
				);
			?>

		</li>
    </ul>
    <?php }?>
<?php 
	if($_SESSION['User']['User']['usertype']=="sponsor"){ 
		echo $ser_spon_url=explode('/',$_SERVER['REQUEST_URI']);		
	?>
    <h3 class="noPadd">Dashboard</h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li>
			<a href="/companies/dashboard" class="<?php if($_SERVER['REQUEST_URI']=="/companies/dashboard") echo "actNav"; ?>" ><span>Dashboard</span></a>

			<?php
				e($html->link(
					$html->tag('span', 'Dashboard'),
					array('controller'=>'companies','action'=>'dashboard'),
					array('escape' => false,'class'=>$dsclass)
					)
				);
			?>



		</li>
    </ul>
    <h3 class="noPadd">Project Detail </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/editprojectdtl"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/editprojectdtl") echo "actNav"; ?>"><span>Edit Project Detail</span></a></li>
    </ul>
    <h3 class="noPadd">Coinsets  </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/coinsetlist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/coinsetlist") echo "actNav"; ?>"><span>View Coinsets</span></a></li>
        <li><a href="/companies/addcoinset"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcoinset") echo "actNav"; ?>"><span>Add Coinset</span></a></li>
    </ul>
    <h3 class="noPadd">Sponsor   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/editsponsordtl"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/editsponsordtl") echo "actNav"; ?>"><span>Edit Sponsor Detail</span></a></li>
    </ul>
    <h3 class="noPadd">Companies   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/companylist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/companylist") echo "actNav"; ?>"><span>View Companies</span></a></li>
        <li><a href="/companies/addcompany"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcompany") echo "actNav"; ?>"><span>Add Company</span></a></li>
    </ul>
    <h3 class="noPadd">Contacts   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/contactlist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/contactlist") echo "actNav"; ?>"><span>View Contacts</span></a></li>
        <li><a href="/companies/addcontacts"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcontacts") echo "actNav"; ?>"><span>Add Contacts</span></a></li>
    </ul>
    <h3 class="noPadd">Holder   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/holderslist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/holderslist") echo "actNav"; ?>"><span>View Coin Holders</span></a></li>
        <li><a href="/companies/nonholderslist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/nonholderslist") echo "actNav"; ?>"><span>View Non Holders</span></a></li>
        <li><a href="/companies/addholder"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addholder") echo "actNav"; ?>"><span>Add New Registration</span></a></li>
    </ul>
    <h3 class="noPadd">Coins   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/registercoinlist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/registercoinlist") echo "actNav"; ?>"><span>View Registered Coins</span></a></li>
    </ul>
    <h3 class="noPadd">Manage Comment Type</h3>

    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a  href="/companies/commenttype" class="<?php if( $_SERVER['REQUEST_URI']=="/companies/commenttype") echo "actNav"; ?>"><span>View Comment Type </span></a></li>
        <li><a  href="/companies/addcommenttype" class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcommenttype") echo "actNav"; ?>"><span>Add Comment Type</span></a></li>
    </ul>

    </li>




    <h3 class="noPadd">Comments   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/commentlist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/commentlist") echo "actNav"; ?>"><span>View Comments</span></a></li>
        <li><a href="/companies/commentreplylist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/commentreplylist") echo "actNav"; ?>"><span>View Comment Reply</span></a></li>
    </ul>
    <?php		
        $contentdtlarr = AppController::getprojectdetails($session->read('projectwebsite_id'));
        if($contentdtlarr['ProjectType']['is_rsvp']=="1"){
        ?>
        <h3 class="noPadd">RSVP   </h3>
        <ul class="dash_menu" style="margin-left: 80px;">
            <li><a href="/companies/rsvplist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/rsvplist") echo "actNav"; ?>"><span>View RSVP</span></a></li>
        </ul>
        <?php }?>
    <h3 class="noPadd">Communication    </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/mailtemplatelist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/mailtemplatelist") echo "actNav"; ?>"><span>View Email Templates</span></a></li>
        <li><a href="/companies/addmailtemplate"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addmailtemplate") echo "actNav"; ?>"><span>Add Email Template</span></a></li>
        <li><a href="/companies/sendtempmail"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/sendtempmail") echo "actNav"; ?>"><span>Communication</span></a></li>
        <li><a href="/companies/commtasklist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/commtasklist") echo "actNav"; ?>"><span>View Communication Task</span></a></li>
        <li><a href="/companies/addcommtask"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcommtask") echo "actNav"; ?>"><span>Add Communication Task</span></a></li>
    </ul>
    <h3 class="noPadd">Content    </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/contentlist"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/contentlist") echo "actNav"; ?>"><span>View Content</span></a></li>
        <li><a href="/companies/addcontentpage"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/addcontentpage") echo "actNav"; ?>"><span>Add Content</span></a></li>
    </ul>
    <h3 class="noPadd">Login Terms / Privacy    </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/loginterms"  class="<?php if( $_SERVER['REQUEST_URI']=="/companies/loginterms") echo "actNav"; ?>"><span>Edit Terms / Privacy</span></a></li>
    </ul>

    <h3 class="noPadd">Password   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/change_password" class="<?php if( $_SERVER['REQUEST_URI']=="/companies/change_password") echo "actNav"; ?>" >Change Password</a></li>
    </ul>
    <h3 class="noPadd">Suggestion Box   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/suggestionbox"><span>Suggestion Box</span></a></li>
    </ul>
    <h3 class="noPadd">Logout   </h3>
    <ul class="dash_menu" style="margin-left: 80px;">
        <li><a href="/companies/logout"><span>Logout</span></a></li>
    </ul>
    <?php }?>
