<?php

namespace Validation\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Validation\Config\Constants;

class InvalidParameterTypeException extends \Exception
{
    public function __construct(string $paramType)
    {
        parent::__construct(
            strtr(Constants::PARAM_TYPE_NOT_FOUND_EXCEPTION, [
                ':paramType' => $paramType
            ])
        );
    }
}