<?php
/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 5/27/16
 * Time: 12:10 PM
 */

namespace Shiftas\Test\Collection;

use Monolog\Logger;
use Shiftas\Source\Collection\Collection;
use Shiftas\Source\Collection\LoggingCollection;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class LoggingCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoggingCollection()
    {
        /** @var MockObject|Collection $collectionStub */
        $collectionStub = $this->getMock(Collection::class);
        $collectionStub->method('min')->willReturn(3);

        $loggerStubBuilder = $this->getMockBuilder(Logger::class);
        $loggerStubBuilder->disableOriginalConstructor();
        /** @var MockObject|Logger $loggerStub */
        $loggerStub = $loggerStubBuilder->getMock();
        $loggerStub->expects($this->once())->method('log')->with(Logger::DEBUG, "calculating min value in the collection");

        $loggingCollection = new LoggingCollection($collectionStub, $loggerStub);

        $this->assertEquals(3, $loggingCollection->min());
    }
}
