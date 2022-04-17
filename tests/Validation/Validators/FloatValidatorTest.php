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


namespace tests\Validation\Validators;

use Validation\Validators\FloatValidator;
use tests\BaseTest;

/**
 * FloatValidatorTest
 *
 * @author Dave Meikle
 */
class FloatValidatorTest extends BaseTest {

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidFloat_shouldReturnTrue() {
        $validator = new FloatValidator();

        $result = $validator->validate("60.4");

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidFloat_shouldReturnFalse() {
        $validator = new FloatValidator();

        $result = $validator->validate("invalid value");

        $this->assertFalse($result);
    }
    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidFloatWithLimit_shouldReturnTrue() {
        $validator = new FloatValidator();
        $result = $validator->setParams([
            'MaxValue' => 10
        ])->validate("9");
        $this->assertTrue($result);

        $result = $validator->validate("60.4");

        $this->assertFalse($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse() {
        $validator = new FloatValidator();

        $result = $validator->setParams([
            'MaxValue' => 10
        ])->validate("19.4");

      $this->assertFalse($result);
    }

}
