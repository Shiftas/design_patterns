<?php
namespace Shiftas\Test;

use Shiftas\Source\ArrayList;
use Shiftas\Source\MapReduce;
use Shiftas\Source\Person;

/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/20/16
 * Time: 11:14 AM
 */
class MapReduceTest extends \PHPUnit_Framework_TestCase
{
    public function testMaxFilter()
    {
        $person1 = new Person("person1", 100, 8);
        $person2 = new Person("person2", 1400, 20);
        $person3 = new Person("person3", 1000, 20);
        $person4 = new Person("person4", 1400, 20);
        $persons = [$person1, $person2, $person3, $person4];
        $mapReduce = new MapReduce();
        $this->assertEquals([$person2, $person4], $mapReduce->filterMax($persons));
    }

    public function testMaxFilterWithList()
    {
        $person1 = new Person("person1", 100, 8);
        $person2 = new Person("person2", 1400, 20);
        $person3 = new Person("person3", 1000, 20);
        $person4 = new Person("person4", 1400, 20);
        $persons = new ArrayList([$person1, $person2, $person3, $person4]);
        $mapReduce = new MapReduce();
        $this->assertEquals(new ArrayList([$person2, $person4]), $mapReduce->filterMaxWithList($persons));
    }
}
