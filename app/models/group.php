<?php
class Group extends AppModel {
	var $name = 'Group';
  var $useTable = 'groups';
	var $hasMany = 'User';

	function __construct() {
		parent::__construct();
	}

}
