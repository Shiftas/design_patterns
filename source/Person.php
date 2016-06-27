<?php
namespace Shiftas\Source;

/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/20/16
 * Time: 11:15 AM
 */
class Person
{
    private $name;
    private $salary;
    private $workHours;

    public function __construct($name, $salary, $workHours)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->workHours = $workHours;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getWorkHours()
    {
        return $this->workHours;
    }
}
