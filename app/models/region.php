<?php

class Region extends AppModel
{
	var $name = 'Region';
	var $useTable = 'Region';
	var $primaryKey= 'RegionCode';

	var $validate = array(
	                // 'CategoryCode' => array('is_unique' => array('rule' => array('isUnique','CategoryCode'),'message' => 'Sorry, this category code is already in use.')),
                   'IBMsg' => array('rule' => array('minLength',1), 'message' => 'IB Message must not be blank'),
                   'Phone' => array('rule' => array('minLength',1), 'message' => 'Phone number must not be blank'),
                   'ExchangeRate' => array('rule' => 'numeric','message' => 'Exchange Rate must not be blank')
                  );

}

?>
