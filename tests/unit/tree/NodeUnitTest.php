<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tests\tree;

use hiqdev\php\units\tree\TreeConverter;
use hiqdev\php\units\tree\NodeUnit;

/**
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class UnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TreeConverter
     */
    protected $tree;

    /**
     * @var Unit
     */
    protected $byte;

    /**
     * @var Unit
     */
    protected $kilo;

    /**
     * @var Unit
     */
    protected $mega;

    protected function setUp()
    {
        $this->tree = new TreeConverter();
        $this->byte = $this->tree->getNode('byte');
        $this->kilo = $this->tree->getNode('kilobyte');
        $this->mega = $this->tree->getNode('megabyte');
    }

    public function testGetCanon()
    {
        $KB = $this->tree->getNode('KB');
        $MB = $this->tree->getNode('MB');
        $this->assertSame($this->kilo, $KB->getCanon());
        $this->assertSame($this->mega, $MB->getCanon());
    }

}
