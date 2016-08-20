<?php namespace Common\Plugins\Authorization;

class Authorization extends \Phalcon\Mvc\User\Plugin
{
    public function beforeExecuteRoute(\Phalcon\Events\Event $event, \Phalcon\Mvc\Dispatcher $dispatcher)
    {
        //$acl = $this->getAcl();
    }
}
