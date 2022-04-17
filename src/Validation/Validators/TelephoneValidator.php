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
 * CurrencyValidator - receives an IP and validates only if it holds a value
 * 
 * @author	Dave Meikle
 * 
 * @copyright 2007 - 2014
 */
class TelephoneValidator extends AbstractValidator implements ValidatorInterface{
    
  
    public function __construct() {
        //there are a variety of formats - for now, stick to a strict format:
    	// 1-123-123-1234 x 234
    	// 1-123-123-1234
    	// 1-123-123-1234 ext 234
    	// 1-123-123-1234 x234
    	// 123-123-1234
    	// we can revisit this if we need to change for different country
    parent::__construct('/^\(?[0-9]{3}\)?|[0-9]{3}[-. ]? [0-9]{3}[-. ]?[0-9]{4}$/');
    	//parent::__construct("/^(+)?([0-9])?(\-|\s|\+)?([0-9]{3})+(\-|\s|\+)?([0-9]{3})(\-|\s|\+)?([0-9]{4})(\s)?((ext|x)?((\s)?[0-9])+)?$/");
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
        //return $this->checkValidChars($value);
        if(!$this->checkParams($value)) {
            return false;
        }

        return $this->isValidTelephoneNumber($value);
    }

    function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool {
        if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
            $count = 1;
            $telephone = str_replace(['+'], '', $telephone, $count); //remove +
        }

        //remove white space, dots, hyphens and brackets
        $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);

        //are we left with digits only?
        return $this->isDigits($telephone, $minDigits, $maxDigits);
    }

    function normalizeTelephoneNumber(string $telephone): string {
        //remove white space, dots, hyphens and brackets
        $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);

        return $telephone;
    }

    function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }

}

