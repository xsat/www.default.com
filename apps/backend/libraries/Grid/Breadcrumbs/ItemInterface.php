<?php namespace Backend\Libraries\Grid\Breadcrumbs;

interface ItemInterface
{
    public function isClass();

    public function getClass();

    public function getValue();
}