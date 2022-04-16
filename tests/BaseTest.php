<?php

namespace tests;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
class BaseTest extends TestCase
{
    const GET = 'GET';
    
    const POST = 'POST';
    
    protected function getLogger() {
        
            $logger = new Logger('phpUnitTest');
            $logger->pushHandler(new StreamHandler("../logs/phpunit.log", Logger::DEBUG));  
       
        
        return $logger;
    }
    
    protected function setRequestMethod($method) {
        define("__REQUEST_METHOD", $method);
    }
    
    protected function setURI($uri) {
        define('__URI', $uri);
        define("__REQUEST_URI", $uri . '/');
    }
    

}
