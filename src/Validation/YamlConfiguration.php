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

namespace Validation;

use Validation\ConfigLoaderInterface;
use Symfony\Component\Yaml\Yaml;
use Validation\Exceptions\ConfigurationNotLoadedException;

class YamlConfiguration implements ConfigLoaderInterface {

    private $config = null;

    public function getConfig() {
        return $this->config;
    }

    public function loadConfig($filepath) {
        if (!file_exists($filepath)) {
            return false;
        }
        $this->config = Yaml::parse(file_get_contents($filepath));
    }

    public function getNode($key) {
        if (is_null($this->config)) {
            throw new ConfigurationNotLoadedException();
        }
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }
    }

}
