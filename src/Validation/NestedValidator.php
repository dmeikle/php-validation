<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
