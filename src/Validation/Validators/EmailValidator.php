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
 * EmailValidator - receives an email and validates only if it holds a value
 *
 * @author    Dave Meikle
 *
 * @copyright 2007 - 2014
 */
class EmailValidator extends AbstractValidator implements ValidatorInterface
{

  
    public function __construct()
    {
    }


    /**
     * validate
     *
     * @param string    action
     * @param ValidationItem    object
     *
     * @return boolean
     */
    public function validate($value)
    {

        if (!$this->checkParams($value)) {
            return false;
        }

        //cannot inline this filter - I tried
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

}

