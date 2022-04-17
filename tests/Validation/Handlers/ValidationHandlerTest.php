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


namespace Validation\Handlers;

use tests\BaseTest;
use tests\Validation\Factory\Config\Constants;
use tests\Validation\Factory\Config\SeedData\ValidPostedSeedData;
use tests\Validation\Factory\Config\SeedData\InvalidFirstnameSeedData;
use Validation\Exceptions\ConfigurationNotFoundException;
use Validation\Providers\ValidationProvider;

class ValidationHandlerTest extends BaseTest
{

    /**
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotFoundException
     */
    public function testBasicValidation_shouldReturnTrue() {

        $validationHandler = new ValidationHandler(
            new ValidationProvider()
        );

        $result = $validationHandler->validate(ValidPostedSeedData::getConfig(),
        __SITE_PATH . Constants::VALID_CONFIGURATION_YML
        );

        $this->assertTrue($result);
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotFoundException
     */
    public function testInvalidform_shouldReturnInvalid() {

        $validationHandler = new ValidationHandler(
            new ValidationProvider()
        );

        $result = $validationHandler->validate(InvalidFirstnameSeedData::getConfig(),
            __SITE_PATH . Constants::VALID_CONFIGURATION_YML
        );

        $this->assertEquals($result, InvalidFirstnameSeedData::getExpectedResult());
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ConfigurationNotFoundException
     */
    public function testValidform_missingConfiguration_shouldReturnInvalid() {

        $validationHandler = new ValidationHandler(
            new ValidationProvider()
        );

        try {
            $result = $validationHandler->validate(InvalidFirstnameSeedData::getConfig(),
                __SITE_PATH . Constants::INVALID_CONFIGURATION_YML
            );
            $this->fail('should have failed');
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof ConfigurationNotFoundException);
        }
    }
}