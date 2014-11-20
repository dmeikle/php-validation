<?php

namespace Validation;



use Monolog\Logger;
use Validation\Factory\ValidatorCommandFactory;
use Validation\Exceptions\ElementNotValidatedException;


/**
 * Description of Validator
 *
 * @author davem
 */
class Validator {
    
    protected $logger = null;
    
    protected $config = null;
    
    protected $factory = null;
    
    protected $failkey = null;
    
    
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
            
            $this->failkey = $this->config->getNode('failkey');
            
            $retval['FAIL_KEY'] = $this->failkey;
            
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
     
        if(is_null($fieldConfig)) {
            //now to get the config for just this field
            $fieldConfig = $this->findElementInArray($localConfig, $field);
        }
        if(!$fieldConfig){
            //this element has not been asked to be validate
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
        
        foreach ($configList as $item) {
            if(array_key_exists($key, $item)) {
                return $item[$key];
            }
        }
        
        return false;
    }
}
