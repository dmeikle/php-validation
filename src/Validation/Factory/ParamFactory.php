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


namespace Validation\Factory;

use Validation\Exceptions\ParamNotFoundException;
use Validation\Params\Contracts\ParameterInterface;

class ParamFactory
{

    public const MAX_VALUE = 'MaxValue';
    public const MIN_VALUE = 'MinValue';
    public const MAX_LENGTH = 'MaxLength';
    public const MIN_LENGTH = 'MinLength';

    /**
     * @param string $paramName
     * @return ParameterInterface
     * @throws ParamNotFoundException
     */
    public static function getParam(string $paramName) : ParameterInterface
    {
        $paramName = 'Validation\\Params\\' . $paramName . 'Param';
        if (!class_exists($paramName)) {
            throw new ParamNotFoundException($paramName);
        }

        return new $paramName();
    }
}