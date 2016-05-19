<?php

class OfferTypeSubStatus extends AppModel
{
	var $name = 'OfferTypeSubStatus';
	var $useTable = 'OfferTypeSubStatus';
	var $recursive = -1;	
	var $belongsTo = array(
        'OfferType' => array(
            'className'    => 'OfferType',
            'foreignKey'    => 'OfferTypeCode'
        ),
        'SubStatus' => array(
            'className'    => 'SubStatus',
            'foreignKey'    => 'SubStatus'
        ),
    );
}

?>