<?php namespace Frontend;

class RouterGroup extends \Phalcon\Mvc\Router\Group
{
    public function initialize()
    {
        $this->setPaths([
            'module'    => 'Frontend',
            'namespace' => 'Frontend\Controllers',
        ]);

        $this->add('/', [
            'controller' => 'index',
            'action' => 'index'
        ]);
    }
}