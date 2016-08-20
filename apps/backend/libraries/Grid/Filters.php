<?php namespace Backend\Libraries\Grid;

class Filters extends \Phalcon\Mvc\User\Component
{
    private $filters = [];

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function addFilter($filter)
    {
        $this->filters[$filter->getName()] = $filter;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function getFilter($name)
        {
        return $this->filters[$name];
    }

    public function getFiltersByPage($page)
    {

    }
}