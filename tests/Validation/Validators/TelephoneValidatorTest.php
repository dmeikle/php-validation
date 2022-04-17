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


namespace Validation\Validators;

use tests\BaseTest;
use tests\Validation\Factory\Config\Constants;
use Validation\Factory\ParamFactory;

class TelephoneValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidTelephone_shouldReturnTrue()
    {
        $validator = new TelephoneValidator();

        $result = $validator->validate(Constants::VALID_TELEPHONE);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidTelephone_shouldReturnFalse()
    {
        $validator = new TelephoneValidator();

        $result = $validator->validate(Constants::INVALID_TELEPHONE);

        $this->assertFalse($result);
    }

    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidTelephoneWithLimit_shouldReturnTrue()
    {
        $validator = new TelephoneValidator();
        $result = $validator->setParams([
            ParamFactory::MAX_LENGTH => Constants::INTEGER_VALUE_15
        ])->validate(Constants::VALID_TELEPHONE);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse()
    {
        $validator = new TelephoneValidator();

        $result = $validator->setParams([
            ParamFactory::MAX_LENGTH => Constants::INTEGER_VALUE_15
        ])->validate(Constants::LONG_TELEPHONE);

        $this->assertFalse($result);
    }

}