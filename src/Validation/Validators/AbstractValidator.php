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

use Validation\Factory\ParamFactory;
use Validation\Params\Contracts\ParameterInterface;

/**
 * Description of AbstractValidator
 *
 * @author davem
 */
abstract class AbstractValidator {
   
    protected $params;
    
    protected $regex;
    
    public function __construct($regex) {
        $this->regex = $regex;
    }
    
    /**
     * 
     * @param array $params
     * 
     * @return this
     */
    public function setParams(array $params) {
        $this->params = $params;
        
        return $this;
    }

    /**
     * @param $value
     * @return bool
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    protected function checkParams($value) : bool {
        if($this->params === null) {
            return true; //nothing to validate
        }

        foreach($this->params as $param => $paramvalue) {
            $param = ParamFactory::getParam($param);
            if(!$param->checkParam($value, $paramvalue)) {
                return false;
            }
        }

        return true;
    }

    /**
     * method checkValidChars - does the actual checking
     * 
     * @param ValidationItem 	object
	 *
     */
    protected function checkValidChars($value) : bool {
    	if(!is_array($value) && strlen($value) == 0 || is_array($value) && count($value) == 0) {

            return true;
    	}

		if(!$this->checkParams($value)) {

            return false;
        }

        if(is_array($value)) {
            foreach($value as $row) {
                if(!preg_match($this->regex,$row)) {
                    //fail right away
                    return false;
                }
            }
        }


        return preg_match($this->regex,$value);
    }

    
    /**
     * method checkValidCharsAgainstString - does the actual checking
     * 
     * @param ValidationItem 	object
	 * @param string			valid character list
	 *
     */
    protected function checkValidCharsAgainstString($value, $expression){
        
        //loop through the character array checking each character exists in the expression to validate against
        for($i = 0; $i < count($chars); $i++) {
        	
            $char = $value[i];
			
            if(strpos($expression,$char) < 0) {
            	
            	return false;
            }
                       
        }
		
        return true;
    }
}
