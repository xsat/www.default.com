<?php namespace Backend\Libraries\Grid;

use \Phalcon\Mvc\User\Component;

class Breadcrumbs extends Component
{
    private $breadcrumbs = [];

    public function __construct($breadcrumbs = [])
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }

    public function isBreadcrumbs()
    {
        return $this->breadcrumbs && sizeof($this->breadcrumbs) > 0;
    }
}