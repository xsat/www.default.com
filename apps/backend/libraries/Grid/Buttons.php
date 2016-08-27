<?php namespace Backend\Libraries\Grid;

use \Phalcon\Mvc\User\Component;

class Buttons extends Component
{
    private $buttons = [];

    public function __construct($buttons = [])
    {
        $this->buttons = $buttons;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function isButtons()
    {
        return $this->buttons && sizeof($this->buttons) > 0;
    }
}