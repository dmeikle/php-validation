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

namespace Validation\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use Validation\Config\Constants;

/**
 * Description of ElementNotValidatedException
 *
 * @author davem
 */
class ElementNotValidatedException extends \Exception{
   public function __construct()
   {
       parent::__construct(Constants::ELEMENT_NOT_VALIDATED_EXCEPTION);
   }
}
