<?php

/*
 *  This file is part of the Quantum Unit Solutions development package.
 *
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace tests\Validation;

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

    public function testInvalidFloat() {
        $validator = new FloatValidator();
        $result = $validator->validate("a60.4");
        $this->assertFalse($result);
    }

}
