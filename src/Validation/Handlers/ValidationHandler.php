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

namespace Validation\Handlers;

use Validation\Exceptions\ConfigurationNotFoundException;
use Validation\Factory\ValidatorFactory;
use Validation\Handlers\Contracts\ValidationHandlerInterface;
use Validation\Providers\Contracts\ValidationProviderInterface;
use Validation\YamlConfiguration;

class ValidationHandler implements ValidationHandlerInterface
{
    private $validationProvider;

    private $factory;

    /**
     * @param ValidationProviderInterface $validationProvider
     */
    public function __construct(ValidationProviderInterface $validationProvider) {
        $this->validationProvider = $validationProvider;
        $this->factory = new ValidatorFactory();
    }

    /**
     * @param array $postedBody
     * @param string $configFilePath
     * @return mixed
     * @throws ConfigurationNotFoundException
     */
    public function validate(array $postedBody, string $configFilePath)
    {
        $config = $this->loadConfig($configFilePath);
        if(!$config || $config === null) {
            throw new ConfigurationNotFoundException($configFilePath);
        }

        $result = $this->validationProvider->validate($this->factory, $config, $postedBody);

        return $result;
    }

    /**
     * @param string $configFilePath
     * @return YamlConfiguration
     */
    private function loadConfig(string $configFilePath) : YamlConfiguration{
        $loader = new YamlConfiguration();
        $loader->loadConfig($configFilePath);

        return $loader;
    }
}