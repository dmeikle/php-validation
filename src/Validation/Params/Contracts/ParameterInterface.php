<?php

namespace Validation\Params\Contracts;

interface ParameterInterface
{

    public function checkParam($value, $param) : bool;
}