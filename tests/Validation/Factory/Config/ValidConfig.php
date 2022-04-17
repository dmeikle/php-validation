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


namespace Validation\Factory\Config;

use tests\Validation\Factory\Config\Contracts\ConfigInterface;

class ValidConfig implements ConfigInterface
{

    /**
     * @return \string[][][]
     */
    public static function getConfig(): array
    {
        return [
            'fields' =>
            [
                'firstname' =>
                [
                    'class' => 'Required',
                    'failkey' => 'VALIDATION_REQUIRED_FIELD'
                ],
                'lastname' =>
                    [
                        'class' => 'Required',
                        'failkey' => 'VALIDATION_REQUIRED_FIELD'
                    ],

            ]
        ];
    }

    public static function getExpectedResult(): array
    {
        // TODO: Implement getExpectedResult() method.
    }
}