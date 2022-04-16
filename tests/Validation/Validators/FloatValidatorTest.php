<?php

/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
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

    public function testValidFloat() {
        $validator = new FloatValidator();

        $result = $validator->validate("60.4");

        $this->assertTrue($result);
    }

    public function testInvalidFloat_shouldReturnFalse() {
        echo "3";
        $validator = new FloatValidator();
        $result = $validator->setParams([
            'MaxValue' => 10
        ])->validate("9");
        $this->assertTrue($result);

        $result = $validator->validate("60.4");

        $this->assertFalse($result);
    }

    public function testExceedsMax_shouldReturnFalse() {
        $validator = new FloatValidator();

        $result = $validator->setParams([
            'MaxValue' => 10
        ])->validate("19.4");

      $this->assertFalse($result);
    }

}
