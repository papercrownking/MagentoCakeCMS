<?php
class Member extends AppModel {
	var $name = 'Member';
	var $useTable = 'Member';
	var $primaryKey = 'MemberID';

	var $validate = array(
                   'FirstName' => array('rule' => array('minLength',1), 'message' => 'First Name required'),
                   'Surname' => array('rule' => array('minLength',1), 'message' => 'Surname required'),
                   'Email' => array('rule' => array('minLength',1), 'message' => 'Email address required'),
                   'Address1' => array('rule' => array('minLength',1), 'message' => 'Address Line 1 required'),
                   'PostCode' => array('rule' => array('minLength',1), 'message' => 'Post Code required'),
                   'CountryCode' => array('rule' => array('minLength',1), 'message' => 'Country Code required'),
                   'MemberStatusCode' => array('rule' => array('minLength',1), 'message' => 'Member Status Code required')
                  );
}
