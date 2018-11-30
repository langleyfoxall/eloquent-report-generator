<?php

namespace LangleyFoxall\EloquentReportGenerator\Traits;

use LangleyFoxall\EloquentReportGenerator\ReportGenerator;

/**
 * Trait Reportable
 * @package LangleyFoxall\EloquentReportGenerator\Traits
 */
trait Reportable
{
    /**
     * @return ReportGenerator
     */
    public function generateReport()
    {
        return new ReportGenerator($this);
    }
}