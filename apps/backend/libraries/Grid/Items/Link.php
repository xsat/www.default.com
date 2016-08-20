<?php namespace Backend\Libraries\Grid\Items;

class Link extends Item implements ItemInterface
{
    private $params = [];
    private $linkParams = [];
    private $linkText = '';

    public function __construct($params = [], $linkText = null, $title = null)
    {
        parent::__construct(null, $title);
        $this->params = $params;
        $this->linkText = $linkText;
    }

    public function setModel($model)
    {
        parent::setModel($model);
        $this->updateParams();
    }

    private function updateParams()
    {
        $this->linkParams = $this->params;

        foreach ($this->params as $key => $param) {
            if (preg_match('#^\$(.*)#isu', $param, $matches)) {
                $this->field = $matches[1];
                $this->linkParams[$key] = parent::getValue();
            }
        }
    }

    public function getValue()
    {
        return \Phalcon\Tag::linkTo([
            $this->linkParams,
            $this->linkText,
            'class' => 'btn btn-default',
        ]);
    }
}