<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017-2018, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tests;

use Symfony\Component\Yaml\Yaml;

/**
 * There is no generator for units-tree.php: it is hand-maintained alongside
 * units-tree.yml. This test ensures the two never drift apart.
 */
class UnitsTreeConsistencyTest extends \PHPUnit\Framework\TestCase
{
    private const YML_PATH = __DIR__ . '/../../res/units-tree.yml';
    private const PHP_PATH = __DIR__ . '/../../res/units-tree.php';

    public function testPhpTreeMatchesYamlTree(): void
    {
        $yaml = Yaml::parseFile(self::YML_PATH);
        $php = require self::PHP_PATH;

        $expected = [];
        foreach ($yaml as $root => $children) {
            // Every yaml root is also a directly usable unit, with itself as parent.
            $expected[$root] = ['parent' => '', 'factor' => 1];
            foreach ($children as $name => $factor) {
                $expected[$name] = ['parent' => $root, 'factor' => $factor];
            }
        }

        ksort($expected);
        $actual = $php;
        ksort($actual);

        $this->assertSame($expected, $actual, 'units-tree.yml and units-tree.php are out of sync; there is no generator, so both must be edited by hand.');
    }
}
