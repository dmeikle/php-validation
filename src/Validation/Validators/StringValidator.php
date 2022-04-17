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
 * Description of RequiredCommand
 *
 * @author davem
 */
class StringValidator extends AbstractValidator implements ValidatorInterface {
   
    
    /** Creates a new instance of StringValidatorCommand */
    public function __construct() {
        parent::__construct("/^[a-zA-Z\\s\-\']+$/");
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


