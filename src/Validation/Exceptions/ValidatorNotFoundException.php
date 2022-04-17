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


namespace Validation\Exceptions;

use Validation\Config\Constants;

class ValidatorNotFoundException extends \Exception
{
    public function __construct(string $validatorName) {
        parent::__construct(
            strtr(Constants::VALIDATOR_NOT_FOUND,
            [
                ':validator' => $validatorName
            ])
        );
    }
}