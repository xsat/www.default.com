<?php namespace Common;

class Router extends \Phalcon\Mvc\Router
{
    public function __construct()
    {
        parent::__construct(false);

        $this->add('/admin', [
            'module' => 'backend',
            'controller' => 'index',
            'action' => 'index'
        ]);

        $this->add('/admin/test/:id', [
            'module' => 'backend',
            'controller' => 'index',
            'action' => 'index',
            'id' => 1,
        ])->setName('test');

        $this->add('/index', [
            'module' => 'frontend',
            'controller' => 'index',
            'action' => 'index'
        ]);
        $this->add('/', [
            'module' => 'frontend',
            'controller' => 'index',
            'action' => 'index'
        ]);
    }
}