<?php
class AppController extends Controller {

  var $salutations = array('Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Miss'=>'Miss','Lady'=>'Lady','Lord'=>'Lord','Major'=>'Major','Sir'=>'Sir','Dr'=>'Dr','Prof'=>'Prof.','Other'=>'Other');

  public $components = array(

        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
        )
  );

  public $helpers = array('Tools','Session');
  var $regionCodes = array('UK','US','AU','CA','RO');
  
  public function beforeFilter() {

      
    }
    

  public function beforeRender(){

	 //JS FORMATTED MEMBERSTATUSES
	 App::import('Model','MemberStatus');
	 $this->MemberStatus = new MemberStatus();
	 $conditions = array('MemberStatus.active' =>'1');
	 $MemberStatusData = $this->MemberStatus->find('all',array('conditions'=>$conditions,'fields'=>'MemberStatusCode'));
	 
   App::import('Model','SubStatus');
   $this->SubStatus = new SubStatus();
	 $SubStatusData = $this->SubStatus->find('all',array('fields'=>'SubStatusCode'));

   App::import('Model','Offer');
   $this->Offer = new Offer();
	 $OfferData = $this->Offer->find('all',array('group'=>'Offer.OfferCode','fields'=>'OfferCode'));
    	
	 $JS_formatted_MSC = array();
	 $JS_formatted_MSC[] = "ALL:";
	 foreach($MemberStatusData as $data){
		  $JS_formatted_MSC[] = $data['MemberStatus']['MemberStatusCode'].":";	
	 }	
	 $this->set('JSMemberStatusCodes',json_encode($JS_formatted_MSC));
	 
	 $JS_formatted_SSC = array();
	 foreach($SubStatusData as $data){
		  $JS_formatted_SSC[] = $data['SubStatus']['SubStatusCode'].":";	
	 }	
	 $this->set('JSSubStatusCodes',json_encode($JS_formatted_SSC));	  	 

	 $JS_formatted_OC = array();
	 foreach($OfferData as $data){
		  $JS_formatted_OC[] = $data['Offer']['OfferCode'].":";	
	 }	
	 $this->set('JSOfferCodes',json_encode($JS_formatted_OC));
	 
	 //CURRENCY FORMAT
	 $currency_format = array(
		'UK' => '&pound;',
		'RO' => '&pound;',
		'AU' => 'AUS$',
		'US' => 'US$',
		'CA' => 'CAN$',
	 );
	 $this->set('currency_html',$currency_format);

   //YES+NO
   $YNValue = array(
    '0' => 'No',
    '1' => 'Yes'
   );
   $this->set('YNValue',$YNValue);
   $this->set('regionCodes',$this->regionCodes);

  }

}
