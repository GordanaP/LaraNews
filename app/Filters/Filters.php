<?php

namespace App\Filters;

abstract class Filters
{
    /**
     *
     * @var mixed;
     */
    protected $builder;

    /**
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Apply to the query builder
     *
     * @param  mixed $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value)
        {
            return method_exists($this, $filter)
                ? $this->$filter($value)
                : $this->builder;
        }
    }

    /**
     * Get filters
     * @return array
     */
    public function getFilters()
    {
        return request()->intersect($this->filters);
    }
}