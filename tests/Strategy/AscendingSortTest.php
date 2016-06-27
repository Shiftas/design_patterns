<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:37 AM
 */

namespace Shiftas\Test\Strategy;


use Shiftas\Source\Strategy\AscendingSort;

class AscendingSortTest extends \PHPUnit_Framework_TestCase
{
    public function testSort()
    {
        $list = [8, 1, 5];
        $sorter = new AscendingSort();
        $sortedList = $sorter->sort($list);

        $this->assertEquals([1, 5, 8], $sortedList);
    }
}
