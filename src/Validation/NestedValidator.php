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

namespace Validation;

/**
 * Description of NestedValidator
 *
 * @author davem
 */
class NestedValidator extends Validator{
    
    public function validateRequest(array $postedParams, $keepNestedResult = false) {   
        $retval = array();
        
        foreach($postedParams as $key => $value) {
            if(is_array($value)) {
                $result = parent::validateRequest($value, $keepNestedResult); 
                if(is_array($result)) {
                    $retval[$key] = $result;
                }                
            } else {
                $result = parent::validateRequest(array($key => $value), $keepNestedResult);
                if(is_array($result)) {
                    $retval[$key] = $result;
                }    
            }
            
        }
        if(!is_null($this->failkey)) {
            $retval['FAIL_KEY'] = $this->failkey;
        }
        return $retval;
    }
}
