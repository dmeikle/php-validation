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


use Validation\Factory\FlyweightValidatorInterface;

/**
 * IPAddressValidator - receives an IP and validates only if it holds a value
 * 
 * @author	Dave Meikle
 * 
 * @copyright 2007 - 2014
 */
class IPAddressValidator extends AbstractValidator implements FlyweightValidatorInterface{
    
    /** Creates a new instance of EmailValidatorCommand */
    public function __construct() {
        parent::__construct("/^((2[0-4]\\d|25[0-5]|[01]?\\d\\d?)\\.){3}(2[0-4]\\d|25[0-5]|[01]?\\d\\d?)$/");
    }


    /**
     * method validate
     * 
     * @param string 		action
     * @param ValidationItem 	object
     * 
     * @return boolean
     */
    public function validate($value) {
        return $this->checkValidChars($value);
    }
}

