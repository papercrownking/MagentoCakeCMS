<?php


class ReviewsController extends AppController {

	public $name = 'Reviews';
	public $uses = array('BookReview','Status');
	var $order = 'BookReview.id desc';
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,

		'contains' => array('Book'),
		'recursive' => 1,
        	'order' => array(
            		'BookReview.id' => 'desc'
        	)
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;



		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('BookReview.query');
    		}else{
    			$this->Session->write('BookReview.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"BookReview.member_id LIKE" => trim($value)."%",
	    		"BookReview.BookCode LIKE " => "%".trim($value)."%",
	    		"BookReview.rating4" => trim($value),
			"BookReview.author LIKE" => "%".trim($value)."%",
			"BookReview.comment LIKE" => "%".trim($value)."%",
			"BookReview.approved LIKE" => "%".trim($value)."%",
			"Book.Title LIKE" => "%".trim($value)."%",
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('BookReview.query',$this->data['query']);		

		} 


		$data = $this->paginate('BookReview',$conditions);	
		$this->set('data',$data);
	}

	public function view($review_id){
		App::import('Model','Member');
		$this->Member = new Member();		
		$member_data = NULL;

		$conditions = array('BookReview.id' => $review_id);
		$review_data = $this->BookReview->find('first',array('conditions'=>$conditions));
		

		$customer_review_count = $this->BookReview->find('count',array('conditions'=>array('BookReview.member_id'=>$review_data['BookReview']['member_id'])));
		

		$member_conditions = array('Member.MemberID' => $review_data['BookReview']['member_id']);
		$member_data = $this->Member->find('first',array('conditions'=>$member_conditions));

		$BookReviewStatuses = $this->Status->find('list',array('conditions'=>array('Status.model'=>'BookReview'),'order'=>'Status.name asc','fields'=>array('Status.code', 'Status.name')));
   		$BookReviewStatuses[]['D'] = 'Removed';
   		$BookReviewFlags = array(''=>'Not Set',
                               '1'=>'Inappropiate content',
                               '2'=>'Objectionable material',
                               '3'=>'Promotional content',
                               '4'=>'Off-topic content'
                              );

    		$this->set('BookReviewFlags',$BookReviewFlags);   		
    		$this->set('BookReviewStatuses',$BookReviewStatuses); 

		$this->set('review_data',$review_data);
		$this->set('member_data',$member_data);
		$this->set('customer_review_count',$customer_review_count);
	}


	public function edit(){
			if($this->BookReview->save($this->data)){
				$this->set('data',array('type'=>'success','msg'=>'The review has been saved.'));
			} else {
	      $errors = $this->BookReview->invalidFields();  
        $this->set('errors',$errors);
				$this->set('data',array('type'=>'error','msg'=>'The review could not be saved.'));
			}
				
	}

	public function approve(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			$save_data['BookReview']['id'] = $row;
			$save_data['BookReview']['approved'] = 'A';				
			if($this->BookReview->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Review(s) approved.', 'flash_success');
		} else {
			$this->Session->setFlash('No Reviews approved', 'flash_failure');
		}
		$this->redirect('/reviews/index');
	}

	public function remove(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			if($this->BookReview->delete($row)){
				$counter++;
			} 

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Review(s) deleted successfully.', 'flash_success');
		} else {
			$this->Session->setFlash('No Review(s) deleted', 'flash_failure');
		}
		$this->redirect('/reviews/index');
	}



  	

}
