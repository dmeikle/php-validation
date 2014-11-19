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
    public function validateRequest(array $postedParams, $keepNestedResult = false) {        
        $retval = array();
       
        foreach($postedParams as $field => $value) {
            $parentKey = $field;
            if(is_array($value)) {
                //override the current key/value pair with the nested value
               $field = key($value);
               $value = current($value);
            }
            $result = $this->validateField($field, $value);
            if($result !== true) { 
                if(!$keepNestedResult || $parentKey == $field) {
                    //it wasn't changed so return as-is
                    $retval[$field] = $result;
                    $retval[$field . '_value'] = $value;
                } else {
                    $retval[$parentKey][$field]  = $result;
                    $retval[$parentKey][$field . '_value']  = $value;
                }
                
            }
        }       
        if(count($retval) > 0) {
            
            $failkey = $this->config->getNode('failkey');
           
            $retval['FAIL_KEY'] = $failkey;
            
            return $retval;
        }
        
        return true;
    }
    
    /**
     * loads the commands based on the configuration file
     * 
     * @param type $key
     */
    private function validateField( $field, $value, $fieldConfig = null, $nested = false) {
       
       //this is all the fields on this page configuration 
       $localConfig = $this->config->getNode('fields');
     print_r($fieldConfig);
        if(is_null($fieldConfig)) {
            //now to get the config for just this field
            $fieldConfig = $this->findElementInArray($localConfig, $field);
        }
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
    
    private function checkElementExists(array $array, $value) {
        foreach($array as $key => $row) {
            echo "check $value\r\n";
            print_r($row);
            
            if($value == $key) {
                return true;
            }
            return false;
        }
    }
    
    private function findElementInArray($configList, $key) {
        
        foreach ($configList as $item) {
            if(array_key_exists($key, $item)) {
                return $item[$key];
            }
        }
        
        return false;
    }
}
