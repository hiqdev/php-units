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

/**
 * Units organized as tree.
 *
 * parent:
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class NodeUnit extends RootUnit
{
    /**
     * @var null|RootUnit null when root
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
    public function __construct(TreeConverter $converter, $name, RootUnit $parent, $method)
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
     * @var RootUnit
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
     * @var RootUnit
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
