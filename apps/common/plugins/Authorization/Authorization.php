<?php namespace Common\Plugins\Authorization;

use \Phalcon\Mvc\User\Plugin,
    \Phalcon\Events\Event,
    \Phalcon\Mvc\Dispatcher;

class Authorization extends Plugin
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        //$acl = $this->getAcl();

        /*var_dump(
            $dispatcher->getActionName(),
            $dispatcher->getControllerName(),
            $dispatcher->getModuleName()
        );exit;*/
    }
}
