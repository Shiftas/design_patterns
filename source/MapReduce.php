<?php
namespace Shiftas\Source;

use Shiftas\Source\Decorator\ArrayList;

/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/20/16
 * Time: 11:14 AM
 */
class MapReduce
{
    /**
     * @param array $persons
     *
     * @return array[Person]
     */
    public function filterMax(array $persons): array
    {
        $max = max(array_map(function(Person $p) {return $p->getSalary();}, $persons));
        $filtered = array_filter($persons, function(Person $p) use ($max) {return $p->getSalary() == $max;});

        return array_values($filtered);
    }

    /**
     * @param ArrayList $persons
     *
     * @return ArrayList[Person]
     */
    public function filterMaxWithList(ArrayList $persons): ArrayList
    {
        $max = $persons->map(function(Person $p) {return $p->getSalary();})->max();
        return $persons->filter(function(Person $p) use ($max) {return $p->getSalary() == $max;});
    }
}
