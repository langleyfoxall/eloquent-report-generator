<?php

namespace LangleyFoxall\EloquentReportGenerator;

use DivineOmega\uxdm\Objects\Exceptions\MissingFieldToMigrateException;
use DivineOmega\uxdm\Objects\Exceptions\NoDestinationException;
use DivineOmega\uxdm\Objects\Exceptions\NoSourceException;
use DivineOmega\uxdm\Objects\Migrator;
use DivineOmega\uxdm\Objects\Sources\EloquentSource;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use LangleyFoxall\EloquentReportGenerator\Exceptions\ReportGenerationException;
use LangleyFoxall\EloquentReportGenerator\Interfaces\ReportFormatInterface;

/**
 * Class ReportGenerator
 * @package LangleyFoxall\EloquentReportGenerator
 */
class ReportGenerator
{
    /**
     * @var Model
     */
    private $model;
    /**
     * @var ReportFormatInterface
     */
    private $format;
    /**
     * @var Builder
     */
    private $query;
    /**
     * @var array
     */
    private $fields;
    /**
     * @var array
     */
    private $fieldMap;

    /**
     * ReportGenerator constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param ReportFormatInterface $format
     * @return $this
     */
    public function format(ReportFormatInterface $format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param Builder $query
     * @return $this
     */
    public function query(Builder $query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param array $fieldMap
     * @return $this
     */
    public function fieldMap(array $fieldMap)
    {
        $this->fieldMap = $fieldMap;
        return $this;
    }


    /**
     * Save report (triggers report generation).
     *
     * @param $filename
     * @throws ReportGenerationException
     */
    public function save($filename)
    {
        $this->generate($filename);
    }

    /**
     * Perform report generation using migrator class.
     *
     * @param $filename
     * @throws ReportGenerationException
     */
    private function generate($filename)
    {
        try {
            (new Migrator())
                ->setSource($this->getSource())
                ->setDestination($this->format->getDestination($filename))
                ->setFieldsToMigrate($this->fields)
                ->setFieldMap($this->fieldMap)
                ->migrate();
        } catch (Exception $e) {
            throw new ReportGenerationException('Error generating report.', 0, $e);
        }
    }

    /**
     * @return EloquentSource
     */
    private function getSource()
    {
        return new EloquentSource(get_class($this->model), $this->query);
    }
}