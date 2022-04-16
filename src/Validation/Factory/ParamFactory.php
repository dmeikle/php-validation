<?php

namespace Validation\Factory;

use Validation\Exceptions\ParamNotFoundException;
use Validation\Params\Contracts\ParameterInterface;

class ParamFactory
{


    public static function getParam(string $paramName) : ParameterInterface
    {
        $paramName = 'Validation\\Params\\' . $paramName . 'Param';
        if (!class_exists($paramName)) {
            throw new ParamNotFoundException($paramName);
        }

        return new $paramName();
    }
}