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


namespace Validation\Factory;

use tests\BaseTest;
use tests\Validation\Factory\Config\Constants;
use Validation\Exceptions\ValidatorNotFoundException;
use Validation\Validators\AddressValidator;
use Validation\Validators\AlphabetValidator;
use Validation\Validators\AlphaNumericValidator;
use Validation\Validators\BusinessNameValidator;
use Validation\Validators\CurrencyValidator;
use Validation\Validators\DateValidator;
use Validation\Validators\EmailValidator;
use Validation\Validators\FloatValidator;
use Validation\Validators\IntegerValidator;
use Validation\Validators\IPAddressValidator;
use Validation\Validators\RequiredValidator;
use Validation\Validators\StringValidator;
use Validation\Validators\TelephoneValidator;
use Validation\Validators\URLValidator;
use Validation\YamlConfiguration;

class ValidatorFactoryTest extends BaseTest
{

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetAddressValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::ADDRESS_VALIDATOR, $config);

        $this->assertTrue($validator instanceof AddressValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetAlphabetValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::ALPHABET_VALIDATOR, $config);

        $this->assertTrue($validator instanceof AlphabetValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetAlphaNumericValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::ALPHANUMERIC_VALIDATOR, $config);

        $this->assertTrue($validator instanceof AlphaNumericValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetBusinessNameValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::BUSINESS_NAME_VALIDATOR, $config);

        $this->assertTrue($validator instanceof BusinessNameValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetCurrencyValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::CURRENCY_VALIDATOR, $config);

        $this->assertTrue($validator instanceof CurrencyValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetDateValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::DATE_VALIDATOR, $config);

        $this->assertTrue($validator instanceof DateValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetEmailValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::EMAIL_VALIDATOR, $config);

        $this->assertTrue($validator instanceof EmailValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetFloatValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::FLOAT_VALIDATOR, $config);

        $this->assertTrue($validator instanceof FloatValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetIntegerValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::INTEGER_VALIDATOR, $config);

        $this->assertTrue($validator instanceof IntegerValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetIPAddressValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::IP_ADDRESS_VALIDATOR, $config);

        $this->assertTrue($validator instanceof IPAddressValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetRequiredValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::REQUIRED_VALIDATOR, $config);

        $this->assertTrue($validator instanceof RequiredValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetStringValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::STRING_VALIDATOR, $config);

        $this->assertTrue($validator instanceof StringValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetTelephoneValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::TELEPHONE_VALIDATOR, $config);

        $this->assertTrue($validator instanceof TelephoneValidator);
    }

    /**
     * @test
     *
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotLoadedException
     */
    public function testGetURLValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        $validator = $validatorFactory->getValidator(Constants::URL_VALIDATOR, $config);

        $this->assertTrue($validator instanceof URLValidator);
    }

    public function testGetInvalidValidator() : void {
        $configLoader = new YamlConfiguration();
        $validatorFactory = new ValidatorFactory();

        $configLoader->loadConfig(__SITE_PATH . '/Validation/Factory/Config/validation-tests.yml');

        $config = $configLoader->getNode('fields');
        try {
             $validatorFactory->getValidator(Constants::INVALID_VALIDATOR, $config);
            $this->fail();
        }catch (\Exception $e) {
            $this->assertTrue($e instanceof ValidatorNotFoundException);
        }
    }
}