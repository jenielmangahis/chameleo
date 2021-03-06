<?php 
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */

class AppController extends Controller {
	
        var $uses     = array('User','Admin','ProductType','Project','CompanyType','CompanyToCategory','NonProfitType','Coinset');
        var $components = array('Session','Cookie');
        var $helpers = array('Common','Pagination','Html', 'Form','Session','Qrcode','Javascript','Tinymce','Recaptcha','Fck','Csv','csv','Ajax','Calendar');
        
	
		function getmembername($member_id)
        {
            App::import("Model", "Holder");
            $this->Holder   = & new Holder();
              $conditions = array("Holder.user_id" => $member_id);
              $Holderdata=$this->Holder->find('all', array('conditions' => $conditions));
                $membername =$Holderdata[0]['Holder']['firstname']." ".$Holderdata[0]['Holder']['lastnameshow'];
                if(trim($membername)=="")
                    $membername=$Holderdata[0]['Holder']['screenname'];
                  return $membername;
            
        }    
        
         function getpointname($point_id)
        {
                        
            App::import("Model", "Point");
            $this->Point   = & new Point();
            $pointdata=$this->Point->query("select * from master_points where point_id='$point_id'");
            $point_name=$pointdata[0]['master_points']['Point_Name'];  
            return $point_name;
            
        }    
         
            
         function getcontents($contentname)
         {
            App::import("Model", "Content");
            $this->Content   = & new Content(); 
            $project_id=$this->Session->read("projectwebsite_id");    
            $condition="(Content.alias='$contentname') and Content.project_id=".$project_id." and Content.active_status='1' and Content.delete_status='0' ";
            $page_content= $this->Content->find($condition,NULL,NULL,NULL,NULL,1); 
            
            return $page_content;
        }
        
        function getcontentsbyid($content_id)
         {          
            App::import("Model", "Content");
            $this->Content   = & new Content();  
            $condition="Content.id='$content_id'";
            $page_content= $this->Content->find($condition,NULL,NULL,NULL,NULL,1); 
            
            $page_name=$page_content['Content']['alias'];  
            return $page_name;
        }
        
        /***************
        * function use in admin view(pricingtype) to get product name with ref to product id
        */

            function getproductname($product_id)
            {
                
                 $condition = "id ='$product_id' AND  delete_status = '0'";
                 $productdata = $this->ProductType->find('first',array("conditions"=>$condition));
                 
                 return $productdata['ProductType']['product_type_name'];
            }
            
            function getproductnamebyid($id)
            {

                $id=$this->ProductType->query("select product_type_name from product_types where id=$id ");
                return $id[0]['product_types']['product_type_name'];
            }
        
            function getpricingnamebyid($id)
            {
                $id=$this->PricingType->query("select pricing_type_name from pricing_types where id=$id ");
                return $id[0]['pricing_types']['pricing_type_name'];
            }
            
            function getprojectnamebyid($id)
            {
                $id=$this->Project->query("select project_name from projects where id=$id ");
                return $id[0]['projects']['project_name'];
            }
            
            function geteventnamebyid($id)
            {
                App::import("Model", "Event");
                $this->Event   = & new Event();
                $id=$this->Event->query("select title from events where id=$id ");
                return $id[0]['events']['title'];
            }
            
            function getholdernamebyid($id)
            {
                 App::import("Model", "Holder");
                 $this->Holder   = & new Holder();
                  $conditions = array("Holder.id" => $id);
                  $Holderdata=$this->Holder->find('all', array('conditions' => $conditions));
                  $membername =$Holderdata[0]['Holder']['firstname']." ".$Holderdata[0]['Holder']['lastnameshow'];
                  if(trim($membername)=="")
                    $membername=$Holderdata[0]['Holder']['screenname'];
                  return $membername;
            }
         
            
        function session_check_usertype(){
        	
        	$ADMIN   = $this->Session->read('Admin');
        	if(empty($ADMIN))
        	{
        		$adminid = $this->Cookie->read('AdminId');
        		$sessionprojectid = $this->Cookie->read('sessionprojectid');
        		if($adminid && $sessionprojectid) {
        			$condition = "id = '".$adminid."'";
        			$adminDetails = $this->Admin->find('first', array('conditions' => $condition, 'recursive' => 0));
        			if($adminDetails) {
        				$this->Session->write('Admin',$adminDetails);
        				$this->Session->write('sessionprojectid',$sessionprojectid);
        			}
        		}
        	}
        	$ADMIN   = $this->Session->read('Admin');
        	
        	$USER   = $this->Session->read('User');
        	if(empty($USER))
        	{
        		$userid = $this->Cookie->read('UserId');
        		$condition = " User.id = '".$userid."' and User.delete_status='0' ";
        		$userDetails = $this->User->find('first', array('conditions' => $condition, 'recursive' => 0));
        		if($userDetails){
        			$this->Session->write('User',$userDetails);
        		}
        	
        	}
        	$USER   = $this->Session->read('User');
        	
        	if(!empty($ADMIN)){
        			return 'admin';
        	}else{
        		if(!empty($USER)){
        			
        			return 'user';
        		}else{
        			$this->redirect(array('controller'=>'admins','action'=>'login'));
        		}
        	}
        	
        }
            
		/*	
		 * 	function    : session_check_admin()
		 * 	params      : n/a
		 * 	Description : This function is used to check active session for admin
		 * Created On   : 15-02-11 (11:50pm)
	 	 */		
            function session_check_admin()
            {   
            	// DebugBreak();
            	$ADMIN   = $this->Session->read('Admin');
            	if(empty($ADMIN))
            	{
            		$adminid = $this->Cookie->read('AdminId');
            		$sessionprojectid = $this->Cookie->read('sessionprojectid');
            		if($adminid && $sessionprojectid) {
            			$condition = "id = '".$adminid."'";
            			$adminDetails = $this->Admin->find('first', array('conditions' => $condition, 'recursive' => 0));
            			if($adminDetails) {
            				$this->Session->write('Admin',$adminDetails);
            				$this->Session->write('sessionprojectid',$sessionprojectid);
            			}
            		}
            	}
            	$ADMIN   = $this->Session->read('Admin');
            	if(empty($ADMIN))
            	{
            		$this->redirect(array('controller'=>'admins','action'=>'login'));
            	}
            }
	
/*	
	 * 	function    : session_check_user()
	 * 	params      : n/a
	 * 	Description : This function is used to check active session for sponsors or holder
	 * Created On   : 18-02-11 (02:10am)
 	 */		
	function session_check_user()
	{
		$USER   = $this->Session->read('User');
		//echo '<pre>';print_r($USER);die;
		if(empty($USER))
		{
			$userid = $this->Cookie->read('UserId');
			$condition = " User.id = '".$userid."' and User.delete_status='0' ";
			$userDetails = $this->User->find('first', array('conditions' => $condition, 'recursive' => 0));
			if($userDetails){
				$this->Session->write('User',$userDetails);
			}
			 
		}


		$USER   = $this->Session->read('User');
		if(empty($USER))
		{
			if(!empty($this->Cookie))
			{
				$pname= $this->Cookie->read('name');
				$project_id= $this->Cookie->read('id');
					
				$projectDetails=$this->getprojectdetails($project_id);
				$logout_redirect=$projectDetails['Project']['logoutredirect'];

				//if logout redirect is set


				if(!empty($logout_redirect)){

					$page_content= $this->Content->findById($logout_redirect);
						
					$current_domain= $_SERVER['HTTP_HOST'];





						
					/*for home page redirect*/
					if($page_content['Content']['internal_alias']=='home-page')
					{
						/*
						 if(($current_domain=='www.coins4promo.com'|| $current_domain="coins4promo.com" || $current_domain=="192.168.1.225:8219") )
						 {

						if(!empty($projectDetails['Project']['project_name']))

							$this->redirect('/'.$projectDetails['Project']['project_name']);
						}else
							*/
						{
							$this->redirect('/');

						}
					}
					/*home  redirect close*/
					 	
					/*for content pages*/


					$page=$page_content['Content']['internal_alias'];
					if( $page=='logout' || $page=='login' )
					{
							
						$this->redirect('/companies/'.$page_content['Content']['alias']);

					}

					if( $page=='register' )
					{
							
						$this->redirect('/companies/registeruser');

					}

					/* content*/
					$this->redirect('/'.$page_content['Content']['alias']);

				}else
				{
					/*
					 if(($current_domain=='www.coins4promo.com'|| $current_domain="coins4promo.com" || $current_domain=="192.168.1.225:8219"||$current_domain=="test.coins4promo") )
						$this->redirect('/'.$projectDetails['Project']['project_name']);
					else
						*/
					$this->redirect('/');
				}
			}else{
					
				$this->redirect('/companies/session_expired');
			}
		}
	}
	
	
    function SetLoggedInUserSession($SessionID, $UserID){

        $condition = " UserSession.user_session_id = '".$SessionID."' and UserSession.user_id='".$UserID."' ";
        $userSessionDetails = $this->UserSession->find('first', array('conditions' => $condition, 'recursive' => 0));   
     
        if($userSessionDetails){
            // Update Existing Session
                $user_sess['id']=$userSessionDetails['UserSession']['id'];
                 $user_sess['user_session_id']=$SessionID;
                $user_sess['user_id']=$UserID;
                 $user_sess['hits']=$userSessionDetails['UserSession']['hits']+1;
                $this->UserSession->save($user_sess);
               // $this->UserSession->query("UPDATE UserSession SET hits = hits + 1 WHERE user_session_id = '".$SessionID."'");
        }else {
                //Insert New Session
                $user_sess['user_session_id']=$SessionID;
                $user_sess['user_id']=$UserID;
                
                $this->UserSession->save($user_sess);
        }
}
	
	
	
/*	
	 * 	function    : projectdropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for project dropdown
	 * Created On   : 16-02-11 (00:15am)
 	 */		
function projectdropdown()
	{
       App::import("Model", "Project");
       $this->Project  =    &new Project();
      
   	   $projectdata  =  $this->Project->find("all", array('conditions' => "Project.delete_status='0'",'order'=>'Project.created ASC'),array('fields'=>array("DISTINCT Project.project_name","Project.id"))); 
       $projectsdropdown = Set::combine($projectdata, '{n}.Project.id', '{n}.Project.project_name');
       asort($projectsdropdown);
	   $this->set("projectdropdown", $projectsdropdown);
	 
    }

/*	
	 * 	function    : projecttypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for project type dropdown
	 * Created On   : 17-02-11 (02:15am)
 	 */		
function projecttypedropdown()
	{
       App::import("Model", "SiteType");
       $this->SiteType  =    &new SiteType();       
      
   	   $projectdata  =  $this->SiteType->find("all", array('conditions' => "SiteType.active_status='1' AND SiteType.delete_status='0'",'order'=>'SiteType.created ASC'),array('fields'=>array("DISTINCT SiteType.project_type_name","ProjectType.id"))); 
       $projectsdropdown = Set::combine($projectdata, '{n}.SiteType.id', '{n}.SiteType.project_type_name');

       asort($projectsdropdown);
	   $this->set("projectypedropdown", $projectsdropdown);
    }  
    
    
    function getSiteTypebyId($id)
    {
        //debugbreak();
       App::import("Model", "SiteType");
       $this->SiteType  =    &new SiteType();
       
      
          $projectdata  =  $this->SiteType->find("all", array('conditions' => "SiteType.active_status='1' AND SiteType.delete_status='0' AND SiteType.id='$id'" ),array('fields'=>array("DISTINCT SiteType.project_type_name","ProjectType.id"))); 
       //$projects_sitetype = Set::combine($projectdata, '{n}.SiteType.id', '{n}.SiteType.project_type_name');
       //$this->set("projects_sitetype",$projects_sitetype);
       return $projectdata[0]['SiteType']['project_type_name'];
     
    }  

/*	
	 * 	function    : shippingtypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used to display shipping type drop down for related project
	 * Created On   : 23-02-11 (10:20pm)
 	 */		
function shippingtypedropdown()
	{
       App::import("Model", "ShippingType");
       $this->ShippingType  =    &new ShippingType();
      
   	   $shippingdata  =  $this->ShippingType->find("all", array('conditions' => "ShippingType.active_status='1' AND ShippingType.delete_status='0'",'order'=>'ShippingType.created ASC'),array('fields'=>array("DISTINCT ShippingType.shipping_type_name","ShippingType.id"))); 
       $shippingdropdown = Set::combine($shippingdata, '{n}.ShippingType.id', '{n}.ShippingType.shipping_type_name');
       asort($shippingdropdown);
	   $this->set("shippingdropdown", $shippingdropdown);
	 
    }    
    
/*	
	 * 	function    : companytypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for company type dropdown
	 * Created On   : 18-02-11 (02:20am)
 	 */		
function companytypedropdown($projectid='')
	{

       App::import("Model", "CompanyType");
       $this->CompanyType  =    &new CompanyType();
	   $this->CompanyType->bindModel(array('belongsTo'=>array(
				'CompanyTypeCategory'=>array(
						'foreignKey'=>false,
						'conditions'=>'CompanyType.company_type_category_id  = CompanyTypeCategory.id'
				))));
       $typecond="";
       //$typecond = $projectid ? " AND CompanyType.project_id='".$projectid."'" : '';          
	    $typecond = $projectid ? "AND CompanyType.project_id='".$projectid."'" : "AND CompanyType.project_id=0";  
	   //echo $typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';          exit;
   	   $companytypedata  =  $this->CompanyType->find("all", array('conditions' => "CompanyType.active_status='1' AND CompanyType.delete_status='0' ".$typecond,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyTypeCategory.company_type_category_name","CompanyType.company_type_category_id"))); 
	  //$this->pl($companytypedata);
	   
       $companytypes = Set::combine($companytypedata, '{n}.CompanyType.company_type_category_id', '{n}.CompanyTypeCategory.company_type_category_name');
	   asort($companytypes);
	   

	   $this->set("companytypedropdown", $companytypes);
	 
    }    
	
/*	
	 * 	function    : customtemplatelisting()
	 * 	params      : $projectid
	 * 	Description : This function is used for custom template listing
	 * Created On   : 23-02-11 (01:40am)
 	 */		
	function customtemplatelisting($projectid=null,$is_event_temp=0)
		{
 
				if($projectid){
						App::import("Model", "EmailTemplate");
					$this->EmailTemplate  =    &new EmailTemplate();
				
                if($is_event_temp==0 || $is_event_temp==NULL)
                {
					$templatedata  =  $this->EmailTemplate->find("all", array('conditions' => "EmailTemplate.is_sytem ='1' AND EmailTemplate.project_id = '$projectid' AND EmailTemplate.active_status='1' AND EmailTemplate.delete_status='0'",'order'=>'EmailTemplate.created ASC'),array('fields'=>array("DISTINCT EmailTemplate.email_template_name","EmailTemplate.id"))); 
                    
                }
                else
                {
                    $templatedata  =  $this->EmailTemplate->find("all", array('conditions' => "EmailTemplate.is_sytem ='0' and EmailTemplate.is_event_temp ='".$is_event_temp."' AND EmailTemplate.project_id = '$projectid' AND EmailTemplate.active_status='1' AND EmailTemplate.delete_status='0'",'order'=>'EmailTemplate.created ASC'),array('fields'=>array("DISTINCT EmailTemplate.email_template_name","EmailTemplate.id"))); 
                    
                }
                
					$emailtemplates = Set::combine($templatedata, '{n}.EmailTemplate.id', '{n}.EmailTemplate.email_template_name');
					$this->set("templatedropdown", $emailtemplates);
			}else{
				 //Cnfigure::write('debug',2);
				 App::import("Model", "EmailTemplate");
				 $this->EmailTemplate  =    &new EmailTemplate();
				 $condition = "EmailTemplate.project_id = '0' AND EmailTemplate.delete_status='0' AND EmailTemplate.is_sytem='0'";
				 $templatedata = $this->EmailTemplate->find('all',array("conditions"=>$condition ));
				 $emailtemplates = Set::combine($templatedata, '{n}.EmailTemplate.id', '{n}.EmailTemplate.email_template_name');
				 $this->set("templatedropdown", $emailtemplates);
			}
	}    

	/*	
	 * 	function    : commenttypelisting()
	 * 	params      : $projectid
	 * 	Description : This function is used for comment type listing
	 * Created On   : 23-02-11 (01:40am)
 	 */		
	function commenttypelisting($projectid)
	{
			App::import("Model", "CommentType");
			$this->CommentType  =    &new CommentType();
			if($projectid > 0){			
					$commenttypedata  =  $this->CommentType->find("all", array('conditions' => "CommentType.active_status='1'  AND CommentType.delete_status='0' and project_id='$projectid'",'order'=>'CommentType.created ASC')); 
			}else{
					$commenttypedata  =  $this->CommentType->find("all", array('conditions' => "CommentType.active_status='1'  AND CommentType.delete_status='0' AND CommentType.project_id='0' ",'order'=>'CommentType.created ASC')); 
					}
					$commenttypes = Set::combine($commenttypedata, '{n}.CommentType.id', '{n}.CommentType.comment_type_name');
					asort($commenttypes);
					$this->set("commenttypedropdown", $commenttypes);		
	}
    
    
    function eventtypelisting($projectid)
    {
            if($projectid){
                    App::import("Model", "EventType");
                    $this->EventType  =    &new EventType();
                    if(!empty($projectid))
                    $eventtypedata  =  $this->EventType->find("all", array('conditions' => "EventType.active_status='1'  AND EventType.delete_status='0' and EventType.project_id='".$projectid."'",'order'=>'EventType.created ASC')); 
                    
                    else
                    $eventtypedata  =  $this->EventType->find("all", array('conditions' => "EventType.active_status='1'  AND EventType.delete_status='0' ",'order'=>'EventType.created ASC')); 

                    $eventtypes = Set::combine($eventtypedata, '{n}.EventType.id', '{n}.EventType.event_type');
                    asort($eventtypes);
                    $this->set("event_type", $eventtypes);
            }else{
                return false;
            }
    }
    
    
    function geteventtypedetails($event_type_id)
    {
       
        if($event_type_id)
        {
            App::import("Model", "EventType");
            $this->EventType  =    &new EventType();
            $eventtypedata  =  $this->EventType->find("first", array('conditions' => "EventType.id='".$event_type_id."'")); 

            return $eventtypedata['EventType'];
        }
        return false;
          
    }
    
    function getsystemversionnamebyID($sys_ver_id)
    {
        App::import("Model", "SystemVersion");
        $this->SystemVersion  =    &new SystemVersion();
        
        if($sys_ver_id)
        {
            $sys_ver_data  =  $this->SystemVersion->find("first", array('conditions' => "SystemVersion.id='".$sys_ver_id."'")); 

            return $sys_ver_data['SystemVersion']['system_version_name'];
        }
        return false; 
    }    

	/*	
	 * 	function    : projectcommenttypelisting()
	 * 	params      : $projectid
	 * 	Description : This function is used for comment type listing
	 * Created On   : 23-02-11 (01:40am)
 	 */		
	function projectcommenttypelisting($projecttypeid,$allowed_comment)
	{
			
		App::import("Model", "CommentType");
		$this->CommentType  =    &new CommentType();
	
		$commenttypedata  =  $this->CommentType->find("all", array('conditions' => "CommentType.id in (select comment_type_id from project_comment_types where project_type_id=$projecttypeid)")); 
		$commenttypes = Set::combine($commenttypedata, '{n}.CommentType.id', '{n}.CommentType.comment_type_name');	

		if($allowed_comment=="1") $commenttypes['0']="Misc. Additional Comment";
	
		$this->set("commenttypedropdown", $commenttypes);
			
	}
/*	
	 * 	function    : contacttypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for contact type dropdown
	 * Created On   : 21-02-11 (10:35pm)
 	 */		
function contacttypedropdown($projectid=null) {
	    App::import("Model", "ContactType");
        $this->ContactType  =    &new ContactType();
       $typeCondition = $projectid ? "AND ContactType.project_id='".$projectid."'" : " AND ContactType.project_id=0";  
   	    $contacttypedata  =  $this->ContactType->find("all", array('conditions' => array('ContactType.active_status' => '1','ContactType.delete_status' => '0','ContactType.project_id' => $projectid),'order'=>'ContactType.created ASC','fields'=>array('ContactType.id','ContactType.project_id','ContactType.contact_type_name'))); 
       //pr($contacttypedata);
	   //die("Hiiiiiii");
	   $contacttype = Set::combine($contacttypedata, '{n}.ContactType.id', '{n}.ContactType.contact_type_name');
       asort($contacttype);
	   //return $contacttype;
	   $this->set("contacttypedropdown", $contacttype);
	 
    }      
    
	/*	
	 * 	function    : companydropdown()
	 * 	params      : $projectid
	 * 	Description : This function is used for coimpany dropdown for each project
	 * Created On   : 21-02-11 (10:45pm)
 	 */		
	function companydropdown($projectid)
	{
		
		if($projectid>-1){
					App::import("Model", "Company");
			        	$this->Company  =    &new Company();
			        	$companyCondition = $projectid ? "AND Company.project_id='".$projectid."'" : '';
			   	    	$companydata  =  $this->Company->find("all", array('conditions' => "Company.delete_status='0' $companyCondition",'order'=>'Company.created ASC'),array('fields'=>array("DISTINCT Company.company_name","Company.id"))); 					

			        	$companydropdownarr = Set::combine($companydata, '{n}.Company.id', '{n}.Company.company_name');
                        asort($companydropdownarr);
				    	$this->set("companydropdown", $companydropdownarr);
		}else{
			return false;                                                                         
		}
   	} 
    
	/*	
	 * 	function    : WordLimiter()
	 * 	params      : $text , $limit
	 * 	Description : This function is used limit large string
	 * Created On   : 16-02-11 (04:20am)
 	 */		
	function WordLimiter($text,$limit=20){
											/*$i=0;
										    $explode = explode(' ',$text);
										    $string  = '';
										       
										    $dots = '...';
										    if(count($explode) <= $limit){
										        $dots = '';
										    }
										    for($i=0;$i < $limit;$i++){
										        $string .= $explode[$i]." ";
										    }
										       
										    return $string.$dots;*/

							$text =strip_tags($text);	
                            $textlen=strlen($text); 				
							if($text==''){            
							$text = " ";              
							}
                            elseif($textlen > $limit && ($textlen - $limit) >= 5 ){  
                            $postion = strpos($text, " ", $limit);   
                            if($postion && ($postion - $limit)  < 5){  
                                 $text = substr($text,0,$postion) ."..."; 
                            }else {
                                $text = substr($text,0,$limit) ."...";   
                            }
                              
							}
							return $text;
		} 	
	
	
	
	/*	
	 * 	function    : checkuniqueuserid()
	 * 	params      : $username
	 * 	Description : This function is used to check unique user
	 * Created On   : 17-02-11 (07:45pm)
 	 */
	
function checkuniqueuserid($username, $projectid='')
	{
      App::import('Model','User');
	  $this->User = new User();
	   if($projectid!=''){
           $conditions = array("User.username" => $username,"User.project_id"=>$projectid,"User.delete_status"=>"0");
       }else{
          $conditions = array("User.username" => $username,"User.delete_status"=>"0"); 
       }
       
       
   	   $getdetail  =  $this->User->find("all", array('conditions' => $conditions)); 
       if(count($getdetail) > 0){
       			return false; 			
       }else{
       			return true;
       }
	 
    }
 	
	
/*	
	 * 	function    : usdateformat()
	 * 	params      : $datevar
	 * 	Description : This function is used to change date according to usa
	 * Created On   : 17-02-11 (07:45pm)
 	 */
		
function usdateformat($datevar,$type='') {
		if(empty($type)){
				##convert date to USA date format m-d-y
				$usdate = strftime("%m-%d-%Y", strtotime($datevar));
				return $usdate;
		  }else{
		        $date_arr = explode(" ", $datevar);				
				$date_arr1 = explode("-",$date_arr[0]);
		
				if(isset($date_arr[1]) && !empty($date_arr[1])) {
				$time_arr = explode(":",$date_arr[1]);
				$hr  = $time_arr['0'];
				$m 	 = $time_arr['1'];				
				$sec = $time_arr['2'];
				}
				$month = $date_arr1['1'];
				$day   = $date_arr1['2'];
				$year  = $date_arr1['0'];
				$usdate = date("m-d-Y, g:i a",strtotime($datevar));
				
				return $usdate;
		  }	
			
		}

function usdateformat1($datevar,$type='')
		{
		
		if(empty($type)){
				##convert date to USA date format m-d-y
				$usdate = strftime("%m-%d-%Y", strtotime($datevar));
				return $usdate;
		  }else{
		        $date_arr = explode(" ", $datevar);				
				$date_arr1 = explode("-",$date_arr[0]);
				$time_arr = explode(":",$date_arr[1]);
				
				$hr  = $time_arr['0'];
				$m 	 = $time_arr['1'];				
				$sec = $time_arr['2'];
				$month = $date_arr1['1'];
				$day   = $date_arr1['2'];
				$year  = $date_arr1['0'];
				$usdate = date("m-d-y, g:i a",strtotime($datevar));
				
				return $usdate;
		  }	
			
		}
		
	function generatePassword() {
	      $temppasswd='';
	      for($i=1;$i<=2;$i++) {
		      $small=range('a', 'z');
		      $caps=range('A' ,'Z');
		      shuffle($caps);
		      shuffle($small);
		      $num=rand(1,25);
		      $temppasswd.=$caps[$num];
		      $temppasswd.=rand()%10;
		      $temppasswd.=$small[$num];
		      $temppasswd.=rand()%100;
	      }
	      return $temppasswd;
      }
      	


			
//==================================================================================================//
//=================================County , State ,City============================================//
	
/*	
	 * 	function    : countrydroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for country dropdown
	 * Created On   : 18-02-11 (03:10am)
 	 */		
	function countrydroupdown()
	{
       App::import("Model", "Country");
       $this->Country  =    &new Country();	       
   	   $countrydata  =  $this->Country->find("all", array('conditions' => ""),array('fields'=>array("DISTINCT Country.country_name","Country.country_id"))); 
       $countrydropdown = Set::combine($countrydata, '{n}.Country.country_id', '{n}.Country.country_name');
       asort($countrydropdown);
	   $this->set("countrydropdown", $countrydropdown);
	 
    } 

	// Remove from original aap controller from lib in pest here
	// By suman Singh
	function countryDropDown()
	{
      App::import("Model", "Country");
      $this->Country   =  &new Country();
   	  $countryDropDown =  $this->Country->find("all",array('fields'=>array("DISTINCT Country.country_name","Country.id"),'order'=>'Country.country_name ASC'));  //echo $countryDropDown; //exit;
      $countryDropDown = Set::combine($countryDropDown, '{n}.Country.id', '{n}.Country.country_name');
	  
	  $this->set("countryDropDown", $countryDropDown);
	 //$this->State->
    }
	
	// Remove from original aap controller from lib in pest here
	// By suman Singh
	function userTypeDropDown()
	{
       App::import("Model", "Usertype");
       $this->Usertype  =    &new Usertype();
   	   $UsertypeDropDown  =  $this->Usertype->find("all",array('fields'=>array("DISTINCT Usertype.usertype","Usertype.id"),'order'=>'Usertype.Usertype ASC')); 
       $UsertypeDropDown = Set::combine($UsertypeDropDown, '{n}.Usertype.id', '{n}.Usertype.usertype');
	   $this->set("Usertype", $UsertypeDropDown);
    }

    
/*	
	 * 	function    : statedroupdown()
	 * 	params      : $countryid
	 * 	Description : This function is used for state dropdown of related country
	 * Created On   : 18-02-11 (03:15am)
 	 */		
function statedroupdown($countryid='')
	{
		$cond="State.state_name !=''";
		if($countryid){
			$cond="";
			$cond = "State.country_id = '$countryid' AND State.state_name !=''";
		}else{
				$cond = "State.country_id = '254' AND State.state_name !=''";		
		}
		 
       		App::import("Model", "State");
       		$this->State  =    &new State();      

   	   	$statedata  =  $this->State->find("all", array('conditions' => "$cond"),array('fields'=>array("DISTINCT State.state_name","State.state_id"))); 
       		$statedropdown = Set::combine($statedata, '{n}.State.state_id', '{n}.State.state_name');
            asort($statedropdown);
	   	$this->set("statedropdown", $statedropdown);	 
    	}

/*	
	 * 	function    : citydroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for city dropdown for related state
	 * Created On   : 18-02-11 (03:15am)
 	 */		
function citydroupdown($stateid='')
	{
		$cond="City.city_name !=''";
		if($stateid){
			$cond="";
			$cond = "City.state_id = '$stateid' AND City.city_name !=''";
		}
	
       App::import("Model", "City");
       $this->City  =    &new City();
      
   	   $citydata  =  $this->City->find("all", array('conditions' => "$cond"),array('fields'=>array("DISTINCT City.city_name","City.city_id"))); 
       $citydropdown = Set::combine($citydata, '{n}.City.city_id', '{n}.City.city_name');
       asort($citydropdown);
	   $this->set("citydropdown", $citydropdown);
	 
    }    
      
	/*	
	 * 	function    : getstatename()
	 * 	params      : $countryid
	 * 	Description : This function is used to get state name by state id
	 * Created On   : 17-02-11 (07:50pm)
 	 */	
function getstatename($stateid)
		{
	
			
			App::import("Model", "State");
	        $this->State   = & new State();
		      $conditions = array("State.state_id" => $stateid);
			  $statename=$this->State->find('all', array('conditions' => $conditions));
			 if($statename){
			 	$usstatename =$statename[0]['State']['state_name']; 
			 }else{
			 	$usstatename="";
			 }	

			
			 return $usstatename;
			 	
		}
	/*	
	 * 	function    : getcountryname()
	 * 	params      : $countryid
	 * 	Description : This function is used to get country name by country id
	 * Created On   : 17-02-11 (07:50pm)
 	 */
		
function getcountryname($countryid)
		{
	
			
			App::import("Model", "Country");
	        $this->Country   = & new Country();
		      $conditions = array("Country.country_id" => $countryid);
			  $countryname=$this->Country->find('all', array('conditions' => $conditions));
				$countname =$countryname[0]['Country']['country_name'];
			      return $countname;
			
		}	

	/*	
	 * 	function    : getcityname()
	 * 	params      : $cityid
	 * 	Description : This function is used to get city name by city id
	 * Created On   : 17-02-11 (07:50pm)
 	 */
		
function getcityname($cityid)
		{
	
			
			App::import("Model", "City");
	        $this->City   = & new City();
		      $conditions = array("City.city_id" => $cityid);
			  $citydata=$this->City->find('all', array('conditions' => $conditions));
				$cityname =$citydata[0]['City']['city_name'];
			      return $cityname;
			
		}	

		
		
		
//=========================End Country, State, City==========================================//		
//==========================================================================================//		
//==========================================================================================//	
/*	
	 * 	function    : getprojecttypedaysapp()
	 * 	params      : $projecttypeid
	 * 	Description : This function is used to get project type days by $projecttypeid
	 * Created On   : 08-03-11 (06:45am)
 	 */
		
function getprojecttypedaysapp($projecttypeid){
	if($projecttypeid){

			App::import("Model", "ProjectType");
	        $this->ProjectType   = & new ProjectType();
	        
	        $conditions = array("ProjectType.id" => $projecttypeid,"ProjectType.active_status"=>"1","ProjectType.delete_status"=>"0");
			  $projecttypedata=$this->ProjectType->find('all', array('conditions' => $conditions));
				$projectarr =$projecttypedata[0]['ProjectType']['defaultdeliverydays'];
			      return $projectarr;
	}else{
		
			      
		return false;
	}
}
		/*	
	 * 	function    : getshippingdays()
	 * 	params      : $shippingid
	 * 	Description : This function is used to get shipping days by shipping id
	 * Created On   : 17-02-11 (07:50pm)
 	 */
		
	function getshippingdays($shippingid){
	if($shippingid){
			
			App::import("Model", "ShippingType");
	        $this->ShippingType   = & new ShippingType();

	        $conditions = array("ShippingType.id" => $shippingid,"active_status"=>"1","delete_status"=>"0");
		$shipdata=$this->ShippingType->find('all', array('conditions' => $conditions));

		$shipdays =$shipdata[0]['ShippingType']['shipdays'];
		   return $shipdays;
	
	}else{
		return false;
	}
	}

	function iscoinholder($userid){

		App::import("Model", "Holder");
	        $this->Holder   = & new Holder();

		$holder_details = $this->Holder->find('first', array('conditions' =>  "Holder.user_id  = '".$userid."'  and Holder.active_status='1' and Holder.delete_status='0'"));

		App::import("Model", "CoinsHolder");
	        $this->CoinsHolder   = & new CoinsHolder();

	        //$conditions = array("CoinsHolder.holder_id" =>$holder_details['Holder']['id'],"CoinsHolder.active_status"=>"1","CoinsHolder.delete_status"=>"0");
		$holderdata=$this->CoinsHolder->find('first', array('conditions' => "CoinsHolder.holder_id=".$holder_details['Holder']['id']." and CoinsHolder.active_status='1' and CoinsHolder.delete_status='0' "));


		//return $holderdata['CoinsHolder']['id']."user".$holder_details['Holder']['id'];
		if(is_array($holderdata) && !empty($holderdata)) return "true";
		else return "false";

		//if(sizeof($holderdata)>0) return true;
		//return false;
	}	
	/*
	 * Function name   : getcommenttypename()
	 * Description : This function used to collect comment type name
         * Created On      : 01-03-11 (03:22am)
         *
	 */ 	 
	function getcommenttypename($commenttypeid){	
		App::import("Model", "CommentType");
	        $this->CommentType   = & new CommentType();		
		$conditions = "CommentType.id = '".$commenttypeid."' AND  CommentType.delete_status = '0'";
		$commenttypearr =  $this->CommentType->find("first",array('conditions'=>$conditions));
		if(is_array($commenttypearr) && !empty($commenttypearr)) 
		{
			return $commenttypearr['CommentType']['comment_type_name'];
		}else{
			return '';
		}
	}
	/*
	 * Function name   : getcommenttypepurpose()
	 * Description : This function used to collect comment type name
         * Created On      : 01-03-11 (03:22am)
         *
	 */ 	 
	function getcommenttypepurpose($commenttypeid){	
		App::import("Model", "CommentType");
	        $this->CommentType   = & new CommentType();		
		$conditions = "CommentType.id = '".$commenttypeid."' AND  CommentType.delete_status = '0'";
		$commenttypearr =  $this->CommentType->find("first",array('conditions'=>$conditions));
		if(is_array($commenttypearr) && !empty($commenttypearr)) 
		{
			return $commenttypearr['CommentType']['comment_type_purpose'];
		}else{
			return '';
		}
	}
    
     /* Function name   : getCompanyTypeName()
     * Description : This function used to get Company type of a company
     * Created On      : 01-03-11 (03:22am)
     *
     */      
    function getCompanyTypeName($company_type_id){    
            App::import("Model", "CompanyType");
            $this->CompanyType   = & new CompanyType();
           $conditions = "CompanyType.id = '".$company_type_id."' AND  CompanyType.delete_status = '0'";
           $companytypearr =  $this->CompanyType->find("first",array('conditions'=>$conditions));
            if(is_array($companytypearr) && !empty($companytypearr)) 
            {
                $company_type_name= $companytypearr['CompanyType']['company_type_name'];
            }else{
                $company_type_name= '';
            }
            return $company_type_name;
    }
	
	 /* Function name   : getLocationType()
     * Description : This function used to get Location Type of a company
     * Created On      : 31-07-12 
     *
     */      
    function getLocationType($company_id){    
	   App::import("Model", "Company");
	   $this->Company   = & new Company();
	   $conditions = "Company.id = '".$company_id."' ";
	   $companydata =  $this->Company->find("first",array('conditions'=>$conditions));
	   $locationtype = $companydata['Company']['location_type_id'];
	   return ($locationtype=='0') ?'HQ':'Branch';
    }
	
	function getprojectdetails($projectid){
		App::import("Model", "Project");
	    $this->Project   = & new Project();

		$this->Project->bindModel(array('hasOne' => array('Sponsor' => array('foreignKey' => false,'conditions' => array('Sponsor.id = Project.sponsor_id' )))));

		$this->Project->bindModel(array('hasOne' => array('User' => array('foreignKey' => false,'conditions' => array('User.project_id = Project.id' )))));
	
		$this->Project->bindModel(array('hasOne' => array('ProjectType' => array('foreignKey' => false,'conditions' => array('ProjectType.id = Project.project_type_id' )))));

		$projectDetails = $this->Project->find("Project.id='".$projectid."' ",NULL,NULL,NULL,NULL,1);	

		return $projectDetails;
	}	
/*	
	 * 	function    : checkmaxfilesize()
	 * 	params      : $filepath,$imagesizemax
	 * 	Description : This function is used to check max uploaded size of image
	 *  Created On   :09-03-11 (08:45pm)
 	 */
	function checkmaxfilesize($filepath,$imagesizemax=''){
				
					$imagewidth = '';
					$imageheight = '';
					$newdiamentions="";
					if($imagesizemax){
					
						$expimagedi =  explode('x',$imagesizemax);
						$maxwidth = $expimagedi[0];
						$maxheight = $expimagedi[1];
					}
					if(file_exists($filepath)){

						$size = getimagesize($filepath);
						if($size){
								
							$imageorgwidth = $size[0];
							$imageorgheight = $size[1];
							##make image diamentions
							if($imageorgwidth > $maxwidth  && $imageorgheight > $maxheight){
								$newdiamentions = $imagesizemax;
								return $newdiamentions;
							}
							else if($imageorgwidth > $maxwidth  && $imageorgheight < $maxheight){
								$newdiamentions = $maxwidth."x".$imageorgheight;
								return $newdiamentions;
							}
							else if($imageorgwidth < $maxwidth  && $imageorgheight > $maxheight){
								$newdiamentions = $imageorgwidth."x".$maxheight;
								return $newdiamentions;
							}
							else if($imageorgwidth < $maxwidth  && $imageorgheight < $maxheight){
								$newdiamentions = $imageorgwidth."x".$imageorgheight;
								return $newdiamentions;
							}else{
								return $imagesizemax;
							}
						}else{
								return $imagesizemax;
							}
					
					}else{
							return $imagesizemax;
					}
											
		}
        
        
        
     /*    
     *     function    : contacttypedropdown()
     *     params      : n/a
     *     Description : This function is used for forms status type dropdown 
     *      Created On   : 21-02-11 (10:35pm)
     */        
function formstatustypedropdown($project_id)
    {
       App::import("Model", "FormSubmitStatustype");
       $this->FormSubmitStatustype  =    &new FormSubmitStatustype();
      $formsstatustypearray=array('FormSubmitStatustype'=> array('id'=>0, 'statustype_name'=>'New Submission','project_id'=>$project_id, 'active_status'=>'1', 'delete_status'=>'0'));
          $statustypedata  =  $this->FormSubmitStatustype->find("all", array('conditions' => "FormSubmitStatustype.active_status='1' AND FormSubmitStatustype.delete_status='0' AND FormSubmitStatustype.project_id in(0,'".$project_id."')",'order'=>'FormSubmitStatustype.created ASC'),array('fields'=>array("DISTINCT FormSubmitStatustype.statustype_name","FormSubmitStatustype.id")));
       array_push($statustypedata,$formsstatustypearray); 
       $statustype = Set::combine($statustypedata, '{n}.FormSubmitStatustype.id', '{n}.FormSubmitStatustype.statustype_name');
       asort($statustype);
       $this->set("formstatustypedropdown", $statustype);
     
    }   	
    
    	
   /***
   * Function to replace image path by project absoulte path 
   *  
   * @param mixed $emailContent
   */
    function replaceImgPathInEmailContent($emailContent){
   
          $emailContent = str_replace("../img","http://".$_SERVER['HTTP_HOST']."/img",$emailContent); 
          preg_match_all('/<img [^>]*src=["|\']([^"|\']+)/i', $emailContent, $matches);
          foreach ($matches[1] as $key=>$imgPath) {
              $correctPath=str_replace(" ","%20",$imgPath); 
              $emailContent = str_replace($imgPath,$correctPath,$emailContent);     
                     
          }
                 
        return $emailContent;
    }
    
    
    function getEventDropDownListByProjetcID($projectid='')
    {
       App::import("Model", "Event");
       $this->Event  =    &new Event();
       $eventcond="";
       $eventcond = $projectid ? " AND Event.project_id='".$projectid."'" : '';          
          $eventdata  =  $this->Event->find("all", array('conditions' => "Event.active_status='1' AND Event.delete_status='0' ".$eventcond,'order'=>'Event.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id"))); 
          $eventlist = Set::combine($eventdata, '{n}.Event.id', '{n}.Event.title');
          asort($eventlist);
          $this->set("eventdropdown", $eventlist);
     
    }    
    
    function getRecEventDropDownListByProjetcID($projectid='')
    {
       App::import("Model", "RecurringEvent");
       $this->RecurringEvent  =    &new RecurringEvent();
       $current_date=date('Y-m-d');
       $eventcond="";
       $eventcond = $projectid ? " AND RecurringEvent.project_id='".$projectid."' and RecurringEvent.start_date>='".$current_date."'" : '';          
          $eventdata  =  $this->RecurringEvent->find("all", array('conditions' => "RecurringEvent.active_status='1' AND RecurringEvent.delete_status='0' ".$eventcond,'order'=>'RecurringEvent.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id"))); 
          $eventlist = Set::combine($eventdata, '{n}.RecurringEvent.id', '{n}.RecurringEvent.event_title');
          asort($eventlist);
          $this->set("eventdropdown", $eventlist);
     
    }    
    
    
    /**
    * Function to retrun Member Types Array with KEY=>VALUE Pair
    * 
    */
    function getMemberTypesArray(){
            $member_types_array = array(
            "all"               =>  "All",
            "coin_holders"      =>  "Coin Holders",
            "non_coin_holders"  =>  "Non Coin Holders",
            "non_members"       =>  "Non Members"
            );
            
            return $member_types_array;
    }
    
    /**
    * Function to retrun Member Profile Subscription Types Array with KEY=>VALUE Pair
    * 
    */
    function getSubscriptionTypesArray($allfields=null){
             
        App::import("Model", "UserSubscriptionType");
        $this->UserSubscriptionType  =    &new UserSubscriptionType();
        $subscriptiondata  =  $this->UserSubscriptionType->find("all", array('conditions' => "UserSubscriptionType.active_status='1' AND UserSubscriptionType.delete_status='0' ",'order'=>'UserSubscriptionType.id ASC')); 
        if($allfields==null) {
          $subscriptiondata  =  $this->UserSubscriptionType->find("all", array('conditions' => "UserSubscriptionType.active_status='1' AND UserSubscriptionType.delete_status='0' ",'order'=>'UserSubscriptionType.id ASC')); 
          $subscription_types_array = Set::combine($subscriptiondata, '{n}.UserSubscriptionType.id', '{n}.UserSubscriptionType.subscription_type');
        }else{
            $subscription_types_array = $subscriptiondata;
        }
      
        return $subscription_types_array;
    }
    
     function getDefaultSubscriptionTypesChecks(){
             
        App::import("Model", "UserSubscriptionType");
        $this->UserSubscriptionType  =    &new UserSubscriptionType();
        $subscriptiondata  =  $this->UserSubscriptionType->find("all", array('conditions' => "UserSubscriptionType.active_status='1' AND UserSubscriptionType.delete_status='0' ",'order'=>'UserSubscriptionType.id ASC')); 
        $subscription_types_checks="";
        if($subscriptiondata){
            foreach($subscriptiondata as $type){
                if($subscription_types_checks=="") {
                    $subscription_types_checks=$type['UserSubscriptionType']['id'];
                }else{
                    $subscription_types_checks.=",".$type['UserSubscriptionType']['id'];   
                }
            }
        }    
        return $subscription_types_checks;
    }
    
    /**
    * Function to retrun Days Since - Member Reg., Coin Reg, Last Login etc Array with KEY=>VALUE Pair
    * 
    */
    function getDaysSinceArray(){
            $days_since_array = array(
                "dayssince_member_registration"               =>  "Registration-Member",
                "dayssince_coin_registration"      =>  "Registration-Coin",
                "dayssince_last_login"  =>  "Last Login"
            );
            
            return $days_since_array;
    }
    
    /**
    * Function to retrun Member Types Array with KEY=>VALUE Pair
    * 
    */
    function getEventRSVPArray(){
            $event_rsvp_array = array(
                "0"             =>  "No Response",
                "1"             =>  "Attending",
                "2"             =>  "May be Attending",
                "3"             =>  "Not Attending"
            );
            
            return $event_rsvp_array;
    }
    
    /**
    * Function to retrun Social Networks Array with KEY=>VALUE Pair
    * 
    */
    function getSocialNetworkArray(){
            $social_network_array = array(
                "facebook"          =>  "Facebook",
                "twitter"           =>  "Twitter",
                "google"            =>  "Google",
                "linkedin"          =>  "LinkedIn",
				"Pinterest"          =>  "Pinterest"
            );
            
            return $social_network_array;
    }
    
     /**
    * Function to retrun Social Networks Array with KEY=>VALUE Pair
    * 
    */
    function getRecurPatternkArray(){
            $recur_patter_array = array(
            		""          =>  "--Select--",
            	"Daily"          =>  "Daily",
                "Weekly"         =>  "Weekly",
                "Monthly"        =>  "Monthly",
                "Yearly"         =>  "Yearly"
            );
            
            return $recur_patter_array;
    }
    
   /**
   * Function to get members messages list
   *  
   * @param mixed $holderid - holder id
   * @param mixed $projectid - project id 
   */
    
     function getMemberMessageDropDownList($holderid, $projectid)
    {
       App::import("Model", "Message");
       $this->Message  =    &new Message();
       
       $messagecond ="AND Message.to_holderid='".$holderid."'  AND Message.project_id='".$projectid."'";
       
       $msgdata  =  $this->Message->find("all", array('conditions' => "Message.active_status='1' AND Message.delete_status='0' ".$messagecond,'order'=>'Message.created ASC'),array('fields'=>array("Message.msg_subject","Message.id"))); 
          $msglist = Set::combine($msgdata, '{n}.Message.id', '{n}.Message.msg_subject');
          return $msglist;
         // asort($msglist);
      //    $this->set("eventdropdown", $eventlist);
     
    }   
    
     function getMemberTypesListByProject($projectid='', $is_all=false)
    {
       App::import("Model", "MemberType");
       $this->MemberType  =    &new MemberType();
	   
       $mtypecond="";
       $mtypecond = $projectid ? " AND MemberType.project_id='".$projectid."'" : 'AND MemberType.project_id=0';          
          $mtypedata  =  $this->MemberType->find("all", array('conditions' => "MemberType.active_status='1' AND MemberType.delete_status='0' ".$mtypecond,'order'=>'MemberType.created ASC'),array('fields'=>array("DISTINCT MemberType.member_type","MemberType.id"))); 
          
          //pr($mtypedata);
		  $mtypelist = Set::combine($mtypedata, '{n}.MemberType.id', '{n}.MemberType.member_type');
          
          if($is_all){
            $mtypeall=array( "0" => "All")  ;
            $result = $result = $mtypeall + $mtypelist; // array_merge($mtypeall, $mtypelist);
          }else{
             $result =  $mtypelist; 
          }
          
		  return $result;
     //     asort($mtypelist);
       //   $this->set("projectmembertypedropdown", $mtypelist);
     
    }     
    
    
      function getDonationLevelsListByProject($projectid=0)
    {
       App::import("Model", "DonationLevel");
       $this->DonationLevel  =    &new DonationLevel();
       $levelcond="";
        $levelcond = $projectid ? " AND DonationLevel.project_id='".$projectid."'" : "AND DonationLevel.project_id=0";          
          $leveldata  =  $this->DonationLevel->find("all", array('conditions' => "DonationLevel.active_status='1' AND DonationLevel.delete_status='0' ".$levelcond,'order'=>'DonationLevel.created ASC'),array('fields'=>array("DISTINCT DonationLevel.level_name","DonationLevel.id"))); 
          $levellist = Set::combine($leveldata, '{n}.DonationLevel.id', '{n}.DonationLevel.level_name');
          return   $levellist;
     //     asort($mtypelist);
       //   $this->set("projectdonationleveldropdown", $levellist);
     
    }  
    
     function getMemberTypeIdByTypeName($typename, $projectid='')
    {
       App::import("Model", "MemberType");
       $this->MemberType  =    &new MemberType();
       $mtypecond="";
       $mtypecond = " MemberType.member_type='".$typename."' AND MemberType.project_id='".$projectid."' AND MemberType.active_status='1' AND MemberType.delete_status='0' " ;          
       $mtypedata  =  $this->MemberType->find("first", array('conditions' => $mtypecond)); 
       return $mtypedata;

    }       
    
    
    function getuseragreementlist($p_id)                          
    {
        App::import("Model", "Project");
       $this->Project  =    &new Project();
       
        //get user agreements
            $cont="UserAgreement.delete_status='0' and UserAgreement.active_status='1'";           
            $agreementdropdown=$this->UserAgreement->find('list',array('conditions'=>$cont,'fields'=>array('id','agreement_name')));        
            $this->set('agreementdropdown',$agreementdropdown);
            
            if($p_id!="")
            {                       
                $cont="Project.id='$p_id'";
                $selectedagreement=$this->Project->find('first',array('conditions'=>$cont,'fields'=>array('id','user_agreement_id'))); 
                $selectedagreement=$selectedagreement['Project']['user_agreement_id'];
                $this->set('selectedagreement',$selectedagreement);
            }
            
            if($p_id==0 || $selectedagreement=="")
            {                       
                $cont="UserAgreement.delete_status='0' and UserAgreement.active_status='1' and UserAgreement.default_new_projects='1'";           
                $selectedagreement=$this->UserAgreement->find('first',array('conditions'=>$cont,'fields'=>array('id','agreement_name'))); 
                $selectedagreement=$selectedagreement['UserAgreement']['id'];
                $this->set('selectedagreement',$selectedagreement);
            }
    }
	
	// By Suman 
	// Dated 25 April 2012
	function directoryFiles_dropdown($dirPath) {
		$fileCollection=array();
		$i=0;
		if( file_exists($dirPath) && is_dir( $dirPath ) ) {
		
			$dir = dir($dirPath);
			{
				while (($file = $dir->read()) !== false)
				{
					if ($file != "." && $file != ".." && $file != "Thumbs.db" ) {
						$fileCollection[$file]=$file;
					}
					$i++;
				}
			}
		}
		return $fileCollection;
	}
	
	
	// By Suman 
	// Dated 26 April 2012
	function cssvToarray($filePointer,$size) {
		//$csvcontent = fgetcsv($filePointer,$size);
		//pr($csvcontent);
		$arr = array();
		while (false !== $data = fgetcsv($filePointer, 0, ';')) {
			$arr[] = str_getcsv($data[0]); //$data[0];
		}
		return $arr;
	}
	
	// By Suman 
	// Dated 30 April 2012
	function project_status_types() {
		##import project type model for processing
		App::import("Model", "StatusType");
		$this->StatusType =   & new StatusType();
		
		$cont="StatusType.active_status	= '1' and StatusType.delete_status=0";       
        $statusdropdown=$this->StatusType->find('list',array('conditions'=>$cont,'fields'=>array('id','status_type')));
		//pr($statusdropdown);
		return $statusdropdown;
	}
	
	// By Suman 
	// Dated 8 June 2012
	function super_borderFooter_list() {
		##import project type model for processing
		App::import("Model", "BorderFooter");
		$this->BorderFooter =   & new BorderFooter();
		
		$cont="BorderFooter.active_status = '1' and BorderFooter.delete_status=0";       
        $footerdropdown=$this->BorderFooter->find('list',array('conditions'=>$cont,'fields'=>array('id','border_footer_name')));
		//pr($footerdropdown);
		return $footerdropdown;
	}
	
	// By Suman 
	// Dated 30 April 2012
	function billing_type() {
		##import project type model for processing
		App::import("Model", "BillingType");
		$this->BillingType =   & new BillingType();
		
		$cont="BillingType.delete_status= '0'";       
		//$cont="";       
        $billing_type_dropdown=$this->BillingType->find('list',array('conditions'=>$cont,'fields'=>array('id','billing_type')));
		//pr($statusdropdown);
		return $billing_type_dropdown;
	}
	
	function get_super_footer_content($pid=null) {
		App::import('Model','BorderFooter');
		$this->BorderFooter = new BorderFooter();
		
		$this->Project->bindModel(  
			array('belongsTo' => array(
						'BorderFooter' => array(
						'className' => 'BorderFooter',
						'conditions' => array('BorderFooter.active_status' => 1)
						)
					)
			)
		);
		
		$borderFooter_data = array();
		$borderFooter_data = $this->Project->find("first",array("conditions"=>array('Project.id' => $pid,'Project.is_superfooterenabled' => 1),'fields'=>array('Project.is_superfooterenabled','Project.border_footer_id','BorderFooter.*')));
		
		if(empty($borderFooter_data['Project']['border_footer_id']) || empty($borderFooter_data['Project']['is_superfooterenabled'])) 
		{
			$borderFooter2 = $this->Project->BorderFooter->find('first',array('conditions' => array('BorderFooter.is_default' => 1)));
			$borderFooter_data['BorderFooter'] = $borderFooter2['BorderFooter'];
		}
		//pr($borderFooter_data);
		$super_footer_content = $borderFooter_data['BorderFooter']['footer_content'];
		return $super_footer_content;
	}
	
	function get_project_border_footer_content($pid=null) {
		App::import('Model','ProjectBorderFooter');
		$this->ProjectBorderFooter = new ProjectBorderFooter();
		
		$projectBorderFooter_data = $this->ProjectBorderFooter->find("first",array("conditions"=>array('ProjectBorderFooter.project_id' => $pid,'ProjectBorderFooter.active' => 1),'fields'=>array('ProjectBorderFooter.page_footer_content')));
		$project_border_footer_content = $projectBorderFooter_data['ProjectBorderFooter']['page_footer_content'];
		return $project_border_footer_content;
	}
	
	function get_default_projectStatus() {
		##import project type model for processing
		App::import("Model", "StatusType");
		$this->StatusType =   & new StatusType();
		
		$statusdropdown=$this->StatusType->find('first',array('conditions'=>array('StatusType.active_status' => 1, 'StatusType.default' => 1 ),'fields'=>array('id')));
		if($statusdropdown['StatusType']['id'])
		return $statusdropdown['StatusType']['id'];
		else
		return 0;
		//return $statusdropdown;
	}
	
	function get_default_borderFooter() {
		App::import("Model", "BorderFooter");
		$this->BorderFooter =   & new BorderFooter();
		
		$footerdropdown=$this->BorderFooter->find('first',array('conditions'=>array('BorderFooter.active_status' => 1, 'BorderFooter.is_default' => 1 ),'fields'=>array('id')));
		
		if($footerdropdown['BorderFooter']['id'])
		return $footerdropdown['BorderFooter']['id'];
		else
		return 0;
		//return $statusdropdown;
	}
	
	function get_defaultProjectLead_id() {
		App::import("Model", "ContactType");
		$this->ContactType =  & new ContactType();
		
		$ProjectLead=$this->ContactType->find('first',array('conditions'=>array('ContactType.active_status' => 1, 'ContactType.project_lead' => 1, 'ContactType.delete_status' => "0" ),'fields'=>array('id')));
		
		if($ProjectLead['ContactType']['id'])
		return $ProjectLead['ContactType']['id'];
		else
		return 0;
		//return $statusdropdown;
	}
	
	function projectsRealted_to_contact($contactid = null) {
		##import ProjectContact model for processing
		App::import("Model", "ProjectContact");
		$this->ProjectContact =   & new ProjectContact();
		App::import("Model", "Project");
		$this->Project =   & new Project();
		$contactRelatedprojects = array();
		$contactRelatedprojects = $this->ProjectContact->bindModel(array(
											'belongsTo'=>array(
														'Project' => array(
														'fields' => array('Project.id','Project.project_name'),
														)
											)	
									)
		);							
		$ss =  $this->ProjectContact->find('all',array('conditions'=>array('ProjectContact.contact_id'=>$contactid)));
		$contactRelatedprojects = Set::combine($ss, '{n}.Project.id', '{n}.Project.project_name');
		
		return $contactRelatedprojects;
	}
	
	function projectsRealted_to_company($companyid = null) {
		##import ProjectOwner model for processing
		//$companyid = 42;
		App::import("Model", "ProjectOwner");
		$this->ProjectOwner =   & new ProjectOwner();
		App::import("Model", "Project");
		$this->Project =   & new Project();
		
		$companyRelatedprojects = array();
		$companyRelatedprojects = $this->ProjectOwner->bindModel(array(
											'belongsTo'=>array(
														'Project' => array(
														'fields' => array('Project.id','Project.project_name'),
														)
											)	
									)
		);
		$ss =  $this->ProjectOwner->find('all',array('conditions'=>array('ProjectOwner.owner_id'=>$companyid)));
		$companyRelatedprojects = Set::combine($ss, '{n}.Project.id', '{n}.Project.project_name');
		//print_r($companyRelatedprojects);
		//die("tets");
		return $companyRelatedprojects;
	}
	
	function getBillingPeriod($bid = null) {
		//$bid = 3;
		##import BillingType model for processing
		App::import("Model", "BillingType");
		$this->BillingType = & new BillingType();
		
		$ss = $this->BillingType->find('first',array('conditions'=>array('BillingType.id'=>$bid),'fields'=>array('billing_period')));
		//print_r($ss);
		$month = 0;
		if(!empty($ss) && isset($ss['BillingType']['billing_period'])) {
			switch($ss['BillingType']['billing_period']) {
			case 'Monthly':
				$month = 1;
				break;
			case 'Quarterly':
				$month = 3;
				break;
			case 'Annually':
				$month = 12;
				break;
			default:
				$month = 0;
				break;
			}
		}
		
		return $month;;
	}
	
	 function calculatenextdate($bid,$pdate){
		
	 	##import BillingType model for processing
		App::import("Model", "BillingType");
		$this->BillingType = & new BillingType();
		
		$ss = $this->BillingType->find('first',array('conditions'=>array('BillingType.id'=>$bid),'fields'=>array('billing_period','month_billing_day')));
		//print_r($ss);
		$month = 0;
		if(!empty($ss) && isset($ss['BillingType']['billing_period'])) {
			switch($ss['BillingType']['billing_period']) {
			case 'Monthly':
				$month = 1;
				break;
			case 'Quarterly':
				$month = 3;
				break;
			case 'Annually':
				$month = 12;
				break;
			default:
				$month = 0;
				break;
			}
		}
		if(!empty($ss['BillingType']['month_billing_day'])){
			$day = $ss['BillingType']['month_billing_day'];
		}else{
			$day = date("d", strtotime($pdate));
		}
		$tmp_date 	= strtotime(date("Y-m-d", strtotime($pdate)) . " +$month month");
		$nextBdate 	= date("Y-m-".$day,$tmp_date);
		return $nextBdate;
	 }

	function licenseAgreementCheck($pid = null, $uid = null,$lastLogin = null) {
		$flag = false; 
		App::import("Model", "Project");
        $this->Project =   & new Project();
		
		App::import("Model", "UserAgreement");
        //$this->UserAgreement =   & new UserAgreement();
		
		$this->Project->bindModel(  
			array('belongsTo' => array(
						'UserAgreement' => array(
						'className' => 'UserAgreement'
						)
					)
			)
		);
		
		$ss = $this->Project->find('first',array('conditions'=>array('Project.id'=>$pid),'fields'=>array('Project.id','UserAgreement.modified')));
		$dateA = $ss['UserAgreement']['modified'];
		//echo '<br />';
		$dateB = $lastLogin;
		
		if(strtotime($dateA) > strtotime($dateB)){ 
			// It means agreement is changed by SA and now PA need to agree with that.
			$flag = true;
		}
		return $flag;
	}	
	
	
	function getCompanyType($company_id){
	   //  Configure::write('debug', 2); 
	   App::import("Model", "Company");
       $this->Company  =    &new Company();
	   
	  
	   $this->Company->bindModel(array('belongsTo'=>array(
				'CompanyType'=>array(
				'foreignKey'=>'company_type_id'
       )))); 
	   
	   $conditions ='Company.id='.$company_id;
   	   $companytypedata  =  $this->Company->find("first", array('conditions' => $conditions,'fields'=>'CompanyType.company_type_name'));
	   return  $companytypedata['CompanyType']['company_type_name'];
	   
	}
	
	function getMerchantCategories($merchant_id){
	
	   App::import("Model", "Category");
       $this->Category  =    &new Category();
	   
		$this->Category->bindModel(array('hasOne'=>array(
				'CompanyToCategory'=>array(
				'foreignKey'=>false,
				'conditions'=> array('CompanyToCategory.company_id' => $merchant_id)
       )))); 
	   $conditions = 'CompanyToCategory.category_id =  Category.id';
	  	//$conditions ='';
   	   $categorydata  =  $this->Category->find("all", array('conditions' =>$conditions));
	   return  $categorydata;
	   
	}
	
	
/*	
	 * 	function    : getCompanyNameById()
	 * 	params      : n/a
	 * 	Description : This function is used for get company name
	 * Created On   : 11-07-12
 	 */		
	function getCompanyNameById($id)
	{
       App::import("Model", "Company");
       $this->Company  =    &new Company();
	   $conditions = ' Company.id = '.$id;	       
   	   $companyname  =  $this->Company->find("all", array('conditions' => $conditions, 'fields' => 'Company.company_name, Company.id')); 
	   return $companyname[0]['Company'];
    } 
	
	
	function otherLocations($company_id='-1', $hq_id='-1', $location_type)
	{  //Configure::write('debug', 2); 
       App::import("Model", "Company");
       $this->Company  =    &new Company();
	   $hqid = ($hq_id==0)? $company_id : $hq_id;
	   $conditions = ' ( Company.hq_id ="'. $hqid.'" OR Company.id ="'. $hqid.'" ) AND Company.id != '.$company_id;	       
   	   $otherlocations  =  $this->Company->find("all", array('conditions' => $conditions, 'fields' => 'Company.company_name, Company.id, Company.location_type_id, Company.hq_id, Company.address1, Company.address2, Company.city, Company.state')); 
	   return $otherlocations;
    } 
	
	/*	
	 * 	function    : categorydroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for category dropdown
	 * Created On   : 10-07-12
 	 */		
	function categorydropdown()
	{
       App::import("Model", "Category");
       $this->Category  =    &new Category();
	   $conditions = ' Category.delete_status=0 AND Category.active_status IN (1,0)';	       
   	   $categorydata  =  $this->Category->find("all", array('conditions' => $conditions)); 
	   $categorydropdown = Set::combine($categorydata, '{n}.Category.id', '{n}.Category.category_name');
       asort($categorydropdown);
	   $this->set("categorydropdown", $categorydropdown);
	 
    } 	
	
	/*	
	 * 	function    : nonprofittypedroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for Non-Profit Types dropdown
	 * Created On   : 13-07-12
 	 */		
	function nonprofittypedropdown()
	{
	   $conditions = ''; //' NonProfitType.delete_status=0 AND NonProfitType.active_status = 1';	         
   	   $nonprofittypedata  =  $this->NonProfitType->find("all", array('conditions' => $conditions)); 
       $nonprofittypedropdown = Set::combine($nonprofittypedata, '{n}.NonProfitType.id', '{n}.NonProfitType.non_profit_type_name');
       asort($nonprofittypedropdown);
	   $this->set("nonprofittypedropdown", $nonprofittypedropdown);
    } 
	
	function getNonProfitTypeByCompanyId($companyid){
	  // Configure::write('debug', 2); 
	   App::import("Model", "Company");
       $this->Company  =    &new Company();
	  
	   $this->Company->bindModel(array('belongsTo'=>array(
				'NonProfitType'=>array(
				'foreignKey'=>'	non_profit_type_id'
       )))); 
	   
	   $conditions ='Company.id='.$companyid;
   	   $nonprofittypedata  =  $this->Company->find("all", array('conditions' => $conditions,'fields'=>'NonProfitType.non_profit_type_name'));
	   return  $nonprofittypedata[0]['NonProfitType']['non_profit_type_name'];
	}
	
	
	function offertypetempdropdown()
	{    
	   App::import("Model", "OfferTypeTemplate");
       $this->OfferTypeTemplate  =    &new OfferTypeTemplate();
   	   $offertypedata  =  $this->OfferTypeTemplate->find("all", array('order'=> array('OfferTypeTemplate.id'))); 
       $offertypetempdropdown = Set::combine($offertypedata, '{n}.OfferTypeTemplate.id', '{n}.OfferTypeTemplate.offer_type_template_name');
       asort($offertypetempdropdown);
	   $this->set("offertypetempdropdown", $offertypetempdropdown);
    } 
	
	function offertypedropdown()
	{    
	   App::import("Model", "OfferType");
       $this->OfferType  =    &new OfferType();
   	   $offertypedata  =  $this->OfferType->find("all", array('order'=> array('OfferType.id'))); 
       $offertypedropdown = Set::combine($offertypedata,  '{n}.OfferType.id', '{n}.OfferType.offer_type_name');
       asort($offertypedropdown);
	   $this->set("offertypedropdown", $offertypedropdown);
    } 
    
    function getOfferTypeDropdown()
    {
    	App::import("Model", "OfferType");
    	$this->OfferType  =    &new OfferType();
    	$offertypedata  =  $this->OfferType->find("all", array('order'=> array('OfferType.id')));
    	$offertypedropdown = Set::combine($offertypedata,  array('{0}', '{n}.OfferType.id'), '{n}.OfferType.offer_type_name');
    	asort($offertypedropdown);
    	$this->set("offertypedropdown", $offertypedropdown);
    }
	
	
	function getMerchantByProject($projectid)
	{    
	   App::import("Model", "Company");
       $this->Company  =    &new Company();
		$conditions = 'Company.company_type_id = 66 AND Company.project_id = '.$projectid;
   	   $merchantdata  =  $this->Company->find("all", array('conditions'=>$conditions, 'order'=> array('Company.company_name'))); 
       $merchantdropdown = Set::combine($merchantdata,  '{n}.Company.id', '{n}.Company.company_name');
       asort($merchantdropdown);
	   $this->set("merchantdropdown", $merchantdropdown);
    }
	
	function getProjectList($relatedproductid=null)
	{    
		
	    App::import("Model", "Project");
	    $this->Project   = & new Project();
		$this->Project->bindModel(array('hasOne' => array('Sponsor' => array('foreignKey' => false,'conditions' => array('Sponsor.id = Project.sponsor_id' )))));
		$this->Project->bindModel(array('hasOne' => array('User' => array('foreignKey' => false,'conditions' => array('User.project_id = Project.id' )))));
		$this->Project->bindModel(array('hasOne' => array('ProjectType' => array('foreignKey' => false,'conditions' => array('ProjectType.id = Project.project_type_id' )))));
		
		$projectData = $this->Project->find("all", "",NULL,NULL,NULL,NULL,1);	
		
		 $projectList ='';
		foreach($projectData as $project):
			  $projectList .= '<tr><td><input type="checkbox" id="projectcheck'.$project['Project']['id'].'" name="data[RelatedProject][ids][]" value="'.$project['Project']['id'].'" ';
			  if($relatedproductid!=null)
			  $projectList .= (in_array($project['Project']['id'], $relatedproductid)) ?'checked="checked"':'';
			  
			  
			  $projectList .= '/></td> <td>'.$project['Project']['project_name'].'</td><td>'.$project['Sponsor']['city'].'</td><td>'. $this->getstatename($project['Sponsor']['state']).'</td></tr>';
		endforeach;
									  
	    $this->set("projectList", $projectList);
		return $projectList;
    }
	
	function getMerchantLocations($merchantid='-1', $hq_id='-1'){

       App::import("Model", "Company");
       $this->Company  =    &new Company();	  
	   $this->Company->bindModel(array('belongsTo'=>array(
            'State'=>array(
            'foreignKey'=>false,
			'conditions'=>'Company.state=State.state_id'
        ))));
	   
	   $id = ($hq_id==0)? $merchantid : $hq_id;
	   $conditions = ' ( Company.hq_id ="'. $id.'" OR Company.id ="'. $id.'" ) ';	       
   	   $locationsdata  =  $this->Company->find("all", array('conditions' => $conditions)); 
	   $locations = Set::combine($locationsdata, '{n}.Company.id', array('{0} {1}{2} {3} {4}', '{n}.Company.id', '{n}.Company.address1', '{n}.Company.address2', '{n}.Company.city', '{n}.State.state_name'));
       asort($locations);
	   return $locations;
	}
	
	
	function getFontDropDown(){
		 App::import("Model", "Font");
		 $this->Font  =    &new Font();	 
		 $fontdata  =  $this->Font->find("all");
		 $fontdropdown = Set::combine($fontdata, '{n}.Font.title', '{n}.Font.title'); 
		 asort($fontdropdown);
		 $this->set("fontdropdown", $fontdropdown);
	
	}
		
		
	/*	
	 * 	function    : getCategoryDroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for category dropdown
	 * Created On   : 27-08-12
 	 */		
	function getCategoryDropdown()
	{
	   App::import("Model", "Category");
       $this->Category  =    &new Category();
	   $conditions = ' Category.delete_status=0 AND Category.active_status in(1,0) AND parent_category=0';	       
   	   $categorydata  =  $this->Category->find("all", array('conditions' => $conditions)); 
       $categorydropdown = Set::combine($categorydata, '{n}.Category.id', '{n}.Category.category_name');
       asort($categorydropdown);
	   return $categorydropdown;
    } 
	
	/*	
	 * 	function    : getSubCategoryDroupdown($categoryid)
	 * 	params      : n/a
	 * 	Description : This function is used for sub category dropdown
	 * Created On   : 27-08-12
 	 */		
	function getSubCategoryDropdown($categoryid)
	{
		

		if($categoryid == 0 || $categoryid == '' ){
			$subcategorydropdown = array();
			return  $subcategorydropdown;
		}
       App::import("Model", "Category");
       $this->Category  =    &new Category();
	   $conditions = ' Category.delete_status=0 AND Category.active_status in(1,0) AND parent_category='.$categoryid;	       
   	   $subcategorydata  =  $this->Category->find("all", array('conditions' => $conditions)); 
       $subcategorydropdown = Set::combine($subcategorydata, '{n}.Category.id', '{n}.Category.category_name');
       asort($subcategorydropdown);
		//$this->set('selected_sub_category',$subcategorydropdown);
	       return  $subcategorydropdown;
    }
	
	
	/*	
	 * 	function    : getCompanyTypeCategoryDropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for get company type category
	 *  Created On   : 28-08-12
 	 */	
	
	function getCompanyTypeCategoryDropdown()
	{
       App::import("Model", "CompanyTypeCategory");
       $this->CompanyTypeCategory  =    &new CompanyTypeCategory();	       
   	   $companytypecategorydata  =  $this->CompanyTypeCategory->find("all"); 
       $companytypecategorydropdown = Set::combine($companytypecategorydata, '{n}.CompanyTypeCategory.id', '{n}.CompanyTypeCategory.company_type_category_name');
       asort($companytypecategorydropdown);
	   return  $companytypecategorydropdown;
    }
	
	/*	
	 * 	function    : getCompanyTypeStatusDropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for get company type status
	 *  Created On   : 28-08-12
 	 */	
	 
	
	function getCompanyTypeStatusDropdown()
	{
       App::import("Model", "CompanyTypeStatus");
       $this->CompanyTypeStatus  =    &new CompanyTypeStatus();	       
   	   $companytypestatusdata  =  $this->CompanyTypeStatus->find("all"); 
       $companytypestatusdropdown = Set::combine($companytypestatusdata, '{n}.CompanyTypeStatus.id','{n}.CompanyTypeStatus.company_type_status_name');
       asort($companytypestatusdropdown);
	   return  $companytypestatusdropdown;
    }
		//**********************************Add on 29-08-2012**********************************************
	/*	
	 * 	function    : merchantcompanytypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for company type dropdown
	 * Created On   : 18-02-11 (02:20am)
 	 */	
	function merchantcompanytypedropdown($projectid='')
	{
 
       Configure::write('debug',0);
    	App::import("Model", "CompanyType");
    	$this->CompanyType  =    &new CompanyType();
    	$typecond="";
    	$typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';
    	
    	$this->CompanyType->bindModel(array('hasOne' => array('CompanyTypeCategory' => array('foreignKey' => false,'conditions' => array('CompanyTypeCategory.id = CompanyType.company_type_category_id' )))));
     	$conditions = "CompanyType.active_status='1' AND CompanyType.company_type_category_id ='2'  AND  CompanyType.company_type_status_id in(2,4) AND CompanyType.delete_status='0' ".$typecond;
    	
    	$companytypedata  =  $this->CompanyType->find("all", array('conditions' => $conditions,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id")));
    	$companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyTypeCategory.company_type_category_name');
		//echo '<pre>';print_r($companytypes);die;
    	
    	asort($companytypes);
	   $this->set("merchantcompanytypedropdown", $companytypes);
	 
    }    
	

	/*	
	 * 	function    : categorydroupdown()
	 * 	params      : n/a
	 * 	Description : This function is used for category dropdown
	 * Created On   : 10-07-12
 	 */		
	function getprojectcontact($projectid ='')
	{
      
	   App::import("Model", "Contact");
       $this->Contact  =    &new Contact();
	    $conditions = " Contact.delete_status = '0' AND Contact.active_status = '1' AND Contact.project_id=$projectid";	       
   	   $contactdata  =  $this->Contact->find("all", array('conditions' => $conditions)); 
       $contactdatadropdown = Set::combine($contactdata, '{n}.Contact.id', array('{0} {1}',
	   '{n}.Contact.firstname','{n}.Contact.lastname'));
       asort($contactdatadropdown);
	  return $contactdatadropdown;
	 
    } 
	
	//**********************************Add on 29-08-2012**********************************************
	/*	
	 * 	function    : nonprofitcompanytypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for company type dropdown
	 * Created On   : 18-02-11 (02:20am)
 	 */	
	function nonprofitcompanytypedropdown($projectid='')
	{
 
      /* App::import("Model", "CompanyType");
       $this->CompanyType  =    &new CompanyType();	   
	    $typecond="";       
	   $typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';          
   	   $companytypedata  =  $this->CompanyType->find("all", array('conditions' => "CompanyType.active_status='1' AND CompanyType.company_type_category_id ='4' AND  CompanyType.company_type_status_id in(5,2) AND CompanyType.delete_status='0' ".$typecond,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id"))); 
	   print_r($companytypedata);
       $companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyType.company_type_name');
	   
	   
	   
	   */
	   
	   
	    Configure::write('debug',0);
    	App::import("Model", "CompanyType");
    	$this->CompanyType  =    &new CompanyType();
    	$typecond="";
    	$typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';
    	
    	$this->CompanyType->bindModel(array('hasOne' => array('CompanyTypeCategory' => array('foreignKey' => false,'conditions' => array('CompanyTypeCategory.id = CompanyType.company_type_category_id' )))));
     	$conditions = "CompanyType.active_status='1' AND CompanyType.company_type_category_id ='4'  AND  CompanyType.company_type_status_id in(2,4) AND CompanyType.delete_status='0' ".$typecond;
    	
    	$companytypedata  =  $this->CompanyType->find("all", array('conditions' => $conditions,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id")));
    	$companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyTypeCategory.company_type_category_name');
	   
	   
	   
	   
	   
	   
	   asort($companytypes);
	   $this->set("nonprofitcompanytypedropdown", $companytypes);
	 
    }  
	
		/**function    : nonprofittype()
	 * 	params      : n/a
	 * 	Description : This function is used for company type dropdown
	 * Created On   : 18-02-11 (02:20am)
 	 */	
	function getnonprofittype()
	{ 
      // App::import("Model", "NonProfitType");
      // $this->NonProfitType  =    &new NonProfitType();
       $nonprofittypedata  =  $this->NonProfitType->find("all", array('conditions' => "NonProfitType.active_status='1' AND NonProfitType.delete_status='0' ")); 
	   //print_r($nonprofittypedata);
       $nonprofittypes = Set::combine($nonprofittypedata, '{n}.NonProfitType.id', '{n}.NonProfitType.non_profit_type_name');
	   asort($nonprofittypes);
	   
	   $this->set("nonprofittype", $nonprofittypes);	 
    }  
	
	function releatednonprofit($projectid='',$company_type_status_id='')
	{
 	   $releatednonprofitdata = array();
	   App::import("Model", "Company");
       $this->Company  =    &new Company();	  
	   App::import("Model", "CompanyType");
       $this->CompanyType  =    &new CompanyType();	

       /*$condition_ct = 'CompanyType.company_type_category_id = "4" AND CompanyType.company_type_status_id IN(2,4) '; 
       $ctdata = $this->CompanyType->find("all", array('conditions' =>$condition_ct));
       echo "<pre>";
       print_r( $ctdata); exit;
       */
       
	   $this->Company->bindModel(array('belongsTo'=>array(
            'CompanyType'=>array(
            'foreignKey'=>false,
			'conditions'=>'CompanyType.id=Company.company_type_id'
       ))));
	   
       $typecond=" AND Company.project_id=".$projectid;       
	   $releatednonprofitdata  =  $this->Company->find("all", array('conditions' => "Company.active_status='1' AND Company.delete_status='0' AND CompanyType.active_status='1'  AND CompanyType.company_type_status_id ='$company_type_status_id' AND CompanyType.delete_status='0' ".$typecond)); 
	   return $releatednonprofitdata;
}  

/*	
	 * 	function    : merchantcompanytypedropdown()
	 * 	params      : n/a
	 * 	Description : This function is used for company type dropdown
	 * Created On   : 18-02-11 (02:20am)
 	 */	
function vendorcompanytype($projectid='',$parmas='')
	{
       App::import("Model", "CompanyType");
       $this->CompanyType  =    &new CompanyType();
 
	   if($parmas=='Vendor'){
	   	$company_type_category_id ='1';
	   }else if($parmas=='Sales'){
	   	$company_type_category_id ='3';
	   }
	   else if($parmas=='Advertiser'){
	   	$company_type_category_id ='5';
	   }
	   else if($parmas=='Other'){
	   	$company_type_category_id ='6';
	   }
       $typecond="";
       
	   $typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';  
	   
	   
	   $this->CompanyType->bindModel(array('hasOne' => array('CompanyTypeCategory' => array('foreignKey' => false,'conditions' => array('CompanyTypeCategory.id = CompanyType.company_type_category_id' )))));
     	$conditions = "CompanyType.active_status='1' AND CompanyType.company_type_category_id ='$company_type_category_id'  AND  CompanyType.company_type_status_id in(2,4) AND CompanyType.delete_status='0' ".$typecond;
    	
    	$companytypedata  =  $this->CompanyType->find("all", array('conditions' => $conditions,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id")));
    	$companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyTypeCategory.company_type_category_name');
	   
	   
	   
	   
	   
	   
	   
	   
	           
   	 /*  $companytypedata  =  $this->CompanyType->find("all", array('conditions' => "CompanyType.active_status='1' AND CompanyType.company_type_category_id ='$company_type_category_id' AND  CompanyType.company_type_status_id in(2,4) AND CompanyType.delete_status='0' ".$typecond,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id"))); 
       $companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyType.company_type_name');
	   */
	   //print_r($companytypes);
	   asort($companytypes);
	   $this->set("vendorcompanytype", $companytypes);
	 
    }

    /*
     * 	function     : getCompanyTypeDropdown()
     * 	params       : n/a
     * 	Description  : This function is used for company type dropdown
     * 	Created On   : 05-September-2012 
     */
    function getCompanyTypeDropdown($projectid='', $companycateogry='', $companystatus='')
    {
    	
		App::import("Model", "CompanyType");
    	$this->CompanyType  =    &new CompanyType();
    	$typecond="";
    	$typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';
    	$this->CompanyType->bindModel(array('hasOne' => array('CompanyTypeCategory' => array('foreignKey' => false,'conditions' => array('CompanyTypeCategory.id = CompanyType.company_type_category_id' )))));
    	
    	$conditions = "CompanyType.active_status='1' AND CompanyType.company_type_status_id in(".implode($companystatus,',').") AND CompanyType.delete_status='0' ".$typecond;
    	
     	if($companycateogry == 7){
     		$conditions .= " AND CompanyType.company_type_category_id NOT IN(1,2,3,4,5,6) ";
     	}else {
     		if($companycateogry != ""){
     			$conditions .= " AND CompanyType.company_type_category_id ='".$companycateogry."' ";
     		}
     	}
    	$companytypedata  =  $this->CompanyType->find("all", array('conditions' => $conditions,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id")));
    $companytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyTypeCategory.company_type_category_name');
    	asort($companytypes);
    	$this->set("companytypedropdown", $companytypes);
    }
	/*GetEmailcompanytype dropdown*/
	function getprospectemailcompanydropdown($projectid='')
	{
       App::import("Model", "CompanyType");
       $this->CompanyType  =    &new CompanyType();
	   $typecond="";       
	   $typecond = $projectid ? " AND CompanyType.project_id in('0','".$projectid."')" : '';          
   	   $companytypedata  =  $this->CompanyType->find("all", array('conditions' => "CompanyType.active_status='1' AND  CompanyType.company_type_status_id in(2,4) AND CompanyType.delete_status='0' ".$typecond,'order'=>'CompanyType.created ASC'),array('fields'=>array("DISTINCT CompanyType.company_type_name","CompanyType.id"))); 
       $prsoemailcompanytypes = Set::combine($companytypedata, '{n}.CompanyType.id', '{n}.CompanyType.company_type_name');
	   //print_r($companytypes);
	   asort($companytypes);
	   $this->set("prsoemailcompanytypes", $prsoemailcompanytypes);	 
    }
	
	/*	
	 * 	function    : getprospecttemplatename()
	 * 	params      : $projectid
	 * 	Description : This function is used for custom template listing
	 * Created On   : 07-09-2012 
 	 */
	 function getmailtemplates($project_id ='',$typeid){	 
			 App::import("Model", "EmailTemplate");
			 $this->EmailTemplate  =    &new EmailTemplate();
			   $condition = "EmailTemplate.project_id IN(0,$project_id) AND EmailTemplate.delete_status='0' AND EmailTemplate.active_status='1' AND EmailTemplate.is_sytem ='1' AND EmailTemplate.is_event_temp='0' AND EmailTemplate.email_template_type In('0',$typeid)" ;
			  $emailtempdtlarr = $this->EmailTemplate->find('all',array("conditions"=>$condition));
			
			  $emailtemplates = Set::combine($emailtempdtlarr, '{n}.EmailTemplate.id', '{n}.EmailTemplate.email_template_name');
			$this->set("templatedropdown", $emailtemplates);
	 }
	 
	function getcondSubCategoryDropdown($categoryid='0')
	{
		
		if($categoryid == 0 || $categoryid == '' ){
			$subcategorydropdown = array();
			return  $subcategorydropdown;
		}
       App::import("Model", "Category");
       $this->Category  =    &new Category();
	   $conditions = ' Category.delete_status=0 AND Category.active_status in(1,0) AND parent_category='.$categoryid;	       
   	   $subcategorydata  =  $this->Category->find("all", array('conditions' => $conditions)); 
       $subcategorydropdown = Set::combine($subcategorydata, '{n}.Category.id', '{n}.Category.category_name');
       asort($subcategorydropdown);
       $this->set('selectedsubcategory',$subcategorydropdown);
    }
    
    function getCompanyWebPageList($projectid, $companyid='-1'){
    	
    	App::import("Model", "Content");
    	$this->Content = & new Content();
     	$conditions = ' Content.project_id="'.$projectid.'" AND Content.company_id ="'.$companyid.'"';
    	$webpagedata  =  $this->Content->find("all", array('conditions' => $conditions));
    	$webpagedropdown = Set::combine($webpagedata, '{n}.Content.id', '{n}.Content.title');
    	asort($webpagedropdown);
    	$this->set('webpagedropdown',$webpagedropdown);
    	    	
    }
	
    
    function getMerchantListForOffer($projectid)
    {
    	App::import("Model", "Company");
    	$this->Company  =    &new Company();
    	$this->Company->bindModel(array('belongsTo'=>array(
    			'CompanyType'=>array(
    					'foreignKey'=>'company_type_id'
    	))));
    	
    	$conditions = ' CompanyType.company_type_status_id IN (3,5,2,4) AND CompanyType.company_type_category_id = 2 AND Company.hq_id =0 AND Company.project_id = '.$projectid;
    	$merchantdata  =  $this->Company->find("all", array('conditions'=>$conditions, 'order'=> array('Company.company_name')));
    	$merchantdropdown = Set::combine($merchantdata,  '{n}.Company.id', '{n}.Company.company_name');
    	asort($merchantdropdown);
    	$this->set("merchantdropdown", $merchantdropdown);
    }	
    
    /*
     * 	function    : getCategoryForOffer()
    * 	params      : n/a
    * 	Description : This function is used for category dropdown for offer
    * Created On   : 09-Oct-2012
    */
    function getCategoryForOffer()
    {
    	App::import("Model", "Category");
    	$this->Category  =    &new Category();
    	$conditions = ' Category.delete_status=0 AND Category.active_status IN (1,0) AND Category.parent_category = 0';
    	$categorydata  =  $this->Category->find("all", array('conditions' => $conditions));
    	$categorydropdown = Set::combine($categorydata, '{n}.Category.id', '{n}.Category.category_name');
    	asort($categorydropdown);
    	$this->set("categorydropdown", $categorydropdown);

    }
    
    function getOfferResponders($projectid="0"){
    	
    	##import EmailTemplate  model for processing
		
    	App::import("Model", "EmailTemplate");
    	$this->EmailTemplate =   & new EmailTemplate();
    	$condition = "EmailTemplate.project_id IN (0,'$projectid') AND EmailTemplate.delete_status='0' AND EmailTemplate.is_sytem='0' and (EmailTemplate.is_event_temp='0' or is_event_temp='' or is_event_temp is NULL)";
    	$condition .= " AND (EmailTemplate.responder_type ='offer' OR EmailTemplate.override_all ='1')  " ;
    	$emailtempdtlarr = $this->EmailTemplate->find('all',array("conditions"=>$condition));
    	$responderdropdown = Set::combine($emailtempdtlarr,  '{n}.EmailTemplate.id', '{n}.EmailTemplate.email_template_name');
    	asort($responderdropdown);
    	$this->set("responderdropdown", $responderdropdown);
    	
    }
    
    function getMerchantLocationsForOffer($merchantid='-1', $hq_id='-1'){
    
    	App::import("Model", "Company");
    	$this->Company  =    &new Company();
    	$this->Company->bindModel(array('belongsTo'=>array(
    			'State'=>array(
    					'foreignKey'=>false,
    					'conditions'=>'Company.state=State.state_id'
    			))));
    
    	$id = ($hq_id==0)? $merchantid : $hq_id;
    	$conditions = ' ( Company.hq_id ="'. $id.'" OR Company.id ="'. $id.'" ) ';
    	$locationsdata  =  $this->Company->find("all", array('conditions' => $conditions));
    	return $locationsdata;
    }
	function getPlayerNonProfit($projectId){
		App::import("Model", "Company");
		$this->Company =   & new Company();
		$this->Company->bindModel(array('belongsTo'=>array(
				'CompanyType'=>array(
						'foreignKey'=>'company_type_id'
		))));
		$this->CompanyType->bindModel(array('belongsTo'=>array(
				'CompanyTypeCategory'=>array(
						'foreignKey'=>'company_type_category_id'
		))));
		
		$this->Company->bindModel(array('belongsTo'=>array(
				'NonProfitType'=>array(
						'foreignKey'=>'non_profit_type_id'
		))));
		$condition = "Company.delete_status = '0' AND Company.project_id = '$projectId'";
		$condition .=' AND CompanyType.company_type_status_id IN (3,5) AND CompanyType.company_type_category_id =4';
		$playerNonProfitArr = $this->Company->find('all',array("conditions"=>$condition, 'order' =>$order, 'limit' => $limit, 'page' => $page));
		$playerNonProfitDropdown = Set::combine($playerNonProfitArr,  '{n}.Company.id', '{n}.Company.company_name');
    	asort($playerNonProfitDropdown);
    	$this->set("playerNonProfitDropdown", $playerNonProfitDropdown);
		
	}
    function getPlayerCoins($projectId){
		 App::import("Model", "Coinset");
         $this->Coinset =   & new Coinset();
		 $condition = "Coinset.project_id = '$projectId' AND Coinset.delete_status='0'";
		 $coinsetdtlarr = $this->Coinset->find('all',array("conditions"=>$condition));
		 $coinsetdtlDropdown = Set::combine($coinsetdtlarr,  '{n}.Coinset.id', '{n}.Coinset.startserialnum');
    	asort($coinsetdtlDropdown);
    	$this->set("coinsetdtlDropdown", $coinsetdtlDropdown);
	}
    function pl($data){
    	Configure::write('debug',2);
    	pr($data);
    	exit;
    }
	
}
?>
