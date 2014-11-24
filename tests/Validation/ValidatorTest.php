<?php

namespace tests\Validation;

use Validation\Validator;
use Validation\NestedValidator;
use Validation\YamlConfiguration;
use tests\BaseTest;

/**
 * Description of ValidatorTest
 *
 * @author davem
 */
class ValidatorTest extends BaseTest{
   
    public function testCreateValidator() {
        $loader = new YamlConfiguration();        
        $loader->loadConfig(__SITE_PATH . '/validation-config.yml');
        
        
        $validator = new Validator($loader, $this->getLogger());
        
        $result = $validator->validateRequest($this->getPostedParams(), true);
      
        $this->assertTrue(is_array($result));
        $this->assertTrue(array_key_exists('firstname',$result));
        $this->assertEquals('VALIDATION_REQUIRED_FIELD', $result['firstname']);        
    }
 
    private function getPostedParams() {
        return array(
            'blal' => 'humbug',
            'firstname' => '',
            'lastname' => 'meikle',
           // 'email' => 'davidquantumunit.com',
            'password' => 'thIs1s@p@$$w0rd'
        );
        
    }
    
    private function getPostedNestedParams() {
        return array (
            'staff' => array (
                'firstname' => '123',
                'lastname' => '123',
                'telephone' => '123',
                'email' => '123',
                'address1' => '123',
                'address2' => '123',
                'city' => '123',
                'Provinces_id' => '123',
                'postalCode' => '123',
                'password' => '123',
                'passwordConfirm' => '123'
            ),
            'token' => '$1$kbovS4bT$Jod0dIiHq7M5EaAOPTgHX1'
        );
    }
    
    public function testCreateNestedValidator() {
        $loader = new YamlConfiguration();        
        $loader->loadConfig(__SITE_PATH . '/validation-config.yml');
        
        
        $validator = new NestedValidator($loader, $this->getLogger());
        
        $result = $validator->validateRequest($this->getPostedNestedParams(), true);
       
        $this->assertTrue(is_array($result));
        $this->assertTrue(array_key_exists('firstname',$result['staff']));
        $this->assertEquals('VALIDATION_INVALID_STRING', $result['staff']['firstname']);
        
    }
}
