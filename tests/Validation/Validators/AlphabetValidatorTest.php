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

class AlphabetValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidAlphabet_shouldReturnTrue() {
        $validator = new AlphabetValidator();

        $result = $validator->validate(Constants::VALID_ALPHABET_STRING);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidAlphabet_shouldReturnFalse() {
        $validator = new AlphabetValidator();

        $result = $validator->validate(Constants::VALID_EMAIL_ADDRESS);

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidAlphabetWithLimit_shouldReturnTrue() {
        $validator = new AlphabetValidator();
        $result = $validator->setParams([
            'MaxLength' => Constants::INTEGER_VALUE_4
        ])->validate(Constants::ALPHABET_EXCEEDS_MAX_LENGTH_4);
        $this->assertFalse($result);

        $result = $validator->validate(Constants::ALPHABET_LENGTH_LESS_THAN_4);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new AlphabetValidator();

        $result = $validator->setParams([
            'MaxValue' => 10
        ])->validate("19.4");

        $this->assertFalse($result);
    }
}