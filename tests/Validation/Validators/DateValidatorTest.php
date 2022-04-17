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
use const Grpc\CALL_ERROR_NOT_ON_SERVER;

class DateValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidDate_shouldReturnTrue() {
        $validator = new DateValidator();

        $result = $validator->validate(Constants::VALID_DATE);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidDate_shouldReturnFalse() {
        $validator = new DateValidator();

        $result = $validator->validate(Constants::INVALID_DATE);

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidDateWithLimit_shouldReturnTrue() {
        $validator = new DateValidator();
        $result = $validator->setParams([
            ParamFactory::MAX_VALUE => Constants::MAX_DATE_VALUE
        ])->validate(Constants::LOW_DATE_VALUE);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new DateValidator();

        $result = $validator->setParams([
            ParamFactory::MAX_VALUE => Constants::MAX_DATE_VALUE
        ])->validate(Constants::HIGH_DATE_VALUE);

        $this->assertFalse($result);
    }
}