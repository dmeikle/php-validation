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

class AddressValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidAddress_shouldReturnTrue() {
        $validator = new AddressValidator();

        $result = $validator->validate(Constants::VALID_ADDRESS);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidAddress_shouldReturnFalse() {
        $validator = new AddressValidator();

        $result = $validator->validate(Constants::VALID_EMAIL_ADDRESS);

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidAddressWithLimit_shouldReturnTrue() {
        $validator = new AddressValidator();
        $result = $validator->setParams([
            'MaxLength' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::MAIN_STREET);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new AddressValidator();
        $result = $validator->setParams([
            'MaxLength' => Constants::INTEGER_VALUE_15
        ])->validate(Constants::VALID_ADDRESS);
        $this->assertFalse($result);

    }
}