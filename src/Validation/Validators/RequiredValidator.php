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
class RequiredValidator extends AbstractValidator implements ValidatorInterface {
    

    
    /** Creates a new instance of RequiredValidator */
    public function __construct() {
        
    }
    
    
    public function setParams(array $params) {
        $this->params = $params;
        
        return $this;
    }

    public function validate($value) {
        if(!$this->checkParams($value)) {
            return false;
        }
        
        return strlen($value) > 0;
    }
}
