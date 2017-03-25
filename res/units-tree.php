<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

return  [
  'bit' => [
    'parent' => '',
    'factor' => 1,
  ],
  'byte' => [
    'parent' => 'bit',
    'factor' => 8,
  ],
  'kilobyte' => [
    'parent' => 'byte',
    'factor' => 1000,
  ],
  'megabyte' => [
    'parent' => 'byte',
    'factor' => 1000000,
  ],
  'gigabyte' => [
    'parent' => 'byte',
    'factor' => 1000000000,
  ],
  'terabyte' => [
    'parent' => 'byte',
    'factor' => 1000000000000,
  ],
  'petabyte' => [
    'parent' => 'byte',
    'factor' => 10000000000000000,
  ],
  'exabyte' => [
    'parent' => 'byte',
    'factor' => '10000000000000000000',
  ],
  'zettabyte' => [
    'parent' => 'byte',
    'factor' => '10000000000000000000000',
  ],
  'yottabyte' => [
    'parent' => 'byte',
    'factor' => '10000000000000000000000000',
  ],
  'kibibyte' => [
    'parent' => 'byte',
    'factor' => 1024,
  ],
  'mebibyte' => [
    'parent' => 'byte',
    'factor' => 1048576,
  ],
  'gibibyte' => [
    'parent' => 'byte',
    'factor' => 1073741824,
  ],
  'length' => [
    'parent' => '',
    'factor' => 1,
  ],
  'mm' => [
    'parent' => 'length',
    'factor' => 1,
  ],
  'milimeter' => [
    'parent' => 'mm',
    'factor' => 1,
  ],
  'cm' => [
    'parent' => 'mm',
    'factor' => 10,
  ],
  'centimeter' => [
    'parent' => 'cm',
    'factor' => 1,
  ],
  'm' => [
    'parent' => 'mm',
    'factor' => 1000,
  ],
  'metre' => [
    'parent' => 'm',
    'factor' => 1,
  ],
  'meter' => [
    'parent' => 'm',
    'factor' => 1,
  ],
  'km' => [
    'parent' => 'm',
    'factor' => 1000,
  ],
  'kilometre' => [
    'parent' => 'km',
    'factor' => 1,
  ],
  'kilometer' => [
    'parent' => 'km',
    'factor' => 1,
  ],
  'inch' => [
    'parent' => 'length',
    'factor' => 254,
  ],
  'foot' => [
    'parent' => 'inch',
    'factor' => 12,
  ],
  'yard' => [
    'parent' => 'inch',
    'factor' => 36,
  ],
];
