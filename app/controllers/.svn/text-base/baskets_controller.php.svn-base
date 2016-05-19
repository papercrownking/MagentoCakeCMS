<?php


class BasketsController extends AppController {

	public $name = 'Baskets';
	public $uses = array('Basket');
	var $order = 'Basket.id desc';
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
		'joins' => array (
			array(
				'table' => 'basketoffers',
				'alias' => 'Basketoffer',
				'type' => 'inner',
				'conditions' => array (
					'Basketoffer.basket_id = Basket.id'
				)
			)
		),
		'contains' => array('Basketoffer'),
		'recursive' => 1,
        	'order' => array(
            		'Basket.id' => 'desc'
        	)
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;



		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('Basket.query');
    		}else{
    			$this->Session->write('Basket.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Basket.MemberID LIKE" => trim($value)."%",
	    		"Basket.VirtualStatusCode LIKE " => "%".trim($value)."%",
	    		"Basket.session" => trim($value),
			"Basketoffer.OfferCode LIKE" => "%".trim($value)."%",
			"Basketoffer.OfferTypeCode LIKE" => "%".trim($value)."%",
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('Basket.query',$this->data['query']);		

		} 


		$data = $this->paginate('Basket',$conditions);	
		$this->set('data',$data);
	}

	public function view($basket_id){
		App::import('Model','Member');
		$this->Member = new Member();		
		$member_data = NULL;

		$conditions = array('Basket.id' => $basket_id);
		$basket_data = $this->Basket->find('first',array('conditions'=>$conditions));
		if($basket_data['Basket']['MemberID'] > 0){
			$member_conditions = array('Member.MemberID' => $basket_data['Basket']['MemberID']);
			$member_data = $this->Member->find('first',array('conditions'=>$member_conditions));
		}

		$this->set('basket_data',$basket_data);
		$this->set('member_data',$member_data);
	}

	public function remove(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			if($this->Basket->delete($row)){
				$counter++;
			} 

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Basket(s) deleted successfully.', 'flash_success');
		} else {
			$this->Session->setFlash('No Baskets deleted', 'flash_failure');
		}
		$this->redirect('/baskets/index');
	}



  	

}
