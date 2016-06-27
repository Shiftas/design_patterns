<?php
namespace Shiftas\Source\ObjectPool;

/**
 * Created by PhpStorm.
 * User: aurimas
 * Date: 6/27/16
 * Time: 11:48 AM
 */
class PrinterPool
{
    /** @var int */
    private $availablePrintersCount;

    /** @var array[Printer] */
    private $availablePrinters = [];

    /** @var array[Printer] */
    private $usedPrinters = [];

    public function __construct(int $availablePrintersCount)
    {
        $this->availablePrintersCount = $availablePrintersCount;
    }

    public function getPrinter()
    {
        if (count($this->usedPrinters) >= $this->availablePrintersCount) {
            throw new PrinterUnavailableException("No printer are currently available");
        }

        if (empty($this->availablePrinters)) {
            $this->availablePrinters[] = new Printer();
        }
        $printer = array_shift($this->availablePrinters);
        $this->usedPrinters[spl_object_hash($printer)] = $printer;

        return $printer;
    }

    /**
     * @param Printer $printer
     *
     * @throws \Exception
     */
    public function releasePrinter(Printer $printer)
    {
        $hash = spl_object_hash($printer);
        if (!array_key_exists($hash, $this->usedPrinters)) {
            throw new \InvalidArgumentException("This printer does not belong to this pool!");
        }
        $this->availablePrinters[] = $this->usedPrinters[$hash];
    }
}
