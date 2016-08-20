<?php namespace Backend\Libraries\Grid\Items;

class Item implements ItemInterface
{
    protected $field = null;
    protected $title = null;
    protected $model = null;

    public function __construct($field, $title = null)
    {
        $this->field = $field;

        if ($title === null) {
            $this->title = $field;
        } else {
            $this->title = $title;
        }
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getValue()
    {
        $method = 'get' . \Phalcon\Text::camelize($this->field);

        if (method_exists($this->model, $method)) {
            return $this->model->{$method}();
        }

        return $this->model->{$this->field};
    }

    public function getTitle()
    {
        return $this->title;
    }
}