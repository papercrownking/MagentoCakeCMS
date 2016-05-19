<?php
class MemcachedController extends AppController {

	var $name = 'Memcached';
	var $uses = array();
	var $helpers = array('Time','Html','Javascript','Ajax');	
  	
  public function index(){
     $memcache_obj = memcache_connect('127.0.0.1', 11211);
     $memcache_stats = $memcache_obj->getStats();
     $this->set('memcacheStats',$memcache_stats); 
  }
  
  public function flush(){
    $this->layout = 'ajax';
  
    $memcache_obj = memcache_connect('127.0.0.1', 11211);
    $result = memcache_flush($memcache_obj);  
    if($result == true){
				$this->set('data',array('type'=>'success','msg'=>'Foliosociety.com cache flushed successfully.'));   
    } else {
 				$this->set('data',array('type'=>'error','msg'=>'The cache could not be flushed. Please contact the Web Developer.'));  
    } 
  }
  
}

