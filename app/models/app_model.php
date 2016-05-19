<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {


    function isUnique($data,$name)
    {
        if (empty($data))
        {
            return true; // it can be empty, this should be validated
                         // separately.
        }
        $this->recursive = -1;
        if (empty($_SESSION['Member']['MemberID']))
        {
            $found = $this->find($this->name.".{$name} = '{$data[$name]}'");
        } else {
            $found = $this->find($this->name.".{$name} = '{$data[$name]}' AND Member.MemberID != '".$_SESSION['Member']['MemberID']."'");
        }
        return !$found;
    }

}
