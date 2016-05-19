<?php
class UsersController extends AppController {

	public $uses = array('User');
	var $helpers = array('Time','Html','Javascript','Ajax');
 	var $components = array('Auth','Session','RequestHandler','Email');
	var $order = 'User.modified desc';	
  var $paginate = array(
        	'limit' => 40,
        	'order' => array(
            		'User.modified' => 'desc'
        	)
        );
  
  
  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
  }

    public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

    $user_groups = array(
      '1' => 'Administrators',
      '2' => 'Editorial',
      '3' => 'Customer Services'
    );

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('User.query');
    		}else{
    			$this->Session->write('User.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"User.username LIKE" => trim($value)."%",
	    		"User.first_name" => trim($value),
	    		"User.last_name" => trim($value),
	    		"User.email LIKE " => "%".trim($value)."%",
	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('User.query',$this->data['query']);		

		} 


		$data = $this->paginate('User',$conditions);	
		$this->set('users',$data);
		$this->set('userGroups',$user_groups);
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

      $user_groups = array(
        '1' => 'Administrators',
        '2' => 'Editorial',
        '3' => 'Customer Services'
      );
      
		  $this->set('userGroups',$user_groups);
      $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
      $user_groups = array(
        '1' => 'Administrators',
        '2' => 'Editorial',
        '3' => 'Customer Services'
      );
      
		  $this->set('userGroups',$user_groups);
    }

    public function edit() {
        
        $explodedReferer = explode('/',$this->referer());
        if(empty($this->data['User']['password']) && $explodedReferer[2] == 'add'){
         $user_password = $this->_generateRandomString(8);
          $this->data['User']['password'] = $user_password;
         $user_data = $this->data['User'];
         $this->data['User']['password'] = $this->Auth->password($user_password);
        }
    
        if ($this->User->save($this->data)) {
          if($explodedReferer[2] == 'add'){
            $this->Email->to = $this->data['User']['email'];
            $this->Email->subject = 'Folio Society CMS Login Details';
            $this->Email->replyTo = 'bounce@foliosociety.com';
            $this->Email->from = 'The Folio Society <bounce@foliosociety.com>';
            $this->Email->template = 'login_info';
            $this->Email->sendAs = 'text'; 
            $this->set('emailUser', $user_data);
            $this->Email->send();          
          }
				  $this->set('data',array('type'=>'success','msg'=>'The user has been saved.'));
        } else {
          $errors = $this->User->invalidFields(); 
          $this->set('errors',$errors);
				  $this->set('data',array('type'=>'error','msg'=>'The user could not be saved.'));
        }   
              
        unset($this->data['User']['password']);       
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function login() {
	   $this->layout = 'nonAuth';	

     if ($this->Auth->login()) {
      $this->redirect($this->Auth->redirect());
     } else {
      $this->Session->setFlash(__('Invalid username or password, try again'));
     }   	
    }

    public function logout() {
    	$this->redirect($this->Auth->logout());
    }
    
    private function _generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
    }
}
