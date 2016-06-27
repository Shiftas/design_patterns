<?php

use Shiftas\Source\Decorator\ArrayList;
use Shiftas\Source\Decorator\LoggingCollection;
use Shiftas\Source\Strategy\AscendingSort;
use Shiftas\Source\Strategy\DescendingSort;

require_once 'vendor/autoload.php';

echo "<pre>";
echo "Strategy pattern:\n\n";

$list = new ArrayList([1, 5, 2, 9]);

$list->setSortingStrategy(new AscendingSort());
$list->sort();
print_r($list->getArray());

$list->setSortingStrategy(new DescendingSort());
$list->sort();
print_r($list->getArray());

echo "Decorator pattern:\n\n";

$handler = new \Monolog\Handler\TestHandler();
$logger = new \Monolog\Logger('logger', [$handler]);
$loggingList = new LoggingCollection($list, $logger);
$loggingList->max();
$loggingList->min();
print_r($handler->getRecords());

echo "</pre>";