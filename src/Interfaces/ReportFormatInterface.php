<?php

namespace LangleyFoxall\EloquentReportGenerator\Interfaces;

/**
 * Interface ReportFormatInterface
 * @package LangleyFoxall\EloquentReportGenerator\Interfaces
 */
interface ReportFormatInterface
{
    /**
     * @param string $filename
     * @return mixed
     */
    public function getDestination(string $filename);
}