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

namespace Validation\Providers\Contracts;

use Validation\ConfigLoaderInterface;
use Validation\Factory\ValidatorFactory;

interface ValidationProviderInterface
{
    public function validate(ValidatorFactory $factory, ConfigLoaderInterface $config, array $postedBody);
}