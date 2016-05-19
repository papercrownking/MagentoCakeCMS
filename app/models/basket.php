<?php
class Basket extends AppModel {
	var $name = 'Basket';
	var $useTable = 'baskets';
	var $hasMany = 'Basketoffer';

	function __construct() {
		parent::__construct();
	}

}
