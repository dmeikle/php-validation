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


namespace Validation\Factory;

use tests\BaseTest;
use tests\Validation\Factory\Config\Constants;
use Validation\Params\MaxLengthParam;
use Validation\Params\MaxValueParam;
use Validation\Params\MinLengthParam;
use Validation\Params\MinValueParam;
use Validation\Params\PatternParam;

class ParamFactoryTest extends BaseTest
{

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMaxLengthParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MAX_LENGTH);

        $this->assertTrue($param instanceof MaxLengthParam);
        $this->assertTrue($param->checkParam(Constants::LESS_THAN_INTEGER_VALUE_4_LENGTH, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testExceedMaxLengthParam_shouldReturnFail() : void {
        $param = ParamFactory::getParam(Constants::MAX_LENGTH);

        $this->assertTrue($param instanceof MaxLengthParam);
        $this->assertFalse($param->checkParam(Constants::EXCEEDS_MIN_VALUE_4, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMinLengthParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MIN_LENGTH);

        $this->assertTrue($param instanceof MinLengthParam);
        $this->assertTrue($param->checkParam(Constants::EXCEEDS_MIN_VALUE_4, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testFailMinLengthParam_shouldReturnFail() : void {
        $param = ParamFactory::getParam(Constants::MIN_LENGTH);

        $this->assertTrue($param instanceof MinLengthParam);
        $this->assertFalse($param->checkParam(Constants::LESS_THAN_INTEGER_VALUE_4_LENGTH, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMinValueParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MIN_VALUE);

        $this->assertTrue($param instanceof MinValueParam);
        $this->assertFalse($param->checkParam(Constants::LESS_THAN_INTEGER_VALUE_4, Constants::INTEGER_VALUE_4));
        $this->assertTrue($param->checkParam(Constants::EXCEEDS_INTEGER_VALUE_4, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMaxValueParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MAX_VALUE);

        $this->assertTrue($param instanceof MaxValueParam);
        $this->assertFalse($param->checkParam(Constants::EXCEEDS_INTEGER_VALUE_4, Constants::INTEGER_VALUE_4));
        $this->assertTrue($param->checkParam(Constants::LESS_THAN_INTEGER_VALUE_4, Constants::INTEGER_VALUE_4));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testPatternParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::PATTERN_PARAM);

        $this->assertTrue($param instanceof PatternParam);
        $this->assertFalse($param->checkParam(Constants::INTEGER_VALUE_4, Constants::EMAIL_REGEX));
        $this->assertTrue($param->checkParam(Constants::VALID_EMAIL_ADDRESS, Constants::EMAIL_REGEX));
    }
}