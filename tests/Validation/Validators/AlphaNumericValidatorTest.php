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

class AlphaNumericValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidAlphaNumeric_shouldReturnTrue() {
        $validator = new AlphaNumericValidator();

        $result = $validator->validate(Constants::VALID_ALPHANUMERIC);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidAlphaNumeric_shouldReturnFalse() {
        $validator = new AlphaNumericValidator();

        $result = $validator->validate(Constants::INVALID_ALPHANUMERIC);

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidAlphaNumericWithLimit_shouldReturnTrue() {
        $validator = new AlphaNumericValidator();
        $result = $validator->setParams([
            'MaxLength' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::SHORT_ALPHA_NUMERIC);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new AlphaNumericValidator();
        $result = $validator->setParams([
            'MaxLength' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::VALID_ALPHANUMERIC);
        $this->assertFalse($result);

    }
}