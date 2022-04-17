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
 * URLValidator - receives an IP and validates only if it holds a value
 *
 * @author    Dave Meikle
 *
 * @copyright 2007 - 2014
 */
class URLValidator extends AbstractValidator implements ValidatorInterface
{

    /** Creates a new instance of URLValidator */
    public function __construct() { }

    /**
     * method validate
     *
     * @param string        action
     * @param ValidationItem    object
     *
     * @return boolean
     */
    public function validate($value)
    {
        if (!$this->checkParams($value)) {
            return false;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }

}
