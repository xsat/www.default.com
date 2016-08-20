<?php namespace Backend\Libraries\Grid\Filters;

class Filter extends \Phalcon\Mvc\User\Component implements FilterInterface
{
    const TYPE_INT = 'int';
    const TYPE_STRING = 'string';

    protected $name;
    protected $value;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->value = $this->request->get($name);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function render()
    {
        return '';
    }
}