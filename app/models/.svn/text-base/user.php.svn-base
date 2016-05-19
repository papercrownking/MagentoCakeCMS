<?php
class User extends AppModel {
	var $name = 'User';
	var $useTable = 'users';


	var $validate = array(
	    'last_name'         => array('rule' => array('minLength',1), 
	                                 'message' => 'Last name must not be blank'),
	    'first_name'        => array('rule' => array('minLength',1),
	                                 'message' => 'First name must not be blank'),
	    'email'             => array('domain_check' => array(
	                                     'rule' => array('checkMailDomain'),
	                                     'message' => 'Email domain does not exist'),
	                                 'email_check' => array(
	                                     'rule' => array('email'),
	                                     'message' => 'A valid email address is required'),
	                                ),
	    'username'          => array('is_unique' => array(
	                                    'rule' => array('checkUnique', array('username')),
	                                    'message' => 'Username is already in use.'),
	                                 'min_length' => array(
	                                    'rule' => array('minLength',3),
	                                    'message' => 'Username must be at least 3 characters long'),
	                                )	    
	);


	function checkMailDomain($email){
        // extract domain
        $maildomain = substr(strstr($email['email'], '@'), 1);
        if ($maildomain == 'foliosociety.com')
        {
            return true;
        }
		if (function_exists("getmxrr") && function_exists("gethostbyname"))
		{
			if (!(getmxrr($maildomain, $temp) || gethostbyname($maildomain) != $maildomain)) return false;
		}
		return true;
	}

  function checkUnique($data, $fields){
    if (!is_array($fields)){
      $fields = array($fields);
    }
    foreach($fields as $key){
      $tmp[$key] = $_POST['data'][$this->name][$key];
    }
    if (isset($_POST['data'][$this->name][$this->primaryKey])){
      $tmp[$this->primaryKey] = "<>".$_POST['data'][$this->name][$this->primaryKey];
    }
    $this->recursive = -1;
    return !$this->find($tmp);
  }
	
}
