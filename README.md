php-validation
==============

my first crack at learning PHP back in 2007. Rewritten in 2014 to use YAML instead of XML.
Changed from Chain of Command pattern to use Flyweight Pattern instead.

usage:
--------start-----
$loader = new YamlConfiguration();        
$loader->loadConfig(__SITE_PATH . '/validation-config.yml');

//YAML key
$key = 'new_user_signup';
$validator = new Validator($loader, $this->getLogger()); //Monolog\Logger

$result = $validator->validateRequest($key, $this->getPostedParams());
----------end ------



sample YAML config (validation-config.yml):

new_user_signup:
    - firstname:
        - 
            class: Required      
            failkey: VALIDATION_REQUIRED_FIELD
        - 
            class: String    
            failkey: VALIDATION_INVALID_STRING
            params:
                maxlength: 20
                
    - lastname:
        - 
            class: Required       
            failkey: VALIDATION_REQUIRED_FIELD         
        - 
            class: String
            failkey: VALIDATION_INVALID_STRING
            params:
                maxlength: 20
                
    - email:
        - 
            class: Required     
            failkey: VALIDATION_REQUIRED_FIELD
        -
            class: Email
            failkey: VALIDATION_INVALID_EMAIL
            params:
                - maxlength: 50 
            
    - password:
        - 
            class: Required      
            failkey: VALIDATION_REQUIRED_FIELD          
        - 
            class: Password
            failkey: VALIDATION_INVALID_PASSWORD
            params:
                maxlength: 20
            
            
