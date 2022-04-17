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

class IntegerValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidInteger_shouldReturnTrue()
    {
        $validator = new IntegerValidator();

        $result = $validator->validate(Constants::INTEGER_VALUE_15);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidInteger_shouldReturnFalse()
    {
        $validator = new IntegerValidator();

        $result = $validator->validate(Constants::FLOAT_VALUE);

        $this->assertFalse($result);
    }

    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidIntegerWithLimit_shouldReturnTrue()
    {
        $validator = new IntegerValidator();
        $result = $validator->setParams([
            ParamFactory::MAX_VALUE => Constants::INTEGER_VALUE_15
        ])->validate(Constants::INTEGER_VALUE_4);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse()
    {
        $validator = new IntegerValidator();

        $result = $validator->setParams([
            ParamFactory::MAX_VALUE => Constants::INTEGER_VALUE_4
        ])->validate(Constants::INTEGER_VALUE_15);

        $this->assertFalse($result);
    }

}