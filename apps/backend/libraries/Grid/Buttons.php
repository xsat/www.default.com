<?php namespace Backend\Libraries\Grid;

use \Phalcon\Mvc\User\Component;

class Buttons extends Component
{
    private $items = [];

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function renderBody()
    {
        $html = '';

        foreach ($this->items as $item) {
            $html .= $item->getValue();
        }

        return $html;
    }
}