<?php

namespace Validation\Params;

use Validation\Params\Contracts\ParameterInterface;

class MaxValueParam implements ParameterInterface
{

    public function checkParam($value, $param): bool
    {
        return $value <= $param;
    }
}