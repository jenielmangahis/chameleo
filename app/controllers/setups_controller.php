<?php
	 /* Project		   :-  Image coin website
    * Controller Name :-  setups_contoller.php
    * Created  On     :-  20-04-12             
    */
	class SetupsController extends AppController 
    {
		 var $name = 'Setups';
       //var $uses = 'Setup';
        var $layout = 'new_admin_layout';
        var $helpers = array('Tinymce','Pagination','Html', 'Form','Session','Qrcode','Javascript','Fck','Csv','csv','Common','Calendar');
        var $components = array('Backup','EmailTemplates', 'ForceDownload', 'Cookie','Pagination','File','Sendemail','RequestHandler');
        var $uses = array('Route','Point','ProductType','PricingType','CoinsHolder','Sponsor','Coinset','Holder','ProjectType','PointArchiveUser','MailFooter','RecurringEvent','Content','SystemVersion','SystemPricing','PriceTypeOption','UserAgreement','SpamPolicy','Term');

        function pagenotavailable(){
            $this->layout = "";
        }

        function beforeFilter() {
            $projectid = $this->Session->Read('sessionprojectid');
            if($projectid) {
                App::import("Model", "Project");
                $this->Project =   & new Project();
                $fields=array('project_name','url');
                $data=$this->Project->find("first",array("fields"=>$fields,"conditions"=>array("Project.id"=>$projectid)));
                $this->Session->write("projectwebsite_name_admin",$data['Project']['project_name']);
                $this->set('data',$data);
                if(!empty($data['Project']['url'])){
                    $redirect=$data['Project']['url'];
                    $this->set('redirect',"http://".$redirect); 
                }
                else{

                    $current_domain= $_SERVER['HTTP_HOST'];    
                    $redirect="http://".$current_domain.'/'.$data['Project']['project_name'];
                    $this->set('redirect',$redirect);     
                }
            }
        }

		/* ----------------------------------------BEG OF CHANGE PASSWORD INFO ------------------------------------------------ */ 
        /*
        * Function name   : changePassword()
        * Description : This function used to update password
        * Created On      : 20-04-2012
        */ 
        function super_admin_changepassword()
        {
            ##check admin session live or not
            $this->session_check_admin();
            ##import admin model for processing
            App::import("Model", "Admin");
            $this->Admin =   & new Admin();
             $passwd=md5($this->data['Admin']['password']);
            $adminSess = $this->Session->read("Admin");
			$this->Admin->id = $adminSess['Admin']['id']; //$_SESSION['Admin']['id'];          
            if(!empty($this->data)) 
            { 
                if($this->Admin->saveField('password',$passwd))
                {
                    $this->Session->setFlash('Password changed Successfully. Please login with new password.','default', array('class' => 'successmsg'));
                    //$this->logout();
					$this->redirect(array("controller"=>"admins" , "action"=>"logout"));
					//$this->redirect("/admins/logout/");

                }
                else
                {
                    $this->Session->setFlash('There is problem while changing password.','default');
                } 
            }
            # set help condition
            App::import("Model", "HelpContent");
            $this->HelpContent =  & new HelpContent();
            $condition = "HelpContent.id = '65'";  
            $hlpdata= $this->HelpContent->find('all',array("conditions"=>$condition));
            $this->set("hlpdata",$hlpdata);
            # set help condition


        }//End super adnmin change password controller
        /* ----------------------------------------  END OF CHANGE PASSWORD INFO ------------------------------------------------ */ 

			 /*    
        *     function    : ajaxpwdcheck($pwd)
        *     params      : $pwd :this contain the password entered the admin.
        *     Description : This function checks whether the password  entered by user already exists in database or not.
        *     Created On   : 20-04-2012
        */

        function ajaxpwdcheck($pwd)
        {
			App::import("Model", "Admin");
		    $this->Admin =  & new Admin();
			$this->layout=false;
            $pass = md5($pwd);
			echo $count = $this->Admin->findCount("password ='$pass'") ;
	        $this->set('paswd', $count);    
            if($count == 1)            {
				//$this->Session->setFlash('Admin Password is Matched','default',array('class' => 'successmsg'));

            }
			exit;
        }//end ajaxpwdcheck controller
	/**
		* function    : getstarted()
        * params      : None.
        * Created On   : 20-04-2012
		*
	**/
	function getstarted(){
		
		App::import('Model','GetStart');
		$this->GetStart = new GetStart();
		$dt=$this->GetStart->find("all");
		$this->set("value",$dt);
		if((!empty($this->data/*['GetStart']['getdata']))&&isset($this->data)*/)))
		{    
			$errormsg = $this->GetStart->invalidFields();
			//$errormsg="Please provide Get Started Name";
			$this->Session->setFlash($errormsg,'default',array('class' => 'msgTXt'));
			//print_r($errormsg);die;
			if(!$errormsg){
				$this->data['GetStart']['id']=1;
				if($this->GetStart->save($this->data))
				{
					$this->Session->setFlash('Get Started Updated successfully.','default', array('class' => 'successmsg'));
					if(isset($this->data['Action']['redirectpage'])){
						$this->redirect(array('controller'=>'setups' , 'action'=>'getstarted'));
					}else
					{
						$this->redirect(array('controller'=>'setups' , 'action'=>'getstarted'));
					}
				} 
				else
				{
					$this->Session->setFlash("Please provide Get Started",'default',array('class' => 'msgTXt'));
				}
			}    
         } 
			# set help condition
            App::import("Model", "HelpContent");
            $this->HelpContent =  & new HelpContent();
            $condition = "HelpContent.id = '67'";  
            $hlpdata= $this->HelpContent->find('all',array("conditions"=>$condition));
            $this->set("hlpdata",$hlpdata);
            # set help condition
        }//end getStart controller
		/**
		* function    : help_list
        * params      : None.
        * Created On  : 20-04-2012
		* Description : function show list of all help 	
		**/
		 function help_list()
        {
            if(isset($_SERVER['QUERY_STRING']))
            {
                $this->Session->delete("newsortingby");
                $strloc=strpos($_SERVER['QUERY_STRING'],'=');
                $strdata=substr($_SERVER['QUERY_STRING'],$strloc+1);    
                $this->Session->write("newsortingby",$strdata);    

            }
            App::import("Model", "HelpContent");
            $this->HelpContent =  & new HelpContent();          
            $field='';
            $condition = "";
            if(isset($this->data['setups']['searchkey']) && $this->data['setups']['searchkey']){
                $searchkeyword = $this->data['setups']['searchkey'];
                $condition .= "   (name LIKE '%".$searchkeyword."%' OR content  LIKE '%".$searchkeyword."%' OR section  LIKE '%".$searchkeyword."%' )";
            }                
            $this->Pagination->sortByClass  = 'HelpContent'; ##initaite pagination            
            $this->Pagination->total= count($this->HelpContent->find('all',array("conditions"=>$condition)));
            list($order,$limit,$page) = $this->Pagination->init($condition,$field);                
            $hlpdata1 = $this->HelpContent->find('all',array("conditions"=>$condition, 'order' =>$order, 'limit' => $limit, 'page' => $page));             
            $this->set("hlpdata1",$hlpdata1);


            # set help condition
            App::import("Model", "HelpContent");
            $this->HelpContent =  & new HelpContent();
            $condition = "HelpContent.id = '66'";  
            $hlpdata= $this->HelpContent->find('all',array("conditions"=>$condition));
            $this->set("hlpdata",$hlpdata);
            # set help condition
        }//end Help_List Controller
		/**
		* function    : edithelp
        * params      : helpid.
        * Created On  : 20-04-2012
		* Description : function show edit of specific help 	
		**/
		function edithelp($recid){
            $this->session_check_admin();
            ##import project type model for processing
            App::import("Model", "HelpContent");
            $this->HelpContent =   & new HelpContent();
            ##check empty data
            if(!empty($this->data)) {
                #set the posted data
                $this->HelpContent->set($this->data);
                #check server side validation
                $this->HelpContent->invalidFields();
                #save data in project type table
                $recid  = $this->data['HelpContent']['id'];
                if($recid !=''){                                                
                    if($this->HelpContent->Save($this->data)){
                        $this->Session->setFlash('Database updated successfully.','default',array('class' => 'successmsg'));
                        if(isset($this->data['Action']['redirectpage'])){

                            $sessdata=$this->Session->read('newsortingby');
                            $this->redirect('/'.$sessdata);
                        }else
                        {
                            $this->redirect("/admins/help_list");
                        }                                        

                    }
                }
            }
            $this->HelpContent->id = $recid;
            $this->data = $this->HelpContent->read();
            $this->set("HelpContent", $recid);
        }//end edithelp controller function  

        /**
        * function    : addhelp
        * Created On  : 28-11-2018
        * Description : function show add of specific help     
        **/
        function addhelp(){
            //$this->session_check_admin();
            ##import project type model for processing
            App::import("Model", "HelpContent");
            $this->HelpContent =   & new HelpContent();
            ##check empty data
            if(!empty($this->data)) {
                #set the posted data
                $this->HelpContent->set($this->data);
                #check server side validation
                $this->HelpContent->invalidFields();
                #save data in project type table
                if($this->HelpContent->Save($this->data)){
                    $this->Session->setFlash('Database updated successfully.','default',array('class' => 'successmsg'));
                    if(isset($this->data['Action']['redirectpage'])){
                        $sessdata=$this->Session->read('newsortingby');
                        $this->redirect('/'.$sessdata);
                    }else
                    {
                        $this->redirect("/admins/help_list");
                    }        
                }
            }

            $optionSection = array('admin' => 'admin', 'sponsor' => 'sponsor', 'both' => 'both');
            $this->HelpContent->id = $recid;
            $this->data = $this->HelpContent->read();
            $this->set(array('optionSection' => $optionSection));
            $this->set("HelpContent", $recid);
        }//end addhelp controller function 

		/**
		* function    : mail_footer
		*Links		  : SPAM Footer	
        * params      : None.
        * Created On  : 21-04-2012
		**/
		function mail_footer(){
          
            App::import('Model','MailFooter');
            $this->MailFooter = new MailFooter();
            $dt=$this->MailFooter->find("first");
            
            $footer_content=$dt['MailFooter']['footer_content'];
            $this->set("footer_content",$footer_content);
            
            if(!empty($this->data))
            {    
                
                $errormsg = $this->MailFooter->invalidFields();
                //$errormsg="Please provide Get Started Name";
                $this->Session->setFlash($errormsg,'default',array('class' => 'msgTXt'));
                //print_r($errormsg);die;
                if(!$errormsg){
                    $this->data['MailFooter']['id']=1;
                    if($this->MailFooter->save($this->data))
                    {
                        $this->Session->setFlash('Mail Footer Updated successfully.','default', array('class' => 'successmsg'));
                        if(isset($this->data['Action']['redirectpage'])){
                            $this->redirect('/setups/mail_footer');
                        }else
                        {
                            $this->redirect('/setups/mail_footer');
                        }
                    } 
                    else
                    {
                        $this->Session->setFlash("Please provide Mail Footer",'default',array('class' => 'msgTXt'));
                    }
                }    
            } 

            # set help condition
            App::import("Model", "HelpContent");
            $this->HelpContent =  & new HelpContent();
            $condition = "HelpContent.id = '67'";  
            $hlpdata= $this->HelpContent->find('all',array("conditions"=>$condition));
            $this->set("hlpdata",$hlpdata);
            # set help condition
        } //End mail footer function

		/**
		* function    : border_footer_list
		*Links		  : Border Footer	
        * params      : None.
        * Created On  : 21-04-2012
		**/
		function border_footer_list(){

            ##check admin session live or not
            $this->session_check_admin();
            
			##import project type model for processing
            App::import("Model", "BorderFooter");
            $this->BorderFooter =   & new BorderFooter();
			$condition = 'delete_status=0';
			$field='';
            if(isset($this->data['BorderFooter']['searchkey']) && $this->data['BorderFooter']['searchkey']){
                $searchkeyword = $this->data['BorderFooter']['searchkey'];
                $condition .= "  BorderFooter.border_footer_name LIKE '%".$searchkeyword."%' OR BorderFooter.border_footer_name  LIKE '%".$searchkeyword."%' ";
            }

            $this->Pagination->sortByClass    = 'BorderFooter'; ##initaite pagination 

            $this->Pagination->total= count($this->BorderFooter->find('all',array("conditions"=>$condition)));

            list($order,$limit,$page) = $this->Pagination->init($condition,$field);

            $border_footer_list = $this->BorderFooter->find('all',array("conditions"=>$condition, 'order' =>$order, 'limit' => $limit, 'page' => $page));
            ##set project type data in variable

            # set help condition
             App::import("Model", "HelpContent");
             $this->HelpContent =  & new HelpContent();
             $condition = "HelpContent.id = '86'";  
             $hlpdata= $this->HelpContent->find('all',array("conditions"=>$condition));
             $this->set("hlpdata",$hlpdata);
             # set help condition                        
         
            $this->set("border_footer_list",$border_footer_list);  	
            
        }  //End border footer list function
		
		/**
		* function    : border_footer
		*Links		  : Border Footer save	
        * params      : None.
        * Created On  : 22-04-2012
		**/
		function border_footer($id=null) {

			##check admin session live or not
            $this->session_check_admin();
			
			##import project type model for processing
            App::import("Model", "BorderFooter");
            $this->BorderFooter =   & new BorderFooter();
			//pr($this->StatusType);
			##check empty data
            if(!empty($this->data)) {
			
				//$this->BorderFooter->create();
				if($this->BorderFooter->save($this->data)) {
					$id = $this->BorderFooter->id;
					if($this->data['BorderFooter']['is_default'] == 1) {
						$this->BorderFooter->updateAll(array('BorderFooter.is_default'=> 1,'BorderFooter.active_status'=> 1), array('BorderFooter.id' => $id));
						$this->BorderFooter->updateAll(array('BorderFooter.is_default'=> 0), array('BorderFooter.id !=' => $id));
					}
					if(isset($this->data['Action']['redirectpage'])){
						$msg='Border footer Added Successfully.';
						$this->Session->setFlash($msg,'default', array('class' => 'successmsg'));
					   $this->redirect(array('controller' =>'setups', 'action' =>'border_footer_list'));
					}
					else if(isset($this->data['Action']['noredirection'])){				
						$msg='Border footer saved Successfully.';
						$this->Session->setFlash($msg,'default', array('class' => 'successmsg'));
						$this->redirect(array("controller"=>"setups" , "action"=>"border_footer",$id)); 			
					}
				} else
				{
					$this->validateErrors();
				}
			}
			
			if (empty($this->data)) {
            $this->data = $this->BorderFooter->read(null, $id);
			}
			
		} 
		
		//End border footer function
		
				
		/*
        * Function name   : changestatus()
        * Arguments : $recid,$modelname,$status,$methodname
        * Description : This function used to change status as active or deactive
        * Implemented On      : 27-04-12 (03:45am)
        *
        */ 
        function changestatus($recid=null,$status=null,$modal=null,$redircturl=null){
		if($status == 2 )
		$status = 0;
            ##check user session live or not
			$this->session_check_admin();
            
			##import dynamic model for processing
			 App::import("Model", $modal);
            $this->$modal =   & new $modal();
			$data = $this->$modal->read(null, $recid);
			if(!empty($data[$modal]['is_default'])){
				if($status == 0 && $data[$modal]['is_default'] == 1) {
					$this->Session->setFlash('you can not deactivate this record.','default', array('class' => 'successmsg'));
					}
			}
			else {

					$this->$modal->updateAll(array("$modal.active_status"=> $status), array("$modal.id" => $recid));
					$this->Session->setFlash('Database updated successfully.','default', array('class' => 'successmsg'));
				}			
			$this->redirect(array("controller"=>"setups","action"=>$redircturl));

        }//end changestatus function

		
		function border_footer_delete($recid=null){
            ##check user session live or not
            $this->session_check_admin();
			
            ##import dynamic model for processing
            App::import("Model", 'BorderFooter');
            $this->BorderFooter =   & new BorderFooter(); 
			//print_r($recid);
			$allid=str_replace('*', ' or id = ',$recid);
            $where="id=$allid";  
            if(count(explode('*',$recid))==1){
                $this->data['BorderFooter']['id'] = $recid;
            }
			$ww = explode('*',$recid);
			//print_r($ww);
			$id_data=$this->BorderFooter->find('first',array('conditions'=>array('BorderFooter.is_default'=>1),'fields'=>array('id')));
			
			if(isset($id_data['BorderFooter']['id']) && $id_data['BorderFooter']['id'] != '' && in_array($id_data['BorderFooter']['id'],$ww)) {
				//print_r($id_data);
				$this->Session->setFlash('You cannot delete Border Footer default Status.','default', array('class' => 'successmsg'));
				$this->redirect(array('controller'=>'setups','action'=>'border_footer_list'));
			}

            ##set the record for updation
            
            $this->BorderFooter->updateAll(array('delete_status'=>1),$where);
            $this->Session->setFlash('Border footer deleted successfully.','default', array('class' => 'successmsg'));

            $this->redirect(array('controller'=>'setups','action'=>'border_footer_list	'));
        }
		
		/*
        * Function name   : producttype()
        * Description : This function used to add product type
        * data        : 25-Apr-2012 			
        */  
        function producttype(){

            ##check admin session live or not
            $this->session_check_admin();

            ##fetch data from project type table for listing
            $field='';
            $condition = "delete_status = '0'";
            if(isset($this->data['setups']['searchkey']) && $this->data['setups']['searchkey']){
                $searchkeyword = $this->data['setups']['searchkey'];
                $condition .= "  and (product_type_name LIKE '%".$searchkeyword."%' OR notes  LIKE '%".$searchkeyword."%' )";
            }

            $this->Pagination->sortByClass    = 'ProductType'; ##initaite pagination 

            $this->Pagination->total= count($this->ProductType->find('all',array("conditions"=>$condition)));

            list($order,$limit,$page) = $this->Pagination->init($condition,$field);

            $producttypedata = $this->ProductType->find('all',array("conditions"=>$condition, 'order' =>$order, 'limit' => $limit, 'page' => $page));
            ##set project type data in variable

            $this->set("producttypedata",$producttypedata);    
        }   //end producttype
		/*
        * Function name   : producttype()
        * Description : This function used to add product type
        * data        : 25-Apr-2012 			
        */  
		 function editproducttype($recid = null){
            //Configure::write('debug', 2);
            ##check admin session live or not
            $this->session_check_admin();


            ##check empty data
            if(!empty($this->data)) {
				#set the posted data
                $this->ProductType->set($this->data);
                #check server side validation
                $this->ProductType->invalidFields();
                #save data in project type table
                $recid  = $this->data['ProductType']['id'];
                $ptname  = $this->data['ProductType']['product_type_name'];
                $condition = "product_type_name = '".$ptname."' AND id !=$recid AND  delete_status = '0'";
                $ptdata = $this->ProductType->find('all',array("conditions"=>$condition));
                if(!$ptdata){
                    if($recid !=''){

                        if($this->ProductType->Save($this->data)){

                            $this->Session->setFlash('Product Type updated Successfully.','default', array('class' => 'successmsg'));

                        }else{
                            $this->Session->setFlash('Error in processing. Please try again','default',array('class' => 'errormsg'));

                        }
                    }else{
                        $this->Session->setFlash('Invalid attempt for update.','default',array('class' => 'errormsg'));
                    }
                }else{

                    $this->Session->setFlash('Product Type with same name already exists.','default',array('class' => 'errormsg'));
                }
                if(isset($this->data['Action']['redirectpage'])){
                   
					$this->redirect(array("controller"=>"setups" , "action"=>"producttype")); 
				}
                else
				{
					//$recid = $this->ProductType->id;
					$recid = $this->data['ProductType']['id'];
					$this->redirect(array("controller"=> "setups" , "action" => "editproducttype",$recid));
					//$this->redirect('setups/editproducttype/'.$recid);

				}
            }
            $this->ProductType->id = $recid;
            $this->data = $this->ProductType->read();
            $this->set("ProductTypeId", $recid);
        }//end editproducttype    

		/*
        * Function name   : producttype()
        * Description : This function used to add product type
        * data        : 25-Apr-2012 			
        */  
	
		function addproducttype(){

            ##check admin session live or not
            $this->session_check_admin();

            ##check empty data
            if(!empty($this->data)) {
                #set the posted data
                $this->ProductType->set($this->data);
                #check server side validation
                $this->ProductType->invalidFields();

                $err="";

                if($this->data['ProductType']['product_type_name']=="" || $this->data['ProductType']['product_type_name']==NULL )
                {
                    $err.="Product type name is empty.<br>";
                }

                if($this->data['ProductType']['size_mm']=="" || $this->data['ProductType']['size_mm']==NULL )
                {
                    $err.="Product type size(mm) is empty.<br>";
                }
                if($this->data['ProductType']['size_inch']=="" || $this->data['ProductType']['size_inch']==NULL )
                {
                    $err.="Product type size(inch) is empty.<br>";
                }
                if($this->data['ProductType']['delivery_days']=="" || $this->data['ProductType']['delivery_days']==NULL )
                {
                    $err.="Product type delivery_days is empty.<br>";
                }

                if($err=="")
                {

                    $ptname = $this->data['ProductType']['product_type_name'];

                    $condition = "product_type_name = '".$ptname."'    AND  delete_status = '0'";
                    $ptdata = $this->ProductType->find('all',array("conditions"=>$condition));

                    if(!$ptdata)
                    {
                        #save data in project type table
                        $this->ProductType->Save($this->data);

                        $this->Session->setFlash('Product Type added Successfully.','default', array('class' => 'successmsg'));
                        if(isset($this->data['Action']['redirectpage']))
                            $this->redirect(array("controller"=>"setups" , "action"=>"producttype")); 
                        else
                           $this->redirect(array("controller"=>"setups" , "action"=>"addproducttype")); 

                    }
                    else
                    {
                        $this->Session->setFlash('Product Type with same name already exists.','default',array('class' => 'msgTXt'));
                        $this->redirect('/admins/addproducttype/');
                    }



                }
                else
                {
                    $this->Session->setFlash($err,'default',array('class' => 'errormsg'));
                }
            }

        } //end addproducttype
		
		
		function setAsDefault($recid=null){

            ##check user session live or not
            $this->session_check_admin();

            ##import dynamic model for processing
            App::import("Model", 'BorderFooter');
            $this->BorderFooter =   & new BorderFooter();       
            ##set the record for updation
            $this->BorderFooter->updateAll(array('BorderFooter.is_default'=> 1,'BorderFooter.active_status'=> 1), array('BorderFooter.id' => $recid));
            $this->BorderFooter->updateAll(array('BorderFooter.is_default'=> 0), array('BorderFooter.id !=' => $recid));
			
            $this->Session->setFlash('Default Status updated successfully.','default', array('class' => 'successmsg'));

            $this->redirect(array('controller'=>'setups','action'=>'border_footer_list'));
        }

	}	
?>