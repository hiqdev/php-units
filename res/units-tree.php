<?php

return array (
  'item' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'items' => 
  array (
    'parent' => 'item',
    'factor' => 1,
  ),
  'dozen' => 
  array (
    'parent' => 'item',
    'factor' => 12,
  ),
  'month' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'year' => 
  array (
    'parent' => 'month',
    'factor' => 12,
  ),
  'minute' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'min' => 
  array (
    'parent' => 'minute',
    'factor' => 1,
  ),
  'hour' => 
  array (
    'parent' => 'min',
    'factor' => 60,
  ),
  'day' => 
  array (
    'parent' => 'hour',
    'factor' => 24,
  ),
  'week' => 
  array (
    'parent' => 'day',
    'factor' => 7,
  ),
  'bit' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'byte' => 
  array (
    'parent' => 'bit',
    'factor' => 8,
  ),
  'kb' => 
  array (
    'parent' => 'byte',
    'factor' => 1000,
  ),
  'mb' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000,
  ),
  'gb' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000,
  ),
  'tb' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000000,
  ),
  'kilobyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000,
  ),
  'KB' => 
  array (
    'parent' => 'kilobyte',
    'factor' => 1,
  ),
  'megabyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000,
  ),
  'MB' => 
  array (
    'parent' => 'megabyte',
    'factor' => 1,
  ),
  'gigabyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000,
  ),
  'GB' => 
  array (
    'parent' => 'gigabyte',
    'factor' => 1,
  ),
  'terabyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000000,
  ),
  'petabyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000000000,
  ),
  'exabyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1000000000000000000,
  ),
  'zettabyte' => 
  array (
    'parent' => 'byte',
    'factor' => '1000000000000000000000',
  ),
  'yottabyte' => 
  array (
    'parent' => 'byte',
    'factor' => '1000000000000000000000000',
  ),
  'kibibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1024,
  ),
  'mebibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1048576,
  ),
  'gibibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1073741824,
  ),
  'tebibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1099511627776,
  ),
  'pebibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1125899906842624,
  ),
  'exbibyte' => 
  array (
    'parent' => 'byte',
    'factor' => 1152921504606846976,
  ),
  'zebibyte' => 
  array (
    'parent' => 'byte',
    'factor' => '1180591620717411303424',
  ),
  'yobibyte' => 
  array (
    'parent' => 'byte',
    'factor' => '1208925819614629174706176',
  ),
  'bps' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'kbps' => 
  array (
    'parent' => 'bps',
    'factor' => 1000,
  ),
  'Kbps' => 
  array (
    'parent' => 'kbps',
    'factor' => 1,
  ),
  'mbps' => 
  array (
    'parent' => 'bps',
    'factor' => 1000000,
  ),
  'Mbps' => 
  array (
    'parent' => 'mbps',
    'factor' => 1,
  ),
  'gbps' => 
  array (
    'parent' => 'bps',
    'factor' => 1000000000,
  ),
  'Gbps' => 
  array (
    'parent' => 'gbps',
    'factor' => 1,
  ),
  'length' => 
  array (
    'parent' => '',
    'factor' => 1,
  ),
  'mm' => 
  array (
    'parent' => 'length',
    'factor' => 1,
  ),
  'milimeter' => 
  array (
    'parent' => 'mm',
    'factor' => 1,
  ),
  'cm' => 
  array (
    'parent' => 'mm',
    'factor' => 10,
  ),
  'centimeter' => 
  array (
    'parent' => 'cm',
    'factor' => 1,
  ),
  'm' => 
  array (
    'parent' => 'mm',
    'factor' => 1000,
  ),
  'metre' => 
  array (
    'parent' => 'm',
    'factor' => 1,
  ),
  'meter' => 
  array (
    'parent' => 'm',
    'factor' => 1,
  ),
  'km' => 
  array (
    'parent' => 'm',
    'factor' => 1000,
  ),
  'kilometre' => 
  array (
    'parent' => 'km',
    'factor' => 1,
  ),
  'kilometer' => 
  array (
    'parent' => 'km',
    'factor' => 1,
  ),
  'inch' => 
  array (
    'parent' => 'length',
    'factor' => 254,
  ),
  'foot' => 
  array (
    'parent' => 'inch',
    'factor' => 12,
  ),
  'yard' => 
  array (
    'parent' => 'inch',
    'factor' => 36,
  ),
);
