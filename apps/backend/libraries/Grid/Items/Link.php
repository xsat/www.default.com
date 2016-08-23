<?php namespace Backend\Libraries\Grid\Items;

use \Phalcon\Tag;

class Link extends Item implements ItemInterface
{
    private $params = [];
    private $linkParams = [];

    public function __construct($params = [], $field = null, $title = null)
    {
        parent::__construct($field, $title);
        $this->params = $params;
        $this->updateParams();
    }

    public function setModel($model)
    {
        parent::setModel($model);

        $this->updateParams();
    }

    private function updateParams()
    {
        $this->linkParams = $this->params;

        $tempFiled = $this->field;

        foreach ($this->params as $key => $param) {
            if (preg_match('#^\$(.*)#isu', $param, $matches)) {
                $this->field = $matches[1];
                $this->linkParams[$key] = parent::getValue();
            }
        }

        $this->field = $tempFiled;
    }

    public function getValue()
    {
        return Tag::linkTo([
            $this->linkParams,
            parent::getValue(),
            'class' => 'btn btn-sm btn-default',
        ]);
    }
}