<?php namespace Backend\Libraries\Grid\Items;

use \Phalcon\Tag;

class Link extends Item implements ItemInterface
{
    private $link = [];
    private $params = [];

    public function __construct($link, $params = [])
    {
        $field = isset($params['field']) ? $params['field'] : null;
        $title = isset($params['title']) ? $params['title'] : null;

        if (is_string($params)) {
            $field = $params;
            $title = $params;

            $params = [];
        }

        parent::__construct($field, $title);

        $this->link = $link;
        $this->params = $params;
    }

    public function getValue()
    {
        return Tag::linkTo(array_merge([
            'action' => $this->update($this->link),
            'text' => parent::getValue(),
            'class' => 'btn btn-sm btn-default',
        ], $this->update($this->params)));
    }

    private function update($values)
    {
        $tempFiled = $this->field;

        foreach ($values as $key => $param) {
            if (preg_match('#^\$(.*)#isu', $param, $matches)) {
                $this->field = $matches[1];
                $values[$key] = parent::getValue();
            }
        }
        $this->field = $tempFiled;

        return $values;
    }
}