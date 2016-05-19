<?php


class MembersController extends AppController {

	public $name = 'Members';
	public $uses = array('Member');
	var $order = 'Member.MemberID desc';
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
        	'order' => array(
            		'Member.MDate' => 'desc'
        	)
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('Member.query');
    		}else{
    			$this->Session->write('Member.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Member.UserName LIKE" => trim($value)."%",
	    		"Member.MemberID" => trim($value),
	    		"Member.MembershipNumber" => trim($value),
	    		"Member.Surname LIKE " => "%".trim($value)."%",
	    		"Member.Address1 LIKE " => "%".trim($value)."%",
	    		"Member.PostCode LIKE " => "%".trim($value)."%",
	    		"Member.Email LIKE " => "%".trim($value)."%",
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('Member.query',$this->data['query']);		

		} 


		$data = $this->paginate('Member',$conditions);	
		$this->set('data',$data);
	}

	public function view($member_id){
		$conditions = array('Member.MemberID' => $member_id);
		$data = $this->Member->find('first',array('conditions'=>$conditions));	

		App::import('Model','BookOrder');
		$this->BookOrder = new BookOrder();
		
		$BookOrder_conditions = array('BookOrder.MemberID' => $member_id);
		$BookOrderData = $this->BookOrder->find('all',array('conditions'=>$BookOrder_conditions,'order'=>'BookOrder.CDate DESC'));

		//SET TOTALS
		$i = 0;
		foreach($BookOrderData as $order_data){
			$Total = 0;
			$cost = 0;
			foreach($order_data['OrderItems'] as $item){
				$cost = ($item['Price']+$item['Tax'])*$item['Quantity'];
				$Total += $cost;

			}
			$Postage = $this->BookOrder->getPostage($order_data);
    	if(isset($Postage)){
			 $Total += $Postage['total'];
			}
			
			$Total -= $order_data['BookOrder']['Discount'];
			$BookOrderData[$i]['OrderTotal'] = $Total;
			$i++;		
		}


		$this->set('salutations',$this->salutations);
		$this->set('data',$data);
		$this->set('BookOrderData',$BookOrderData);
		$this->render('view');
	
	}

	public function edit(){
			if($this->Member->save($this->data)){
				$this->set('data',array('type'=>'success','msg'=>'The customer has been saved.'));
			} else {
	      $errors = $this->Member->invalidFields();  
        $this->set('errors',$errors);
				$this->set('data',array('type'=>'error','msg'=>'The customer could not be saved.'));
			}
				
	}

	public function getAjaxBasket($member_id){
		App::import('Model','Basket');
		$this->Basket = new Basket();	
	
		$this->autoRender = false;
		$conditions = array('Basket.MemberID' => $member_id);
		$data = $this->Basket->find('first',array('conditions'=>$conditions));

		$this->set('data',$data);
		$this->render('getAjaxBasket','ajax');
	}

	public function getAjaxReview($member_id){
		App::import('Model','BookReview');
		$this->BookReview = new BookReview();



		$this->autoRender = false;
		$conditions = array('BookReview.member_id' => $member_id);
		$data = $this->BookReview->find('all',array('conditions'=>$conditions));

		$this->set('data',$data);
		$this->render('getAjaxReview','ajax');
		
	}



  	

}
