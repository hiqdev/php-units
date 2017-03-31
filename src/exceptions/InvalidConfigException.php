<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\exceptions;

use hiqdev\php\units\ExceptionInterface;

/**
 * Thrown on wrong configuration.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
final class InvalidConfigException extends \RuntimeException implements ExceptionInterface
{
}
