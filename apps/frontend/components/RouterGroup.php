<?php namespace Frontend;

use \Phalcon\Mvc\Router\Group;

class RouterGroup extends Group
{
    public function initialize()
    {
        $this->setPaths([
            'module'    => 'frontend',
            'namespace' => 'Frontend\Controllers',
        ]);

        $this->add('/', [
            'controller' => 'index',
            'action' => 'index'
        ]);
    }
}