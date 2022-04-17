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

class CurrencyValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidCurrency_shouldReturnTrue() {
        $validator = new CurrencyValidator();

        $result = $validator->validate(Constants::VALID_CURRENCY);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidCurrency_shouldReturnFalse() {
        $validator = new CurrencyValidator();

        $result = $validator->validate(Constants::INVALID_CURRENCY);

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidCurrencyWithLimit_shouldReturnTrue() {
        $validator = new CurrencyValidator();
        $result = $validator->setParams([
            'MaxValue' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::LOW_CURRENCY_VALUE);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new CurrencyValidator();
        $result = $validator->setParams([
            'MaxValue' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::HIGH_CURRENCY_VALUE);
        $this->assertFalse($result);

    }
}