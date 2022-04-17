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


namespace tests\Validation\Factory\Config;

class Constants
{
    public const ADDRESS_VALIDATOR = 'Address';
    public const ALPHABET_VALIDATOR = 'Alphabet';
    public const ALPHANUMERIC_VALIDATOR = 'AlphaNumeric';
    public const BUSINESS_NAME_VALIDATOR = 'BusinessName';
    public const CURRENCY_VALIDATOR = 'Currency';
    public const DATE_VALIDATOR = 'Date';
    public const EMAIL_VALIDATOR = 'Email';
    public const FLOAT_VALIDATOR = 'Float';
    public const INTEGER_VALIDATOR = 'Integer';
    public const IP_ADDRESS_VALIDATOR = 'IPAddress';
    public const REQUIRED_VALIDATOR = 'Required';
    public const STRING_VALIDATOR = 'String';
    public const TELEPHONE_VALIDATOR = 'Telephone';
    public const URL_VALIDATOR = 'URL';
    public const INVALID_VALIDATOR = 'NonExistent';
    public const MAX_LENGTH = 'MaxLength';
    const MIN_LENGTH = 'MinLength';
    const MAX_VALUE = 'MaxValue';
    const MIN_VALUE = 'MinValue';
    const PATTERN_PARAM = 'Pattern';
    const EMAIL_REGEX = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
    const VALID_EMAIL_ADDRESS = 'david@quantumunit.com';
    const INTEGER_VALUE_4 = 4;
    const EXCEEDS_INTEGER_VALUE_4 = 5;
    const LESS_THAN_INTEGER_VALUE_4 = 3;
    const LESS_THAN_INTEGER_VALUE_4_LENGTH = 'abc';
    const EXCEEDS_MIN_VALUE_4 = 'ABCDE';
    const VALID_ALPHABET_STRING = 'ASDFGHJKLQWERTYUIOPZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    const ALPHABET_EXCEEDS_MAX_LENGTH_4 = 'ABCDE';
    const ALPHABET_LENGTH_LESS_THAN_4 = 'ABC';
    const VALID_ADDRESS = '#104 - 100 Main St.';
    const INTEGER_VALUE_15 = 15;
    const MAIN_STREET = 'Main St.';
    const VALID_ALPHANUMERIC = 'ASDFGHJKLQWERTYUIOPZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    const INVALID_ALPHANUMERIC = 'ASDFGHJKLQWERTYUIOPZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890@';
    const SHORT_ALPHA_NUMERIC = 'ASD123';
    const VALID_CURRENCY = 100.00;
    const INVALID_CURRENCY = '100.00.00';
    const HIGH_CURRENCY_VALUE = 100.00;
    const LOW_CURRENCY_VALUE = 10.00;
    const VALID_DATE = '2069-07-08';
    const INVALID_DATE = '1900-23-23';
    const MAX_DATE_VALUE = '2008-03-26';
    const LOW_DATE_VALUE = '1969-07-08';
    const HIGH_DATE_VALUE = '2069-07-08';
    const INVALID_EMAIL_ADDRESS = 'invalid.com';
    const SHORT_EMAIL_ADDRESS = 'test@test.com';
    const LONG_EMAIL_ADDRESS = 'david@quantumunit.com';
    const FLOAT_VALUE = 12.5;
    const VALID_IP_ADDRESS = '127.0.0.1';
    const INVALID_IP_ADDRESS = '1233.0123.123';
    const EMPTY_STRING = '';
    const VALID_STRING = 'this is a VALID string with spaces - tada';
    const INVALID_STRING = 'this is invalid {}[]|';
    const SHORT_STRING = 'under fifteen';
    const LONG_STRING = 'this string is over fifteen';
    const VALID_TELEPHONE = '1 604-584-8243';
    const INVALID_TELEPHONE = '@1 604-584-8243';
    const LONG_TELEPHONE = '123-123-123-123-4567';
    const VALID_URL = 'https://www.quantumunit.com?testing=true';
    const INVALID_URL = 'www.quantumunit';
    const LONG_URL = '';
    const INTEGER_VALUE_50 = 50;
    const VALID_CONFIGURATION_YML = '/Validation/Factory/Config/validation-tests.yml';
    const INVALID_CONFIGURATION_YML = '/Validation/Factory/Config/non-existent-file.yml';
}