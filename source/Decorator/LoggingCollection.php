<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 11:59 AM
 */

namespace Shiftas\Source\Decorator;


use Monolog\Logger;

class LoggingCollection implements Collection
{
    /** @var Collection */
    private $collection;

    /** @var Logger */
    private $logger;

    /**
     * LoggingList constructor.
     *
     * @param Collection $collection
     * @param Logger     $logger
     */
    public function __construct(Collection $collection, Logger $logger)
    {
        $this->collection = $collection;
        $this->logger = $logger;
    }

    public function map($f)
    {
        $this->getLogger()->log(Logger::DEBUG, "mapping collection");
        return $this->getCollection()->map($f);
    }

    public function filter($f)
    {
        $this->getLogger()->log(Logger::DEBUG, "filtering collection");
        return $this->getCollection()->filter($f);
    }

    public function reduce($f)
    {
        $this->getLogger()->log(Logger::DEBUG, "reducing collection");
        return $this->getCollection()->reduce($f);
    }

    public function max()
    {
        $this->getLogger()->log(Logger::DEBUG, "calculating max value in the collection");
        return $this->getCollection()->max();
    }

    public function min()
    {
        $this->getLogger()->log(Logger::DEBUG, "calculating min value in the collection");
        return $this->getCollection()->min();
    }

    public function sort()
    {
        $this->getLogger()->log(Logger::DEBUG, "sorting collection");
        $this->getCollection()->sort();
    }

    /**
     * @return Collection
     */
    protected function getCollection()
    {
        return $this->collection;
    }

    /**
     * @return Logger
     */
    protected function getLogger()
    {
        return $this->logger;
    }
}
