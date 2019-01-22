<?php

namespace LangleyFoxall\EloquentReportGenerator\ReportFormats;

use DivineOmega\uxdm\Objects\Destinations\CSVDestination;
use DivineOmega\uxdm\Objects\Destinations\MarkdownDestination;
use DivineOmega\uxdm\Objects\Destinations\PDFDestination;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

/**
 * Class MarkdownReportFormat
 * @package LangleyFoxall\EloquentReportGenerator\ReportFormats
 */
class MarkdownReportFormat implements ReportFormatInterface
{
    /**
     * @param string $filename
     * @return MarkdownDestination
     */
    public function getDestination(string $filename)
    {
        return new MarkdownDestination($filename);
    }
}