<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\exceptions;

use hiqdev\php\units\ExceptionInterface;

/**
 * Thrown in runtime when wrong argument given.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
final class InvalidArgumentException extends \RuntimeException implements ExceptionInterface
{
}
