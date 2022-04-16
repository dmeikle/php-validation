<?php

namespace Validation\Params;

use Validation\Exceptions\InvalidParameterTypeException;
use Validation\Params\Contracts\ParameterInterface;

class MinLengthParam implements ParameterInterface
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

        return strlen($value) >= (int) $param;
    }
}