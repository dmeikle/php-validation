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


namespace Validation\Params;

use Validation\Exceptions\InvalidParameterTypeException;
use Validation\Params\Contracts\ParameterInterface;

class MaxLengthParam implements ParameterInterface
{

    /**
     * @param $value
     * @param $param
     * @return bool
     * @throws InvalidParameterTypeException
     */
    public function checkParam($value, $param): bool
    {
        if(!is_int($param)) {
            throw new InvalidParameterTypeException();
        }

        return (strlen($value) <= (int) $param);
    }
}