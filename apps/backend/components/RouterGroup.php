<?php namespace Backend;

use \Phalcon\Mvc\Router\Group;

class RouterGroup extends Group
{
    public function initialize()
    {
        $this->setPaths([
            'module'    => 'backend',
            'namespace' => 'Backend\Controllers',
        ]);

        $this->setPrefix('/admin');

        $this->add('/', [
            'controller' => 'index',
            'action' => 'index'
        ])->setName('home-admin');

        $this->add('/:controller/:action/:params', [
            'controller' => 1,
            'action' => 2,
            'params' => 3,
        ])->setName('cap-admin');

        $this->add('/:controller/:action/:first/:second', [
            'controller' => 1,
            'action' => 2,
            'first' => 3,
            'second' => 4,
        ])->setName('cap2-admin');

        $this->add('/:controller/:action', [
            'controller' => 1,
            'action' => 2,
        ])->setName('ca-admin');

        $this->add('/:controller', [
            'controller' => 1,
            'action' => 'index',
        ])->setName('c-admin');
    }
}