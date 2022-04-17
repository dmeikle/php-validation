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

namespace Validation\Providers;

use Validation\ConfigLoaderInterface;
use Validation\Factory\ValidatorFactory;
use Validation\Providers\Contracts\ValidationProviderInterface;
use Validation\Validator;

class ValidationProvider implements ValidationProviderInterface
{

    /**
     * @param ValidatorFactory $factory
     * @param ConfigLoaderInterface $config
     * @param array $postedBody
     * @return array|bool
     */
    public function validate(ValidatorFactory $factory, ConfigLoaderInterface $config, array $postedBody)
    {
        $validator = new Validator($config, $factory, null);

        return $validator->validateRequest($postedBody, true);
    }
}