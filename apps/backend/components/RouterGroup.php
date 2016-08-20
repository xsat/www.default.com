<?php namespace Backend;

class RouterGroup extends \Phalcon\Mvc\Router\Group
{
    public function initialize()
    {
        $this->setPaths([
            'module'    => 'Backend',
            'namespace' => 'Backend\Controllers',
        ]);

        $this->setPrefix('/admin');

        $this->add('/', [
            'controller' => 'index',
            'action' => 'index'
        ]);

        $this->add('/:controller/:action/:params', [
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ])->setName('cap-admin');

        $this->add('/:controller/:action', [
            'controller' => 1,
            'action' => 2,
        ])->setName('ca-admin');

        $this->add('/:controller', [
            'controller' => 1,
        ])->setName('c-admin');
    }
}