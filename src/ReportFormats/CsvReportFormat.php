<?php

namespace LangleyFoxall\EloquentReportGenerator\ReportFormats;

use DivineOmega\uxdm\Objects\Destinations\CSVDestination;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

/**
 * Class CsvReportFormat
 * @package LangleyFoxall\EloquentReportGenerator\ReportFormats
 */
class CsvReportFormat implements ReportFormatInterface
{
    /**
     * @param string $filename
     * @return CSVDestination
     */
    public function getDestination(string $filename)
    {
        return new CSVDestination($filename);
    }
}