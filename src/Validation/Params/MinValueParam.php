<?php

namespace Validation\Params;

use Validation\Params\Contracts\ParameterInterface;

class MinValueParam implements ParameterInterface
{

    public function checkParam($value, $param): bool
    {
        return $value >= $param;
    }
}