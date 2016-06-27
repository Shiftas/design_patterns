<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 6/27/16
 * Time: 11:52 AM
 */

namespace Shiftas\Test\ObjectPool;


use Shiftas\Source\ObjectPool\Printer;
use Shiftas\Source\ObjectPool\PrinterPool;
use Shiftas\Source\ObjectPool\PrinterUnavailableException;

class PrinterPoolTest extends \PHPUnit_Framework_TestCase
{
    public function testCreationOfPrinter()
    {
        $pool = new PrinterPool(1);
        $this->assertInstanceOf(Printer::class, $pool->getPrinter());
    }

    public function testCreatesMultipleInstances()
    {
        $pool = new PrinterPool(2);
        $printer1 = $pool->getPrinter();
        $printer2 = $pool->getPrinter();

        $this->assertNotSame($printer1, $printer2);
    }

    public function testReleasingPrinter()
    {
        $pool = new PrinterPool(2);
        $printer1 = $pool->getPrinter();
        $pool->releasePrinter($printer1);
        $printer2 = $pool->getPrinter();

        $this->assertSame($printer1, $printer2);
    }

    public function testReleasingRandomPrintersCausesException()
    {
        $pool = new PrinterPool(1);
        $pool->getPrinter();

        $this->setExpectedException("InvalidArgumentException");
        $pool->releasePrinter(new Printer());
    }

    public function testCreationLimiterNumberOfPrinters()
    {
        $pool = new PrinterPool(1);
        $pool->getPrinter();

        $this->setExpectedException(PrinterUnavailableException::class);
        $pool->getPrinter();
    }

}
