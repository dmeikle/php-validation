<?php

namespace Validation\Factory;

use tests\BaseTest;
use tests\Validation\Factory\Config\Constants;
use Validation\Params\MaxLengthParam;
use Validation\Params\MaxValueParam;
use Validation\Params\MinLengthParam;
use Validation\Params\MinValueParam;

class ParamFactoryTest extends BaseTest
{

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMaxLengthParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MAX_LENGTH);

        $this->assertTrue($param instanceof MaxLengthParam);
        $this->assertTrue($param->checkParam('1234567', 8));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testExceedMaxLengthParam_shouldReturnFail() : void {
        $param = ParamFactory::getParam(Constants::MAX_LENGTH);

        $this->assertTrue($param instanceof MaxLengthParam);
        $this->assertFalse($param->checkParam('123456789', 8));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMinLengthParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MIN_LENGTH);

        $this->assertTrue($param instanceof MinLengthParam);
        $this->assertTrue($param->checkParam('a12345', 5));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testFailMinLengthParam_shouldReturnFail() : void {
        $param = ParamFactory::getParam(Constants::MIN_LENGTH);

        $this->assertTrue($param instanceof MinLengthParam);
        $this->assertFalse($param->checkParam('1234', 5));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMinValueParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MIN_VALUE);

        $this->assertTrue($param instanceof MinValueParam);
        $this->assertTrue($param->checkParam('5', 4));
        $this->assertFalse($param->checkParam('5', 6));
    }

    /**
     * @return void
     * @throws \Validation\Exceptions\ParamNotFoundException
     */
    public function testMaxValueParam_shouldReturnOk() : void {
        $param = ParamFactory::getParam(Constants::MAX_VALUE);

        $this->assertTrue($param instanceof MaxValueParam);
        $this->assertFalse($param->checkParam('5', 4));
        $this->assertTrue($param->checkParam('5', 6));
    }
}