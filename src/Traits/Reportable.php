<?php

namespace LangleyFoxall\EloquentReportGenerator\Traits;

use LangleyFoxall\EloquentReportGenerator\ReportGenerator;

trait Reportable
{
    public function generateReport()
    {
        return new ReportGenerator($this);
    }
}