<?php


class RegionsController extends AppController {

	public $name = 'Regions';
	var $order = 'Region.id desc';
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');


	public function index() {
		$searchTitle = array();
		$conditions = array();

		$data = $this->Region->find('all');
		$this->set('data',$data);
	}

	public function view($region_code = "UK"){
		  $conditions = array('Region.RegionCode' => $region_code);
		  $region_data = $this->Region->find('first',array('conditions'=>$conditions));
		  $this->set('region_data',$region_data);	
	}


	public function edit(){
			if($this->Region->save($this->data)){
				$this->set('data',array('type'=>'success','msg'=>'The region has been saved.'));
			} else {
	      $errors = $this->Region->invalidFields();  
        $this->set('errors',$errors);			
				$this->set('data',array('type'=>'error','msg'=>'The region could not be saved.'));
			}
				
	}





  	

}
