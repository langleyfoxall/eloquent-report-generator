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
    public static function generateReport()
    {
        /** @noinspection PhpParamsInspection */
        return new ReportGenerator(new self);
    }
}