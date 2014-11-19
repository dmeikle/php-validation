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
            $retval[$key] = parent::validateRequest($value, $keepNestedResult);
        }
        
        return $retval;
    }
}
