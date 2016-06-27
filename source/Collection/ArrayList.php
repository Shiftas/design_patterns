<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/20/16
 * Time: 1:05 PM
 */

namespace Shiftas\Source\Collection;

use Shiftas\Source\Strategy\SortStrategy;

class ArrayList implements Collection
{
    /** @var array  */
    private $values;

    /** @var SortStrategy */
    private $sortingStrategy;

    /**
     * ArrayList constructor.
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    /**
     * @param SortStrategy $strategy
     */
    public function setSortingStrategy($strategy)
    {
        $this->sortingStrategy = $strategy;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->values;
    }

    public function map($f)
    {
        return new ArrayList(array_values(array_map($f, $this->values)));
    }

    public function filter($f)
    {
        return new ArrayList(array_values(array_filter($this->values, $f)));
    }

    public function reduce($f)
    {
        return new ArrayList(array_values(array_reduce($this->values, $f)));
    }

    public function max()
    {
        return max($this->values);
    }

    public function min()
    {
        return min($this->values);
    }

    public function sort()
    {
        if ($strategy = $this->getSortingStrategy()) {
            $this->values = $strategy->sort($this->values);
        }
    }

    /**
     * @return SortStrategy
     */
    protected function getSortingStrategy()
    {
        return $this->sortingStrategy;
    }
}
