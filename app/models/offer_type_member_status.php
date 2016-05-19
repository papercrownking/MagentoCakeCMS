<?php

class OfferTypeMemberStatus extends AppModel
{
	var $name = 'OfferTypeMemberStatus';
	var $useTable = 'OfferTypeMemberStatus';
	var $recursive = -1;	
	var $belongsTo = array(
        'OfferType' => array(
            'className'    => 'OfferType',
            'foreignKey'    => 'OfferTypeCode'
        ),
        'MemberStatus' => array(
            'className'    => 'MemberStatus',
            'foreignKey'    => 'MemberStatusCode'
        ),
    );
}

?>