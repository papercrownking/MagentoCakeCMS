<?php
class OffertypecodesController extends AppController {

	public $name = 'Offertypecodes';
	public $uses = array('OfferType','Offer','OfferTypeMemberStatus','OfferTypeSubStatus');
	var $order = 'OfferType.MDate desc';
	var $helpers = array('Time','Html','Javascript','Ajax','Text');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
		'contains' => array('Offer'),
		'order' => array('OfferType.MDate' => 'desc')
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('OfferType.query');
    		}else{
    			$this->Session->write('OfferType.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"OfferType.OfferTypeCode LIKE" => "%".trim($value)."%",
	    		"OfferType.Description LIKE" => "%".trim($value)."%"
	    	);
		}
	  $searchTitle[]=$this->data['query'];

	  $this->Session->write('OfferType.query',$this->data['query']);		

		} 

		$data = $this->paginate('OfferType',$conditions);	
		$this->set('data',$data);
	}
	
	public function view($offertype_id=null){
		$offertype_data = NULL;
		   
    if($offertype_id > 0){
		  $conditions = array('OfferType.id' => $offertype_id);
		  $offertype_data = $this->OfferType->find('first',array('conditions'=>$conditions));
		  $this->set('offertype_data',$offertype_data);  

	    $offer_conditions['Offer.OfferTypeCode'] = $offertype_data['OfferType']['OfferTypeCode'];
	    $fields = array(
	    		'Offer.OfferCode',
	    		'Offer.BookCode',
	    		'Book.Title'
	    );
	    $offer_data = $this->Offer->find('all',array('conditions'=>$offer_conditions,'order'=>'OfferCode asc', 'contain' => 'Book.BookCode','fields'=>$fields,'group'=>'Offer.OfferCode','recursive'=>'1'));		  		  
		  $this->set('offer_data',$offer_data);

	    $memberstatus_conditions = array('OfferTypeMemberStatus.OfferTypeCode' => $offertype_data['OfferType']['OfferTypeCode']);
	    $fields = array(
	    		'OfferTypeMemberStatus.id',
	    		'OfferTypeMemberStatus.MemberStatusCode',
	    		'MemberStatus.Description'
	    );
	    $this->set('memberstatus_data',$this->OfferTypeMemberStatus->find('all',array('conditions'=>$memberstatus_conditions,'order'=>'MemberStatusCode asc','contain' => 'MemberStatus.MemberStatusCode','recursive'=>'1','fields'=>$fields)));

	    $substatus_conditions = array('OfferTypeSubStatus.OfferTypeCode' => $offertype_data['OfferType']['OfferTypeCode']);
	    $fields = array(
	    		'OfferTypeSubStatus.id',
	    		'OfferTypeSubStatus.SubStatus',
	    		'SubStatus.Description'
	    );
	    $this->set('substatus_data',$this->OfferTypeSubStatus->find('all',array('conditions'=>$substatus_conditions,'order'=>'SubStatus asc','contain' => 'SubStatus.SubStatusCode','recursive'=>'1','fields'=>$fields)));


    } else {
		  $offertype_data['OfferType']['id'] = null;
		  $offertype_data['OfferType']['OfferTypeCode'] = null;
		  $this->set('offertype_data',$offertype_data);    
		  $this->render('new'); 
    }

  }

  public function add(){
	 if($this->OfferType->save($this->data)){
	   $this->set('data',array('type'=>'success','msg'=>'OfferType created','id'=>$this->OfferType->id));
	 } else {
	   $errors = $this->OfferType->invalidFields();  
     $this->set('errors',$errors);
	   $this->set('data',array('type'=>'error','msg'=>'The OfferTypeCode could be not saved','id'=>NULL));
	 }  
  }
   
  public function edit (){
	 if($this->OfferType->save($this->data)){
	   $this->set('data',array('type'=>'success','msg'=>'The OfferTypeCode has been saved.'));
	 } else {
	   $errors = $this->OfferType->invalidFields();  
     $this->set('errors',$errors);
	   $this->set('data',array('type'=>'error','msg'=>'The OfferTypeCode could be not saved.'));
	 }  
  }
  
	public function duplicate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
		  
      $otc_conditions = array('OfferType.id' => $row);
		  $otc_data = $this->OfferType->find('first',array('conditions'=>$otc_conditions));
		  
		  unset($otc_data['OfferType']['id']);
		  $otc_data['OfferType']['Description'] = "COPY - ".$otc_data['OfferType']['Description'];		  
		
			if($this->OfferType->save($otc_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' OfferTypes duplicated.', 'flash_success');
		} else {
			$this->Session->setFlash('No OfferTypes duplicated', 'flash_failure');
		}
		$this->redirect('/offertypecodes/index');
	}
	
	public function activate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
      $otc_conditions = array('OfferType.id' => $row);
		  $save_data = $this->OfferType->find('first',array('conditions'=>$otc_conditions));		  
			$save_data['OfferType']['active'] = '1';		
		
			if($this->OfferType->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' OfferTypes activated.', 'flash_success');
		} else {
			$this->Session->setFlash('No OfferTypes activated', 'flash_failure');
		}

		$this->redirect('/offertypecodes/index');
	}

	public function deactivate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
      $otc_conditions = array('OfferType.id' => $row);
		  $save_data = $this->OfferType->find('first',array('conditions'=>$otc_conditions));		  
			$save_data['OfferType']['active'] = '0';		
		
			if($this->OfferType->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' OfferTypes deactivated.', 'flash_success');
		} else {
			$this->Session->setFlash('No OfferTypes deactivated', 'flash_failure');
		}

		$this->redirect('/offertypecodes/index');
	}  

  public function delete(){
  
    $OfferTypeCode_id = $this->data['OfferType']['id'];
   	$conditions = array('OfferType.id' => $offertype_id);
		$offertype_data = $this->OfferType->find('first',array('conditions'=>$conditions));
		
    $this->OfferTypeMemberStatus->query("DELETE FROM `OfferTypeMemberStatus` WHERE `OfferTypeCode`='{$offertype_data['OfferType']['OfferTypeCode']}'");   
    $this->OfferTypeSubStatus->query("DELETE FROM `OfferTypeSubStatus` WHERE `OfferTypeCode`='{$offertype_data['OfferType']['OfferTypeCode']}'");      
  
    if($this->OfferType->delete($OfferTypeCode_id)){
			$this->Session->setFlash('OfferTypeCode '.$offertype_data['OfferType']['OfferTypeCode'].' deleted', 'flash_success');
    } else {
			$this->Session->setFlash('OfferTypeCode '.$offertype_data['OfferType']['OfferTypeCode'].' deleted', 'flash_failure');              
    }
    $this->redirect('/offertypecodes/index/');  
  
  }

  public function addMultiMemberStatus(){		
    $rows = $this->data['rowSelect'];
    $msg = "";	 
    foreach($rows as $row){
     
      $otc_conditions = array('OfferType.id' => $row);
		  $otc_data = $this->OfferType->find('first',array('conditions'=>$otc_conditions));	
		  
      $MemberStatuses = explode(':',$this->data['OfferType']['status_codes']);
      foreach($MemberStatuses as $MemberStatus){
        unset($otms);
        if($MemberStatus != ""){
          $otms['OfferTypeMemberStatus']['OfferTypeCode'] = $otc_data['OfferType']['OfferTypeCode'];
          $otms['OfferTypeMemberStatus']['MemberStatusCode'] = $MemberStatus;
          $otms['OfferTypeMemberStatus']['CDate'] = date("Y-m-d H:i:s");
          if($this->OfferTypeMemberStatus->save($otms)){
            $msg .= $otc_data['OfferType']['OfferTypeCode']." saved to ".$MemberStatus;
            $msg_type = "flash_success";  
          } else {
            $msg .= $otc_data['OfferType']['OfferTypeCode']." not saved to ".$MemberStatus;
            $msg_type = "flash_failure";
          }
        }
      }		 
    }
	  $this->Session->setFlash($msg,$msg_type);
		$this->redirect('/offertypecodes/index');  
  }
  
  public function addMultiSubStatus(){
    $rows = $this->data['rowSelect'];
    $msg = "";	 
    foreach($rows as $row){
     
      $otc_conditions = array('OfferType.id' => $row);
		  $otc_data = $this->OfferType->find('first',array('conditions'=>$otc_conditions));	
		  
      $SubStatuses = explode(':',$this->data['OfferType']['substatus_codes']);
      foreach($SubStatuses as $SubStatus){
        unset($otss);
        if($SubStatus != ""){
          $otss['OfferTypeSubStatus']['OfferTypeCode'] = $otc_data['OfferType']['OfferTypeCode'];
          $otss['OfferTypeSubStatus']['SubStatus'] = $SubStatus;
          $otss['OfferTypeSubStatus']['CDate'] = date("Y-m-d H:i:s");
          if($this->OfferTypeSubStatus->save($otms)){
            $msg .= $otc_data['OfferType']['OfferTypeCode']." saved to ".$SubStatus;
            $msg_type = "flash_success";  
          } else {
            $msg .= $otc_data['OfferType']['OfferTypeCode']." not saved to ".$SubStatus;
            $msg_type = "flash_failure";
          }
        }
      }		 
    }
	  $this->Session->setFlash($msg,$msg_type);
		$this->redirect('/offertypecodes/index');    
  }

  public function addMemberStatus(){
    $MemberStatusCodes = explode(':',$this->data['OfferType']['MemberStatusCodes']);
    $OfferTypeCode = $this->data['OfferType']['OfferTypeCode'];
    $msg = "";
    foreach($MemberStatusCodes as $MemberStatusCode){      
      if($MemberStatusCode == ""){
        continue;
      }
      $otms['OfferTypeMemberStatus']['OfferTypeCode'] = $OfferTypeCode;
      $otms['OfferTypeMemberStatus']['MemberStatusCode'] = $MemberStatusCode;      
      $otms['OfferTypeMemberStatus']['CDate'] = date('Y-m-d H:i:s');    
         
      if($this->OfferTypeMemberStatus->save($otms)){
        $msg .= $OfferTypeCode." saved to ".$MemberStatusCode;
        $msgType ="success";  
      } else {
        $msg .= $OfferTypeCode." not saved to ".$MemberStatusCode;
        $msgType ="error";
      }
    }
    $this->set('data',array('type'=>$msgType,'msg'=>$msg));      
    
  }
  
  public function addSubStatus(){
    $SubStatusCodes = explode(':',$this->data['OfferType']['SubStatusCodes']);
    $OfferTypeCode = $this->data['OfferType']['OfferTypeCode'];
    $msg = "";
    foreach($SubStatusCodes as $SubStatusCode){      
      if($SubStatusCode == ""){
        continue;
      }
      $otms['OfferTypeSubStatus']['OfferTypeCode'] = $OfferTypeCode;
      $otms['OfferTypeSubStatus']['SubStatus'] = $SubStatusCode;      
      $otms['OfferTypeSubStatus']['CDate'] = date('Y-m-d H:i:s');    
         
      if($this->OfferTypeSubStatus->save($otms)){
        $msg .= $OfferTypeCode." saved to ".$SubStatusCode;
        $msgType ="success";  
      } else {
        $msg .= $OfferTypeCode." not saved to ".$SubStatusCode;
        $msgType ="error";
      }
    }
    $this->set('data',array('type'=>$msgType,'msg'=>$msg));          
  }
  
  public function deleteMemberStatus($id,$otc_id){  
    if($this->OfferTypeMemberStatus->delete($id)){
			$this->Session->setFlash('OfferTypeCode removed from Member Status.', 'flash_success');
    } else {
			$this->Session->setFlash('OfferTypeCode could not be removed from Member Status.', 'flash_failure');              
    }
    $this->redirect('/offertypecodes/view/'.$otc_id);
  }
  
  
  public function deleteSubStatus($id,$otc_id){ 
    if($this->OfferTypeSubStatus->delete($id)){
			$this->Session->setFlash('OfferTypeCode removed from SubStatus.', 'flash_success');
    } else {
			$this->Session->setFlash('OfferTypeCode could not be removed from SubStatus.', 'flash_failure');              
    }
    $this->redirect('/offertypecodes/view/'.$otc_id);
  }  
  
}