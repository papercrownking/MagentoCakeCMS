<?php

class Category extends AppModel
{
	var $name = 'Category';
	var $useTable = 'Category';
	var $primaryKey = 'CategoryCode';
  var $belongsTo = array(
        	'CategoryType' => array(
            		'className'    => 'CategoryType',
            		'foreignKey'    => 'category_type_id',
        	));
	var $validate = array(
	                // 'CategoryCode' => array('is_unique' => array('rule' => array('isUnique','CategoryCode'),'message' => 'Sorry, this category code is already in use.')),
                   'Description' => array('rule' => array('minLength',1), 'message' => 'Description must not be blank'),
                   'slug' => array('rule' => array('minLength',1), 'message' => 'Slug must not be blank'),
                   'DisplayOrder' => array('rule' => 'numeric','message' => 'Number between 0 - 9999 required'),
                   'status_codes' => array('rule' => array('minLength',1), 'message' => 'Status Codes must not be blank'),
                   'LayoutTitle' => array('rule' => array('minLength',1), 'message' => 'Page Title must not be blank')
                  );

}
?>

