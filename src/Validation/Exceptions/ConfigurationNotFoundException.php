<?php

namespace Validation\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Validation\Config\Constants;

class ConfigurationNotFoundException extends \Exception
{
    public function __construct(string $path)
    {
        parent::__construct(strtr(
            Constants::CONFIGURATION_NOT_FOUND,
            [
                ':path' => $path
            ]
        ));
    }
}