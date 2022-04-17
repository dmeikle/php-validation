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

class URLValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidURL_shouldReturnTrue()
    {
        $validator = new URLValidator();

        $result = $validator->validate(Constants::VALID_URL);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidURL_shouldReturnFalse()
    {
        $validator = new URLValidator();

        $result = $validator->validate(Constants::INVALID_URL);

        $this->assertFalse($result);
    }

    /**
     * Test a value that is within the limit
     *
     * @return void
     */
    public function testValidURLWithLimit_shouldReturnTrue()
    {
        $validator = new URLValidator();
        $result = $validator->setParams([
            ParamFactory::MAX_LENGTH => Constants::INTEGER_VALUE_50
        ])->validate(Constants::VALID_URL);

        $this->assertTrue($result);
    }

    /**
     * Test a value that exceeds the max limit
     *
     * @return void
     */
    public function testExceedsMax_shouldReturnFalse()
    {
        $validator = new URLValidator();

        $result = $validator->setParams([
            ParamFactory::MAX_LENGTH => Constants::INTEGER_VALUE_15
        ])->validate(Constants::LONG_URL);

        $this->assertFalse($result);
    }


}