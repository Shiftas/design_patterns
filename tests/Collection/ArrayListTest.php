<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:47 AM
 */

namespace Shiftas\Test\Collection;


use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Shiftas\Source\Collection\ArrayList;
use Shiftas\Source\Strategy\SortStrategy;

class ArrayListTest extends \PHPUnit_Framework_TestCase
{
    public function testSorting()
    {
        /** @var MockObject|SortStrategy $sortStrategy */
        $sortStrategy = $this->getMock(SortStrategy::class, array('sort'));
        $sortStrategy->method('sort')->willReturn([1, 5, 8]);

        $list = new ArrayList([8, 1, 5]);
        $list->setSortingStrategy($sortStrategy);
        $list->sort();

        $this->assertEquals([1, 5, 8], $list->getArray());
    }

    public function testSortingWithNoSortingStrategy()
    {
        $list = new ArrayList([8, 1, 5]);
        $list->sort();

        $this->assertEquals([8, 1, 5], $list->getArray());
    }
}
