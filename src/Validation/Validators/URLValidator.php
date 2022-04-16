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
 * URLValidator - receives an IP and validates only if it holds a value
 *
 * @author	Dave Meikle
 *
 * @copyright 2007 - 2014
 */
class URLValidator extends AbstractValidator implements FlyweightValidatorInterface {

    /** Creates a new instance of URLValidator */
    public function __construct() {
        parent::__construct("^((ht|f)tp(s?))\://([0-9a-zA-Z\-]+\.)+[a-zA-Z]{2,6}(\:[0-9]+)?(/([0-9a-zA-Z\-]+))?$^");
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
