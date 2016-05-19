<?php

class BookCategory extends AppModel
{
	var $name = 'BookCategory';
	var $useTable = 'BookCategory';
	var $primaryKey= 'BookCategoryID';
	var $recursive = -1;
	var $belongsTo = array(
        'Category' => array(
            'className'    => 'Category',
            'foreignKey'    => 'CategoryCode'
        ),
        'Offer' => array(
            'className'    => 'Offer',
            'foreignKey'    => 'OfferCode'
        ),
    );
}

?>
