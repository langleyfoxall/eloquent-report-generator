<?php

namespace LangleyFoxall\EloquentReportGenerator\ReportFormats;

use DivineOmega\uxdm\Objects\Destinations\CSVDestination;
use DivineOmega\uxdm\Objects\Destinations\HtmlDestination;
use DivineOmega\uxdm\Objects\Destinations\PDFDestination;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

/**
 * Class HtmlReportFormat
 * @package LangleyFoxall\EloquentReportGenerator\ReportFormats
 */
class HtmlReportFormat implements ReportFormatInterface
{
    /**
     * @param string $filename
     * @return HtmlDestination
     */
    public function getDestination(string $filename)
    {
        return new HtmlDestination($filename);
    }
}