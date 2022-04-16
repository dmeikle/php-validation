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


use Validation\Exceptions\ValidatorNotFoundException;

class ValidatorFactory
{

    private $validators = array();

    public function getValidator($validatorName, array $params)
    {
        if (!array_key_exists($validatorName, $this->validators)) {
            $validator = 'Validation\\Validators\\' . $validatorName . 'Validator';
            if (!class_exists($validator)) {
                throw new ValidatorNotFoundException();
            }
            $this->validators[$validatorName] = new $validator();
        }

        return $this->validators[$validatorName]->setParams($params);
    }
}
