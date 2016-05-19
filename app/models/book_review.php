<?php
class BookReview extends AppModel {
	var $name = 'BookReview';
	var $useTable = 'BookReview';
  var $belongsTo = array(
        	'Book' => array(
            		'className'    => 'Book',
            		'foreignKey'    => 'BookCode',
        	),
        	'Status' => array(
            		'className'    => 'Status',
            		'conditions'   => array('Status.model' => 'BookReview'),
            		'foreignKey' => 'approved',
        	)
    	);

	var $validate = array(
                   'BookCode' => array('rule' => array('minLength',1), 'message' => 'BookCode required'),
                   'author' => array('rule' => array('minLength',1), 'message' => 'Author required'),
                   'rating1' => array('rule' => 'numeric','message' => 'Rating between 1 - 5 required'),
                   'rating2' => array('rule' => 'numeric','message' => 'Rating between 1 - 5 required'),
                   'rating3' => array('rule' => 'numeric','message' => 'Rating between 1 - 5 required'),
                   'rating4' => array('rule' => 'numeric','message' => 'Rating between 1 - 5 required')
                  );

	function __construct() {
		parent::__construct();
	}

}
