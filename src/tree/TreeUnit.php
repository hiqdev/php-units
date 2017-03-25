<?php
/**
 * PHP Units of Measure Library
 *
 * @link      https://github.com/hiqdev/php-units
 * @package   php-units
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace hiqdev\php\units\tree;

use Closure;
use hiqdev\php\units\UnitInterface;

/**
 * Units organized as tree.
 *
 * parent:
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class TreeUnit extends RootUnit
{
    /**
     * @var null|TreeUnit null when root
     */
    protected $parent;

    /**
     * @var int|float|string
     */
    protected $factor;

    /**
     * @var null|Closure
     */
    protected $method;

    /**
     * @param TreeConverter $converter
     * @param string $name
     * @param RootUnit $parent
     * @param int|float|string|callable $method
     */
    public function __construct(TreeConverter $converter, string $name, RootUnit $parent, $method)
    {
        parent::__construct($converter, $name);
        $this->parent = $parent;
        if ($method instanceof Closure) {
            $this->method = $method;
            $this->factor = null;
        } else {
            $this->factor = $method;
            $this->method = null;
        }
    }

    /**
     * @var TreeUnit
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @var string
     */
    protected $measure;

    /**
     * {@inheritdoc}
     */
    public function getMeasure()
    {
        if ($this->measure === null) {
            $this->measure = $this->findMeasure();
        }

        return $this->measure;
    }

    public function findMeasure()
    {
        return $this->getRoot()->getName();
    }

    /**
     * @var TreeUnit
     */
    protected $root;

    public function getRoot()
    {
        if ($this->root === null) {
            $this->root = $this->getParent()->getRoot();
        }

        return $this->root;
    }

}
