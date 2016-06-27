<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:28 AM
 */

namespace Shiftas\Source\Strategy;

interface SortStrategy
{
    public function sort(array $list) : array;
}
