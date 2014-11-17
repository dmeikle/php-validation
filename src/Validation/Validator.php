<?php

namespace Validation;

ini_set('display_errors', 1); 
error_reporting(E_ALL);

use Monolog\Logger;
use Validation\Factory\ValidatorCommandFactory;


/**
 * Description of Validator
 *
 * @author davem
 */
class Validator {
    
    protected $logger = null;
    
    protected $config = null;
    
    protected $factory = null;
    
    
    public function __construct(ConfigLoaderInterface $config, Logger $logger) {
        $this->config = $config;
        $this->logger = $logger;
        $this->factory = new ValidatorCommandFactory();
    }
    
    /**
     * the entry point - essentially the only method that needs to be called
     * to validate a form
     * 
     * @param string $key   - the associative array key for the configuration
     * @param array $postedParams   - the posted Request form
     */
    public function validateRequest($key, array $postedParams) {        
        $retval = array();
        
        foreach($postedParams as $field => $value) {
            
            $result = $this->validateField($key, $field, $value);
            if($result !== true) {               
                $retval[$field] = $result;
                $retval[$field . '_value'] = $value;
            }
        }       
        if(count($retval) > 0) {
            $localConfig = $this->config->getNode($key);
            if(array_key_exists('failkey', $localConfig)) {
                $retval['FAIL_KEY'] = $localConfig['failkey'];
            } else {
                $this->logger->addDebug('form validation failed - no failkey element specified in ' . __YML_KEY . '.yml');
            }
            print_r($retval);
            return $retval;
        }
        
        return true;
    }
    
    /**
     * loads the commands based on the configuration file
     * 
     * @param type $key
     */
    private function validateField($key, $field, $value) {
       //this is all the fields on this page configuration 
       $localConfig = $this->config->getNode($key);
     
       //now to get the config for just this field
       $fieldConfig = $this->findElementInArray($localConfig, $field);
       
       if(!$fieldConfig){
          
          return true;
       }
    
       //now iterate each validator and kick out if we fail
       foreach($fieldConfig as $item) {
           $validatorName = $item['class'];
           $params = array();
           
           if(array_key_exists('params', $item)) {
               $params = $item['params'];
           }
           
           $validator = $this->factory->getValidator($validatorName, $params);
          
           if(!$validator->validate($value)) {
               
               return $item['failkey'];
           }
       }
       
       return true;
    }
    
    private function findElementInArray($configList, $key) {
        
        foreach ($configList['fields'] as $item) {
            if(array_key_exists($key, $item)) {
                return $item[$key];
            }
        }
        
        return false;
    }
}
