<?php namespace Common;

use \Phalcon\Mvc\Router as PhalconRouter;

class Router extends PhalconRouter
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