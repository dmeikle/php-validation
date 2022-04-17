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

namespace Validation\Params;

use Validation\Params\Contracts\ParameterInterface;

class PatternParam implements ParameterInterface
{

    /**
     * @param $value
     * @param $param
     * @return bool
     */
    public function checkParam($value, $param): bool
    {
        return preg_match($param,$value);
    }
}