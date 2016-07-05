<?php

namespace Validation;

use Validation\ConfigLoaderInterface;
use Symfony\Component\Yaml\Yaml;
use Validation\Exceptions\ConfigurationNotLoadedException;

/**
 * Description of YamlConfiguration
 *
 * @author davem
 */
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
