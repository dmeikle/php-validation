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


namespace Validation\Config;

class Constants
{
    public const PARAM_TYPE_NOT_FOUND_EXCEPTION = 'Parameter :paramType not found';
    const CONFIGURATION_NOT_LOADED = 'Validation configuration array not found';
    const ELEMENT_NOT_VALIDATED_EXCEPTION = 'Element not validated';
    const PARAMETER_NOT_FOUND_EXCEPTION = 'Parameter not found';
    const VALIDATION_FAILED = 'Validation Failed';
    const VALIDATOR_NOT_FOUND = 'Validator :validator not found';
    const CONFIGURATION_NOT_FOUND = 'No configuration yaml located at :path';

}