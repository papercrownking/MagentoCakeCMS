<?php

class DashboardController extends AppController {

	public $name = 'Dashboard';
	public $uses = array();
	var $helpers = array('Time','Html','Javascript','Ajax');
	var $components = array('RequestHandler');

	public function index() {

		App::import('Model','BookOrder');
		$this->BookOrder = new BookOrder();	
		$BookOrder_data = $this->BookOrder->find('all',array('limit' => 5,'order'=>array('OrderID DESC')));

    $twoweeks_mktime = mktime(0,0,0,date('m'),date('d')-13,date('Y'),0);
    $twoweeks = date('Y-m-d',$twoweeks_mktime);

    //$lastOrders_data = $this->BookOrder->query("SELECT DATE_FORMAT(CDate, '%d-%m-%y') AS Date,COUNT(OrderID) AS orders FROM `BookOrder` WHERE `CDate` > '".$twoweeks." 00:00:00' AND NOT `OrderStatusCode`='C' GROUP BY DATE_FORMAT(CDate, '%d-%m-%y') ORDER BY DATE_FORMAT(CDate, '%y-%m-%d') ASC"); 
    $lastOrders_data = $this->BookOrder->query("SELECT DATE_FORMAT(CDate, '%d-%m-%y') AS Date,COUNT(OrderID) AS orders FROM `BookOrder` WHERE `CDate` > '2013-02-28 00:00:00' AND NOT `OrderStatusCode`='C' GROUP BY DATE_FORMAT(CDate, '%d-%m-%y') ORDER BY DATE_FORMAT(CDate, '%y-%m-%d') ASC"); 
    
		App::import('Model','SearchWords');
		$this->SearchWords = new SearchWords();	
		$LatestSearch_data = $this->SearchWords->find('all',array('limit' => 5,'order'=>array('CDate DESC')));
		$pastYear = mktime(0,0,0,0,0,date('Y')-1,0);
		$TopSearch_data = $this->SearchWords->Query("SELECT Term,Count(Term),Found FROM `SearchWords` WHERE CDate >= '".date('Y-m-d H:i:s',$pastYear)."' GROUP BY Term ORDER BY Count(Term) DESC LIMIT 5");
  
    $this->set('lastOrders_data',json_encode($lastOrders_data));
		$this->set('BookOrder_data',$BookOrder_data);
		$this->set('LatestSearch_data',$LatestSearch_data);
		$this->set('TopSearch_data',$TopSearch_data);
	}
}
