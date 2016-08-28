<?php namespace Backend\Libraries\Grid\Breadcrumbs;

class Item implements ItemInterface
{
    private $value = '';

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isClass()
    {
        return $this->getClass() != '';
    }

    public function getClass()
    {
        return 'active';
    }

    public function getValue()
    {
        return $this->value;
    }
}