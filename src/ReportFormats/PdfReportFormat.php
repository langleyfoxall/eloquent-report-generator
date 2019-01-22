<?php

namespace LangleyFoxall\EloquentReportGenerator\ReportFormats;

use DivineOmega\uxdm\Objects\Destinations\CSVDestination;
use DivineOmega\uxdm\Objects\Destinations\PDFDestination;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

/**
 * Class PdfReportFormat
 * @package LangleyFoxall\EloquentReportGenerator\ReportFormats
 */
class PdfReportFormat implements ReportFormatInterface
{
    /**
     * @param string $filename
     * @return PDFDestination
     */
    public function getDestination(string $filename)
    {
        $destination = new PDFDestination($filename);

        $destination->setPaperSize('A4');
        $destination->setPaperOrientation('portrait');

        return $destination;
    }
}