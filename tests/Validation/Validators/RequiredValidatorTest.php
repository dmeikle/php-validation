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

class RequiredValidatorTest extends BaseTest
{

    /**
     * Test the basic functionality
     *
     * @return void
     */
    public function testValidIPAddress_shouldReturnTrue()
    {
        $validator = new RequiredValidator();

        $result = $validator->validate(Constants::VALID_EMAIL_ADDRESS);

        $this->assertTrue($result);
    }

    /**
     * Test the basic functionality with invalid
     *
     * @return void
     */
    public function testInvalidIPAddress_shouldReturnFalse()
    {
        $validator = new RequiredValidator();

        $result = $validator->validate(Constants::EMPTY_STRING);

        $this->assertFalse($result);
    }

}