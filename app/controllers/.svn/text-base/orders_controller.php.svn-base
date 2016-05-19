<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('BookOrder','OrderItems');
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
        	'order' => array(
            		'BookOrder.OrderID' => 'desc'
        	)
    	);

	
	function index(){
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('BookOrder.query');
    		}else{
    			$this->Session->write('BookOrder.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"BookOrder.OrderID LIKE" => trim($value)."%",
	    		"BookOrder.MemberID LIKE" => trim($value)."%",
	    		"BookOrder.MemberStatusCode LIKE " => "%".trim($value)."%",
	    		"BookOrder.VirtualStatusCode LIKE " => "%".trim($value)."%",
	    		"BookOrder.CountryCode" => trim($value),
			    "BookOrder.Name LIKE" => "%".trim($value)."%"
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('BookOrder.query',$this->data['query']);		

		} 


		$data = $this->paginate('BookOrder',$conditions);	
		$this->set('data',$data);
  }

	function modal_view($order_id){
		$this->layout = 'default-modal';
		$BookOrder_conditions = array('BookOrder.OrderID' => $order_id);
		$BookOrderData = $this->BookOrder->find('first',array('conditions'=>$BookOrder_conditions));

		$OrderItemsData = $this->OrderItems->findByOrderId($order_id);

		$Total = 0;
		foreach($BookOrderData['OrderItems'] as $item){
				$cost = ($item['Price']+$item['Tax'])*$item['Quantity'];
				$Total += $cost;				
		}
		$Postage = $this->BookOrder->getPostage($BookOrderData);
		$Total += $Postage['total'];
		$Total -= $BookOrderData['BookOrder']['Discount'];
	
	
		$BookOrderData['OrderTotal'] = $Total;
		$BookOrderData['PostageTotal'] = $Postage['total'];
		$BookOrderData['PostageTax'] = $Postage['total_tax'];
		$this->set('data',$BookOrderData);
		$this->set('OrderItems',$OrderItemsData);

	}
}
?>
