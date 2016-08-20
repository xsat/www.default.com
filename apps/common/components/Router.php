<?php namespace Common;

class Router extends \Phalcon\Mvc\Router
{
    public function __construct()
    {
        parent::__construct(false);

        $this->setDefaultController('index');
        $this->setDefaultAction('index');

        $this->mount(new \Frontend\RouterGroup());
        $this->mount(new \Backend\RouterGroup());
    }
}