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
 * DateValidator - receives a date and validates only if it holds a value
 * 
 * @author	Dave Meikle
 * 
 * @copyright 2007 - 2014
 */
class DateValidator extends AbstractValidator implements ValidatorInterface{
    
  
    public function __construct() {
        parent::__construct("/^-?[0-9]+(?:\.[0-9]{1,2})?$/");
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

        //pass it if there's nothing to check
        if(strlen($value) == 0) {               
                return true;
        }
       
        return $this->isDate($value);
    }

    /**
    * method isDate - checks format to ensure is proper date format
    * 
    * @param string - the date to check
    * 
    * @return boolean
    */
    private function isDate($string) {
        $t = strtotime($string);

        //for invalid strings it defaults to 01/01/1970 on an empty $t value
        //so kick it out before we check if there's no value in $t
        if($t=='') {
                return false;
        }

        $m = date('m',$t);
        $d = date('d',$t);
        $y = date('Y',$t);

        return checkdate ($m, $d, $y);
    }
}

