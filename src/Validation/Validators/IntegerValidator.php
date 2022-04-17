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
 * IntegerValidator - receives an address and validates only if it holds a value
 * 
 * @author	Dave Meikle
 * 
 * @copyright 2007 - 2014
 */
class IntegerValidator extends AbstractValidator implements ValidatorInterface{
    
  
    public function __construct() {
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
         if(!$this->checkParams($value)) {
             return false;
         }

          if (filter_var($value, FILTER_VALIDATE_INT)) {
             return true;
         }

         return false;
    }

}

