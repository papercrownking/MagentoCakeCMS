<?php
class OffersController extends AppController {

	public $name = 'Offers';
	public $uses = array('OfferType','Offer','Book','OfferTypeMemberStatus','OfferTypeSubStatus');
	var $order = 'Offer.MDate desc';
	var $helpers = array('Time','Html','Javascript','Ajax','Text');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
		'contains' => array('Book'),
		'order' => array('Offer.MDate' => 'desc')
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('Offer.query');
    		}else{
    			$this->Session->write('Offer.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Offer.OfferCode LIKE" => "%".trim($value)."%",
	    		"Offer.BookCode LIKE" => "%".trim($value)."%",
	    		"Offer.OfferTypeCode LIKE" => "%".trim($value)."%",	    		
	    		"Offer.RegionCode LIKE" => "%".trim($value)."%",		    		
	    		"Offer.Price LIKE" => "%".trim($value)."%",	    		
	    		"Offer.TermsText LIKE" => "%".trim($value)."%",	
	    		"Offer.FreeText LIKE" => "%".trim($value)."%",
          "Book.Title LIKE" => "%".trim($value)."%"              		
	    	);
		}
	  $searchTitle[]=$this->data['query'];

	  $this->Session->write('Offer.query',$this->data['query']);		

		} 

		$data = $this->paginate('Offer',$conditions);	
		$this->set('data',$data);
	}
	
	public function view($offer_id){
    if($offer_id > 0){
 		  $conditions = array('Offer.id' => $offer_id);
		  $offer_data = $this->Offer->find('first',array('conditions'=>$conditions));
		  $this->set('offer_data',$offer_data);     
    } else {
		  $offer_data['Offer']['id'] = null;
		  $offer_data['Offer']['OfferCode'] = null;
		  $this->set('offer_data',$offer_data);    
		  $this->render('new');     
    }
  }
	  
}