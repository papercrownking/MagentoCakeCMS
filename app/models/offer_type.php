<?php

class OfferType extends AppModel
{
	var $name = 'OfferType';
	var $useTable = 'OfferType';
	var $validate = array(
                   'OfferTypeCode' => array('rule' => array('minLength',1), 'message' => 'OfferTypeCode required'),
                   'Description' => array('rule' => array('minLength',1), 'message' => 'Description required'),
                   'OfferTypeFlag' => array('rule' => array('minLength',1), 'message' => 'OfferTypeFlag required')
                  );

}

?>
