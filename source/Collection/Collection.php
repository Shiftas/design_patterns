<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:55 AM
 */

namespace Shiftas\Source\Collection;

interface Collection
{
    /**
     * @param callback $f
     *
     * @return Collection
     */
    public function map($f);

    /**
     * @param callback $f
     *
     * @return Collection
     */
    public function filter($f);

    /**
     * @param callback $f
     *
     * @return Collection
     */
    public function reduce($f);

    /**
     * @return mixed
     */
    public function max();

    /**
     * @return mixed
     */
    public function min();

    public function sort();
}
