<?php

namespace LangleyFoxall\EloquentReportGenerator\ReportFormats;

use DivineOmega\uxdm\Objects\Destinations\CSVDestination;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

class CsvReportFormat implements ReportFormatInterface
{
    public function getDestination(string $filename)
    {
        return new CSVDestination($filename);
    }
}