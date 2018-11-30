<?php

namespace LangleyFoxall\EloquentReportGenerator\Interfaces;

interface ReportFormatInterface
{
    public function getDestination(string $filename);
}