<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:37 AM
 */

namespace Shiftas\Source\Strategy;

class DescendingSort implements SortStrategy
{
    /**
     * @param array $list
     *
     * @return array
     */
    public function sort(array $list)
    {
        rsort($list);
        return $list;
    }
}
