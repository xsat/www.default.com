<?php namespace Backend\Libraries\Grid\Filters;

interface FilterInterface
{
    public function getName();

    public function getValue();

    public function render();
}