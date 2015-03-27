php-validation
==============

my first crack at learning PHP back in 2007. Rewritten in 2014 to use YAML instead of XML.
Changed from Chain of Command pattern to use basic Load-On-Demand instead.


Usage:
-----

$loader = new YamlConfiguration();        
$loader->loadConfig(__SITE_PATH . '/validation-config.yml');

//YAML key
$key = 'new_user_signup';
$validator = new Validator($loader, $this->getLogger()); //Monolog\Logger

$result = $validator->validateRequest($key, $this->getPostedParams());

Notes:
------
if $result is an array holding values, it will be an associative array
where the fieldname is the index key and the LANG_STRING (for multi-locale
support) is the value of that index.

sample YAML config (validation-config.yml):

failkey: some_other_yml_key

fields:

#uses 2 validation routines in this example, Required then String
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
                
#email is optional in this sample so no Required validation needed
    - email
        -
            class: Email
            failkey: VALIDATION_INVALID_EMAIL
            
				
Possible Validation Classes:

	Address
	
	AlphaNumeric - letters and numbers only
	
	Alphabet	- letters only
	
	BusinessName - letters, numbers, apostrophe, and &()-,.
	
	Currency
	
	Date
	
	Email
	
	IPAddress
	
	Integer
	
	Required
	
	String - letters, spaces and apostrophes
	
	Telephone
	
	URL
