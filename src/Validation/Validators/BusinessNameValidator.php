<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @author David Meikle <david@quantumunit.com>
 */

namespace Validation\Validators;


use Validation\Factory\ValidatorInterface;

/**
 * BusinessNameValidator - receives a string and validates only if it holds a value
 * 
 * @author	Dave Meikle
 * 
 * @copyright 2007 - 2014
 */
class BusinessNameValidator extends AbstractValidator implements ValidatorInterface{
    
  
    public function __construct() {
        parent::__construct("^[a-zA-Z\\d '!&()-,.]+$^");
    }


    /**
     * validate
     * 
     * @param string 	action
     * @param string 	value
     * 
     * @return boolean
     */
     public function validate($value) {
        //the object contains a pass/fail flag within it...
        return $this->checkValidChars($value);
    }

}

