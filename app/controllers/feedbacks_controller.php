<?php
class FeedbacksController extends AppController {

	var $name = 'Feedbacks';
	var $uses = array('Feedback');	
	var $order = 'Feedback.id desc';
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
        	'order' => array(
            		'Feedback.id' => 'desc'
        	)
    	);	
	function index(){
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('Feedback.query');
    		}else{
    			$this->Session->write('Feedback.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Feedback.member_id LIKE" => trim($value)."%",
	    		"Feedback.text" => "%".trim($value)."%",
	    		"Feedback.status" => trim($value)
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('Feedback.query',$this->data['query']);		

		} 


		$data = $this->paginate('Feedback',$conditions);	
		$this->set('data',$data);	
	}

	function view($feedback_id){

		$feedback_conditions = array('Feedback.id' => $feedback_id);
		$data = $this->Feedback->find('first',array('conditions'=>$feedback_conditions));
	
		$this->set('data',$data);
	}

	function export(){

		$conditions = array();

		
    		$this->data['query'] = $this->Session->read('Feedback.query');
    		

		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Feedback.member_id LIKE" => trim($value)."%",
	    		"Feedback.text" => "%".trim($value)."%",
	    		"Feedback.status" => trim($value)
	    	);
		}
		}
		$data = $this->Feedback->find('all',array('conditions'=>$conditions,'recursive'=>'-1'));

		require VENDORS.'PHPExcel.php';
		require VENDORS.'PHPExcel/Writer/Excel5.php';

		$objPHPExcel = new PHPExcel();


		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'MemberID');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Text');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Status');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Created');
		$objPHPExcel->getActiveSheet()->setTitle('UnsubscribeFeedback');

		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		$i = 2;
		foreach($data as $item){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,$item['Feedback']['id']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,$item['Feedback']['member_id']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,$item['Feedback']['text']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,$item['Feedback']['status']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,$item['Feedback']['created']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="feedback-export.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output'); 

	}

	function processed(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			$save_data['Feedback']['id'] = $row;
			$save_data['Feedback']['status'] = 'processed';				
			if($this->Feedback->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Feedback row(s) set to PROCESSED.', 'flash_success');
		} else {
			$this->Session->setFlash('No rows updated', 'flash_failure');
		}
		$this->redirect('/feedbacks/index');
	}

	function unprocessed(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			$save_data['Feedback']['id'] = $row;
			$save_data['Feedback']['status'] = 'unprocessed';				
			if($this->Feedback->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Feedback row(s) set to UNPROCESSED.', 'flash_success');
		} else {
			$this->Session->setFlash('No rows updated', 'flash_failure');
		}
		$this->redirect('/feedbacks/index');
	}

}
