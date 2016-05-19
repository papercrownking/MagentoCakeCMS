<?php
class CategoriesController extends AppController {

	public $name = 'Categories';
	public $uses = array('Category');
	var $order = 'Category.MDate desc';
	var $helpers = array('Time','Html','Javascript','Ajax','Text');
	var $components = array('RequestHandler');
   	var $paginate = array(
        	'limit' => 40,
		'contains' => array('CategoryType'),
		'order' => array('Category.MDate' => 'desc')
    	);

	public function index() {
		$searchTitle = array();
		$conditions = array();
		$limit = 40;

		if(isset($this->params['named']['page']) && !isset($this->data['query'])){
    			$this->data['query'] = $this->Session->read('Category.query');
    		}else{
    			$this->Session->write('Category.query','');
    		}


		if(!empty($this->data['query'])){
		$values = explode(' ',$this->data['query']);
		foreach($values as $value){
	    	$conditions['or'] = array(
	    		"Category.CategoryCode LIKE" => "%".trim($value)."%",
	    		"Category.status_codes LIKE" => "%".trim($value)."%",
	    		"Category.substatus_codes LIKE" => "%".trim($value)."%",
	    		"Category.region_codes LIKE" => "%".trim($value)."%",
	    		"Category.Description LIKE" => "%".trim($value)."%",
			    "CategoryType.text LIKE" => "%".trim($value)."%"

	    	);
		}
	    	$searchTitle[]=$this->data['query'];

	    	$this->Session->write('Category.query',$this->data['query']);		

		} 


		$data = $this->paginate('Category',$conditions);	
		$this->set('data',$data);
	}
	
	public function view($category_id=null){
		$category_data = NULL;
    $parentCatData = $this->Category->find('list',array('fields'=>array('Category.CategoryCode', 'Category.Description'),'conditions'=>'ParentCategoryCode is Null'));   	
    $parentCategories = array();
    foreach($parentCatData as $catCode=>$catDesc) {
      $parentCategories[$catCode] = $catCode . ' - ' . $catDesc; 
    }
    
    $this->set('CategoryTypes',$this->Category->CategoryType->find('list',array('fields'=>array('CategoryType.id', 'CategoryType.text'))));    
    $this->set('ParentCategoryCodes',$parentCategories);
    
    if($category_id > 0){
		  $conditions = array('Category.id' => $category_id);
		  $category_data = $this->Category->find('first',array('conditions'=>$conditions));
		  $this->set('category_data',$category_data);
    } else {
		  $category_data['Category']['id'] = null;
		  $category_data['Category']['CategoryCode'] = null;		  
		  $category_data['Category']['region_codes'] = null;	
		  $this->set('category_data',$category_data);    
		  $this->render('new'); 
    }

  }
  
  public function edit(){
   $this->data['Category']['region_codes'] = implode(':',$this->data['Category']['region']).":";
	 if($this->Category->save($this->data)){
	   $this->set('data',array('type'=>'success','msg'=>'The category has been saved.'));
	 } else {
	   $errors = $this->Category->invalidFields();  
     $this->set('errors',$errors);
	   $this->set('data',array('type'=>'error','msg'=>'The category could be not saved.'));
	 }  
  }

  public function add(){
   $this->data['Category']['region_codes'] = implode(':',$this->data['Category']['region']).":";
	 if($this->Category->save($this->data)){
		  $conditions = array('Category.id' => $this->Category->id);
		  $category_data = $this->Category->find('first',array('conditions'=>$conditions));	   
	   $this->set('data',array('type'=>'success','msg'=>'The category has been saved.','id'=>$category_data['Category']['id']));
	 } else {
	   $errors = $this->Category->invalidFields();  
     $this->set('errors',$errors);
	   $this->set('data',array('type'=>'error','msg'=>'The category could be not saved.','id'=>NULL));
	 }  
  }


  
  public function delete(){

		if($this->Category->delete($this->data['Category']['CategoryCode'],FALSE)){			
		  App::import('Model','BookCategory');
		  $this->BookCategory = new BookCategory();	
      $bc_conditions = array('BookCategory.CategoryCode' => $this->data['Category']['CategoryCode']);
		  $bc_data = $this->BookCategory->find('all',array('conditions'=>$bc_conditions));      
      foreach($bc_data as $data){
		    $this->BookCategory->delete($data['BookCategory']['BookCategoryID']);	      
      }      	
      			  
			$this->Session->setFlash('Category deleted successfully.', 'flash_success');
		} else {
			$this->Session->setFlash('Category not deleted.', 'flash_failure');
		}
		$this->redirect('/categories/index');  
  }
  
	public function getAjaxOffers($CategoryCode=NULL){
		App::import('Model','BookCategory');
		$this->BookCategory = new BookCategory();	
	
		$this->autoRender = false;
		if(isset($CategoryCode)){
		  $conditions = array('BookCategory.CategoryCode' => $CategoryCode);
		  $data = $this->BookCategory->find('all',array('conditions'=>$conditions));
		
      $cat_conditions = array('Category.CategoryCode' => $CategoryCode);
		  $cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));

		  $this->set('cat_data',$cat_data);
		  $this->set('data',$data);
		} else {
      $cat_data['Category']['id'] = null;
		  $this->set('cat_data',$cat_data);      
    }
		$this->render('getAjaxOffers','ajax');
	}
  
  public function deleteOffers(){
		App::import('Model','BookCategory');
		$this->BookCategory = new BookCategory();

		$this->autoRender = false;
		$id_conditions = array('BookCategory.BookCategoryID' => $this->data['id']);
		$id_data = $this->BookCategory->find('first',array('conditions'=>$id_conditions));		
		if($this->BookCategory->delete($this->data['id'])){
			$this->set('message','Offer deleted from category');
			$this->set('messageType','success');
		} else {
			$this->set('message','Offer could not be deleted from category');    
			$this->set('messageType','error');
    }

		$data_conditions = array('BookCategory.CategoryCode' => $id_data['BookCategory']['CategoryCode']);
		$data = $this->BookCategory->find('all',array('conditions'=>$data_conditions));		
    	
    $cat_conditions = array('Category.CategoryCode' => $id_data['BookCategory']['CategoryCode']);
		$cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));

		$this->set('cat_data',$cat_data);
		$this->set('data',$data);
		$this->render('getAjaxOffers','ajax'); 
  }
  
  public function deleteMultiOffers($category_id){
		App::import('Model','BookCategory');
		$this->BookCategory = new BookCategory();
    
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
			if($this->BookCategory->delete($row)){
				$counter++;
			} 

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Offer(s) deleted successfully.', 'flash_success');
		} else {
			$this->Session->setFlash('No Offers deleted', 'flash_failure');
		}
		$this->redirect('/categories/view/'.$category_id);    
      
  }
  
  public function addOffers(){
	 App::import('Model','BookCategory');
	 $this->BookCategory = new BookCategory();
	
   $msg = "";	
   $OfferCodes = explode(':',$this->data['BookCategory']['OfferCodes']);
   
   foreach($OfferCodes as $OfferCode){
    $bc_data['BookCategory']['OfferCode'] = $OfferCode;
    $bc_data['BookCategory']['CategoryCode'] = $this->data['BookCategory']['CategoryCode'];
    if($bc_data['BookCategory']['OfferCode'] == ''){continue;}  
      
    if($this->BookCategory->save($bc_data)){
      $msg .= $OfferCode." added to category.<br />";
      $msgType = "success";
    } else {
      $msg .= $OfferCode." could not be added to category, possible duplicate.<br />";   
      $msgType = "error";
    }
	 }
   $this->set('data',array('type'=>$msgType,'msg'=>$msg));   
 
  }
  
  public function addoffersfile(){
    $this->layout = 'ajax';
	 App::import('Model','BookCategory');
	 $this->BookCategory = new BookCategory();
	
   $file = file($_FILES['Filedata']['tmp_name']);
   $i = 0;
   
   foreach($file as $line){
    if($i == 0){ $i++; continue; }  //FILE HEADING
    $explodedLine = explode(",",$line);
    $bc_data['BookCategory']['OfferCode'] = $explodedLine[0];
    $bc_data['BookCategory']['CategoryCode'] = $explodedLine[1];

    if($bc_data['BookCategory']['OfferCode'] == '' || $bc_data['BookCategory']['CategoryCode'] == ''){continue;}
    if($this->BookCategory->save($bc_data)){
      $msg .= $explodedLine[0]." added to category ".$explodedLine[1].".<br />";
      $msgType = "success";
    } else {
      $msg .= $explodedLine[0]." could not be added to category ".$explodedLine[1].", possible duplicate.<br />";   
      $msgType = "error";
    }
    $i++;
   }
      $this->set('data',array('type'=>$msgType,'msg'=>$msg));        
  }
      
  public function uploadfile(){
    
    $this->layout = 'ajax';
    
    $allowed_ext = array('jpg','jpeg','png','gif');  
    $upload_dir = '/var/www/html/media/images/our-books/';
    if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){	
	    $pic = $_FILES['pic'];

	    if(!in_array($this->get_extension($pic['name']),$allowed_ext)){
		    $status = $this->exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	    }    	
		  // File uploads are ignored. We only log them.
		
		  $line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
		  file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		
		  $this->exit_status('Uploads are ignored in demo mode.');

		
	    // Move the uploaded file from the temporary 
	    // directory to the uploads folder:	
	    if(move_uploaded_file($pic['tmp_name'], $upload_dir.$pic['name'])){
		    $status = $this->exit_status('File was uploaded successfuly!');
	    }
    }
    
    $this->set('status',$status);
  }

	public function duplicate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
		  
      $cat_conditions = array('Category.id' => $row);
		  $cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));
		  
		  unset($cat_data['Category']['id']);
		  $cat_data['Category']['CategoryCode'] = $cat_data['Category']['CategoryCode']."-C";		  
		
			if($this->Category->save($cat_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Categories duplicated.', 'flash_success');
		} else {
			$this->Session->setFlash('No categories duplicated', 'flash_failure');
		}
		$this->redirect('/categories/index');
	}
	
	public function activate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
      $cat_conditions = array('Category.id' => $row);
		  $save_data = $this->Category->find('first',array('conditions'=>$cat_conditions));		  
			$save_data['Category']['active'] = '1';		
		
			if($this->Category->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Categories activated.', 'flash_success');
		} else {
			$this->Session->setFlash('No categories activated', 'flash_failure');
		}

		$this->redirect('/categories/index');
	}

	public function deactivate(){
		$rows = $this->data['rowSelect'];
		$counter = 0;
		foreach($rows as $row){
      $cat_conditions = array('Category.id' => $row);
		  $save_data = $this->Category->find('first',array('conditions'=>$cat_conditions));	
			$save_data['Category']['active'] = '0';		
		
			if($this->Category->save($save_data)){
				$counter++;
			}

		}
		if($counter > 0){
			$this->Session->setFlash($counter.' Categories deactivated.', 'flash_success');
		} else {
			$this->Session->setFlash('No categories deactivated', 'flash_failure');
		}
		$this->redirect('/categories/index');
	}
	
	public function addmultioffers(){
		App::import('Model','BookCategory');
		$this->BookCategory = new BookCategory();
		
		$rows = $this->data['rowSelect'];
		$counter = 0;
		$msg = "";
		
		foreach($rows as $row){
		  
      $cat_conditions = array('Category.id' => $row);
		  $cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));	
		  
      $OfferCodes = explode(':',$this->data['BookCategory']['OfferCodes']);	
      
      foreach($OfferCodes as $OfferCode){
        unset($bc_data);
        if($OfferCode == ''){continue;}
        $bc_data['BookCategory']['OfferCode'] = $OfferCode;
        $bc_data['BookCategory']['CategoryCode'] = $cat_data['Category']['CategoryCode'];
        if($this->BookCategory->save($bc_data)){   
          $msg .= $OfferCode." added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_success";
        } else {
          $msg .= $OfferCode." could not be added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_failure";        
        }
      }
		}
	  $this->Session->setFlash($msg,$msg_type);
		$this->redirect('/categories/index');  
  }

	public function addmultiregions(){		
		$rows = $this->data['rowSelect'];
		$counter = 0;
		$msg = "";
		
		foreach($rows as $row){
		  unset($cat_data);
      $cat_conditions = array('Category.id' => $row);
		  $cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));	
      
      $cat_data['Category']['region_codes'] = implode(':',$this->data['Category']['region']).":";		  

      if($this->Category->save($cat_data)){    
          $msg .= $cat_data['Category']['region_codes']." regions added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_success";      
      } else {
          $msg .= $cat_data['Category']['region_codes']." regions could not be added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_failure";     
      }      
		}
	  $this->Session->setFlash($msg,$msg_type);
		$this->redirect('/categories/index');  
  }

 	public function addmultistatus(){		
		$rows = $this->data['rowSelect'];
		$counter = 0;
		$msg = "";
		
		foreach($rows as $row){
		  unset($cat_data);
      $cat_conditions = array('Category.id' => $row);
		  $cat_data = $this->Category->find('first',array('conditions'=>$cat_conditions));	
		  
      $cat_data['Category']['status_codes'] .= $this->data['Category']['status_codes']; 
      if($this->Category->save($cat_data)){    
          $msg .= $this->data['Category']['status_codes']." added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_success";      
      } else {
          $msg .= $this->data['Category']['status_codes']." could not be added to ".$cat_data['Category']['CategoryCode']."<br />";
          $msg_type = "flash_failure";     
      }      
		}
	  $this->Session->setFlash($msg,$msg_type);
		$this->redirect('/categories/index');  
  }

	
  public function exit_status($str){
	 return json_encode(array('status'=>$str));
  }
  
  public function get_extension($file_name){
	 $ext = explode('.', $file_name);
	 $ext = array_pop($ext);
	 return strtolower($ext);
  }

}